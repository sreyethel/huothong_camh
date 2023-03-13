<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BannerRequest;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    protected $active, $disabled;
    public function __construct()
    {
        $this->middleware('permission:banner-view', ['only' => ['index', 'data']]);
        $this->middleware('permission:banner-create', ['only' => ['onSave']]);
        $this->middleware('permission:banner-update', ['only' => ['onUpdate', 'onUpdateStatus']]);

        $this->active = config('dummy.status.active.key');
        $this->disabled = config('dummy.status.disabled.key');
    }
    
    public function index()
    {
        return view("admin::pages.banner.index");
    }

    public function data()
    {
        $data = Banner::when(filled(request('search')), function ($q) {
                $q->where(function ($q) {
                    $q->where('title', 'like', '%' . request('search') . '%');
                });
            })
            ->orderByDesc('id')
            ->paginate(25);

        return response()->json($data);
    }

    public function onStore(BannerRequest $request)
    {
        $items = [
            'title'         => $request->title,
            'page'          => $request->page,
            'content'       => $request->content,
            'thumbnail'     => $request->thumbnail,
            'status'        => $request->status,
        ];
        
        try {
            if (!$request->id) {
                Banner::create($items);
            } else {
                $foodMenu = Banner::find($request->id);
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

    public function onUpdateStatus(Request $request)
    {
        try {
            $user = Banner::find($request->id);
            $user->update(['status' => $request->status]);
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

    public function dataPage()
    {
        $data = Banner::query()
                    ->wherePage(request('page'))
                    ->whereStatus($this->active)
                    ->first();
                    
        return response()->json($data);
    }
}