<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   @include('user.layouts.parts.link-head')

   <title>Deltacorp - <?= $title ?></title>
</head>

<body>

   @include('user.layouts.parts.header')
   <!-- End header area -->

   @include('user.layouts.parts.branding-area')
   <!-- End site branding area -->

   @include('user.layouts.parts.main-menu')
   <!-- End mainmenu area -->

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
   @if(empty($products[0]))
   <h2 class="text-center text-danger my-3">Produk Tidak Ditemukan</h2>
   @else
   <div class="single-product-area">
      <div class="zigzag-bottom"></div>
      <div class="container">
         <div class="row">
            @foreach ($products as $product)
            <div class="col-md-3 col-sm-6">
               <div class="single-shop-product">
                  <div class="product-upper">
                     <img src="{{ asset('storage/img/product/' . $product['img']) }}" alt="{{ $product['img'] }}">
                  </div>
                  <h2 class="text-uppercase text-center"><a href="{{ url('product/' . $product['id']) }}">{{ $product['name'] }}</a></h2>
                  <div class="product-carousel-price text-center">
                     {{-- <ins><?= rupiah($row['price']) ?></ins> --}}
                     <ins>{{ $product['price'] }}</ins>
                  </div>

                  <div class="product-option-shop text-center">
                     <form method="post" action="../cart/index.php" class="cart">
                        @csrf
                        <div class="quantity">
                           <input type="hidden" name="product_id" value="{{ $product['id'] }}">
                           <input type="hidden" name="img" value="{{ $product['img'] }}">

                           <input type="hidden" id="qty" name="qty" value="1">
                           <button type="submit" class="add_to_cart_button"><i class="fas fa-cart-plus"></i>
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
   @endif

   @include('user.layouts.parts.brands-area')
   <!-- End brands area -->

   @include('user.layouts.parts.footer')
   <!-- End footer bottom area -->

   @include('user.layouts.parts.script-body')
</body>

</html>