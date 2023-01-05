
<div class="related-products-wrapper">
    <h2 class="related-products-title">Mungkin Kamu Suka</h2>
    <div class="related-products-carousel">
        @foreach ($randomProducts as $randomProduct)
            @auth
                @foreach ($wishs as $wish)
                    @if ($wish['product_id']==$randomProduct['id'])
                        <div class="single-product">
                            <div class="product-f-image">
                                <img src="{{ asset('storage/img/product/'.$randomProduct['img']) }}" alt="">
                                <div class="product-hover">
                                    <a href="{{ url('wishlist/delete/'.$wish['id'])}}" class="add-to-wish-link wishlist"><i class="fas fa-heart" style="color: red;"></i></a>
                                    <a href="{{ url('product/'.$randomProduct['id']) }}" class="view-details-link"><i class="fa fa-link"></i> Lihat Detail</a>
                                </div>
                            </div>
                            <h2><a class="text-uppercase"
                                href="{{ url('product/'.$randomProduct['id']) }}"><?= $randomProduct['name'] ?></a>
                            </h2>
                            <div class="product-carousel-price">
                                <h2><ins>{{ rupiah($randomProduct['price']) }}</ins></h2>
                            </div>
                        </div>
                        <?php continue 2 ?>
                    @endif
                @endforeach
                <div class="single-product">
                    <div class="product-f-image">
                        <img src="{{ asset('storage/img/product/'.$randomProduct['img']) }}" alt="">
                        <div class="product-hover">
                            <a href="{{ url('wishlist/add/'.$randomProduct['id'])}}" class="add-to-wish-link wishlist"><i class="fas fa-heart" style="color: grey;"></i></a>
                            <a href="{{ url('product/'.$randomProduct['id']) }}" class="view-details-link"><i class="fa fa-link"></i> Lihat Detail</a>
                        </div>
                    </div>
                    <h2><a class="text-uppercase"
                            href="{{ url('product/'.$randomProduct['id']) }}"><?= $randomProduct['name'] ?></a>
                    </h2>
                    <div class="product-carousel-price">
                        <h2><ins>{{ rupiah($randomProduct['price']) }}</ins></h2>
                    </div>
                </div>
            @else
            <div class="single-product">
                <div class="product-f-image">
                    <img src="{{ asset('storage/img/product/'.$randomProduct['img']) }}" alt="">
                    <div class="product-hover">
                        <a href="{{ url('product/'.$randomProduct['id']) }}" class="view-details-link"><i class="fa fa-link"></i> Lihat Detail</a>
                    </div>
                </div>
                <h2><a class="text-uppercase"
                        href="{{ url('product/'.$randomProduct['id']) }}"><?= $randomProduct['name'] ?></a>
                </h2>
                <div class="product-carousel-price">
                    <h2><ins>{{ rupiah($randomProduct['price']) }}</ins></h2>
                </div>
            </div>
            @endauth
        @endforeach
    </div>
</div>