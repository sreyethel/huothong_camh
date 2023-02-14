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

        // Slider
        Menu::create([
            'name' => json_encode(['en' => 'Slider']),
            'icon' => 'image',
            'path' => 'admin/slider/list',
            'active' => 'admin/slider/*',
            'permission' => array("slider-view"),
        ]);

        // Category
        Menu::create([
            'name' => json_encode(['en' => 'Category']),
            'icon' => 'package',
            'path' => 'admin/category/list',
            'active' => 'admin/category/*',
            'permission' => array('category-view'),
        ]);

        // Partner
        Menu::create([
            'name' => json_encode(['en' => 'Partner']),
            'icon' => 'user',
            'path' => 'admin/partner/list',
            'active' => 'admin/partner/*',
            'permission' => array('partner-view'),
        ]);

        // User management
        $user = Menu::create([
            'name' => json_encode(['en' => 'Users']),
            'icon' => 'users',
            'active' => 'admin/admin/*',
            'permission' => array("user-view"),
        ]);

        Menu::create([
            'parent_id' => $user->id,
            'name' => json_encode(['en' => 'Admin']),
            'path' => 'admin/admin/list',
            'permission' => array("user-view"),
            'active' => 'admin/admin/*',
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
            'permission' => array("about-us-view"),
            'active' => 'admin/setting/about-us',
        ]);
        Menu::create([
            'parent_id' => $setting->id,
            'name' => json_encode(['en' => 'Contact Us']),
            'path' => 'admin/setting/' . 'contact-us',
            'permission' => array("contact-us-view"),
            'active' => 'admin/setting/contact-us',
        ]);
        Menu::create([
            'parent_id' => $setting->id,
            'name' => json_encode(['en' => 'Privacy Policy']),
            'icon' => 'file-text',
            'path' => 'admin/privacy-policy/list',
            'active' => 'admin/privacy-policy/*',
            'permission' => array('privacy-policy-view'),
        ]);
        Menu::create([
            'parent_id' => $setting->id,
            'name' => json_encode(['en' => 'Term and Condition']),
            'icon' => 'file-text',
            'path' => 'admin/term-and-condition/list',
            'active' => 'admin/term-and-condition/*',
            'permission' => array('term-and-condition-view'),
        ]);
    }
}
