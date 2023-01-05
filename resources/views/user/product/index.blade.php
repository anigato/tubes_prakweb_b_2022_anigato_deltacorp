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
                     <h2 class="text-capitalize">"{{ $title }}"</h2>
                  </div>
               </div>
         </div>
      </div>
   </div>

   <div class="single-product-area">
      <div class="zigzag-bottom"></div>
      <div class="container">
         <div class="row">
               @if($products[0]==null)
               <h2 class="text-center text-danger my-3">Produk Tidak Ditemukan</h2>
               @else
                  @foreach ($products as $product)
                     @auth
                        @foreach ($wishs as $wish)
                              @if ($wish['product_id'] == $product['id'])
                                 <div class="col-md-3 col-sm-4 my-1">
                                    <div class="single-shop-product">
                                       <div class="single-product">
                                          <div class="product-f-image">
                                             <img src="{{ asset('storage/img/product/'.$product['img']) }}" alt="">
                                             <div class="product-hover">
                                                <a href="{{ url('wishlist/delete/'.$wish['id'])}}" class="add-to-wish-link wishlist"><i class="fas fa-heart" style="color: red;"></i></a>
                                                <a href="{{ url('product/'.$product['id']) }}" class="view-details-link"><i class="fa fa-link"></i> Lihat Detail</a>
                                             </div>
                                          </div>
                                          <h5 class="text-uppercase text-center text-primary">{{ $product['name'] }}</a></h2>
                                          <div class="product-carousel-price text-center">
                                             <h2><ins>{{ rupiah($product['price']) }}</ins></h2>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <?php continue 2; ?>
                              @endif
                        @endforeach
                        <div class="col-md-3 col-sm-4 my-1">
                           <div class="single-shop-product">
                              <div class="single-product">
                                 <div class="product-f-image">
                                    <img src="{{ asset('storage/img/product/'.$product['img']) }}" alt="">
                                    <div class="product-hover">
                                       <a href="{{ url('wishlist/add/'.$product['id'])}}" class="add-to-wish-link wishlist"><i class="fas fa-heart" style="color: grey;"></i></a>
                                       <a href="{{ url('product/'.$product['id']) }}" class="view-details-link"><i class="fa fa-link"></i> Lihat Detail</a>
                                    </div>
                                 </div>
                                 <h5 class="text-uppercase text-center text-primary">{{ $product['name'] }}</a></h2>
                                 <div class="product-carousel-price text-center">
                                    <h2><ins>{{ rupiah($product['price']) }}</ins></h2>
                                 </div>
                              </div>
                           </div>
                        </div>
                     @else
                        <div class="col-md-3 col-sm-4 my-1">
                           <div class="single-shop-product">
                              <div class="single-product">
                                 <div class="product-f-image">
                                    <img src="{{ asset('storage/img/product/'.$product['img']) }}" alt="">
                                    <div class="product-hover">
                                       <a href="{{ url('product/'.$product['id']) }}" class="view-details-link"><i class="fa fa-link"></i> Lihat Detail</a>
                                    </div>
                                 </div>
                                 <h5 class="text-uppercase text-center text-primary">{{ $product['name'] }}</a></h2>
                                 <div class="product-carousel-price text-center">
                                    <h2><ins>{{ rupiah($product['price']) }}</ins></h2>
                                 </div>
                              </div>
                           </div>
                        </div>
                     @endauth
                  @endforeach
               @endif
         </div>
      </div>
   </div>
   </div>
@endsection
