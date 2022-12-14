<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.product.index', [
            'title' => 'Product',
            'active' => 'allProduct',
            'products' => Product::all(),
            'brands' => Brand::all(),
            'categories' => Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.add', [
            'title' => 'Add Product',
            'active' => 'addProduct',
            'brands' => Brand::all(),
            'categories' => Category::all()
            
        ]);
    
    }

    /*
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $validatedData = $request->validate([
            'name' => 'max:255',
            'category_id' => 'required' ,
            'brand_id' => 'required',
            'stok' => 'required|min:2|max:2',
            'capacity' => 'required',
            'price' => 'required|min:2|max:8',
            'weight' => 'required|min:3|max:4',
            'description' => 'min:5|max:255',
            'img' => 'image|file|max:1024'
        ]);

        if ($request->file('img')) {
            $img = $request->file('img')->store('img/product');
            $imageSplit = explode('/', $img);
            $validatedData['img'] = $imageSplit[2];
        }
        $validatedData['sku'] = substr($validatedData['brand_id'], 0, 3) .'-'. $validatedData['capacity'] . '-' . $validatedData['category_id'] . '-' . $validatedData['price'];
        
        Product::create($validatedData);

        return redirect('/admin/product');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('admin.product.edit',[
            'title' => 'Edit category',
            'active' => 'editCategory',
            'product' => $product,
            'brands' => Brand::all(),
            'categories' => Category::all()
        ]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        // return$request;


        $validatedData = $request->validate([
            'sku' => 'required',
            'name' => 'max:255',
            'category_id' => 'required' ,
            'brand_id' => 'required',
            'stok' => 'required|min:2|max:2',
            'capacity' => 'required',
            'price' => 'required|min:2|max:8',
            'weight' => 'required|min:3|max:4',
            'description' => 'min:5|max:255',
            'img' => 'image|file|max:1024'
        ]);

        return 1;

        if ($request->file('img')) {
            $img = $request->file('img')->store('img/product');
            $imageSplit = explode('/', $img);
            $validatedData['img'] = $imageSplit[2];
        }else {
            $validatedData['img'] = $validatedData['oldImg'];
        }
        $validatedData['sku'] = substr($validatedData['brand_id'], 0, 3) .'-'. $validatedData['capacity'] . '-' . $validatedData['category_id'] . '-' . $validatedData['price'];

        

        Product::where('id', $product->id)
            ->update($validatedData);
        return redirect('/admin/product/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy( Product $product)
    {
        if ($product->img) {
            Storage::delete($product->img);
        }
        Product::destroy($product->id);
        return redirect('/admin/product')->with('success','Product has been deleted!');
}
}