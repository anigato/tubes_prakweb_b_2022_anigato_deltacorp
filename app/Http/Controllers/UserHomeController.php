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
        session_start();
        return view('user.home',[
            'title' => 'Home User',
            'active' => 'home',
            'brands' => Brand::all(),
            'categories' => Category::latest()->first()->limit(5)->get(),
            'products' => Product::all(),
            // 'slidders' => Slidder::all(),
            // 'slidders' => Slidder::where('status','1'),
            'slidders' => Slidder::where('status', '=', 1)->get(),
            'newProducts' => Product::latest()->paginate(10),
        ]);
    }
}
