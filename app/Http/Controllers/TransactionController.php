<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.transaction.index', [
            'title' => 'Transaction User',
            'active' => 'transaction',
            'orders' => Order::where('user_id',auth()->user()->id)->get(),
            // 'order_details' =>OrderDetail::where('order_id',2)->limit(1)->get(),
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    // public function show(Order $order)
    public function show(Order $order)
    {
        return view('user.transaction.detail', [
            'title' => 'Detail Transaction',
            'active' => 'detail transaction',
            'categories' => Category::latest()->first()->limit(5)->get(),
            "newProducts" => Product::latest()->limit(4)->get(),
            "randomProducts" => Product::inRandomOrder()->limit(10)->get(),
            "brands" => Brand::all(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
