<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   @include('user.layouts.parts.link-head')

   <title>ANIGASTORE - <?= $title ?></title>
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

   <?php if (empty($search)) : ?>
   <h2 class="text-center text-danger my-3">Produk Tidak Ditemukan</h2>
   <?php else : ?>
   <div class="single-product-area">
      <div class="zigzag-bottom"></div>
      <div class="container">
         <div class="row">
               <?php foreach ($search as $row) : ?>
               <?php if (isset($_SESSION['user_name'])) : ?>
               <?php foreach ($wishlist as $wish) : ?>
               <?php if ($wish['id_product'] == $row['id']) : ?>
               <div class="col-md-3 col-sm-6">
                  <div class="single-shop-product">
                     <div class="product-upper">
                           <img src="../../../assets/img/products/<?= $row['img'] ?>" alt="<?= $row['img'] ?>">
                     </div>
                     <h2 class="text-uppercase text-center"><a
                              href="../product/detail.php?id=<?= $row['id'] ?>"><?= $row['name'] ?></a></h2>
                     <div class="product-carousel-price text-center">
                           {{-- <ins><?= rupiah($row['price']) ?></ins> --}}
                           <ins>10000</ins>
                     </div>
                     <div class="product-option-shop text-center">
                           <form method="post" action="../cart/index.php" class="cart">
                              <div class="quantity">
                                 <input type="hidden" name="id_product" value="<?= $row['id'] ?>">
                                 <input type="hidden" name="img" value="<?= $row['img'] ?>">

                                 <input type="hidden" id="qty" name="qty" value="1">
                                 <button type="submit" class="add_to_cart_button"><i class="fas fa-cart-plus"></i>
                                       Tambah</button>
                              </div>
                           </form>
                           <a class="btn btn-danger"
                              href="../wishlist/delete.php?id_user=<?= $id_user ?>&id_product=<?= $row['id'] ?>"><i
                                 class="fas fa-heart"></i> Hapus</a>
                     </div>
                  </div>
               </div>
               <?php continue 2; ?>
               <?php endif; ?>
               <?php endforeach; ?>
               <div class="col-md-3 col-sm-6">
                  <div class="single-shop-product">
                     <div class="product-upper">
                           <img src="../../../assets/img/products/<?= $row['img'] ?>" alt="<?= $row['img'] ?>">
                     </div>
                     <h2 class="text-uppercase text-center"><a
                              href="../product/detail.php?id=<?= $row['id'] ?>"><?= $row['name'] ?></a></h2>
                     <div class="product-carousel-price text-center">
                           {{-- <ins><?= rupiah($row['price']) ?></ins> --}}
                           <ins>10000</ins>
                     </div>

                     <div class="product-option-shop text-center">
                           <form method="post" action="../cart/index.php" class="cart">
                              <div class="quantity">
                                 <input type="hidden" name="id_product" value="<?= $row['id'] ?>">
                                 <input type="hidden" name="img" value="<?= $row['img'] ?>">

                                 <input type="hidden" id="qty" name="qty" value="1">
                                 <button type="submit" class="add_to_cart_button"><i class="fas fa-cart-plus"></i>
                                       Tambah</button>
                              </div>
                           </form>
                           <a class="btn btn-danger"
                              href="../wishlist/delete.php?id_user=<?= $id_user ?>&id_product=<?= $row['id'] ?>"><i
                                 class="fas fa-heart"></i> Hapus</a>
                     </div>
                  </div>
               </div>
               <?php else : ?>
               <div class="col-md-3 col-sm-6">
                  <div class="single-shop-product">
                     <div class="product-upper">
                           <img src="../../../assets/img/products/<?= $row['img'] ?>" alt="<?= $row['img'] ?>">
                     </div>
                     <h2 class="text-uppercase text-center"><a
                              href="../product/detail.php?id=<?= $row['id'] ?>"><?= $row['name'] ?></a></h2>
                     <div class="product-carousel-price text-center">
                           {{-- <ins><?= rupiah($row['price']) ?></ins> --}}
                           <ins>10000</ins>
                     </div>

                     <div class="product-option-shop text-center">
                           <form method="post" action="../cart/index.php" class="cart">
                              <div class="quantity">
                                 <input type="hidden" name="id_product" value="<?= $row['id'] ?>">
                                 <input type="hidden" name="img" value="<?= $row['img'] ?>">

                                 <input type="hidden" id="qty" name="qty" value="1">
                                 <button type="submit" class="add_to_cart_button"><i class="fas fa-cart-plus"></i>
                                       Tambah</button>
                              </div>
                           </form>
                     </div>
                  </div>
               </div>
               <?php endif; ?>
               <?php endforeach; ?>
         </div>
      </div>
   </div>
   <?php endif; ?>

   @include('user.layouts.parts.brands-area')
   <!-- End brands area -->

   @include('user.layouts.parts.footer')
   <!-- End footer bottom area -->

   @include('user.layouts.parts.script-body')
</body>

</html>
