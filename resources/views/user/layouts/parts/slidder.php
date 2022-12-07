<?php
$slidder = query("select*from slidders where status = 1");

if (!empty($slidder)) :
?>
    <div class="slider-area">
        <!-- Slider -->
        <div class="block-slider block-slider4">
            <ul class="" id="bxslider-home4">
                <?php foreach ($slidder as $row) : ?>
                    <li>
                        <?php
                        $id = $row['id_product'];
                        $products = query("SELECT * FROM products WHERE id = $id");

                        foreach ($products as $pro) :
                        ?>
                            <img src="../../../assets/img/products/<?= $pro["img"] ?>" alt="" style="width: 50%;">
                            <div class="caption-group card p-3" style="background-color: rgba(255, 255, 255, 0.5); border-radius: 10px;max-width: 100%;">
                                <h3 class="caption title">
                                    <span class="primary"><?= $row['title'] ?></span>
                                </h3>
                                <h5 class="caption subtitle"><?= htmlspecialchars_decode($row["description"], ENT_QUOTES); ?></h5>
                                <a class="caption button-radius btn btn-sm btn-primary" href="detail.php?id=<?= $pro['id'] ?>">Lihat Detail</a>
                            </div>
                        <?php endforeach ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <!-- ./Slider -->
    </div>
<?php endif; ?>