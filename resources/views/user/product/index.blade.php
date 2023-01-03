
@extends('user.layouts.main')
@section('container')
<?php
function rupiah($harga)
{
   $hasil_harga = 'Rp. ' . number_format($harga, 0, ',', '.');
   return $hasil_harga;
}
?>
<div class="product-big-title-area">
   <div class="container">
      <div class="row">
            <div class="col-md-12">
               <div class="product-bit-title text-center">
                  <h2 class="text-capitalize"><?= $title ?></h2>
               </div>
            </div>
      </div>
   </div>
</div>

<div class="single-product-area">
   <div class="zigzag-bottom"></div>
   <div class="container">
      <div class="row">
            @foreach ($products as $product)
               <div class="col-md-3 col-sm-6">
                  <div class="single-shop-product">
                        <div class="product-upper">
                           <img src="{{ asset('storage/img/product/' . $product['img']) }}"
                              alt="{{ $product['img'] }}">
                        </div>
                        <h2 class="text-uppercase text-center"><a
                              href="{{ url('product/' . $product['id']) }}">{{ $product['name'] }}</a></h2>
                        <div class="product-carousel-price text-center">
                           <ins>{{ rupiah($product['price']) }}</ins> 
                        </div>

                        <div class="product-option-shop text-center">
                           <form method="post" action="../cart/index.php" class="cart">
                              @csrf
                              <div class="quantity">
                                    <input type="hidden" name="product_id" value="{{ $product['id'] }}">
                                    <input type="hidden" name="img" value="{{ $product['img'] }}">

                                    <input type="hidden" id="qty" name="qty" value="1">
                                    <button type="submit" class="add_to_cart_button"><i
                                          class="fas fa-cart-plus"></i>
                                       Tambah</button>
                              </div>
                           </form>
                        </div>
                  </div>
               </div>
            @endforeach
      </div>
   </div>
</div>
@endsection
