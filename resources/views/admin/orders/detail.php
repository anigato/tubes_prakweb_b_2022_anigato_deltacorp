<?php
require '../session_isset.php';
// require '../../../php/function.php';
require '../function.php';
$id_order = $_GET['id'];
$order = query("SELECT*FROM orders WHERE id = $id_order ORDER BY status ASC")[0];
$order_detail = query("SELECT*FROM order_details where id_order = $id_order");
$id_user = $order['id_user'];
$user = query("SELECT*FROM users where id = $id_user")[0];
$address = query("SELECT*FROM address where id_user = $id_user")[0];
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ADMIN Panel</title>
    <?php require_once '../../../themes/backend/parts/link-header.php' ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <?php require_once '../../../themes/backend/parts/navbar.php'; ?>
        <!-- endnavbar -->

        <!-- sidebar -->
        <?php require_once '../../../themes/backend/parts/sidebar.php'; ?>
        <!-- endsidebar -->

        <!-- Main content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Order Details</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">List All order</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h5 class="card-title m-0">Order Information</h5>
                                </div>
                                <div class="card-body row">
                                    <table class="table table-borderless">
                                        <tr>
                                            <td>Order Code</td>
                                            <td>:</td>
                                            <td><?= $order['kode_pemesanan'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Order Time</td>
                                            <td>:</td>
                                            <td>
                                                <?php setlocale(LC_TIME, "en") ?>
                                                <?= strftime("%A", strtotime($order["order_time"])) . ", " . date("d", strtotime($order["order_time"])) . " " . strftime("%B", strtotime($order["order_time"])) . " " . date("Y", strtotime($order["order_time"])) . " " . date("H:i:s", strtotime($order["order_time"])) ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Status</td>
                                            <td>:</td>
                                            <td><?php
                                                switch ($order['status']) {
                                                    case 0:
                                                        echo '<h5 class="text-primary font-weight-bold">Waiting for Payment Confirmation</h5>';
                                                        break;
                                                    case 1:
                                                        echo '<h5 class="text-primary font-weight-bold">Orders Processing</h5>';
                                                        break;
                                                    case 2:
                                                        echo '<h5 class="text-secondary font-weight-bold">Waiting for payment</h5>';
                                                        break;
                                                    case 3:
                                                        echo '<h5 class="text-warning font-weight-bold">Unpaid Orders</h5>';
                                                        break;
                                                    case 4:
                                                        echo '<h5 class="text-primary font-weight-bold">Orders are being shipped</h5>';
                                                        break;
                                                    case 5:
                                                        echo '<h5 class="text-success font-weight-bold">Order Completed</h5>';
                                                        break;
                                                    case 6:
                                                        echo '<h5 class="text-danger font-weight-bold">Order Canceled</h5>';
                                                        break;
                                                }
                                                ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h5 class="card-title m-0">Payment Information</h5>
                                </div>
                                <div class="card-body row">
                                    <table class="table table-borderless col-md-6">
                                        <tr>
                                            <td>Total Product</td>
                                            <td>:</td>
                                            <td><?= $order['total_qty'] ?> Pcs</td>
                                        </tr>
                                        <tr>
                                            <td>Total Price</td>
                                            <td>:</td>
                                            <td><?= rupiah($order['total_price']) ?></td>
                                        </tr>
                                        <tr>
                                            <td>Postal fee</td>
                                            <td>:</td>
                                            <td><?= rupiah(20000) ?></td>
                                        </tr>
                                    </table>
                                    <table class="table table-borderless col-md-6">
                                        <tr>
                                            <td>Total Payment</td>
                                            <td>:</td>
                                            <?php
                                            $total = $order['total_price'] + 20000;
                                            ?>
                                            <td>
                                                <h5 class="text-danger font-weight-bold"><?= rupiah($total) ?></h5>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">
                                                <?php
                                                switch ($order['status']) {
                                                    case 0:
                                                ?>
                                                        <form action="" method="post" class="text-center">
                                                            <input type="hidden" name="id" value="<?= $id_order ?>">
                                                            <button type="submit" name="process" class="btn btn-primary btn-lg">Confirm & Process</button>
                                                        </form>
                                                    <?php
                                                        break;
                                                    case 1:
                                                    ?>
                                                        <form action="" method="post" class="text-center">
                                                            <input type="hidden" name="id" value="<?= $id_order ?>">
                                                            <button type="submit" name="send" class="btn btn-primary btn-lg">Send the Order</button>
                                                        </form>
                                                <?php
                                                        break;
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /.col-md-6 -->
                        <div class="col-lg-4">
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h5 class="card-title m-0">Shipping Address</h5>
                                </div>
                                <div class="card-body">
                                    <p><?= $user['full_name'] ?> (<?= $user['phone'] ?>)</p>
                                    <p><?= $address['additional'] ?></p>
                                    <p>Dusun <?= $address['dusun'] ?>, RT <?= $address['rt'] ?>, RW <?= $address['rw'] ?>, Desa <?= $address['desa'] ?></p>
                                    <p>Kecamatan <?= $address['kecamatan'] ?>, Kabupaten <?= $address['kabupaten'] ?></p>
                                    <p>Provinsi <?= $address['provinsi'] ?></p>
                                    <p><?= $address['kode_pos'] ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h5 class="card-title m-0">Product Information</h5>
                                </div>
                                <div class="card-body">
                                    <table class="table table-striped">
                                        <tr>
                                            <td>Name</td>
                                            <td>Price</td>
                                            <td>Qty</td>
                                            <td>Total Price</td>
                                            <td>Remaining Stock</td>
                                        </tr>
                                        <?php foreach ($order_detail as $detail) : ?>
                                            <?php
                                            $id_product = $detail['id_product'];
                                            $product = query("SELECT*FROM products WHERE id = $id_product")[0]
                                            ?>
                                            <tr>
                                                <td><?= $product['name'] ?></td>
                                                <td><?= rupiah($product['price']) ?></td>
                                                <td class="text-center"><?= $detail['qty'] ?></td>
                                                <td><?= rupiah($detail['subtotal_price']) ?></td>
                                                <td class="text-center"><?= $product['stok'] ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </table>

                                </div>
                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- end main content -->


        <!-- footer -->
        <?php require_once '../../../themes/backend/parts/footer.php'; ?>
        <!-- endfooter -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

    </div>


    <?php require_once '../../../themes/backend/parts/script-body.php' ?>
    <!-- Page specific script -->
    <?php 
    if (isset($_POST['process'])) {
        $process = process($_POST);
        if ($process == "ok") {
            echo "
                <script type='text/javascript'>
                var getLink = '../orders/detail.php?id=" . $id_order . "';
                Swal.fire({
                    title:'Success!',
                    text:'Order has been Processed',
                    type:'success',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    window.location.href = getLink;
                })
                </script>
                ";
        }
    }

    if (isset($_POST['send'])) {
        $send = send($_POST);
        if ($send == "ok") {
            echo "
                <script type='text/javascript'>
                var getLink = '../orders/detail.php?id=" . $id_order . "';
                Swal.fire({
                    title:'Success!',
                    text:'Order has been shipped',
                    type:'success',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    window.location.href = getLink;
                })
                </script>
                ";
        }
    }
    
    ?>
</body>

</html>