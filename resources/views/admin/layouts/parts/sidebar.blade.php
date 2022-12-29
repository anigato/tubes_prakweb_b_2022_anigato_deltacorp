<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
        <img src="{{ asset('image/anigatomini.png') }}" alt="ANIGASTORE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
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
                        // echo getProfilePicture($_SESSION["username"]);
                    } else {
                        echo '<img src="../../../assets/img/users/' . $_SESSION['img'] . '" class="img-circle"  alt="User Image">';
                    } ?>
                </div>
            </div>
            <div class="info">
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
                    <a href="{{ url('/admin/dashboard') }}" class="nav-link {{ Request::is('admin/dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="" class="nav-link @if (Request::is('admin/product') || Request::is('admin/product/create')) {{ 'active' }} @endif()">
                        <i class="fas fa-tags"></i>
                        <p>
                            Products
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="@if (Request::is('admin/product') || Request::is('admin/product/create')) {{ 'display:block' }} @endif()">
                        <li class="nav-item">
                            <a href="{{ url('/admin/product') }}" class="nav-link {{ Request::is('admin/product') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Product</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/admin/product/create') }}" class="nav-link {{ Request::is('admin/product/create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add New Product</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="" class="nav-link @if (Request::is('admin/userAdmin') || Request::is('admin/userAdmin/create')) {{ 'active' }} @endif()">
                        <i class="fas fa-user-tie"></i>
                        <p>
                            User Admins
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="@if (Request::is('admin/userAdmin') || Request::is('admin/userAdmin/create')) {{ 'display:block' }} @endif()">
                        <li class="nav-item">
                            <a href="{{ url('/admin/userAdmin') }}" class="nav-link {{ Request::is('admin/userAdmin') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All User Admins</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/admin/userAdmin/create') }}" class="nav-link {{ Request::is('admin/userAdmin/create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add New User Admins</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="" class="nav-link @if (Request::is('admin/brand') || Request::is('admin/brand/create')) {{ 'active' }} @endif()">
                        <i class="fas fa-handshake"></i>
                        <p>
                            Brands
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="@if (Request::is('admin/brand') || Request::is('admin/brand/create')) {{ 'display:block' }} @endif()">
                        <li class="nav-item">
                            <a href="{{ url('/admin/brand') }}" class="nav-link {{ Request::is('admin/brand') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Brands</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/admin/brand/create') }}" class="nav-link {{ Request::is('admin/brand/create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add New Brands</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="" class="nav-link  @if (Request::is('admin/slidder') || Request::is('admin/slidder/create')) {{ 'active' }} @endif()">
                        <i class="fas fa-star"></i>
                        <p>
                            Slidders
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="@if (Request::is('admin/slidder') || Request::is('admin/slidder/create')) {{ 'display:block' }} @endif()">
                        <li class="nav-item">
                            <a href="{{ url('/admin/slidder') }}" class="nav-link {{ Request::is('admin/slidder') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All slidders</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/admin/slidder/create') }}" class="nav-link {{ Request::is('admin/slidder/create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add New slidders</p>
                            </a>
                        </li>
                    </ul>
                </li>
                
                <li class="nav-item">
                    <a href="#" class="nav-link @if (Request::is('admin/category') || Request::is('admin/category/create')) {{ 'active' }} @endif()">
                        <i class="fas fa-star"></i>
                        <p>
                            Categories
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="@if (Request::is('admin/category') || Request::is('admin/category/create')) {{ 'display:block' }} @endif()">
                        <li class="nav-item">
                            <a href="{{ url('/admin/category') }}" class="nav-link {{ Request::is('admin/category') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All categories</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/admin/category/create') }}" class="nav-link {{ Request::is('admin/category/create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add New categories</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="" class="nav-link @if (Request::is('admin/order')) {{ 'active' }} @endif()">
                        <i class="far fa-bookmark"></i>
                        <p>
                            Orders
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="@if (Request::is('admin/order')) {{ 'display:block' }} @endif()">
                        <li class="nav-item">
                            <a href="{{ url('/admin/order') }}" class="nav-link">
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
                    <a href="{{ url('admin/userList') }}" class="nav-link">
                        <i class="fas fa-users"></i>
                        <p>
                            User Lists
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>