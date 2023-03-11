<?php

namespace App\Http\Controllers;

use App\Services\WebsiteService;
use Illuminate\Routing\Controller as BaseController;

class WebsiteBaseController extends BaseController
{
    public $abort, $websiteService, $user, $about,$contact, $totalCart;
    public function __construct()
    {
        try {
            $this->abort            = 'The page you are looking for could not be found.';
            $this->websiteService   = new WebsiteService();

        } catch (\Exception $e) {
            abort(503);
        }
    }
}