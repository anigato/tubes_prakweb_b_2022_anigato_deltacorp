<?php
require '../session_isset.php';
// require '../../../php/function.php';
require '../function.php';
$order = query("select*from orders where status = 6 order by order_time desc");
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
                            <h1>Order Canceled</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">List Order Canceledr</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">

                                <div class="card-header">
                                    <h3 class="card-title">List Order Canceledr</h3>
                                </div>
                                <!-- /.card-header -->

                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr class="text-center">
                                                <th>NO</th>
                                                <th>KODE</th>
                                                <th>ORDER TIME</th>
                                                <th>STATUS</th>
                                                <th>TOTAL</th>
                                                <th>ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach ($order as $order) : ?>
                                                <tr class="text-center">
                                                    <td><?= $i++; ?></td>
                                                    <td><?= $order["kode_pemesanan"]; ?></td>
                                                    <td>
                                                        <?php setlocale(LC_TIME, "en") ?>
                                                        <?= strftime("%A", strtotime($order["order_time"])) . ", " . date("d", strtotime($order["order_time"])) . " " . strftime("%B", strtotime($order["order_time"])) . " " . date("Y", strtotime($order["order_time"])) ." ".date("H:i:s", strtotime($order["order_time"]))?>
                                                    </td>
                                                    <td>
                                                        <?php
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
                                                        ?>
                                                    </td>
                                                    <td><?= rupiah($order["total_price"]) ?></td>

                                                    <td>
                                                        <a href="detail.php?id=<?= $order['id']; ?>" class="btn btn-sm btn-info ">Detail</a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                        <tfoot>
                                            <tr class="text-center">
                                                <th>NO</th>
                                                <th>KODE</th>
                                                <th>ORDER TIME</th>
                                                <th>STATUS</th>
                                                <th>TOTAL</th>
                                                <th>ACTION</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <!-- /.card -->
                            </div>
                            <!-- /.col -->
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
    <?php require_once '../../../themes/backend/parts/script-dataTable.php' ?>
    <!-- Page specific script -->
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
</body>

</html>