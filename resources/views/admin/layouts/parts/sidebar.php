<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
        <img src="../../../assets/img/anigato=new-transparent-mini.png" alt="ANIGASTORE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">ANIGASTORE</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <div class="elevation-2">
                    <?php
                    if (empty($_SESSION['img'])) {
                        echo getProfilePicture($_SESSION["username"]);
                    } else {
                        echo '<img src="../../../assets/img/users/' . $_SESSION['img'] . '" class="img-circle"  alt="User Image">';
                    } ?>
                </div>
            </div>
            <div class="info">
                <a href="#" class="d-block text-capitalize"><?= $_SESSION['username'] ?></a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="../dashboard/index.php" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-tags"></i>
                        <p>
                            Products
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="../products/index.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Product</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../products/add.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add New Product</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-user-tie"></i>
                        <p>
                            User Admins
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="../admins/index.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All User Admins</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../admins/add.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add New User Admins</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-handshake"></i>
                        <p>
                            Brands
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="../brands/index.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Brands</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../brands/add.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add New Brands</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-star"></i>
                        <p>
                            Slidders
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="../slidders/index.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All slidders</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../slidders/add.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add New slidders</p>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="far fa-bookmark"></i>
                        <p>
                            Orders
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="../orders/index.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All orders</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../orders/index_unpaid.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Unpaid</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../orders/index_wait_payment.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Waiting Payment</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../orders/index_wait_confirm.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Waiting Confirm Orders</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../orders/index_process.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Orders on Process</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../orders/index_shipped.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Orders on Shipped</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../orders/index_success.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Complete Orders</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../orders/index_cancel.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Canceled Orders</p>
                            </a>
                        </li>
                        
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="../users/index.php" class="nav-link">
                        <i class="fas fa-users"></i>
                        <p>
                            Users
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>