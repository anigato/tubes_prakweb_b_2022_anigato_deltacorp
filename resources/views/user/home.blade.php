@extends('user.layouts.main')
@section('slidder')
    @empty($slidders)
    @else
    <div class="container">
        <!-- End slider area -->
        @include('user.layouts.parts.slidder')
    </div>
    @endempty
@endsection
@section('container')
<?php
function rupiah($harga)
{
    $hasil_harga = 'Rp. ' . number_format($harga, 0, ',', '.');
    return $hasil_harga;
}
?>
    <div class="maincontent-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="latest-product">
                        <h2 class="section-title mb-n3">Mungkin Anda suka</h2>
                        <div class="product-carousel">
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
                </div>
                <div class="col-md-12 mt-3">
                    <div class="latest-product">
                        <h2 class="section-title mb-n3">Produk Baru</h2>
                        <div class="product-carousel">
                            @foreach ($newProducts as $newProduct)
                                @auth
                                    @foreach ($wishs as $wish)
                                        @if ($wish['product_id']==$newProduct['id'])
                                            <div class="single-product">
                                                <div class="product-f-image">
                                                    <img src="{{ asset('storage/img/product/'.$newProduct['img']) }}" alt="">
                                                    <div class="product-hover">
                                                        <a href="{{ url('wishlist/delete/'.$wish['id'])}}" class="add-to-wish-link wishlist"><i class="fas fa-heart" style="color: red;"></i></a>
                                                        <a href="{{ url('product/'.$newProduct['id']) }}" class="view-details-link"><i class="fa fa-link"></i> Lihat Detail</a>
                                                    </div>
                                                </div>
                                                <h2><a class="text-uppercase"
                                                    href="{{ url('product/'.$newProduct['id']) }}"><?= $newProduct['name'] ?></a>
                                                </h2>
                                                <div class="product-carousel-price">
                                                    <h2><ins>{{ rupiah($newProduct['price']) }}</ins></h2>
                                                </div>
                                            </div>
                                            <?php continue 2 ?>
                                        @endif
                                    @endforeach
                                    <div class="single-product">
                                        <div class="product-f-image">
                                            <img src="{{ asset('storage/img/product/'.$newProduct['img']) }}" alt="">
                                            <div class="product-hover">
                                                <a href="{{ url('wishlist/add/'.$newProduct['id'])}}" class="add-to-wish-link wishlist"><i class="fas fa-heart" style="color: grey;"></i></a>
                                                <a href="{{ url('product/'.$newProduct['id']) }}" class="view-details-link"><i class="fa fa-link"></i> Lihat Detail</a>
                                            </div>
                                        </div>
                                        <h2><a class="text-uppercase"
                                                href="{{ url('product/'.$newProduct['id']) }}"><?= $newProduct['name'] ?></a>
                                        </h2>
                                        <div class="product-carousel-price">
                                            <h2><ins>{{ rupiah($newProduct['price']) }}</ins></h2>
                                        </div>
                                    </div>
                                @else
                                <div class="single-product">
                                    <div class="product-f-image">
                                        <img src="{{ asset('storage/img/product/'.$newProduct['img']) }}" alt="">
                                        <div class="product-hover">
                                            <a href="{{ url('product/'.$newProduct['id']) }}" class="view-details-link"><i class="fa fa-link"></i> Lihat Detail</a>
                                        </div>
                                    </div>
                                    <h2><a class="text-uppercase"
                                            href="{{ url('product/'.$newProduct['id']) }}"><?= $newProduct['name'] ?></a>
                                    </h2>
                                    <div class="product-carousel-price">
                                        <h2><ins>{{ rupiah($newProduct['price']) }}</ins></h2>
                                    </div>
                                </div>
                                @endauth
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom-script')
    <!-- Slider -->
    <script type="text/javascript" src="{{ asset('theme/frontend/js/bxslider.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('theme/frontend/js/script.slider.js') }}"></script>
@endsection