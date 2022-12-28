
    <div class="slider-area">
        <!-- Slider -->
        <div class="block-slider block-slider4">
            <ul class="" id="bxslider-home4">
                @foreach ($slidders as $slidder)
                    <li>
                        @foreach ($products as $product)
                            
                            <img src="{{ asset('storage/img/product/'.$product['img']) }}" alt="" style="width: 50%;">
                            <div class="caption-group card p-3" style="background-color: rgba(255, 255, 255, 0.5); border-radius: 10px;max-width: 100%;">
                                <h3 class="caption title">
                                    <span class="primary"><?= $slidder['title'] ?></span>
                                </h3>
                                <h5 class="caption subtitle"><?= htmlspecialchars_decode($slidder["description"], ENT_QUOTES); ?></h5>
                                <a class="caption button-radius btn btn-sm btn-primary" href="detail.php?id=<?= $product['id'] ?>">Lihat Detail</a>
                            </div>
                            @endforeach
                    </li>
                 @endforeach
            </ul>
        </div>
        <!-- ./Slider -->
    </div>