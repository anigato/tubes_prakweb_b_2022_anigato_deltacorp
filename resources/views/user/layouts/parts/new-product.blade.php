<h2 class="sidebar-title">Produk Terbaru</h2>
@foreach ($newProducts as $newProduct)
<hr>
<div class="thubmnail-recent">
   <img src="{{ asset('storage/img/product/'.$newProduct['img']) }}"
      class="img-tumbnail rounded recent-thumb">
   <h2><a class="text-uppercase" href="{{ url('product/'.$newProduct['id']) }}"><?= $newProduct['name'] ?></a></h2>
   <div class="product-sidebar-price">
      <ins><?= $newProduct['price'] ?></ins>
   </div>
</div>
@endforeach
