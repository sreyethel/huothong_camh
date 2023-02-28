<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FeatureRequest;
use App\Models\Feature;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    protected $active, $disabled;
    public function __construct()
    {
        $this->middleware('permission:product-feature-view', ['only' => ['index', 'data','onStore','bulkHideShow','saveSingleOption','onRestore','onDelete','onDestroy']]);

        $this->active = config('dummy.status.active.key');
        $this->disabled = config('dummy.status.disabled.key');
    }
    
    public function index()
    {
        return view("admin::pages.feature.index");
    }

    public function data()
    {
        $data = Feature::query()
            ->when(request('trash'), function($q) {
                $q->onlyTrashed();
            })
            ->when(request('status'), function ($q) {
                $q->where('status', $this->disabled);
            })
            ->when(!request('status'), function ($q) {
                if (request('trash')) {
                    $q->onlyTrashed();
                }else{
                    $q->where('status', $this->active);
                }
            })
            ->orderByDesc('id')
            ->paginate(25);

        return response()->json($data);
    }

    public function onStore(FeatureRequest $request)
    {
        $items = [
            'title'         => $request->title,
            'slug'          => $this->convertSlug($request->title),
            'status'        => $request->status,
        ];
        
        try {
            if (!$request->id) {
                Feature::create($items);
            } else {
                $foodMenu = Feature::find($request->id);
                $foodMenu->update($items);
            }
            return response()->json([
                'status' => 'success',
                'error' => false,
                'message' => $request->id ? __('form.message.update.success') :  __('form.message.create.success'),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'error' => true,
                'message' => __('form.message.error'),
            ]);
        }
    }

    public function bulkHideShow(Request $request)
    {
        $ids = $request->Ids;
        $option = $request->option;
        try {
            Feature::whereIn('id', $ids)->update(['status' => $option]);
            return response()->json([
                'status' => 'success',
                'message' => __('form.message.status.success'),
                'error' => false,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => __('form.message.error'),
                'error' => $e->getMessage(),
            ]);
        }
    }

    public function saveSingleOption(Request $req)
    {
        try {
            $blog = Feature::findOrFail($req->id);
            $blog->update(['status' => $req->option]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => __('form.message.error'),
                'error' => $e->getMessage(),
            ]);
        }

        return response()->json([
            'status' => 'success',
            'message' => __('form.message.status.success'),
            'error' => false,
        ]);
    }

    public function onRestore(Request $request)
    {
        $foodMenu = Feature::onlyTrashed()->find($request->id);
        $foodMenu->restore();
        return response()->json([
            'status' => 'success',
            'error' => false,
            'message' => __('form.message.restore.success'),
        ]);
    }

    public function onDelete(Request $request)
    {
        $foodMenu = Feature::find($request->id);
        $foodMenu->delete();
        return response()->json([
            'status' => 'success',
            'error' => false,
            'message' => __('form.message.move_to_trash.success'),
        ]);
    }

    public function onDestroy(Request $request)
    {
        $foodMenu = Feature::onlyTrashed()->find($request->id);
        $foodMenu->forceDelete();
        return response()->json([
            'status' => 'success',
            'error' => false,
            'message' => __('form.message.destroy.success'),
        ]);
    }

    public function convertSlug($slug){
        $slug = preg_replace("![^".preg_quote('-')."\pL\pN\s]+!u", '', mb_strtolower($slug));
        $slug = preg_replace("![".preg_quote('-')."\s]+!u", '-', $slug);
        $slug = trim($slug, '-');

        // unique slug
        $count = Feature::where('slug', 'like', $slug.'%')->count();
        if($count > 0){
            $slug = $slug.'-'.($count + 1);
        }
        
        return $slug;
    }
}