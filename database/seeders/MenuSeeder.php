<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Menu::truncate();

        // Dashboard
        Menu::create([
            'name' => json_encode(['en' => 'Dashboard']),
            'icon' => 'home',
            'path' => 'admin/dashboard',
            'active' => 'admin/dashboard',
            'permission' => array(''),
        ]);

        // Product
        Menu::create([
            'name' => json_encode(['en' => 'Product']),
            'icon' => 'grid',
            'path' => 'admin/product/list',
            'active' => 'admin/product/*',
            'permission' => array('product-view'),
        ]);

        // Partner
        Menu::create([
            'name' => json_encode(['en' => 'Partner']),
            'icon' => 'user',
            'path' => 'admin/partner/list',
            'active' => 'admin/partner/*',
            'permission' => array('partner-view'),
        ]);

        // Expert
        Menu::create([
            'name' => json_encode(['en' => 'Expert']),
            'icon' => 'layers',
            'path' => 'admin/expert/list',
            'active' => 'admin/expert/*',
            'permission' => array('expert-view'),
        ]);

        // Order management
        $order = Menu::create([
            'name' => json_encode(['en' => 'Order']),
            'icon' => 'shopping-cart',
            'active' => 'admin/order/*',
            'permission' => array('order-view'),
        ]);

        // Order management - Pending
        Menu::create([
            'parent_id' => $order->id,
            'name' => json_encode(['en' => 'Pending']),
            'path' => 'admin/order/list?status=' . config('dummy.order_status.pending'),
            'permission' => array('order-view'),
            'active' => 'admin/order/list?status=pending',
        ]);

        // Order management - Cancelled
        Menu::create([
            'parent_id' => $order->id,
            'name' => json_encode(['en' => 'Cancelled']),
            'path' => 'admin/order/list?status=' . config('dummy.order_status.cancelled'),
            'permission' => array('order-view'),
            'active' => 'admin/order/list?status=cancelled',
        ]);

        // Order management - Confirmed
        Menu::create([
            'parent_id' => $order->id,
            'name' => json_encode(['en' => 'Confirmed']),
            'path' => 'admin/order/list?status=' . config('dummy.order_status.confirmed'),
            'permission' => array('order-view'),
            'active' => 'admin/order/list?status=confirmed',
        ]);
        
        // Order management - Completed
        Menu::create([
            'parent_id' => $order->id,
            'name' => json_encode(['en' => 'Completed']),
            'path' => 'admin/order/list?status=' . config('dummy.order_status.completed'),
            'permission' => array('order-view'),
            'active' => 'admin/order/list?status=completed',
        ]);

        // Banner
        Menu::create([
            'name' => json_encode(['en' => 'Banner']),
            'icon' => 'image',
            'path' => 'admin/banner/list',
            'active' => 'admin/banner/*',
            'permission' => array('banner-view'),
        ]);

        // User management
        $user = Menu::create([
            'name' => json_encode(['en' => 'Users']),
            'icon' => 'users',
            'active' => 'admin/user/*',
            'permission' => array("user-view"),
        ]);

        Menu::create([
            'parent_id' => $user->id,
            'name' => json_encode(['en' => 'Admin']),
            'path' => 'admin/user/admin/list',
            'permission' => array("user-view"),
            'active' => 'admin/user/admin/*',
        ]);

        Menu::create([
            'parent_id' => $user->id,
            'name' => json_encode(['en' => 'Customer']),
            'path' => 'admin/user/customer/list',
            'permission' => array("user-view"),
            'active' => 'admin/user/customer/*',
        ]);

        //Setting management
        $setting = Menu::create([
            'name' => json_encode(['en' => 'Setting']),
            'icon' => 'settings',
            'active' => 'admin/setting/*',
            'permission' => array(''),
        ]);
        Menu::create([
            'parent_id' => $setting->id,
            'name' => json_encode(['en' => 'About Us']),
            'path' => 'admin/setting/' . 'about-us',
            'permission' => array("setting-view"),
            'active' => 'admin/setting/about-us',
        ]);
        Menu::create([
            'parent_id' => $setting->id,
            'name' => json_encode(['en' => 'Contact Us']),
            'path' => 'admin/setting/' . 'contact-us',
            'permission' => array("setting-view"),
            'active' => 'admin/setting/contact-us',
        ]);

        // Product Feature
        Menu::create([
            'parent_id' => $setting->id,
            'name' => json_encode(['en' => 'Product Feature']),
            'icon' => 'shopping-cart',
            'path' => 'admin/setting/' . 'product-feature',
            'active' => 'admin/setting/product-feature/*',
            'permission' => array('product-feature-view'),
        ]);
    }
}