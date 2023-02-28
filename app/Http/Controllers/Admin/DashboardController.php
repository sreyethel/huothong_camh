<?php

namespace App\Http\Controllers\Admin;


use App\Services\QueryService;
use App\Http\Controllers\Controller;
use App\Models\Partner;
use App\Models\Product;
use App\Models\User;

class DashboardController extends Controller
{

    private $queryService;
    public function __construct(QueryService $queryService)
    {
        $this->queryService = $queryService;
    }

    public function index()
    {        
        $data["dashboard"] = [
            (object)[
                'name' => 'Total User',
                'icon' => 'users',
                'value' => $this->countUser(),
                'custom_class' => '!bg-blue-400',
                'link' => route('admin-customer-list'),
            ],
            (object)[
                'name' => 'Total Partner',
                'icon' => 'user',
                'value' => $this->countPartner(),
                'custom_class' => '!bg-emerald-400',
                'link' => route('admin-partner-list'),
            ],
            (object)[
                'name' => 'Total Product',
                'icon' => 'grid',
                'value' => $this->countProduct(),
                'custom_class' => '!bg-indigo-500',
                'link' => route('admin-product-list'),
            ],
        ];

        return view("admin::pages.dashboard", $data);
    }

    public function countUser()
    {
        return User::whereRole(config('dummy.user.role.user'))->count();
    }

    public function countPartner()
    {
        return Partner::count();
    }

    public function countProduct()
    {
        return Product::count();
    }
}