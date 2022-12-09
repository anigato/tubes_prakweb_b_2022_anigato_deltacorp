<?php $newProducts = query('SELECT * FROM products WHERE stok > 0 ORDER BY date_add DESC LIMIT 4'); ?>
<h2 class="sidebar-title">Produk Terbaru</h2>
<?php foreach ($newProducts as $row) : ?>
    <hr>
    <div class="thubmnail-recent">
        <img src="../../../assets/img/products/<?= $row["img"] ?>" alt="<?= $row["img"] ?>" class="img-tumbnail rounded recent-thumb">
        <h2><a class="text-uppercase" href="../product/detail.php?id=<?= $row['id'] ?>"><?= $row['name'] ?></a></h2>
        <div class="product-sidebar-price">
            <ins><?= rupiah($row["price"]); ?></ins>
        </div>
    </div>
<?php endforeach; ?>