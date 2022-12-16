<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slidder;
use Illuminate\Http\Request;

class UserHomeController extends Controller
{
    public function homeUser()
    {
        return view('user.home',[
            'title' => 'Home User',
            'active' => 'home',
            'brands' => Brand::all(),
            'categories' => Category::all(),
            'products' => Product::all(),
            'slidders' => Slidder::where('status','1'),
            'newProducts' => Product::all(),
        ]);
    }
}
