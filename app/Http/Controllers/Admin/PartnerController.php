<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PartnerRequest;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PartnerController extends Controller
{
    private $active, $disabled;

    public function __construct()
    {
        // $this->middleware('permission:partner-view', ['only' => ['index', 'data']]);
        // $this->middleware('permission:partner-create', ['only' => ['onSave']]);
        // $this->middleware('permission:partner-update', ['only' => ['onUpdate', 'onUpdateStatus']]);
        // $this->middleware('permission:partner-delete', ['only' => ['destroy']]);

        $this->active = config('dummy.status.active.key');
        $this->disabled = config('dummy.status.disabled.key');
    }

    public function index()
    {          
        return view("admin::pages.partner.index");
    }

    public function data()
    {
        $data = Partner::query()
        ->when(filled(request('search')), function ($q) {
            $q->where(function ($q) {
                $q->where('name', 'like', '%' . request('search') . '%');
            });
        })
        ->when(request('status'), function ($q) {
            $q->where('status', $this->disabled);
        })
        ->when(!request('status'), function ($q) {
            $q->where('status', $this->active);
        })
        ->orderByDesc('id')
        ->paginate(50);

        return response()->json($data);
    }

    public function onSave(PartnerRequest $request)
    {
        DB::beginTransaction();
        try {
            $items = [
                'name'          => $request->name,
                'link'          => $this->convertSlug($request->name),
                'logo'          => $request->logo,
                'content'       => $request->content,
                'status'        => $request->status,
            ];

            $message = 'Partner created success!';

            if ($request->id) {
                Partner::find($request->id)->update($items);
                $message = 'Partner updated success!';
            }else{
                Partner::create($items);
            }

            DB::commit();
            return response()->json([
                'status'    => 'success',
                'message'   => $message,
                'error'     => false,
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status'    => 'error',
                'message'   => 'Something went wrong!',
                'error'     => $e->getMessage(),
            ]);
        }
    }

    public function onUpdateStatus(Request $request)
    {
        try {
            $blog = Partner::find($request->id);
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

    public function bulkHideShow(Request $request)
    {
        $ids = $request->partnerIds;
        $option = $request->option;
        try {
            Partner::whereIn('id', $ids)->update(['status' => $option]);
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
            $blog = Partner::findOrFail($req->id);
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

    public function convertSlug($slug){
        $slug = preg_replace("![^".preg_quote('-')."\pL\pN\s]+!u", '', mb_strtolower($slug));
        $slug = preg_replace("![".preg_quote('-')."\s]+!u", '-', $slug);
        $slug = trim($slug, '-');

        return $slug;
    }
}