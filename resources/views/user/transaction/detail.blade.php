<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta required name="viewport" content="width=device-width, initial-scale=1">


    @include('user.layouts.parts.link-head')
    
    <style>
        label {
            margin: 0 10px;
        }

        label>input {
            visibility: hidden;
            position: absolute;
        }

        label>input+img {
            cursor: pointer;
            border: 2px solid transparent;
        }

        label>input:checked+img {
            box-shadow: 0 0 10px rgb(0, 132, 255);
        }
    </style>


    <title>ANIGASTORE - Detail Pesanan</title>
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
                        <h2 class="text-capitalize">Detail Pesanan Anda</h2>
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
                                <h3 class="float-left">Detail Pesanan</h3>
                                <a href="../transaction/index.php" class="btn btn-sm btn-primary float-right">Kembali</a>
                            </div>
                            <div class="card">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                            <div class="float-left">
                                                <p>Status</p>
                                                    <h4 class="text-primary font-weight-bold"></h4>
                                                    <h4 class="text-primary font-weight-bold"></h4>
                                                    <h4 class="text-secondary font-weight-bold"></h4>
                                                    <h4 class="text-warning font-weight-bold"></h4>
                                                    <h4 class="text-primary font-weight-bold"></h4> 
                                                    <h4 class="text-success font-weight-bold"></h4>
                                                    <h4 class="text-danger font-weight-bold"></h4>
                                                

                                        </div>
                                            <div class="float-right">
                                                <p>Tanggal Pemesanan</p>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="float-left">
                                            <h4 class="mt-5">Daftar Produk</h4>
                                        </div>
                                        <div class="float-right">
                                            <p>Kode Pemesanan</p>
                                            <h4></h4>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                    

    
                                    
                                        <div class="card mb-4">
                                            <div class="card-body">
                                                <p class="card-text mb-n1">Total Harga</p>
                                                <p class="card-text float-left mt-2 font-weight-bold"></p>
                                                <a href="" class="btn btn-primary float-right">Lihat Produk</a>

                                            </div>
                                        </div>
                                



                                <!-- </table> -->
                            </div>
                        </div>
                        <div class="card my-3">
                            <div class="card-header">
                                <h5>Detail Pengiriman</h5>
                            </div>
                            <div class="card-body row">
                                <div class="col-md-6">Alamat Pengiriman</div>
                                <div class="col-md-6">
                                </div>
                            </div>
                        </div>
                        <div class="card my-3">
                            <div class="card-header">
                                <h5>Informasi Pembayaran</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="card col-md-6">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">
                                                <p class="float-left">
                                                    Total Barang
                                                </p>
                                                <h5 class="text-secondary float-right">
                                                </h5>
                                            </li>
                                            <li class="list-group-item">
                                                <p class="float-left">
                                                    Total Harga
                                                </p>
                                                <h5 class="text-secondary float-right">    
                                                </h5>
                                            </li>
                                            <li class="list-group-item">
                                                <p>Status</p>
                                                
                                            <h5 class="text-primary font-weight-bold"></h5>
                                            <h5 class="text-primary font-weight-bold"></h5>
                                            <h5 class="text-secondary font-weight-bold"></h5>
                                            <h5 class="text-warning font-weight-bold"></h5>
                                            <h5 class="text-primary font-weight-bold"></h5>
                                            <h5 class="text-success font-weight-bold"></h5>
                                            <h5 class="text-danger font-weight-bold"></h5>
                                                        
                                                
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card col-md-6">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">
                                                <p class="float-left">
                                                    Ongkos Kirim
                                                </p>
                                                <h5 class="text-secondary float-right">
                                                    
                                                </h5>
                                            </li>
                                            <li class="list-group-item">
                                                <p class="float-left">
                                                    Total Belanja
                                                </p>
                                                <h5 class="text-secondary float-right">
                                                </h5>
                                            </li>
                                            <li class="list-group-item">
                                                <p class="float-left">Total Bayar</p>
                                                <h5 class="text-danger font-weight-bold float-right">
                                            </li>
                                        </ul>
                                    </div>
                                    <h5>Pilih Metode Pembayaran</h5>
                                    <form action="" method="post">
                                        <input type="hidden" name="id" value="">
                                        <div class="logos_list">
                                            <label><input type="radio" name="payment" id="payment" class="form-control toggle-bri" value="bri"><img src="../../../assets/img/payments/logo bri.png" width="100" alt=""></label>
                                            <label><input type="radio" name="payment" id="payment" class="form-control" value="gopay"><img src="../../../assets/img/payments/logo gopay.png" width="100" alt=""></label>
                                            <label><input type="radio" name="payment" id="payment" class="form-control" value="linkaja"><img src="../../../assets/img/payments/logo linkaja.png" width="100" alt=""></label>
                                            <label><input type="radio" name="payment" id="payment" class="form-control" value="dana"><img src="../../../assets/img/payments/logo dana.png" width="100" alt=""></label>
                                            <label><input type="radio" name="payment" id="payment" class="form-control" value="shopeepay"><img src="../../../assets/img/payments/logo shopeepay.png" width="100" alt=""></label>
                                            <label><input type="radio" name="payment" id="payment" class="form-control" value="ovo"><img src="../../../assets/img/payments/logo ovo.png" width="100" alt=""></label>
                                        </div>

                                        <div class="float-right mt-3">
                                            <button class="btn btn-lg btn-primary" type="submit" name="pay">Bayar Sekarang</button>
                                            <button class="btn btn-lg btn-danger" type="submit" name="cancel">Batalkan Pesanan</button>
                                        </div>
                                    </form>
                        
                                </div>
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


    @include('user.layouts.parts.script-body')
    <?php
    if (isset($_POST['pay'])) {
        if (!isset($_POST['payment'])) {
            echo "
                <script type='text/javascript'>
                Swal.fire({
                    title:'Opps!',
                    text:'Silahkan Pilih metode pembayaran terlebih dahulu',
                    icon:'warning',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                }).then((result) => {
                })
                </script>
                ";
        } else {
            $bayar = bayar($_POST);
            if ($bayar == "ok") {
                echo "
                <script type='text/javascript'>
                var getLink = '../transaction/detail.php?id=" . $id_order . "';
                Swal.fire({
                    title:'Success!',
                    text:'Silahkan lakukan pembayaran',
                    icon:'success',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    window.location.href = getLink;
                })
                </script>
                ";
            }
        }
    }

    if (isset($_POST['cancel'])) {
        $batal = batal($_POST);
        if ($batal == "ok") {
            echo "
                <script type='text/javascript'>
                var getLink = '../transaction/detail.php?id=" . $id_order . "';
                Swal.fire({
                    title:'Success!',
                    text:'Pesanan berhasil dibatalkan',
                    icon:'success',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    window.location.href = getLink;
                })
                </script>
                ";
        }
    }

    if (isset($_POST['terima'])) {
        $terima = terima($_POST);
        if ($terima == "ok") {
            echo "
                <script type='text/javascript'>
                var getLink = '../transaction/detail.php?id=" . $id_order . "';
                Swal.fire({
                    title:'Success!',
                    text:'Pesanan Telah diterima, terimakasih atas pesanannya',
                    icon:'success',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    window.location.href = getLink;
                })
                </script>
                ";
        }
    }

    if (isset($_POST['ajukan_konfirmasi'])) {

        $ajukan_konfirmasi = ajukan_konfirmasi($_POST);

        echo "
            <script type='text/javascript'>
            var getLink = '../transaction/detail.php?id=" . $id_order . "';
            Swal.fire({
                title:'Success!',
                text:'Pengajuan Sudah Dilakukan, Barang akan segera diproses',
                icon:'success',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK'
            }).then((result) => {
                window.location.href = getLink;
            })
            </script>
            ";
    }
    ?>
</body>

</html>