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
            $data['home']       = $this->websiteService->getBanner(config('dummy.banner.home'));
            $data['banner']     = $this->websiteService->getBanner(config('dummy.banner.expert'));
            $data['expert']     = $this->websiteService->getExpert();
            $data['partner']    = $this->websiteService->getPartner();
            $data['products']   = $this->websiteService->getProduct(6);

            return view('website::pages.home', $data);
        } catch (\Exception $e) {
            return abort(403, $this->abort);
        }
    }
}