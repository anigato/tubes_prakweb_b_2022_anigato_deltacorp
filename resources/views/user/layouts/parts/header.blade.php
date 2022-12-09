<div class="header-area">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="user-menu">
                    <ul>
                        <?php if (isset($_COOKIE['user_name'])) {
                            $_SESSION['user_name'] = $_COOKIE['user_name'];
                        } ?>
                        <?php if (isset($_SESSION['user_name'])) : ?>
                            <li><a class="text-uppercase" href="../user/detail.php"><i class="fa fa-user"></i> <?= $_SESSION['user_name'] ?></a></li>
                            <li><a href="../wishlist/index.php"><i class="fa fa-heart"></i> Daftar Keinginan</a></li>
                            <li><a href="../cart/index.php"><i class="fas fa-shopping-cart"></i> Keranjang Saya</a></li>
                            <li><a href="../transaction/index.php"><i class="fas fa-vote-yea"></i> Transaksi Saya</a></li>
                            <li><a href="" onclick="return logout()"><i class="fa fa-user"></i> Logout</a></li>
                        <?php else : ?>
                            <li><a href="../user/login.php"><i class="fa fa-user"></i> Daftar/Masuk</a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function logout() {
        Swal.fire({
            title: 'Opps!',
            text: 'Anda Yakin Mau Keluar?',
            icon: 'warning',
            showCancelButton: true,
            cancelButtonColor: '#d33',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Ya!',
            allowOutsideClick: false
        }).then((result) => {
            if (result.value) {
                Swal.fire({
                    title: 'Success!',
                    text: 'Anda Berhasil Keluar',
                    icon: 'success',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK',
                    allowOutsideClick: false
                }).then((result) => {
                    if (result.value) {
                        window.location.href = '../user/logout.php';
                    }
                })

            }
        });
        return false;
    }
</script>