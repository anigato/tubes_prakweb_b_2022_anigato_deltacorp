<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        session_start();
        return view('user.cart.index', [
            'title' => 'Keranjang User',
            'active' => 'keranjang',
            'categories' => Category::latest()->first()->limit(5)->get(),
            "newProducts" => Product::latest()->limit(4)->get(),
            "randomProducts" => Product::inRandomOrder()->limit(10)->get(),
            "brands" => Brand::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        session_start();
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        $index = -1;
        $cart = unserialize(serialize($_SESSION['cart']));

        for ($i = 0; $i < count($cart); $i++) {
            if ($cart[$i]['product_id'] == $request->product_id) {
                $index = $i;
                $_SESSION['cart'][$i]['qty'] += $request->qty;
                break;
            }
        }

        if ($index == -1) {
            $_SESSION['cart'][] = [
                'product_id' => $request->product_id,
                'img' => $request->img,
                'name' => $request->name,
                'price' => $request->price,
                'qty' => $request->qty
            ];
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update($product_id)
    {
        session_start();
        $cart = unserialize(serialize($_SESSION['cart']));
        for ($i = 0; $i < count($cart); $i++) {
            if ($cart[$i]['product_id'] == $product_id) {
                $_SESSION['cart'][$i]['qty'] = $_POST['qty_update'];
                break;
            }
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy($index)
    {
        session_start();
        $cart = unserialize(serialize($_SESSION['cart']));
        unset($cart[$index]);
        $cart = array_values($cart);
        $_SESSION['cart'] = $cart;
        return back();
    }

    public function checkOut()
    {
        session_start();
        $cart = unserialize(serialize($_SESSION['cart']));
        $total_qty = 0;
        $total_price = 0;

        for ($i = 0; $i < count($cart); $i++) {
            $total_qty += $cart[$i]['qty'];
            $total_price += $cart[$i]['qty'] * $cart[$i]['price'];
        }

        $user_id =auth()->user()->id;

        $permitted_chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $kode = "INV" . substr(str_shuffle($permitted_chars), 0, 6) . (int)date('dmY');
        $total_price += (int)substr(str_shuffle('0123456789'), 0, 3);
        $order_time = date('Y-m-d H:i:s');
        $status = 0;

        $dataOder = [
            'kode_pemesanan' => $kode,
            'user_id' => $user_id,
            'order_time' => $order_time,
            'status' => $status,
            'total_qty' => $total_qty,
            'total_price' => $total_price,
        ];

        Order::create($dataOder);

        $order = Order::latest()->limit(1)->get('id');
        $order_id = $order[0]['id'];

        for ($i = 0; $i < count($cart); $i++) {
            $product_id = $cart[$i]['product_id'];
            $qty = $cart[$i]['qty'];
            $subtotal_price = $cart[$i]['price'] * $qty;

            $product = Product::find($product_id);
            $stok = $product['stok'] -= $qty;
            
            if ($stok < 0) {
                Order::destroy($order_id);
                return "outstock";
            }

            $dataDetailOrder = [
                'product_id' => $product_id,
                'order_id' => $order_id,
                'qty' => $qty,
                'subtotal_price' => $subtotal_price
            ];

            OrderDetail::create($dataDetailOrder);
            
            $updateStok = [
                'stok' => $stok,
            ];

            Product::where('id', $product_id)->update($updateStok);
            
        }
        unset($_SESSION['cart']);
        return redirect('/cart')->with('success','Berhasil dipesan, silahkan lakukan pembayaran');
    }
}
