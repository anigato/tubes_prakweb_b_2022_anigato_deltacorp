<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function dashboardAdmin()
    {
        return view('admin.dashboard.index', [
            'title' => 'Dashboard Admin',
            'active' => 'dashboard',

            'total_product' => Product::count('id'),
            'totalStok' => Product::sum('stok'),
            'totalUser' => User::where('is_admin',0)->count('id'),
            'totalAdmin' => User::where('is_admin',1)->count('id'),

            'stokLow' => Product::orderBy('stok', 'ASC')->limit(5)->get(),
            'WarningStokProduct' => Product::where('stok', '<=', 10)->orderBy('stok', 'ASC')->get(),
            'stokTerbanyak' => Product::where('stok', '>=', 11)->orderBy('stok', 'ASC')->get(),
            // 'topSale' => OrderDetail::sum('qty')->groupBy('product_id')->get(),

            'orderToday' => Order::whereDay('order_time', '=', date('d'))->sum('id'),
            'order2d' => Order::whereDay('order_time', '=', date('d.m.Y',strtotime("-1 days")))->sum('id'),
            'order3d' => Order::whereDay('order_time', '=', date('d.m.Y',strtotime("-2 days")))->sum('id'),
            'order4d' => Order::whereDay('order_time', '=', date('d.m.Y',strtotime("-3 days")))->sum('id'),
            'order5d' => Order::whereDay('order_time', '=', date('d.m.Y',strtotime("-4 days")))->sum('id'),
            'order6d' => Order::whereDay('order_time', '=', date('d.m.Y',strtotime("-5 days")))->sum('id'),
            'order7d' => Order::whereDay('order_time', '=', date('d.m.Y',strtotime("-6 days")))->sum('id'),
            
            
            'orderTodayQty' => Order::whereDay('order_time', '=', date('d'))->sum('total_qty'),
            'order2dQty' => Order::whereDay('order_time', '=', date('d.m.Y',strtotime("-1 days")))->sum('total_qty'),
            'order3dQty' => Order::whereDay('order_time', '=', date('d.m.Y',strtotime("-2 days")))->sum('total_qty'),
            'order4dQty' => Order::whereDay('order_time', '=', date('d.m.Y',strtotime("-3 days")))->sum('total_qty'),
            'order5dQty' => Order::whereDay('order_time', '=', date('d.m.Y',strtotime("-4 days")))->sum('total_qty'),
            'order6dQty' => Order::whereDay('order_time', '=', date('d.m.Y',strtotime("-5 days")))->sum('total_qty'),
            'order7dQty' => Order::whereDay('order_time', '=', date('d.m.Y',strtotime("-6 days")))->sum('total_qty'),
            
            
            'earnToday' => Order::whereDay('order_time', '=', date('d'))->sum('total_price'),
            'earn2d' => Order::whereDay('order_time', '=', date('d.m.Y',strtotime("-1 days")))->sum('total_price'),
            'earn3d' => Order::whereDay('order_time', '=', date('d.m.Y',strtotime("-2 days")))->sum('total_price'),
            'earn4d' => Order::whereDay('order_time', '=', date('d.m.Y',strtotime("-3 days")))->sum('total_price'),
            'earn5d' => Order::whereDay('order_time', '=', date('d.m.Y',strtotime("-4 days")))->sum('total_price'),
            'earn6d' => Order::whereDay('order_time', '=', date('d.m.Y',strtotime("-5 days")))->sum('total_price'),
            'earn7d' => Order::whereDay('order_time', '=', date('d.m.Y',strtotime("-6 days")))->sum('total_price'),
            
        ]);
    }
}
