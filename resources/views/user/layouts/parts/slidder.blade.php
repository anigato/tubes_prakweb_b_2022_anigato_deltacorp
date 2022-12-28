<div class="slider-area">
    <!-- Slider -->
    <div class="block-slider block-slider4">
        <ul class="" id="bxslider-home4">
            @foreach ($slidders as $slidder)
            <li>
                    <img src="{{ asset('storage/img/product/' . $slidder->product['img']) }}" alt=""
                        style="width: 50%;">
                    <div class="caption-group card p-3"
                        style="background-color: rgba(90, 136, 202, 0.8); border-radius: 10px;max-width: 100%;">
                        <h3 class="caption title">
                            <span class="primary">{{ $slidder['title'] }}</span>
                        </h3>
                        <h5 class="caption subtitle text-white">{{ htmlspecialchars_decode($slidder['description'], ENT_QUOTES) }}
                        </h5>
                        <a class="caption button-radius btn btn-sm btn-primary"
                            href="{{ url('product/' . $slidder->product['id']) }}">Lihat Detail</a>
                    </div>
                </li>
                @endforeach
        </ul>
    </div>
    <!-- ./Slider -->
</div>
