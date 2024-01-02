<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UploaderController extends Controller
{
    public function index()
    {
        return view('productsetup.productuploader.create');
    } 
}
