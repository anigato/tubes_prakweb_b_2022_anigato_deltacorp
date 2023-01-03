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
    <!--End promo area -->
    @include('user.layouts.parts.promo')
    <div class="maincontent-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="latest-product">
                        <h2 class="section-title">Produk Baru</h2>
                        <div class="product-carousel">
                            @foreach ($newProducts as $newProduct)
                                <div class="single-product">
                                    <div class="product-f-image">
                                        <img src="{{ asset('storage/img/product/'.$newProduct['img']) }}" alt="">
                                        <div class="product-hover">
                                            <a href="{{ url('product/'.$newProduct['id']) }}"
                                                class="view-details-link"><i class="fa fa-link"></i> Lihat Detail</a>
                                        </div>
                                    </div>
                                    <h2><a class="text-uppercase"
                                            href="{{ url('product/'.$newProduct['id']) }}"><?= $newProduct['name'] ?></a>
                                    </h2>
                                    <div class="product-carousel-price">
                                        <h2><ins>{{ rupiah($newProduct['price']) }}</ins></h2>
                                    </div>
                                </div>
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