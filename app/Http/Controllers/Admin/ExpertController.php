<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ExpertRequest;
use App\Models\Expert;
use Illuminate\Http\Request;

class ExpertController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:expert-view', ['only' => ['index', 'data']]);
        $this->middleware('permission:expert-create', ['only' => ['onSave']]);
        $this->middleware('permission:expert-update', ['only' => ['onUpdate', 'onUpdateStatus']]);
    }

    public function index()
    {          
        return view("admin::pages.expert.index");
    }

    public function data()
    {
        $data = Expert::query()
        ->when(filled(request('search')), function ($q) {
            $q->where(function ($q) {
                $q->where('name', 'like', '%' . request('search') . '%');
            });
        })
        ->orderByDesc('id')
        ->paginate(50);

        return response()->json($data);
    }

    public function onSave(ExpertRequest $request)
    {
        try {
            $items = [
                'title'         => $request->title,
                'thumbnail'     => $request->thumbnail,
                'status'        => $request->status,
            ];

            if ($request->id) {
                Expert::find($request->id)->update($items);
            }else{
                Expert::create($items);
            }
            return response()->json([
                'status'    => 'success',
                'message'   => $request->id ? __('form.message.update.success') : __('form.message.create.success'),
                'error'     => false,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status'    => 'error',
                'message'   => __('form.message.error'),
                'error'     => $e->getMessage(),
            ]);
        }
    }

    public function onUpdateStatus(Request $request)
    {
        try {
            $blog = Expert::find($request->id);
            $blog->update(['status' => $request->status]);
            return response()->json([
                'status' => 'success',
                'message' => 'Success!',
                'error' => false,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong!',
                'error' => $e->getMessage(),
            ]);
        }
    }    

    public function saveSingleOption(Request $req)
    {
        try {
            $blog = Expert::findOrFail($req->id);
            $blog->update(['status' => $req->option]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' =>'Something went wrong!',
                'error' => $e->getMessage(),
            ]);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Success!',
            'error' => false,
        ]);
    }
}
