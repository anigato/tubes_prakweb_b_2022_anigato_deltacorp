


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    @include('user.layouts.parts.link-head')
    <link rel="stylesheet" href="../../../css/frontend/user_style.css">



    <title>ANIGASTORE - User Profile</title>
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
                        <h2 class="text-capitalize">Profil Anda</h2>
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
                        
                        @include('user.layouts.parts.new-product')
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="product-content-right">
                        <div class="container">
                            <div class="main-body">

                                <!-- Breadcrumb -->
                                <nav aria-label="breadcrumb" class="main-breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="../product/index.php">Home</a></li>
                                        <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                                    </ol>
                                </nav>
                                <!-- /Breadcrumb -->

                                {{-- <div class="row gutters-sm">
                                    <div class="col-lg-4 mb-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-flex flex-column align-items-center text-center">
                                                    

                                                    <div class="mt-3">
                                                        <h4><?= $user['username'] ?></h4>
                                                        <p class="text-secondary mb-1"><?= $user['full_name'] ?></p>
                                                        <p class="text-muted font-size-sm"><?= $user['phone'] ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="card mb-3">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <h6 class="mb-0">Username</h6>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <h6 class="mb-0">Nama Lengkap</h6>
                                                    </div>
                                                    <div class="col-md-7 text-secondary"><?= (empty($user['full_name'])) ? "Belum Diatur" : $user['full_name']; ?></div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <h6 class="mb-0">Nama Panggilan</h6>
                                                    </div>
                                                    <div class="col-md-7 text-secondary"><?= (empty($user['nick_name'])) ? "Belum Diatur" : $user['nick_name']; ?></div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <h6 class="mb-0">Email</h6>
                                                    </div>
                                                    <div class="col-md-7 text-secondary"><?= (empty($user['email'])) ? "Belum Diatur" : $user['email']; ?></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row gutters-sm">
                                            <div class="col-md-12 mb-3">
                                                <div class="card h-100">
                                                    <div class="card-body">
                                                        <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">Alamat</i>Pengiriman Anda</h6>
                                                        <div class="row">
                                                            <div class="col-md-5">
                                                                <h6 class="mb-0">Nama / Nomor Rumah</h6>
                                                            </div>
                                                            <div class="col-md-7 text-secondary"><?= (empty($alamat['additional'])) ? "Belum Diatur" : $alamat['additional']; ?></div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-md-5">
                                                                <h6 class="mb-0">Nomor Telp.</h6>
                                                            </div>
                                                            <div class="col-md-7 text-secondary"><?= (empty($user['phone'])) ? "Belum Diatur" : $user['phone']; ?></div>
                                                        </div>
                                                        <hr>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <div class="card h-100">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-5">
                                                                <h6 class="mb-0">RT</h6>
                                                            </div>
                                                            <div class="col-md-7 text-secondary"><?= (empty($alamat['rt'])) ? "Belum Diatur" : $alamat['rt']; ?></div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-md-5">
                                                                <h6 class="mb-0">RW</h6>
                                                            </div>
                                                            <div class="col-md-7 text-secondary"><?= (empty($alamat['rw'])) ? "Belum Diatur" : $alamat['rw']; ?></div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-md-5">
                                                                <h6 class="mb-0">Dusun</h6>
                                                            </div>
                                                            <div class="col-md-7 text-secondary"><?= (empty($alamat['dusun'])) ? "Belum Diatur" : $alamat['dusun']; ?></div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-md-5">
                                                                <h6 class="mb-0">Desa</h6>
                                                            </div>
                                                            <div class="col-md-7 text-secondary"><?= (empty($alamat['desa'])) ? "Belum Diatur" : $alamat['desa']; ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <div class="card h-100">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-5">
                                                                <h6 class="mb-0">Kecamatan</h6>
                                                            </div>
                                                            <div class="col-md-7 text-secondary"><?= (empty($alamat['kecamatan'])) ? "Belum Diatur" : $alamat['kecamatan']; ?></div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-md-5">
                                                                <h6 class="mb-0">Kabupaten</h6>
                                                            </div>
                                                            <div class="col-md-7 text-secondary"><?= (empty($alamat['kabupaten'])) ? "Belum Diatur" : $alamat['kabupaten']; ?></div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-md-5">
                                                                <h6 class="mb-0">Provinsi</h6>
                                                            </div>
                                                            <div class="col-md-7 text-secondary"><?= (empty($alamat['provinsi'])) ? "Belum Diatur" : $alamat['provinsi']; ?></div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-md-5">
                                                                <h6 class="mb-0">Kode POS</h6>
                                                            </div>
                                                            <div class="col-md-7 text-secondary"><?= (empty($alamat['kode_pos'])) ? "Belum Diatur" : $alamat['kode_pos']; ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}

                    
                        @include('user.layouts.parts.related-product')
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

    
</body>

</html>