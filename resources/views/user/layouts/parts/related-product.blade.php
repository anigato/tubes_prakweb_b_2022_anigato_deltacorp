
<div class="related-products-wrapper">
    <h2 class="related-products-title">Mungkin Kamu Suka</h2>
    <div class="related-products-carousel">
                @foreach ($randomProducts as $randomProduct)
                <div class="single-product">
                    <div class="product-f-image">
                        <img src="{{ asset('storage/img/product/'.$randomProduct['img']) }}" alt="">
                        <div class="product-hover">
                            <a href="{{ url('product/'.$randomProduct['id']) }}" class="view-details-link"><i class="fa fa-link"></i> Lihat Detail</a>
                        </div>
                    </div>

                    <h2><a class="text-uppercase" href="{{ url('product/'.$randomProduct['id']) }}">{{ $randomProduct['name'] }}</a></h2>

                    <div class="product-carousel-price">
                        <h2><ins>{{ $randomProduct['price'] }}</ins></h2>
                    </div>
                </div>
                @endforeach
    </div>
</div>