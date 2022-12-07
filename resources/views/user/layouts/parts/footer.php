<div class="footer-top-area">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-3 col-sm-6">
                <div class="footer-about-us">
                    <h2>ANIGA<span>STORE</span></h2>
                    <p>ANIGASTORE adalah toko resmi dari Channel Youtube ANIGATO. ANIGASTORE juga tersedia di online shop Tokopedia dan Shopee.</p>
                    <div class="footer-social">
                        <a href="https://web.facebook.com/khoerul.anam.7758235/" target="_blank"><i class="fab fa-facebook"></i></a>
                        <a href="https://twitter.com/yt_anigato" target="_blank"><i class="fab fa-twitter"></i></a>
                        <a href="http://www.youtube.com/anigato" target="_blank"><i class="fab fa-youtube"></i></a>
                        <a href="https://www.instagram.com/yt.anigato/" target="_blank"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 col-sm-6">
                <div class="footer-menu">
                    <h2 class="footer-wid-title">Navigasi</h2>
                    <ul>
                        <?php if (isset($_COOKIE['user_name'])) {
                            $_SESSION['user_name'] = $_COOKIE['user_name'];
                        } ?>
                        <?php if (isset($_SESSION['user_name'])) : ?>
                            <li><a href="../user/detail.php">Akun Saya</a></li>
                            <li><a href="../wishlist/index.php"></i> Daftar Keinginan</a></li>
                            <li><a href="../cart/index.php"> Keranjang Saya</a></li>
                            <li><a href="../transaction/index.php"> Transaksi Saya</a></li>
                        <?php else : ?>
                            <li><a href="#">Akun Saya</a></li>
                            <li><a href="#">Keranjang Saya</a></li>
                            <li><a href="#">Daftar Keinginan</a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 col-sm-6">
                <div class="footer-menu">
                    <h2 class="footer-wid-title">Kategori</h2>
                    <ul>
                        <li><a href="../product/search.php?search=category&keyword=SSD">SSD</a></li>
                        <li><a href="../product/search.php?search=category&keyword=HDD">HDD</a></li>
                        <li><a href="../product/search.php?search=category&keyword=SSHD">SSHD</a></li>
                        <li><a href="../product/search.php?search=category&keyword=SSD NVME">SSD NVME</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 col-sm-6">
                <div class="footer-newsletter">
                    <h2 class="footer-wid-title">Langganan</h2>
                    <p>Langganan ke Channel Youtube ANIGATO sekarang juga!</p>
                    <div class="newsletter-form">
                        <a class="btn btn-sm btn-danger" href="http://www.youtube.com/anigato" target="_blank">Klik Saya</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End footer top area -->

<div class="footer-bottom-area">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="copyright">
                    <p>&copy; 2021 <a href="http://www.youtube.com/anigato" target="_blank">ANIGATO</a>. All Rights Reserved. </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="footer-card-icon">
                    <i class="fab fa-cc-discover"></i>
                    <i class="fab fa-cc-mastercard"></i>
                    <i class="fab fa-cc-paypal"></i>
                    <i class="fab fa-cc-visa"></i>
                </div>
            </div>
        </div>
    </div>
</div>