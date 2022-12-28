

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta required name="viewport" content="width=device-width, initial-scale=1">


    @include('user.layouts.parts.link-head')

    <link rel="stylesheet" href="../../../css/frontend/user_style.css">



    <title>ANIGASTORE - Daftar Keinginan</title>
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
                        <h2 class="text-capitalize">Daftar Keinginan Anda</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Produk Terbaru</h2>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="product-content-right">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3>Daftar Keinginan</h3>
                            </div>
                            <div class="card-body">
                                <table class="table table-condensed">
                                    <tr>
                                        <td>Foto</td>
                                        <td>Nama</td>
                                        <td>Harga</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    @foreach ($wishlist as $wish)
                                    <tr>
                                        <td><img src="{{ asset('storage/img/product/') }}" alt="" class="rounded" width="70" alt=""></td>
                                        <td><a href="">{{ $wish['id_product'] }}</a></td>
                                        <td><a href="">{{ $wish['id_user'] }}</a></td>
                                        <td><a href="../product/detail.php">{{ $wish['id'] }}</a></td>
                                        <td>
                                            <a href="../wishlist/delete" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i></a>
                                        </td>
                                        <td>
                                            <form method="post" action="../cart/index.php" class="cart">
                                                <div class="quantity">
                                                    <input type="hidden" name="id_product" value="">
                                                    <input type="hidden" name="img" value="">

                                                    <input type="hidden" id="qty" name="qty" value="1">
                                                    <button type="submit" class="btn btn-sm btn-primary add_to_cart_button"><i class="fas fa-cart-plus"></i></button>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach


                                </table>
                            </div>
                        </div>
                        <div class="related-products-wrapper">
                            <h2 class="related-products-title">Mungkin Kamu Suka</h2>
                            <div class="related-products-carousel">
                                
                            </div>
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

    <!--End script-body-->
    @include('user.layouts.parts.script-body')
    <?php
    if (isset($_POST['edit'])) {
        $upload = uploadImage('../../../assets/img/users/', $_POST, 'edit-user');
        if ($upload == "success") {
            echo "
                <script type='text/javascript'>
                
                Swal.fire({
                    title:'Success!',
                    text:'Profil anda berhasil diperbarui',
                    type:'success',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value) {
                    document.location.href='../user/detail.php';
                    }
                })
                </script>
                ";
        } else if ($upload == "tooLarge") {
            echo "
                <script type='text/javascript'>
                Swal.fire({
                    title:'Error!',
                    text:'Gambar Terllau besar, coba kecilkan ukuran gambar',
                    type:'error',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value) {
                    document.location.href='../user/detail.php';
                    }
                })
                </script>
                ";
        } else if ($upload == "notImage") {
            echo "
                <script type='text/javascript'>
                Swal.fire({
                    title:'Error!',
                    text:'Hanya gambar JPG, JPEG dan PNG yang diperbolehkan',
                    type:'error',
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
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();

        function showImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#show-image')
                        .attr('src', e.target.result)
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        input form khusus nomor
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