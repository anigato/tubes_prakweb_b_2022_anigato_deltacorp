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
                     <h2 class="text-capitalize">Buy {{ $detailProduct['name'] }} Now</h2>
                  </div>
               </div>
         </div>
      </div>
   </div>

   <div class="single-product-area">
      <div class="zigzag-bottom"></div>
      <div class="container">
         <div class="row">
               <div class="col-md-4">
                  <div class="single-sidebar">
                     @include('user.layouts.parts.new-product')
                  </div>
               </div>

               <div class="col-md-8">
                  <div class="product-content-right">
                     <div class="product-breadcroumb">
                           <a href="{{ route('home') }}">HOME</a>
                           <a href="#" class="text-uppercase">{{ $detailProduct->category->name }}</a>
                           <a href="#" class="text-uppercase">{{ $detailProduct->brand->name }}</a>
                     </div>

                     <div class="row">
                           <div class="col-sm-6">
                              <div class="product-images">
                                 <div class="product-main-img">
                                       <img src="{{ asset('storage/img/product/'.$detailProduct['img']) }}" alt="" class="img-tumbnail rounded">
                                 </div>
                              </div>
                              <div class="p">Bagikan :</div>
                              <div class="share mt-2">
                                 <div class="addthis_inline_share_toolbox"></div>
                              </div>
                           </div>

                           <div class="col-sm-6">
                              <div class="product-inner">
                                 @if ($detailProduct['stok'] > 50)
                                    <span class='badge badge-success'>Stok Masih Banyak</span>
                                 @elseif($detailProduct['stok'] > 10)
                                    <span class='badge badge-warning'>Stok Sudah Sedikit</span>
                                 @else
                                    <span class='badge badge-danger'>Stok Hampir Habis</span>
                                 @endif
                                 <h2 class="font-weight-bold text-uppercase">{{ $detailProduct['name'] }}</h2>

                                 <div class="product-inner-price">
                                       <h3 class="text-danger font-weight-bold">{{ $detailProduct['price'] }}</h3>
                                 </div>

                                 <table class="table mt-3">
                                       <tr>
                                          <td>Kapasitas</td>
                                          <td>:</td>
                                          <td>{{ $detailProduct->capacity }}</td>
                                       </tr>
                                       <tr>
                                          <td>Berat</td>
                                          <td>:</td>
                                          <td>{{ $detailProduct->weight }} gr</td>
                                       </tr>
                                       <tr>
                                          <td>Stok</td>
                                          <td>:</td>
                                          <td>{{ $detailProduct->stok }} pcs</td>
                                       </tr>
                                 </table>
                                 <form method="post" action="{{ url('cart') }}" class="cart">
                                    @csrf
                                       <div class="quantity">
                                          <input type="hidden" name="product_id" value="{{ $detailProduct['id'] }}">
                                          <input type="hidden" name="img" value="{{ $detailProduct['img'] }}">
                                          <input type="hidden" name="name" value="{{ $detailProduct['name'] }}">
                                          <input type="hidden" name="price" value="{{ $detailProduct['price'] }}">
                                          <input type="text" class="form-control mb-2" placeholder="Jumlah" id="qty" name="qty" value="1" min="1" max=""required>

                                          <button type="submit" class="btn btn-primary add_to_cart_button">
                                             <i class="fas fa-cart-plus"></i> Masukan Ke Keranjang
                                          </button>
                                       </div>
                                 </form>
                              </div>
                           </div>
                     </div>
                     <div class="keterangan mt-3">
                           <div>
                              <div>
                                 <nav>
                                       <div class="nav nav-tabs" id="desc-tab" role="tablist">
                                          <a class="nav-link active" id="description-tab" data-toggle="tab"
                                             href="#description" role="tab" aria-controls="description"
                                             aria-selected="true">Deskripsi</a>
                                          <a class="nav-link" id="disscusion-tab" data-toggle="tab" href="#disscusion"
                                             role="tab" aria-controls="disscusion"
                                             aria-selected="false">Diskusi</a>
                                       </div>
                                 </nav>
                              </div>
                              <div class="mt-3">
                                 <div class="tab-content" id="desc-tabContent">
                                       <div class="tab-pane fade show active" id="description" role="tabpanel"
                                          aria-labelledby="description-tab">
                                          <div class="row">
                                             <h3>Spesifikasi</h3>
                                             <table class="table mt-3">
                                                   <tr>
                                                      <td>SKU Produk</td>
                                                      <td>:</td>
                                                      <td>{{ $detailProduct->sku }}</td>
                                                   </tr>
                                                   
                                                   <tr>
                                                      <td>Merk</td>
                                                      <td>:</td>
                                                      <td>{{ $detailProduct->brand->name }}</td>
                                                   </tr>
                                                   <tr>
                                                      <td>Kategori</td>
                                                      <td>:</td>
                                                      <td>{{ $detailProduct->category->name }}</td>
                                                   </tr>
                                                   <tr>
                                                      <td>Kapasitas</td>
                                                      <td>:</td>
                                                      <td>{{ $detailProduct->capacity }}</td>
                                                   </tr>
                                                   <tr>
                                                      <td>Berat</td>
                                                      <td>:</td>
                                                      <td>{{ $detailProduct->weight }} gr</td>
                                                   </tr>
                                                   <tr>
                                                      <td>Stok</td>
                                                      <td>:</td>
                                                      <td>{{ $detailProduct->stok }} pcs</td>
                                                   </tr>
                                             </table>
                                          </div>
                                          <article>
                                             {!! $detailProduct->description !!}
                                          </article>
                                       </div>
                                       <div class="tab-pane fade" id="disscusion" role="tabpanel" aria-labelledby="disscusion-tab">
                                          <div id="disqus_thread"></div>
                                       </div>
                                 </div>
                              </div>
                           </div>
                     </div>


                     @include('user.layouts.parts.related-product')
                  </div>
               </div>
         </div>
      </div>
   </div>
@endsection
   

@section('custom-script')
<!-- share button -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-63a57699101d958a"></script>

<!-- disqus -->
<script>
   (function() { // DON'T EDIT BELOW THIS LINE
   var d = document, s = d.createElement('script');
   s.src = 'https://deltacorp-1.disqus.com/embed.js';
   s.setAttribute('data-timestamp', +new Date());
   (d.head || d.body).appendChild(s);
   })();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

<script id="dsq-count-scr" src="//deltacorp-1.disqus.com/count.js" async></script>
@endsection

