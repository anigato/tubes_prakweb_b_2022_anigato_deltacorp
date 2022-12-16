
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   @include('user.layouts.parts.link-head')

   <title>ANIGASTORE - </title>
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
                     <h2 class="text-capitalize">Buy  Now</h2>
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
                           <a href="index.php">HOME</a>
                           <a href="#"></a>
                           
                           <a href="#" class="text-uppercase"></a>
                           
                           <a href="#" class="text-uppercase"></a>
                     </div>

                     <div class="row">
                           <div class="col-sm-6">
                              <div class="product-images">
                                 <div class="product-main-img">
                                       <img src="../../../assets/img/products/"
                                          alt="" class="img-tumbnail rounded">
                                 </div>
                              </div>
                              <div class="p">Bagikan :</div>
                              <div class="share mt-2">
                                 <div class="addthis_inline_share_toolbox_c0ma"></div>
                              </div>
                           </div>

                           <div class="col-sm-6">
                              <div class="product-inner">
                                
                                 <h2 class="font-weight-bold text-uppercase"></h2>

                                 <div class="product-inner-price">
                                       <h3 class="text-danger font-weight-bold"></h3>
                                 </div>

                                 <table class="table mt-3">
                                       <tr>
                                          <td>Kapasitas</td>
                                          <td>:</td>
                                          <td></td>
                                       </tr>
                                       <tr>
                                          <td>Berat</td>
                                          <td>:</td>
                                          <td>gr</td>
                                       </tr>
                                       <tr>
                                          <td>Stok</td>
                                          <td>:</td>
                                          <td>pcs</td>
                                       </tr>
                                 </table>
                                 <form method="post" action="../cart/index.php" class="cart">
                                       <div class="quantity">
                                          <input type="hidden" name="id_product" value="">
                                          <input type="hidden" name="img" value="">

                                          <input type="text" class="form-control mb-2" placeholder="Jumlah"
                                             id="qty" name="qty" value="1" min="1"
                                             max="" onkeypress="return onlyNumber(event)"
                                             required>
                                          <button type="submit" class="btn btn-primary add_to_cart_button"><i
                                                   class="fas fa-cart-plus"></i> Masukan Ke Keranjang</button>
                                       </div>
                                 </form>
                                 
                                 <a href="../wishlist/delete.php?id_user=&id_product="
                                       class="btn btn-danger mt-3"><i class="fas fa-heart"></i> Hapus Keinginan</a>
                                 
                                 <a href="../wishlist/add.php?id_user=&id_product="
                                       class="btn btn-danger mt-3"><i class="far fa-heart"></i> Tambah Keinginan</a>
                                 

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
                                          <a class="nav-link" id="review-tab" data-toggle="tab" href="#review"
                                             role="tab" aria-controls="review" aria-selected="false">Ulasan</a>
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
                                                      <td></td>
                                                   </tr>
                                                   
                                                   <tr>
                                                      <td>Merk</td>
                                                      <td>:</td>
                                                      <td></td>
                                                   </tr>
                                                   <tr>
                                                      <td>Kategori</td>
                                                      <td>:</td>
                                                      <td></td>
                                                   </tr>
                                                   <tr>
                                                      <td>Kapasitas</td>
                                                      <td>:</td>
                                                      <td></td>
                                                   </tr>
                                                   <tr>
                                                      <td>Berat</td>
                                                      <td>:</td>
                                                      <td>gr</td>
                                                   </tr>
                                                   <tr>
                                                      <td>Stok</td>
                                                      <td>:</td>
                                                      <td>pcs</td>
                                                   </tr>
                                             </table>
                                          </div>
                                          
                                       </div>
                                       <div class="tab-pane fade" id="review" role="tabpanel"
                                          aria-labelledby="review-tab">
                                          <div class="submit-review">
                                             <p><label for="name">Name</label> <input name="name"
                                                      type="text"></p>
                                             <p><label for="email">Email</label> <input name="email"
                                                      type="email"></p>
                                             <div class="rating-chooser">
                                                   <p>Your rating</p>
                                                   <div class="rating-wrap-post">
                                                      <i class="fa fa-star"></i>
                                                      <i class="fa fa-star"></i>
                                                      <i class="fa fa-star"></i>
                                                      <i class="fa fa-star"></i>
                                                      <i class="fa fa-star"></i>
                                                   </div>
                                             </div>
                                             <p><label for="review">Your review</label>
                                                   <textarea name="review" id="" cols="30" rows="10"></textarea>
                                             </p>
                                             <p><input type="submit" value="Submit"></p>
                                          </div>
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

   @include('user.layouts.parts.brands-area')
   <!-- End brands area -->

   @include('user.layouts.parts.footer')
   <!-- End footer bottom area -->

   @include('user.layouts.parts.script-body')
   <!-- share button -->
   <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5e9e4256855b7795"></script>

   <!-- disqus -->
   <script>
      (function() {
         var d = document,
               s = d.createElement('script');
         s.src = 'https://anigastore.disqus.com/embed.js';
         s.setAttribute('data-timestamp', +new Date());
         (d.head || d.body).appendChild(s);
      })();

      // input form khusus nomor
      function onlyNumber(evt) {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57)) {
               return false;
         } else {
               return true;
         }
      }
   </script>
   <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by
         Disqus.</a></noscript>
   <script id="dsq-count-scr" src="//anigastore.disqus.com/count.js" async></script>
</body>

</html>
