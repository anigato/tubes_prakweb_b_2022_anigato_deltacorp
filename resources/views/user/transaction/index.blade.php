

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta required name="viewport" content="width=device-width, initial-scale=1">


    @include('user.layouts.parts.link-head')


    <title>ANIGASTORE - Daftar Pesanan</title>
</head>

<body>


    <!-- End header area -->
    @include('user.layouts.parts.header')

    <!-- End site branding area -->
    @include('user.layouts.parts.branding-area')

    
    <!-- End mainmenu area -->
    @include('user.layouts.parts.main-menu')

    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2 class="text-capitalize">Daftar Pesanan Anda</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">

                <div class="col-md-12">
                    <div class="product-content-right">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3>Daftar Pesanan</h3>
                            </div>
                            <div class="card-body">

                        
                                                <div class="card-body">
                                                    <h6 class="card-subtitle mb-2 text-muted"></h6>

                                                

                                                    <img src="" class="rounded float-left mr-3" width="70" alt="">

                                                    <h5 class="card-title"></h5>
                                                    <p class="card-text"> Barang</p>

                                                    <p class="card-text mb-n1">Total Belanja</p>
                                                    <p class="card-text float-left mt-2 font-weight-bold"></p>
                                                    <a href="" class="btn btn-primary float-right">Lihat Detail</a>

                                                </div>
                                        </div>
                                </div>
                            </div>
            
                <div class="col-md-4">
                    <div class="single-sidebar mt-4">
                
                        @include('user.layouts.parts.new-product')

                    </div>
                </div>
                <div class="col-md-8">
                
                    @include('user.layouts.parts.related-product')

                </div>
            </div>
        </div>
    </div>



    <!-- End brands area -->
    @include('user.layouts.parts.brands-area')


    <!-- End footer bottom area -->
    @include('user.layouts.parts.footer')

    <!--End script-body-->
    @include('user.layouts.parts.script-body')
</body>

</html>