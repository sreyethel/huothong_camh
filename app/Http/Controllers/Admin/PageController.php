<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PageRequest;
use App\Models\Page;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('permission:page-view', ['only' => ['index', 'getData']]);
    //     $this->middleware('permission:page-edit', ['only' => ['onUpdate']]);
    // }

    public function onPage($page)
    {
        if($page == 'contact-us') return view('admin::pages.page.contact');
        return view('admin::pages.page.show', ['page' => $page]);
    }

    public function getData($page)
    {
        $model = Page::wherePage($page)->first();
        return response()->json($model);
    }
    
    public function onSave(PageRequest $request)
    {
        $content = json_encode([
            'content'               => $request->content,
            'short_detail_about_us' => $request->short_detail_about_us,
            'why_choose_us'         => $request->why_choose_us,
        ]);
        
        $items = [
            'title'         => $request->title,
            'page'          => $request->page,
            'content'       => $content,
            'status'        => $request->status,
        ];

        DB::beginTransaction();
        try {

            Page::updateOrCreate(['page' => $request->page], $items);
            
            DB::commit();
            return response()->json([
                'status' => 'success',
                'message' => 'Update success!',
                'error' => false,
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong!',
                'error' => $e->getMessage(),
            ]);
        }
    }

    public function onSaveContact(PageRequest $request)
    {
        $items = [
            'title'         => $request->title,
            'page'          => $request->page,
            'content'       => json_encode([
                'address'   => $request->address,
                'phone'     => $request->phone,
                'email'     => $request->email,
                'embed_map' => $request->embed_map,
                'facebook_link'     => $request->facebook_link,
                'twitter_link'      => $request->twitter_link,
                'instagram_link'    => $request->instagram_link,
                'linkedin_link'     => $request->linkedin_link,
                'tiktok_link'       => $request->tiktok_link,
                'whatapp_link'      => $request->whatapp_link,
            ]),
            'status'        => $request->status,
        ];

        DB::beginTransaction();
        try {

            Page::updateOrCreate(['page' => $request->page], $items);
            
            DB::commit();
            return response()->json([
                'status' => 'success',
                'message' => 'Update success!',
                'error' => false,
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong!',
                'error' => $e->getMessage(),
            ]);
        }
    }
}