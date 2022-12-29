


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ADMIN Panel</title>
    @include('admin.layouts.parts.link-header')
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
    <div class="wrapper">
        <!-- Navbar -->

        @include('admin.layouts.parts.navbar')
        <!-- endnavbar -->

        <!-- sidebar -->
        @include('admin.layouts.parts.sidebar')

        <!-- endsidebar -->

        <!-- Main content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Product</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">List All Product</li>
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
                                    <h3 class="card-title">List All Product</h3>
                                </div>
                                <!-- /.card-header -->

                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr class="text-center">
                                                <th>NO</th>
                                                <th>IMG</th>
                                                <th>NAME</th>
                                                <th>BRAND</th>
                                                <th>PRICE</th>
                                                <th>CAPACITY</th>
                                                <th>CATEGORY</th>
                                                <th>STOCK</th>
                                                <th>ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            @foreach($products as $products)
                                                <tr class="text-center">
                                                    <td>{{  $i++; }}</td>
                                                    <td><img src="{{ asset('storage/img/product/'. $products->img) }}" alt="" class="img-tumbnail rounded" width="100px"></td>
                                                    <td>{{  strtoupper($products["name"]); }}</td>

                                                    @foreach($brands as $br)
                                                        <td>{{  $br['id']; }}</td>
                                                    @endforeach
                                                    <td>{{  $products["price"]; }}</td>
                                                    <td>{{  $products["capacity"]; }}</td>
                                                    <td>{{  $products["id"]; }}</td>
                                                    <td>{{  $products["stok"]; }}</td>
                                                    <td rowspan="2" class="row">
                                                        <a href="edit.php?id=<?= $products['id']; ?>" class="btn btn-sm btn-info col-md-6 update-link">Edit</a>
                                                        <a href="delete.php?id=<?= $products['id'] ?>" class="btn btn-sm btn-danger col-md-6 delete-link">Delete</a>
                                                    </td>
                                                    
                                                   
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr class="text-center">
                                                <th>NO</th>
                                                <th>IMG</th>
                                                <th>NAME</th>
                                                <th>BRAND</th>
                                                <th>PRICE</th>
                                                <th>CAPACITY</th>
                                                <th>CATEGORY</th>
                                                <th>STOCK</th>
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
        @include('admin.layouts.parts.footer')
        <!-- endfooter -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

    </div>

    @include('admin.layouts.parts.script-body')

    @include('admin.layouts.parts.script-dataTable')

    
</body>

</html>