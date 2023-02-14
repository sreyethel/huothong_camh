<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
class CategoryController extends Controller
{
    public function index()
    {
        return view("admin::pages.category.index");
    }

    public function data()
    {
        $data = Category::when(filled(request('search')), function ($q) {
            $q->where(function ($q) {
                $q->where('name', 'like', '%' . request('search') . '%');
            });
        })
        ->when(request('parent_id'), function($q) {
            $q->where('parent_id', request('parent_id'));
        })
        ->when(!request('parent_id'), function($q) {
            $q->whereNull('parent_id');
        })
        ->when(request('trash'), function($q) {
            $q->onlyTrashed();
        })
        ->orderByDesc('id')
        ->paginate(25);

        return response()->json($data);
    }

    public function onStore(CategoryRequest $request)
    {
        $items = [
            'parent_id' => $request->parent_id ?? null,
            'name'      => $request->name,
            'slug'      => $this->convertSlug($request->name),
            'status'    => $request->status,
        ];
        DB::beginTransaction();
        try {
            if (!$request->id) {
                Category::create($items);
            } else {
                $category = Category::find($request->id);
                $category->update($items);
            }
            DB::commit();
            return response()->json([
                'status' => 'success',
                'message' => $request->id ? 'Updated Success!' :  'Created Success!',
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
    
    public function onUpdateStatus(Request $request)
    {
        try {
            $user = Category::find($request->id);
            $user->update(['status' => $request->status]);
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

    public function onDelete(Request $request)
    {
        try {
            Category::find($request->id)->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Deleted Success!',
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

    public function onRestore(Request $request)
    {
        try {
            Category::onlyTrashed()->find($request->id)->restore();
            return response()->json([
                'status' => 'success',
                'message' => 'Restored Success!',
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

    public function convertSlug($slug){
        $slug = preg_replace("![^".preg_quote('-')."\pL\pN\s]+!u", '', mb_strtolower($slug));
        $slug = preg_replace("![".preg_quote('-')."\s]+!u", '-', $slug);
        $slug = trim($slug, '-');

        return $slug;
    }
}
