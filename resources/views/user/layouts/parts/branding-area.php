<div class="site-branding-area">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="logo">
                    <h1><a href="../product/index.php"><img src="../../../assets/img/anigato=new-transparent-mini.png" width="100"> ANIGASTORE</a></h1>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="shopping-item">
                    <?php
                    if (isset($_SESSION['cart'])) {
                        $cart = unserialize(serialize($_SESSION['cart']));
                        $qty = 0;
                        $total = 0;

                        for ($i = 0; $i < count($cart); $i++) {
                            $total += $cart[$i]['price'] * $cart[$i]['qty'];
                            $qty += $cart[$i]['qty'];
                        }
                    } else {
                        $total = 0;
                        $qty = 0;
                    }

                    ?>
                    <a href="../cart/index.php">Keranjang - <span class="cart-amunt"><?= rupiah($total); ?></span> <i class="fa fa-shopping-cart"></i> <span class="product-count" style="width:30px; height:30px; font-size: 18px;"><?= $qty ?></span></a>
                </div>
            </div>
        </div>
    </div>
</div>