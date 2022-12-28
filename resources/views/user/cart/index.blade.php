<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    @include('user.layouts.parts.link-head')
    <title>ANIGASTORE - Keranjang</title>
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
                        <h2 class="text-capitalize">Keranjang Saya</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">

                <div class="col-md-12 mb-4">
                    <table class="table table-condensed">


                            <tr>
                                <td></td>
                                <td>Foto</td>
                                <td>Nama Produk</td>
                                <td>Jumlah</td>
                                <td>Harga</td>
                                <td>Total</td>
                                <td></td>
                            </tr>

                                <tr>
                                    <td><img src="" class="rounded" width="70" alt=""></td>
                                    <td><a href=""></a></td>
                                    <td>
                                        <form action="" method="post">
                                            <input type="hidden" name="id_product_update" value="">
                                            <input type="hidden" name="img_update" value="">
                                            <div class="row">
                                                <input type="number" class="form-control col-md-5" name="qty_update" value="">
                                                <button type="submit" class="form-control col-md-3 btn btn-sm"><i class="fas fa-check"></i></button>
                                            </div>
                                        </form>
                                    </td>
                                </tr>

                        


                    </table>
                </div>


                <div class="col-md-4">
                    <div class="single-sidebar">
                        
                    <!-- End new product -->
                        @include('user.layouts.parts.new-product')
                    </div>
                </div>
                <div class="col-md-8">
                    <!-- End related-product -->
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
    <?php
    if (isset($_POST['checkout'])) {
        $user = $_SESSION['user_name'];
        $user = query("SELECT*FROM users WHERE username = '$user'")[0];
        $uid = $user['id'];
        $addres = query("SELECT*FROM address WHERE id_user = $uid")[0];
        if (!empty($addres['provinsi'])) {
            $status = checkout();
            if ($status == 'outstock') {
                echo "
                <script type='text/javascript'>
                Swal.fire({
                    title:'Opps!',
                    text:'Maaf pesanan anda melebihi stok, silahkan cek kembali',
                    icon:'error',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value) {
                    document.location.href='../cart/index.php';
                    }
                })
                </script>
            ";
            } elseif ($status == 'success') {
                echo "
                <script type='text/javascript'>
                
                Swal.fire({
                    title:'Berhasil!',
                    text:'Anda berhasil memesan, silahkan lanjutkan pembayaran',
                    icon:'success',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value) {
                    document.location.href='../transaction/index.php';
                    }
                })
                </script>
            ";
            }
        } else {
            echo "
                <script type='text/javascript'>
                Swal.fire({
                    title:'Maaf!',
                    text:'Sebelum melakukan pemesanan, anda harus mengisi alamat dengan lengkap',
                    icon:'warning',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value) {
                    document.location.href='../user/detail.php';
                    }
                })
                </script>
            ";
        }
    }

    ?>
    <script>
        // input form khusus nomor
        function onlyNumber(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
            } else {
                return true;
            }
        }
    </script>
</body>

</html>