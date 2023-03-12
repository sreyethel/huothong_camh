<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\WebsiteBaseController;

class PageController extends WebsiteBaseController
{
    protected $layout = 'website::pages.';

    public function onAboutUs()
    {
        $data['banner']         = $this->websiteService->getBanner(config('dummy.banner.about_us'));
        $data['expert_banner']  = $this->websiteService->getBanner(config('dummy.banner.expert'));
        $data['expert']         = $this->websiteService->getExpert();
        
        return view($this->layout. 'about', $data);
    }

    public function onContactUs()
    {
        $data['banner'] = $this->websiteService->getBanner(config('dummy.banner.contact_us'));
        return view($this->layout. 'contact', $data);
    }
}