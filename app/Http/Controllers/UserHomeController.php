<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slidder;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class UserHomeController extends Controller
{
    public function homeUser()
    {
        session_start();
        if(Auth()->user()){
            $wish = Wishlist::where('user_id',Auth()->user()->id)->get();
        }else{
            $wish = null;
        }
        return view('user.home',[
            'title' => 'Home User',
            'active' => 'home',
            'brands' => Brand::all(),
            'categories' => Category::latest()->first()->limit(5)->get(),
            'products' => Product::all(),
            // 'slidders' => Slidder::all(),
            // 'slidders' => Slidder::where('status','1'),
            'slidders' => Slidder::where('status', '=', 1)->get(),
            'newProducts' => Product::latest()->limit(10)->get(),
            'randomProducts' => Product::inRandomOrder()->limit(10)->get(),
            'wishs'=>$wish,
            
        ]);
    }

    public function aboutUs(){
        return view('about');
    }
}
