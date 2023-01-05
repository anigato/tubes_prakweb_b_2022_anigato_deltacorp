<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        session_start();
        return view('user.wishlist.index', [
            'title' => 'Wishlist User',
            'active' => 'wishlist',
            'wishlist' => Wishlist::where('user_id',auth()->user()->id)->get(),
            'categories' => Category::latest()->first()->limit(5)->get(),
            "newProducts" => Product::latest()->limit(4)->get(),
            "randomProducts" => Product::inRandomOrder()->limit(10)->get(),
            "brands" => Brand::all(),
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
     * @param  \App\Http\Requests\StoreWishlistRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Product $product)
    {
        $data = [
            'product_id' => $product['id'],
            'user_id' => Auth()->user()->id
        ];
        Wishlist::create($data);

        return back()->with('success', 'Berhasil Tambahkan ke wishlist');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function show(Wishlist $wishlist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function edit(Wishlist $wishlist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWishlistRequest  $request
     * @param  \App\Models\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Wishlist $wishlist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wishlist $wishlist)
    {
        Wishlist::destroy($wishlist->id);
        return back()->with('success', 'Berhasil hapus dari wishlist');
    }
}
