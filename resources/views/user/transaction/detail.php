<?php
session_start();
require_once '../function.php';

if (isset($_COOKIE['user_name'])) {
    $_SESSION['user_name'] = $_COOKIE['user_name'];
};

if (isset($_SESSION['user_name'])) {
    $user_name = $_SESSION['user_name'];
    $user = query("SELECT*FROM users where username = '$user_name'")[0];
    $id_user = $user['id'];

    $address = query("SELECT*FROM address where id_user = $id_user")[0];
    $wishlist = query("SELECT*FROM wishlists WHERE id_user = $id_user");

    $id = $_GET['id'];
    $order = query("SELECT*FROM orders WHERE id = $id")[0];
    $id_order = $order['id'];
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta required name="viewport" content="width=device-width, initial-scale=1">

    <?php require_once '../../../themes/frontend/parts/link-head.php' ?>
    
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

    <?php require_once '../../../themes/frontend/parts/header.php' ?>
    <!-- End header area -->

    <?php require_once '../../../themes/frontend/parts/branding-area.php' ?>
    <!-- End site branding area -->

    <?php require_once '../../../themes/frontend/parts/main-menu.php' ?>
    <!-- End mainmenu area -->

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
                                            <?php
                                            switch ($order['status']) {
                                                case 0:
                                                    echo '<h4 class="text-primary font-weight-bold">Menunggu Konfirmasi Pembayaran</h4>';
                                                    break;
                                                case 1:
                                                    echo '<h4 class="text-primary font-weight-bold">Pesanan Sedang Diproses</h4>';
                                                    break;
                                                case 2:
                                                    echo '<h4 class="text-secondary font-weight-bold">Menunggu Pembayaran</h4>';
                                                    break;
                                                case 3:
                                                    echo '<h4 class="text-warning font-weight-bold">Pesanan Belum Bayar</h4>';
                                                    break;
                                                case 4:
                                                    echo '<h4 class="text-primary font-weight-bold">Pesanan Sedang Dikirim</h4>';
                                                    break;
                                                case 5:
                                                    echo '<h4 class="text-success font-weight-bold">Pesanan Selesai</h4>';
                                                    break;
                                                case 6:
                                                    echo '<h4 class="text-danger font-weight-bold">Pesanan Dibatalkan</h4>';
                                                    break;
                                            }
                                            ?>
                                        </div>
                                        <div class="float-right">
                                            <p>Tanggal Pemesanan</p>
                                            <?php setlocale(LC_TIME, "id") ?>
                                            <h4 class="text-muted"><?= strftime("%A", strtotime($order["order_time"])) . ", " . date("d", strtotime($order["order_time"])) . " " . strftime("%B", strtotime($order["order_time"])) . " " . date("Y", strtotime($order["order_time"])) ." ".date("H:i:s", strtotime($order["order_time"]))?></h4>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="float-left">
                                            <h4 class="mt-5">Daftar Produk</h4>
                                        </div>
                                        <div class="float-right">
                                            <p>Kode Pemesanan</p>
                                            <h4><?= $order['kode_pemesanan'] ?></h4>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <?php
                                $order_detail = query("SELECT*FROM order_details where id_order = $id_order");
                                ?>

                                <?php foreach ($order_detail as $detail) :  ?>

                                    <?php
                                    $id_product = $detail['id_product'];
                                    $product = query("SELECT*FROM products WHERE id = $id_product");
                                    ?>
                                    <?php foreach ($product as $product) : ?>
                                        <div class="card mb-4">
                                            <div class="card-body">
                                                <img src="../../../assets/img/products/<?= $product['img'] ?>" class="rounded float-left mr-3" width="70" alt="">

                                                <h5 class="card-title mb-n1"><?= $product['name'] ?></h5>
                                                <p class="card-text mb-n1"><?= $detail['qty'] ?> Barang</p>
                                                <p class="text-danger font-weight-bold"><?= rupiah($product['price']) ?></p>

                                                <p class="card-text mb-n1">Total Harga</p>
                                                <p class="card-text float-left mt-2 font-weight-bold"><?= rupiah($detail['subtotal_price']) ?></p>
                                                <a href="../product/detail.php?id=<?= $product['id'] ?>" class="btn btn-primary float-right">Lihat Produk</a>

                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endforeach; ?>



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
                                    <p><?= $user['full_name'] ?> (<?= $user['phone'] ?>)</p>
                                    <p><?= $address['additional'] ?></p>
                                    <p>Dusun <?= $address['dusun'] ?>, RT <?= $address['rt'] ?>, RW <?= $address['rw'] ?>, Desa <?= $address['desa'] ?></p>
                                    <p>Kecamatan <?= $address['kecamatan'] ?>, Kabupaten <?= $address['kabupaten'] ?></p>
                                    <p>Provinsi <?= $address['provinsi'] ?></p>
                                    <p><?= $address['kode_pos'] ?></p>
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
                                                    <?= $order['total_qty'] ?> Buah
                                                </h5>
                                            </li>
                                            <li class="list-group-item">
                                                <p class="float-left">
                                                    Total Harga
                                                </p>
                                                <h5 class="text-secondary float-right">
                                                    <?= rupiah($order['total_price']) ?>
                                                </h5>
                                            </li>
                                            <li class="list-group-item">
                                                <p>Status</p>
                                                <?php
                                                switch ($order['status']) {
                                                    case 0:
                                                        echo '<h5 class="text-primary font-weight-bold">Menunggu Konfirmasi Pembayaran</h5>';
                                                        break;
                                                    case 1:
                                                        echo '<h5 class="text-primary font-weight-bold">Pesanan Sedang Diproses</h5>';
                                                        break;
                                                    case 2:
                                                        echo '<h5 class="text-secondary font-weight-bold">Menunggu Pembayaran</h5>';
                                                        break;
                                                    case 3:
                                                        echo '<h5 class="text-warning font-weight-bold">Pesanan Belum Bayar</h5>';
                                                        break;
                                                    case 4:
                                                        echo '<h5 class="text-primary font-weight-bold">Pesanan Sedang Dikirim</h5>';
                                                        break;
                                                    case 5:
                                                        echo '<h5 class="text-success font-weight-bold">Pesanan Selesai</h5>';
                                                        break;
                                                    case 6:
                                                        echo '<h5 class="text-danger font-weight-bold">Pesanan Dibatalkan</h5>';
                                                        break;
                                                }
                                                ?>
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
                                                    <?= rupiah(20000) ?>
                                                </h5>
                                            </li>
                                            <?php
                                            $total = $order['total_price'] + 20000;
                                            ?>
                                            <li class="list-group-item">
                                                <p class="float-left">
                                                    Total Belanja
                                                </p>
                                                <h5 class="text-secondary float-right">
                                                    <?= rupiah($total) ?>
                                                </h5>
                                            </li>
                                            <li class="list-group-item">
                                                <p class="float-left">Total Bayar</p>
                                                <h5 class="text-danger font-weight-bold float-right"><?= rupiah($total) ?></h5>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-12 mt-2 payment">
                                        <?php if ($order['status'] == 3) : ?>
                                            <h5>Pilih Metode Pembayaran</h5>
                                            <form action="" method="post">
                                                <input type="hidden" name="id" value="<?= $id_order ?>">
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
                                        <?php elseif ($order['status'] == 2) : ?>
                                            <?php if ($order['payment'] == 'bri') : ?>
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5>Silahkan Transfer sebesar <span class="text-danger font-weight-bold"> <?= rupiah($total) ?></span> ke No.Rek <span class="text-uppercase text-success font-weight-bold">BRI</span> <span class="text-primary font-weight-bold">6782-01-019872-53-9</span> Atas Nama Khoerul Anam</h5>
                                                        <p>Jika sudah melakukan pembayaran, harap ajukan konfirmasi pembayaran melalui tombol dibawah</p>
                                                    </div>
                                                </div>
                                            <?php else : ?>
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5>Silahkan Bayar sebesar <span class="text-danger font-weight-bold"> <?= rupiah($total) ?></span> melalui <span class="text-uppercase text-success font-weight-bold"><?= $order['payment'] ?></span> ke Nomor <span class="text-primary font-weight-bold">0852-1066-5025</span> Atas Nama Khoerul Anam</h5>
                                                        <p>Jika sudah melakukan pembayaran, harap ajukan konfirmasi pembayaran melalui tombol dibawah</p>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                            <form action="" method="post" class="text-center">
                                                <input type="hidden" name="id" value="<?= $id_order ?>">
                                                <button type="submit" name="ajukan_konfirmasi" class="btn btn-primary btn-lg">Ajukan Konformasi Pembayaran</button>
                                            </form>
                                        <?php elseif ($order['status'] == 4) : ?>
                                            <h5>Jika Pesanan anda sudah sampai, mohon untuk mengkonfirmasi pesanan diterima.</h5>
                                            <form action="" method="post" class="text-center">
                                                <input type="hidden" name="id" value="<?= $id_order ?>">
                                                <button type="submit" name="terima" class="btn btn-primary btn-lg">Pesanan Diterima</button>
                                            </form>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-sidebar mt-4">
                        <?php require_once '../../../themes/frontend/parts/new-product.php' ?>
                    </div>
                </div>
                <div class="col-md-8">
                    <?php require_once '../../../themes/frontend/parts/related-product.php' ?>
                </div>
            </div>
        </div>
    </div>


    <?php require_once '../../../themes/frontend/parts/brands-area.php' ?>
    <!-- End brands area -->

    <?php require_once '../../../themes/frontend/parts/footer.php' ?>
    <!-- End footer bottom area -->

    <?php require_once '../../../themes/frontend/parts/script-body.php' ?>
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