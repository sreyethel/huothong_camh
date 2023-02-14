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
        $view = "View";
        $create = "Create";
        $edit = "Edit";
        $delete = "Delete";
        $trash = "Trash";
        $destroy = "Destroy";
        $stSlider = 1;
        $stCategory = 2;
        $stProduct = 3;
        $stBlog = 4;
        $stMedia = 5;
        $stPartner = 6;
        $stUser = 7;
        $stSetting = 100;

        //admin
        $admin = ModulePermission::create([
            'name' => 'admin',
            'sort_no' => $stUser,
        ]);
        Permission::insert([
            [
                'display_name' => $view,
                'name' => 'admin-view',
                'guard_name' => 'admin',
                'module_id' => $admin->id,
            ],
            [
                'display_name' => $create,
                'name' => 'admin-create',
                'guard_name' => 'admin',
                'module_id' => $admin->id,
            ],
            [
                'display_name' => $edit,
                'name' => 'admin-update',
                'guard_name' => 'admin',
                'module_id' => $admin->id,
            ],
            [
                'display_name' => $delete,
                'name' => 'admin-delete',
                'guard_name' => 'admin',
                'module_id' => $admin->id,
            ]
        ]);

        // Slider
        $slider = ModulePermission::create([
            'name' => 'slider',
            'sort_no' => $stSlider,
        ]);
        Permission::insert([
            [
                'display_name' => $view,
                'name' => 'slider-view',
                'guard_name' => 'admin',
                'module_id' => $slider->id,
            ],
            [
                'display_name' => $create,
                'name' => 'slider-create',
                'guard_name' => 'admin',
                'module_id' => $slider->id,
            ],
            [
                'display_name' => $edit,
                'name' => 'slider-update',
                'guard_name' => 'admin',
                'module_id' => $slider->id,
            ],
        ]);

        // Category
        $category = ModulePermission::create([
            'name' => 'category',
            'sort_no' => $stCategory,
        ]);
        Permission::insert([
            [
                'display_name' => $view,
                'name' => 'category-view',
                'guard_name' => 'admin',
                'module_id' => $category->id,
            ],
            [
                'display_name' => $create,
                'name' => 'category-create',
                'guard_name' => 'admin',
                'module_id' => $category->id,
            ],
            [
                'display_name' => $edit,
                'name' => 'category-update',
                'guard_name' => 'admin',
                'module_id' => $category->id,
            ],
        ]);

        // Product
        $product = ModulePermission::create([
            'name' => 'product',
            'sort_no' => $stProduct,
        ]);
        Permission::insert([
            [
                'display_name' => $view,
                'name' => 'product-view',
                'guard_name' => 'admin',
                'module_id' => $product->id,
            ],
            [
                'display_name' => $create,
                'name' => 'product-create',
                'guard_name' => 'admin',
                'module_id' => $product->id,
            ],
            [
                'display_name' => $edit,
                'name' => 'product-update',
                'guard_name' => 'admin',
                'module_id' => $product->id,
            ],
            [
                'display_name' => $delete,
                'name' => 'product-delete',
                'guard_name' => 'admin',
                'module_id' => $product->id,
            ],
            [
                'display_name' => $trash,
                'name' => 'product-trash',
                'guard_name' => 'admin',
                'module_id' => $product->id,
            ],
            [
                'display_name' => $destroy,
                'name' => 'product-destroy',
                'guard_name' => 'admin',
                'module_id' => $product->id,
            ]
        ]);

        // Blog
        $blog = ModulePermission::create([
            'name' => 'blog',
            'sort_no' => $stBlog,
        ]);
        Permission::insert([
            [
                'display_name' => $view,
                'name' => 'blog-view',
                'guard_name' => 'admin',
                'module_id' => $blog->id,
            ],
            [
                'display_name' => $create,
                'name' => 'blog-create',
                'guard_name' => 'admin',
                'module_id' => $blog->id,
            ],
            [
                'display_name' => $edit,
                'name' => 'blog-update',
                'guard_name' => 'admin',
                'module_id' => $blog->id,
            ],
            [
                'display_name' => $delete,
                'name' => 'blog-delete',
                'guard_name' => 'admin',
                'module_id' => $blog->id,
            ],
            [
                'display_name' => $trash,
                'name' => 'blog-trash',
                'guard_name' => 'admin',
                'module_id' => $blog->id,
            ],
            [
                'display_name' => $destroy,
                'name' => 'blog-destroy',
                'guard_name' => 'admin',
                'module_id' => $blog->id,
            ]
        ]);

        // Media
        $media = ModulePermission::create([
            'name' => 'media',
            'sort_no' => $stMedia,
        ]);
        Permission::insert([
            [
                'display_name' => $view,
                'name' => 'media-view',
                'guard_name' => 'admin',
                'module_id' => $media->id,
            ],
            [
                'display_name' => $create,
                'name' => 'media-create',
                'guard_name' => 'admin',
                'module_id' => $media->id,
            ],
            [
                'display_name' => $edit,
                'name' => 'media-update',
                'guard_name' => 'admin',
                'module_id' => $media->id,
            ],
            [
                'display_name' => $delete,
                'name' => 'media-delete',
                'guard_name' => 'admin',
                'module_id' => $media->id,
            ],
            [
                'display_name' => $trash,
                'name' => 'media-trash',
                'guard_name' => 'admin',
                'module_id' => $media->id,
            ],
            [
                'display_name' => $destroy,
                'name' => 'media-destroy',
                'guard_name' => 'admin',
                'module_id' => $media->id,
            ]
        ]);

        // Partner
        $partner = ModulePermission::create([
            'name' => 'partner',
            'sort_no' => $stPartner,
        ]);
        Permission::insert([
            [
                'display_name' => $view,
                'name' => 'partner-view',
                'guard_name' => 'admin',
                'module_id' => $partner->id,
            ],
            [
                'display_name' => $create,
                'name' => 'partner-create',
                'guard_name' => 'admin',
                'module_id' => $partner->id,
            ],
            [
                'display_name' => $edit,
                'name' => 'partner-update',
                'guard_name' => 'admin',
                'module_id' => $partner->id,
            ],
        ]);

        // Setting
        $setting = ModulePermission::create([
            'name' => 'setting',
            'sort_no' => $stSetting,
        ]);
        Permission::insert([
            [
                'display_name' => $view,
                'name' => 'about-us-view',
                'guard_name' => 'admin',
                'module_id' => $setting->id,
            ],
            [
                'display_name' => $view,
                'name' => 'contact-us-view',
                'guard_name' => 'admin',
                'module_id' => $setting->id,
            ],
        ]);
    }
}
