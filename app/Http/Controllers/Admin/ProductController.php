<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductRequest;
use App\Models\Feature;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $active, $disabled;
    public function __construct()
    {
        $this->middleware('permission:product-view', ['only' => ['index', 'data']]);
        $this->middleware('permission:product-create', ['only' => ['onStore','onGallery','onFeature']]);
        $this->middleware('permission:product-update', ['only' => ['bulkHideShow', 'saveSingleOption']]);
        $this->middleware('permission:product-delete', ['only' => ['onRestore','onDelete','onDestroy']]);

        $this->active = config('dummy.status.active.key');
        $this->disabled = config('dummy.status.disabled.key');
    }
    
    public function index()
    {
        return view("admin::pages.product.index");
    }

    public function data()
    {
        $data = Product::when(filled(request('search')), function ($q) {
                $q->where(function ($q) {
                    $q->where('title', 'like', '%' . request('search') . '%');
                });
            })
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

    public function onStore(ProductRequest $request)
    {
        $items = [
            'title'         => $request->title,
            'slug'          => $this->convertSlug($request->title),
            'price'         =>  $this->convertPrice($request->price),
            'size'          => $request->size,
            'content'       => $request->content,
            'thumbnail'     => $request->thumbnail,
            'status'        => $request->status,
        ];
        
        try {
            if (!$request->id) {
                Product::create($items);
            } else {
                $data = Product::find($request->id);
                $data->update($items);
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

    public function onGallery(Request $req)
    {
        // $req->validate([
        //     'gallery' => 'required',
        // ], [
        //     'gallery.required' => __('validate.select.gallery'),
        // ]);

        try {
            $data = Product::find($req->id);
            $data->update(['gallery' => $this->jsonArray($req->gallery)]);
            return response()->json([
                'status' => 'success',
                'error' => false,
                'message' => count(json_decode($data->gallery)) > 1 ? __('form.message.update.success') : __('form.message.create.success'),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'error' => true,
                'message' => __('form.message.error'),
            ]);
        }
    }

    public function onFeature(Request $req)
    {
        // $req->validate([
        //     'feature' => 'required',
        // ], [
        //     'feature.required' => __('validate.select.feature'),
        // ]);

        try {
            $data = Product::find($req->id);
            $data->update(['feature' => $this->jsonArray($req->feature)]);
            return response()->json([
                'status' => 'success',
                'error' => false,
                'message' => __('form.message.success'),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'error' => true,
                'message' => __('form.message.error'),
            ]);
        }
    }

    public function onLocation(Request $req)
    {
        try {
            $location = json_encode([
                'latitude'  => $req->latitude,
                'longitude' => $req->longitude,
            ]);

            $data = Product::find($req->id);
            $data->update(['location' => $location]);

            return response()->json([
                'status' => 'success',
                'error' => false,
                'message' => __('form.message.success'),
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
            Product::whereIn('id', $ids)->update(['status' => $option]);
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
            $blog = Product::findOrFail($req->id);
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
        $foodMenu = Product::onlyTrashed()->find($request->id);
        $foodMenu->restore();
        return response()->json([
            'status' => 'success',
            'error' => false,
            'message' => __('form.message.restore.success'),
        ]);
    }

    public function onDelete(Request $request)
    {
        $foodMenu = Product::find($request->id);
        $foodMenu->delete();
        return response()->json([
            'status' => 'success',
            'error' => false,
            'message' => __('form.message.move_to_trash.success'),
        ]);
    }

    public function onDestroy(Request $request)
    {
        $foodMenu = Product::onlyTrashed()->find($request->id);
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
        $count = Product::where('slug', 'like', $slug.'%')->count();
        if($count > 0){
            $slug = $slug.'-'.($count + 1);
        }
        
        return $slug;
    }

    public function convertPrice($price)
    {
        $price = preg_replace("/[^0-9]/", "", $price);
        $price = (int) $price;
        return $price;
    }

    public function jsonArray($data)
    {
        if(!is_array($data)) return null;
        return json_encode(collect($data));
    }

}