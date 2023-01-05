
<div class="brands-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="brand-wrapper">
                    <div class="brand-list">
                    @empty($record)
                        
                    @else
                        <?php foreach($brands as $brand) : ?>
                            <a href="{{ url('product?brand=' . $brand->id) }}"><img src="{{ asset('storage/img/brand/'.$brand['img']) }}" alt=""></a>
                        <?php endforeach; ?>
                    @endempty
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>