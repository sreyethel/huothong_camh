<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\WebsiteBaseController;
use App\Models\Feature;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends WebsiteBaseController
{
    protected $layout = 'website::pages.product.';

    public function onIndex()
    {
        try {
            $data['banner']     = $this->websiteService->getBanner(config('dummy.banner.product'));
            $data['products']   = $this->websiteService->getProduct();
                        
            return view($this->layout . 'index', $data);

        } catch (\Exception $e) {
            return abort(403, $this->abort);
        }
    }

    public function onDetail($slug)
    {
        try {
            $data['detail'] = $this->websiteService->detailProduct($slug);
            $data['products']   = $this->websiteService->getProduct(6);
            $data['recently_products']   = $this->websiteService->getRecentlyAdded($data['detail']['id']);
            $data['related_products']   = $this->websiteService->getRelatedProduct($data['detail']['id']);
            
            // ddd($data['details']['id']);

            return view($this->layout . 'detail', $data);

        } catch (\Exception $e) {
            return abort(403, $this->abort);
        }
        
    }
}
