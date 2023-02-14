<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

class WebsiteBaseController extends BaseController
{
    public $abort, $categories, $user, $about,$contact;
    public function __construct()
    {
        try {
            $this->abort        = 'The page you are looking for could not be found.';

        } catch (\Exception $e) {
            abort(503);
        }
    }
}