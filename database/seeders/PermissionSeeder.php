<?php

namespace Database\Seeders;

use App\Models\ModulePermission;
use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        ModulePermission::truncate();
        Permission::truncate();
        Schema::enableForeignKeyConstraints();
        $view               = "View";
        $create             = "Create";
        $edit               = "Edit";
        $delete             = "Delete";
        $stDashboard        = 1;
        $stUser             = 2;
        $stProduct          = 3;
        $stPartner          = 4;
        $stExpert           = 5;
        $stOrder            = 6;
        $stBanner           = 7;
        $stSetting          = 100;

        // Dashboard
        $dashboard = ModulePermission::create([
            'name'          => 'dashboard',
            'sort_no'       => $stDashboard,
        ]);
        Permission::insert([
            [
                'display_name'  => $view,
                'name'          => 'dashboard-view',
                'guard_name'    => 'admin',
                'module_id'     => $dashboard->id,
            ],
        ]);


        //admin
        $admin = ModulePermission::create([
            'name'      => 'admin',
            'sort_no'   => $stUser,
        ]);
        Permission::insert([
            [
                'display_name'      => $view,
                'name'              => 'admin-view',
                'guard_name'        => 'admin',
                'module_id'         => $admin->id,
            ],
            [
                'display_name'      => $create,
                'name'              => 'admin-create',
                'guard_name'        => 'admin',
                'module_id'         => $admin->id,
            ],
            [
                'display_name'      => $edit,
                'name'              => 'admin-update',
                'guard_name'        => 'admin',
                'module_id'         => $admin->id,
            ],
            [
                'display_name'      => $delete,
                'name'              => 'admin-delete',
                'guard_name'        => 'admin',
                'module_id'         => $admin->id,
            ]
        ]);

        // Product
        $product = ModulePermission::create([
            'name'      => 'product',
            'sort_no'   => $stProduct,
        ]);
        Permission::insert([
            [
                'display_name'      => $view,
                'name'              => 'product-view',
                'guard_name'        => 'admin',
                'module_id'         => $product->id,
            ],
            [
                'display_name'      => $create,
                'name'              => 'product-create',
                'guard_name'        => 'admin',
                'module_id'         => $product->id,
            ],
            [
                'display_name'      => $edit,
                'name'              => 'product-update',
                'guard_name'        => 'admin',
                'module_id'         => $product->id,
            ],
            [
                'display_name'      => $delete,
                'name'              => 'product-delete',
                'guard_name'        => 'admin',
                'module_id'         => $product->id,
            ],
        ]);

        // Partner
        $partner = ModulePermission::create([
            'name'      => 'partner',
            'sort_no'   => $stPartner,
        ]);
        Permission::insert([
            [
                'display_name'      => $view,
                'name'              => 'partner-view',
                'guard_name'        => 'admin',
                'module_id'         => $partner->id,
            ],
            [
                'display_name'      => $create,
                'name'              => 'partner-create',
                'guard_name'        => 'admin',
                'module_id'         => $partner->id,
            ],
            [
                'display_name'      => $edit,
                'name'              => 'partner-update',
                'guard_name'        => 'admin',
                'module_id'         => $partner->id,
            ],
        ]);

        // Expert
        $expert = ModulePermission::create([
            'name'      => 'expert',
            'sort_no'   => $stExpert,
        ]);
        Permission::insert([
            [
                'display_name'      => $view,
                'name'              => 'expert-view',
                'guard_name'        => 'admin',
                'module_id'         => $expert->id,
            ],
            [
                'display_name'      => $create,
                'name'              => 'expert-create',
                'guard_name'        => 'admin',
                'module_id'         => $expert->id,
            ],
            [
                'display_name'      => $edit,
                'name'              => 'expert-update',
                'guard_name'        => 'admin',
                'module_id'         => $expert->id,
            ],
        ]);

        // Order
        $order = ModulePermission::create([
            'name'      => 'order',
            'sort_no'   => $stOrder,
        ]);
        Permission::insert([
            [
                'display_name'      => $view,
                'name'              => 'order-view',
                'guard_name'        => 'admin',
                'module_id'         => $order->id,
            ],
            [
                'display_name'      => $edit,
                'name'              => 'order-update',
                'guard_name'        => 'admin',
                'module_id'         => $order->id,
            ],
        ]);

        // Banner
        $banner = ModulePermission::create([
            'name'      => 'banner',
            'sort_no'   => $stBanner,
        ]);
        Permission::insert([
            [
                'display_name'      => $view,
                'name'              => 'banner-view',
                'guard_name'        => 'admin',
                'module_id'         => $banner->id,
            ],
            [
                'display_name'      => $create,
                'name'              => 'banner-create',
                'guard_name'        => 'admin',
                'module_id'         => $banner->id,
            ],
            [
                'display_name'      => $edit,
                'name'              => 'banner-update',
                'guard_name'        => 'admin',
                'module_id'         => $banner->id,
            ],
        ]);

        // Setting
        $setting = ModulePermission::create([
            'name'      => 'setting',
            'sort_no'   => $stSetting,
        ]);
        Permission::insert([
            [
                'display_name'  => $view,
                'name'          => 'about-us-view',
                'guard_name'    => 'admin',
                'module_id'     => $setting->id,
            ],
            [
                'display_name'  => $view,
                'name'          => 'contact-us-view',
                'guard_name'    => 'admin',
                'module_id'     => $setting->id,
            ],
            [
                'display_name'  => $view,
                'name'          => 'product-feature-view',
                'guard_name'    => 'admin',
                'module_id'     => $setting->id,
            ],
        ]);
    }
}
