<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ANIGASTORE</title>

    
    @include('user.layouts.parts.link-head')

</head>

<body>

    
    <!-- End header area -->
    @include('user.layouts.parts.header')

    
    <!-- End site branding area -->
    @include('user.layouts.parts.branding-area')

    <!-- End mainmenu area -->
    @include('user.layouts.parts.main-menu')

    
    <!-- End slider area -->
    @include('user.layouts.parts.slidder')

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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- End brands area -->
    @include('user.layouts.parts.brands-area')


    <!-- End product widget area -->
    @include('user.layouts.parts.widget')


    <!-- End footer bottom area -->
    @include('user.layouts.parts.footer')

    <!--End Script-body area-->
    @include('user.layouts.parts.script-body')
    
    <!-- Slider -->
    <script type="text/javascript" src="{{ asset('frontend/js/script.slider.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/script.slider.js') }}"></script>
    
</body>
</html>
{{ asset(' ---- ') }}