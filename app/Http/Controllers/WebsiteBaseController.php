<?php

namespace App\Http\Controllers;

use App\Models\User;
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
            $this->about            = $this->websiteService->getPage(config('dummy.banner.about_us'));
            $this->contact          = $this->websiteService->getPage(config('dummy.banner.contact_us'));
            $this->totalCart        = 0;

            $this->middleware(function ($request, $next) {
                if (auth('web')->check()) {
                    $this->user         = User::find(auth('web')->user()->id);
                    $this->totalCart    = $this->user?->carts?->count();

                    view()->share([
                        'totalCart'     => $this->totalCart,
                    ]);
                }
                return $next($request);
            });

            view()->share([
                'about'         => $this->about,
                'contact'       => $this->contact,
            ]);


        } catch (\Exception $e) {
            abort(503);
        }
    }
}