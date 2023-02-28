<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PageRequest;
use App\Models\Page;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:about-us-view', ['only' => ['onPage', 'getData','onSave']]);
        $this->middleware('permission:contact-us-view', ['only' => ['onPage', 'getData','onSaveContact']]);
    }

    public function onPage($page)
    {
        if($page == 'product-feature') return redirect()->route('admin-product-feature-list');
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
        $aboutUs = json_encode([
            'content'               => $request->content,
            'short_detail_about_us' => $request->short_detail_about_us,
            'thumbnail'             => $request->thumbnail,
        ]);

        $content = $request->page == config('dummy.page_type.about_us') ? $aboutUs : json_encode($request->content);

        $items = [
            'title'         => $request->title,
            'page'          => $request->page,
            'content'       => $content,
            'status'        => $request->status,
        ];

        try {
            Page::updateOrCreate(['page' => $request->page], $items);
            
            return response()->json([
                'status' => 'success',
                'message' => 'Update success!',
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

    public function onSaveContact(PageRequest $request)
    {
        $items = [
            'title'         => $request->title,
            'page'          => $request->page,
            'content'       => json_encode([
                'address'       => $request->address,
                'phone'         => $request->phone,
                'email'         => $request->email,
                'embed_map'     => $request->embed_map,
                'facebook'      => $request->facebook,
                'twitter'       => $request->twitter,
                'instagram'     => $request->instagram,
                'linkedin'      => $request->linkedin,
            ]),
            'status'        => $request->status,
        ];

        try {
            Page::updateOrCreate(['page' => $request->page], $items);
            
            return response()->json([
                'status' => 'success',
                'message' => 'Update success!',
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
}