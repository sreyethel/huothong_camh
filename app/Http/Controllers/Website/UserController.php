<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $layout = 'website::users.';

    public function onUserSetting()
    {
        return view($this->layout. 'user');
    }
    public function onUserFavorite()
    {
        return view($this->layout. 'favorite');
    }
    public function onUserPassword()
    {
        return view($this->layout. 'password');
    }
    public function onUserCart()
    {
        return view($this->layout. 'cart');
    }
}
