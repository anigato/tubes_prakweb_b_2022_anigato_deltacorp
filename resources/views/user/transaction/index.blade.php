@extends('user.layouts.main')
@section('container')
    
<?php
function rupiah($harga)
{
    $hasil_harga = 'Rp. ' . number_format($harga, 0, ',', '.');
    return $hasil_harga;
}
?>
<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2 class="text-capitalize">Daftar Pesanan Anda</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-content-right">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3>Daftar Pesanan</h3>
                        </div>
                        <div class="card-body">
                            @empty($orders)
                                <h1 class="text-danger text-center">Anda Belum Memiliki Transaksi Apapun</h1>
                            @else
                                @foreach ($orders as $order)
                                    <div class="card mb-4">
                                        <div class="card-body">
                                            <?php setlocale(LC_TIME, 'id'); ?>
                                            <h6 class="card-subtitle mb-2 text-muted">
                                                <?= strftime('%A', strtotime($order['order_time'])) . ', ' . date('d', strtotime($order['order_time'])) . ' ' . strftime('%B', strtotime($order['order_time'])) . ' ' . date('Y', strtotime($order['order_time'])) ?>
                                            </h6>

                                            <?php
                                            switch ($order['status']) {
                                                case 0:
                                                    echo '<p class="float-right badge badge-primary">Menunggu Konfirmasi Pembayaran</p>';
                                                    break;
                                                case 1:
                                                    echo '<p class="float-right badge badge-primary">Pesanan Sedang Diproses</p>';
                                                    break;
                                                case 2:
                                                    echo '<p class="float-right badge badge-secondary">Menunggu Pembayaran</p>';
                                                    break;
                                                case 3:
                                                    echo '<p class="float-right badge badge-warning">Pesanan Belum Bayar</p>';
                                                    break;
                                                case 4:
                                                    echo '<p class="float-right badge badge-primary">Pesanan Sedang Dikirim</p>';
                                                    break;
                                                case 5:
                                                    echo '<p class="float-right badge badge-success">Pesanan Selesai</p>';
                                                    break;
                                                case 6:
                                                    echo '<p class="float-right badge badge-danger">Pesanan Dibatalkan</p>';
                                                    break;
                                            }
                                            ?>
                                            <img src="{{ asset('storage/img/product/' . $order->orderDetail[0]->product['img']) }}"
                                                class="rounded float-left mr-3" width="70" alt="">

                                            <h5 class="card-title">{{ $order->orderDetail[0]->product['name'] }}</h5>
                                            <p class="card-text">{{ $order['total_qty'] }} Barang</p>


                                            <p class="card-text mb-n1">Total Belanja</p>
                                            <p class="card-text float-left mt-2 font-weight-bold">
                                                {{ $order['total_price'] }}
                                            </p>
                                            {{-- <a href="{{ url('transsaction/'.$order['id']) }}" class="btn btn-primary float-right">Lihat Detail</a> --}}
                                            <a href="{{ url('trans/'.$order['id']) }}" class="btn btn-primary float-right">Lihat Detail</a>
                                        </div>
                                    </div>
                                @endforeach
                            @endempty
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="single-sidebar mt-4">
                    @include('user.layouts.parts.new-product')
                </div>
            </div>
            <div class="col-md-8">
                @include('user.layouts.parts.related-product')
            </div>
        </div>
    </div>
</div>
@endsection