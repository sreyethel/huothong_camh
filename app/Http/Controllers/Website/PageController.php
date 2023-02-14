<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\WebsiteBaseController;

class PageController extends WebsiteBaseController
{
    protected $layout = 'website::pages.';

    public function onAboutUs()
    {
        return view($this->layout. 'about');
    }

    public function onContactUs()
    {
        return view($this->layout. 'contact');
    }
}