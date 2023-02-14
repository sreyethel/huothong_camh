<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\WebsiteBaseController;

class HomeController extends WebsiteBaseController
{
    public function onHome()
    {       
        try {
            return view('website::pages.home');
        } catch (\Exception $e) {
            return abort(403, $this->abort);
        }
    }
}