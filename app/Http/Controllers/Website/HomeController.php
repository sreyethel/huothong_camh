<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\WebsiteBaseController;
use App\Models\Banner;
use App\Models\Expert;

class HomeController extends WebsiteBaseController
{
    public function onHome()
    {       
        try {
            $data['expert'] = $this->websiteService->getExpert();
            $data['banner'] = $this->websiteService->getBanner(config('dummy.banner.expert'));
            $data['home']   = $this->websiteService->getBanner(config('dummy.banner.home'));
            $data['partner']   = $this->websiteService->getPartner();
            $data['products']   = $this->websiteService->getProduct(6);
            
            
            // ddd($data['products']);

            return view('website::pages.home', $data);
        } catch (\Exception $e) {
            return abort(403, $this->abort);
        }
    }
}