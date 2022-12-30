<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DeltaCorp - {{ $title }}</title>


    @include('user.layouts.parts.link-head')

</head>

<body>
    @if (session()->has('success'))
    <script type='text/javascript'>
        Swal.fire({
            title: 'Success!',
            text: '{{ session('success') }}',
            icon: 'success',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK'
        })
    </script>
    @endif

    <!-- End header area -->
    @include('user.layouts.parts.header')

    <!-- End site branding area -->
    @include('user.layouts.parts.branding-area')

    <!-- End mainmenu area -->
    @include('user.layouts.parts.main-menu')

    <div class="container">
        <!-- End slider area -->
        @include('user.layouts.parts.slidder')
    </div>

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
                                        <h2><ins>100000</ins></h2>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- End brands area -->
    @include('user.layouts.parts.brands-area')

    <!-- End footer bottom area -->
    @include('user.layouts.parts.footer')

    <!--End Script-body area-->
    @include('user.layouts.parts.script-body')

    <!-- Slider -->
    <script type="text/javascript" src="{{ asset('theme/frontend/js/bxslider.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('theme/frontend/js/script.slider.js') }}"></script>

</body>

</html>
