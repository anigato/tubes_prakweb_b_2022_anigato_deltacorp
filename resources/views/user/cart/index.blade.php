<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
    {{-- sweetalert --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @include('user.layouts.parts.link-head')
    <title>DeltaCorp - Keranjang</title>
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

                        <?php
                        if (isset($_SESSION['cart'])) {
                        ?>
                        <tr>
                            <td>Foto</td>
                            <td>Nama Produk</td>
                            <td>Jumlah</td>
                            <td>Harga</td>
                            <td>Total</td>
                            <td></td>
                        </tr>

                        <?php
                            $cart = unserialize(serialize($_SESSION['cart']));
                            $index = 0;
                            $total = 0;
                            $total_bayar = 0;

                            for ($i = 0; $i < count($cart); $i++) {
                                $total = $_SESSION['cart'][$i]['price'] * $_SESSION['cart'][$i]['qty'];
                                $total_bayar += $total;
                            ?>

                        <tr>
                            <td>
                                <img src="{{ asset('storage/img/product/' . $cart[$i]['img']) }}" class="rounded"
                                    width="70" alt="">
                            </td>
                            <td>
                                <a href="{{ url('product/' . $cart[$i]['product_id']) }}">{{ $cart[$i]['name'] }}</a>
                            </td>
                            <td>
                                <form action="{{ url('cart/' . $cart[$i]['product_id']) }}" method="post">
                                    @csrf
                                    @method('put')
                                    <input type="hidden" name="product_id" id="product_id"
                                        value="{{ $cart[$i]['product_id'] }}">
                                    <div class="row">
                                        <input type="number" class="form-control col-md-5" name="qty_update" value="{{ $cart[$i]['qty'] }}" onkeyup="submit()">
                                        <button type="submit" class="form-control col-md-3 btn btn-sm"><i class="fas fa-check"></i></button>
                                    </div>
                                </form>
                            </td>

                            <td>{{ $cart[$i]['price'] }}</td>
                            <td>{{ $total }}</td>
                            <td>
                                <form action="{{ url('cart/'.$index ) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <input type="hidden" name="index" id="index" value="{{ $index }}">
                                    <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>

                        <?php
                            $index++;
                        }?>
                        <tr>
                            <td colspan="4"><strong>Total Bayar</strong></td>
                            <td colspan="2"><strong>{{ $total_bayar }}</strong></td>
                            <td>
                                <form action="{{ url('cart/checkout') }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm">Checkout</button>
                                </form>
                            </td>
                        </tr>
                        <?php
                        } else {
                        echo "<h1 class='text-danger'>Anda Tidak memiliki produk di dalam keranjang</h1>";
                        
                        }
                        ?>




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
