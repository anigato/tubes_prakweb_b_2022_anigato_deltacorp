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

            'stokLow' => Product::orderBy('stok', 'DESC')->get(),
            'WarningStokProduct' => Product::whereBetween('stok', [0, 10])->orderBy('stok', 'ASC')->get(),
            'WarningStokProduct' => Product::where('stok', '<=', 11)->orderBy('stok', 'ASC')->get(),
            // 'topSale' => OrderDetail::sum('qty')->groupBy('product_id')->get(),

            'orderToday' => Order::whereDay('order_time', '=', date('d'))->sum('id'),
            'orderTodayQty' => Order::whereDay('order_time', '=', date('d'))->sum('total_qty'),
            'orderTodayPrice' => Order::whereDay('order_time', '=', date('d'))->sum('total_price'),
            
            'orderThisMonth' => Order::whereMonth('order_time', '=', date('m'))->sum('id'),
            'orderThisMonthQty' => Order::whereMonth('order_time', '=', date('m'))->sum('total_qty'),
            'orderThisMonthPrice' => Order::whereMonth('order_time', '=', date('m'))->sum('total_price'),
            
        ]);
    }
}
