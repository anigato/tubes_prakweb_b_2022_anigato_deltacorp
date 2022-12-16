
<div class="brands-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="brand-wrapper">
                    <div class="brand-list">
                    <?php foreach($brands as $brand) : ?>
                            <a href="../product/search.php?search=brand&keyword=<?= $brand['id'] ?>"><img src="{{ asset('storage/img/brand/'.$brand['img']) }}" alt=""></a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>