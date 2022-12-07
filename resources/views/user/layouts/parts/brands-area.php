<?php
$brand = query('SELECT * FROM brands ORDER BY RAND()');
?>
<div class="brands-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="brand-wrapper">
                    <div class="brand-list">
                        <?php foreach($brand as $row) : ?>
                            <a href="../product/search.php?search=brand&keyword=<?= $row['id'] ?>"><img src="../../../assets/img/brands/<?= $row['img'] ?>" alt=""></a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>