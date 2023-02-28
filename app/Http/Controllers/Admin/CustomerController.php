<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:admin-view', ['only' => ['index']]);
    }

    public function index()
    {
        return view("admin::pages.customer.index");
    }

    public function data()
    {
        $data = User::when(filled(request('search')), function ($q) {
            /**
             * Filter by search
             */
            $q->where(function ($q) {
                $q->where('username', 'like', '%' . request('search') . '%')
                    ->orWhere('phone', 'like', '%' . request('search') . '%')
                    ->orWhere('email', 'like', '%' . request('search') . '%');
            });
        })
            /**
             * Show only trash data
             */
            ->when(request('trash'), function ($q) {
                $q->onlyTrashed();
            })
            ->where('role', config('dummy.user.role.user'))
            ->orderByDesc("created_at")
            ->paginate(25);

        return response()->json($data);
    }
}
