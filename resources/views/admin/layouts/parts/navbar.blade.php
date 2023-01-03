<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="index.php" class="nav-link">Home</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        @auth
        <li class="nav-item">
            <!-- <a class="nav-link logout-link" href="../../../php/logout.php" role="button" alt="Logout">
                <i class="fas fa-sign-out-alt"></i> Log Out
            </a> -->
            <form action="/logout" method="post">
                @csrf
                <button type="submit" class="dropdown-item">
                    <i class="fas fa-sign-out-alt"></i> Log Out
                </button>
            </form>
        </li>
        @endauth
    </ul>
</nav>