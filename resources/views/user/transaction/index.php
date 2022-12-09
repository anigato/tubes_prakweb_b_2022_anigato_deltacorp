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

    $wishlist = query("SELECT*FROM wishlists WHERE id_user = $id_user");

    $order = query("SELECT*FROM orders WHERE id_user = $id_user ORDER BY order_time DESC");
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta required name="viewport" content="width=device-width, initial-scale=1">

    <?php require_once '../../../themes/frontend/parts/link-head.php' ?>



    <title>ANIGASTORE - Daftar Pesanan</title>
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

                                <?php if (!empty($order)) : ?>
                                    <?php foreach ($order as $order) : ?>

                                        <?php
                                        $id_order = $order['id'];
                                        $order_detail = query("SELECT*FROM order_details where id_order = $id_order GROUP BY id_product LIMIT 1");
                                        ?>

                                        <div class="card mb-4">
                                            <?php foreach ($order_detail as $detail) :  ?>
                                                <?php
                                                $id_product = $detail['id_product'];
                                                $product = query("SELECT*FROM products WHERE id = $id_product")[0];
                                                ?>
                                                <div class="card-body">
                                                    <?php setlocale(LC_TIME, "id") ?>
                                                    <h6 class="card-subtitle mb-2 text-muted"><?= strftime("%A", strtotime($order["order_time"])) . ", " . date("d", strtotime($order["order_time"])) . " " . strftime("%B", strtotime($order["order_time"])) . " " . date("Y", strtotime($order["order_time"])) ?></h6>

                                                    <?php
                                                    switch ($order['status']) {
                                                        case 0:
                                                            echo '<p class="float-right badge badge-primary">Menunggu Konfirmasi Pembayaran</p>';
                                                            break;
                                                        case 1:
                                                            echo '<p class="float-right badge badge-primary">Pesanan Sedang Diproses</p>';
                                                            break;
                                                        case 2:
                                                            echo '<p class="float-right badge badge-secondary">Menunggu Pembayaran</p>';
                                                            break;
                                                        case 3:
                                                            echo '<p class="float-right badge badge-warning">Pesanan Belum Bayar</p>';
                                                            break;
                                                        case 4:
                                                            echo '<p class="float-right badge badge-primary">Pesanan Sedang Dikirim</p>';
                                                            break;
                                                        case 5:
                                                            echo '<p class="float-right badge badge-success">Pesanan Selesai</p>';
                                                            break;
                                                        case 6:
                                                            echo '<p class="float-right badge badge-danger">Pesanan Dibatalkan</p>';
                                                            break;
                                                    }
                                                    ?>

                                                    <img src="../../../assets/img/products/<?= $product['img'] ?>" class="rounded float-left mr-3" width="70" alt="">

                                                    <h5 class="card-title"><?= $product['name'] ?></h5>
                                                    <p class="card-text"><?= $detail['qty'] ?> Barang</p>

                                                    <p class="card-text mb-n1">Total Belanja</p>
                                                    <p class="card-text float-left mt-2 font-weight-bold"><?= rupiah($order['total_price']) ?></p>
                                                    <a href="../transaction/detail.php?id=<?= $id_order ?>" class="btn btn-primary float-right">Lihat Detail</a>

                                                </div>

                                            <?php endforeach; ?>

                                        </div>



                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <h1 class="text-danger text-center">Anda Belum Memiliki Transaksi Apapun</h1>
                                <?php endif; ?>
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

</body>

</html>