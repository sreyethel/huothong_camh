<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $layout = 'website::pages.product.';

    public function onIndex()
    {
        return view($this->layout . 'index');
    }

    public function onDetail($slug)
    {
        return view($this->layout . 'detail');
    }
}
