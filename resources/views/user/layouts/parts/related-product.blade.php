<?php $randomProducts = query('SELECT * FROM products WHERE stok > 0 ORDER BY RAND() LIMIT 7'); ?>
<div class="related-products-wrapper">
    <h2 class="related-products-title">Mungkin Kamu Suka</h2>
    <div class="related-products-carousel">
        <?php foreach ($randomProducts as $row) : ?>
            <?php if (isset($_SESSION['user_name'])) : ?>
                <?php foreach ($wishlist as $wish) : ?>
                    <?php if ($wish['id_product'] == $row['id']) : ?>
                        <div class="single-product">
                            <div class="product-f-image">
                                <img src="../../../assets/img/products/<?= $row['img'] ?>" alt="">
                                <div class="product-hover">
                                    <a href="../wishlist/delete.php?id_user=<?= $id_user ?>&id_product=<?= $row['id'] ?>" class="add-to-wish-link wishlist"><i class="fas fa-heart" style="color: red;"></i></a>

                                    <a href="../product/detail.php?id=<?= $row['id'] ?>" class="view-details-link"><i class="fa fa-link"></i> Lihat Detail</a>
                                </div>
                            </div>

                            <h2><a class="text-uppercase" href="../product/detail.php?id=<?= $row['id'] ?>"><?= $row['name'] ?></a></h2>

                            <div class="product-carousel-price">
                                <h2><ins><?= rupiah($row["price"]); ?></ins></h2>
                            </div>
                        </div>
                        <?php continue 2; ?>
                    <?php endif; ?>
                <?php endforeach; ?>
                <div class="single-product">
                    <div class="product-f-image">
                        <img src="../../../assets/img/products/<?= $row['img'] ?>" alt="">
                        <div class="product-hover">
                            <a href="../wishlist/add.php?id_user=<?= $id_user ?>&id_product=<?= $row['id'] ?>" class="add-to-wish-link wishlist"><i class="far fa-heart" style="color: red;"></i></a>

                            <a href="../product/detail.php?id=<?= $row['id'] ?>" class="view-details-link"><i class="fa fa-link"></i> Lihat Detail</a>
                        </div>
                    </div>

                    <h2><a class="text-uppercase" href="../product/detail.php?id=<?= $row['id'] ?>"><?= $row['name'] ?></a></h2>

                    <div class="product-carousel-price">
                        <h2><ins><?= rupiah($row["price"]); ?></ins></h2>
                    </div>
                </div>
            <?php else : ?>
                <div class="single-product">
                    <div class="product-f-image">
                        <img src="../../../assets/img/products/<?= $row['img'] ?>" alt="">
                        <div class="product-hover">
                            <a href="../product/detail.php?id=<?= $row['id'] ?>" class="view-details-link"><i class="fa fa-link"></i> Lihat Detail</a>
                        </div>
                    </div>

                    <h2><a class="text-uppercase" href="../product/detail.php?id=<?= $row['id'] ?>"><?= $row['name'] ?></a></h2>

                    <div class="product-carousel-price">
                        <h2><ins><?= rupiah($row["price"]); ?></ins></h2>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</div>