<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Wishlist;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        session_start();
        if(Auth()->user()){
            $wish = Wishlist::where('user_id',Auth()->user()->id)->get();
        }else{
            $wish = null;
        }
        if (empty(request('keyword'))) {
            $title = 'All Product';
            $active = 'allProduct';
            $category_dropdown = "Kategori";
            $brand_dropdown = "Brand";
        } else {
            $title = request('keyword');
            $active = 'allProduct';
            $category_dropdown = "Kategori";
            $brand_dropdown = "Brand";
        }

        if (request('category')) {
            $judul = Category::where('id', request('category'))->get('name');
            $name = $judul[0]['name'];
            $title = 'Product with category ' . $name;
            $active = 'categoryProduct';
            $category_dropdown = $name;
            $brand_dropdown = "Brand";
        }

        if (request('brand')) {
            $judul = Brand::where('id', request('brand'))->get('name');
            $name = $judul[0]['name'];
            $title = 'Product with brand ' . $name;
            $active = 'brandProduct';
            $category_dropdown = "Kategori";
            $brand_dropdown = $name;
        }

        return view('user.product.index', [
            'title' => $title,
            'category_dropdown' => $category_dropdown,
            'brand_dropdown' => $brand_dropdown,
            'active' => $active,
            'products' => Product::latest()->filter(request(['keyword', 'category', 'brand']))->paginate(20),
            'categories' => Category::latest()->first()->get(),
            'brandMenu' => Brand::latest()->first()->get(),
            'brands' => Brand::all(),
            'wishs'=>$wish,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        session_start();
        if(Auth()->user()){
            $wishs = Wishlist::where('user_id',Auth()->user()->id)->get();
        }else{
            $wishs = null;
        }
        
        return view('user.product.detail', [
            "title" => $product->name,
            "active" => "posts",
            "detailProduct" => $product,
            'categories' => Category::latest()->first()->limit(5)->get(),
            "newProducts" => Product::latest()->limit(4)->get(),
            "randomProducts" => Product::inRandomOrder()->limit(10)->get(),
            "brands" => Brand::all(),
            // "checkWish" => Wishlist::with(['user',2])->get()
            'wishs'=>$wishs
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
