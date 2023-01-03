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
                    <h2 class="text-capitalize">Detail Pesanan Anda</h2>
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
                            <h3 class="float-left">Detail Pesanan</h3>
                            <a href="{{ url('transaction') }}"
                                class="btn btn-sm btn-primary float-right">Kembali</a>
                        </div>
                        <div class="card">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="float-left">
                                        <p>Status</p>
                                        <?php
                                        switch ($order[0]['status']) {
                                            case 0:
                                                echo '<h4 class="text-primary font-weight-bold">Menunggu Konfirmasi Pembayaran</h4>';
                                                break;
                                            case 1:
                                                echo '<h4 class="text-primary font-weight-bold">Pesanan Sedang Diproses</h4>';
                                                break;
                                            case 2:
                                                echo '<h4 class="text-secondary font-weight-bold">Menunggu Pembayaran</h4>';
                                                break;
                                            case 3:
                                                echo '<h4 class="text-warning font-weight-bold">Pesanan Belum Bayar</h4>';
                                                break;
                                            case 4:
                                                echo '<h4 class="text-primary font-weight-bold">Pesanan Sedang Dikirim</h4>';
                                                break;
                                            case 5:
                                                echo '<h4 class="text-success font-weight-bold">Pesanan Selesai</h4>';
                                                break;
                                            case 6:
                                                echo '<h4 class="text-danger font-weight-bold">Pesanan Dibatalkan</h4>';
                                                break;
                                        }
                                        ?>
                                    </div>
                                    <div class="float-right">
                                        <p>Tanggal Pemesanan</p>
                                        <?php setlocale(LC_TIME, "id") ?>
                                        <h4 class="text-muted"><?= strftime("%A", strtotime($order[0]["order_time"])) . ", " . date("d", strtotime($order[0]["order_time"])) . " " . strftime("%B", strtotime($order[0]["order_time"])) . " " . date("Y", strtotime($order[0]["order_time"])) ." ".date("H:i:s", strtotime($order[0]["order_time"]))?></h4>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="float-left">
                                        <h4 class="mt-5">Daftar Produk</h4>
                                    </div>
                                    <div class="float-right">
                                        <p>Kode Pemesanan</p>
                                        <h4>{{ $order[0]['kode_pemesanan'] }}</h4>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            @foreach ($detailOrders as $detailOrder)
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <img src="{{ asset('storage/img/product/'.$detailOrder->product['img']) }}" class="rounded float-left mr-3" width="70" alt="">

                                        <h5 class="card-title mb-n1">{{  $detailOrder->product['name'] }}</h5>
                                        <p class="card-text mb-n1">{{  $detailOrder['qty'] }} Barang</p>
                                        <p class="text-danger font-weight-bold">{{ rupiah($detailOrder->product['price']) }}</p>

                                        <p class="card-text mb-n1">Total Harga</p>
                                        <p class="card-text float-left mt-2 font-weight-bold">{{ rupiah($detailOrder['subtotal_price'])  }}</p>
                                        <a href="{{ url('product/'.$detailOrder->product['id']) }}" class="btn btn-primary float-right">Lihat Produk</a>

                                    </div>
                                </div>
                            @endforeach



                            <!-- </table> -->
                        </div>
                    </div>
                    <div class="card my-3">
                        <div class="card-header">
                            <h5>Detail Pengiriman</h5>
                        </div>
                        <div class="card-body row">
                            <div class="col-md-6">Alamat Pengiriman</div>
                            <div class="col-md-6">
                                <p>{{ $user->userDetail->full_name }} ({{ $user->userDetail->phone }})</p>
                                <p>{{ $user->userDetail->street }}</p>
                                <p>Dusun {{ $user->userDetail->dusun }}, RT {{ $user->userDetail->rt }}, RW {{ $user->userDetail->rw }}, Desa {{ $user->userDetail->desa }}p>
                                <p>Kecamatan{{ $user->userDetail->kecamatan }}, Kabupaten {{ $user->userDetail->kabupaten }}</p>
                                <p>Provinsi {{ $user->userDetail->provinsi }}</p>
                                <p>{{ $user->userDetail->postal_code }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="card my-3">
                        <div class="card-header">
                            <h5>Informasi Pembayaran</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="card col-md-6">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">
                                            <p class="float-left">
                                                Total Barang
                                            </p>
                                            <h5 class="text-secondary float-right">
                                                {{  $order[0]['total_qty'] }} Buah
                                            </h5>
                                        </li>
                                        <li class="list-group-item">
                                            <p class="float-left">
                                                Total Harga
                                            </p>
                                            <h5 class="text-secondary float-right">
                                                {{ rupiah($order[0]['total_price']) }}
                                            </h5>
                                        </li>
                                        <li class="list-group-item">
                                            <p>Status</p>
                                            <?php
                                        switch ($order[0]['status']) {
                                            case 0:
                                                echo '<h4 class="text-primary font-weight-bold">Menunggu Konfirmasi Pembayaran</h4>';
                                                break;
                                            case 1:
                                                echo '<h4 class="text-primary font-weight-bold">Pesanan Sedang Diproses</h4>';
                                                break;
                                            case 2:
                                                echo '<h4 class="text-secondary font-weight-bold">Menunggu Pembayaran</h4>';
                                                break;
                                            case 3:
                                                echo '<h4 class="text-warning font-weight-bold">Pesanan Belum Bayar</h4>';
                                                break;
                                            case 4:
                                                echo '<h4 class="text-primary font-weight-bold">Pesanan Sedang Dikirim</h4>';
                                                break;
                                            case 5:
                                                echo '<h4 class="text-success font-weight-bold">Pesanan Selesai</h4>';
                                                break;
                                            case 6:
                                                echo '<h4 class="text-danger font-weight-bold">Pesanan Dibatalkan</h4>';
                                                break;
                                        }
                                        ?>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card col-md-6">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">
                                            <p class="float-left">
                                                Ongkos Kirim
                                            </p>
                                            <h5 class="text-secondary float-right">
                                                {{ rupiah(20000) }}
                                            </h5>
                                        </li>
                                        
                                        <li class="list-group-item">
                                            <p class="float-left">
                                                Total Belanja
                                            </p>
                                            <h5 class="text-secondary float-right">
                                                {{ rupiah( $total = $order[0]['total_price'] + 20000) }}
                                            </h5>
                                        </li>
                                        <li class="list-group-item">
                                            <p class="float-left">Total Bayar</p>
                                            <h5 class="text-danger font-weight-bold float-right">{{ rupiah($total) }}</h5>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-12 mt-2 payment">
                                    @if ($order[0]['status'] == 3)
                                        <h5>Pilih Metode Pembayaran</h5>
                                        <form action="" method="post">
                                            <input type="hidden" name="id" value="<?= $id_order ?>">
                                            <div class="logos_list">
                                                <label><input type="radio" name="payment" id="payment" class="form-control toggle-bri" value="bri"><img src="../../../assets/img/payments/logo bri.png" width="100" alt=""></label>
                                                <label><input type="radio" name="payment" id="payment" class="form-control" value="gopay"><img src="../../../assets/img/payments/logo gopay.png" width="100" alt=""></label>
                                                <label><input type="radio" name="payment" id="payment" class="form-control" value="linkaja"><img src="../../../assets/img/payments/logo linkaja.png" width="100" alt=""></label>
                                                <label><input type="radio" name="payment" id="payment" class="form-control" value="dana"><img src="../../../assets/img/payments/logo dana.png" width="100" alt=""></label>
                                                <label><input type="radio" name="payment" id="payment" class="form-control" value="shopeepay"><img src="../../../assets/img/payments/logo shopeepay.png" width="100" alt=""></label>
                                                <label><input type="radio" name="payment" id="payment" class="form-control" value="ovo"><img src="../../../assets/img/payments/logo ovo.png" width="100" alt=""></label>
                                            </div>

                                            <div class="float-right mt-3">
                                                <button class="btn btn-lg btn-primary" type="submit" name="pay">Bayar Sekarang</button>
                                                <button class="btn btn-lg btn-danger" type="submit" name="cancel">Batalkan Pesanan</button>
                                            </div>
                                        </form>
                                    @elseif ($order[0]['status'] == 2)
                                        @if ($order[0]['payment'] == 'bri')
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5>Silahkan Transfer sebesar <span class="text-danger font-weight-bold"> <?= rupiah($total) ?></span> ke No.Rek <span class="text-uppercase text-success font-weight-bold">BRI</span> <span class="text-primary font-weight-bold">6782-01-019872-53-9</span> Atas Nama Khoerul Anam</h5>
                                                    <p>Jika sudah melakukan pembayaran, harap ajukan konfirmasi pembayaran melalui tombol dibawah</p>
                                                </div>
                                            </div>
                                        @else
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5>Silahkan Bayar sebesar <span class="text-danger font-weight-bold"> <?= rupiah($total) ?></span> melalui <span class="text-uppercase text-success font-weight-bold"><?= $order[0]['payment'] ?></span> ke Nomor <span class="text-primary font-weight-bold">0852-1066-5025</span> Atas Nama Khoerul Anam</h5>
                                                    <p>Jika sudah melakukan pembayaran, harap ajukan konfirmasi pembayaran melalui tombol dibawah</p>
                                                </div>
                                            </div>
                                        @endif
                                        <form action="" method="post" class="text-center">
                                            <input type="hidden" name="id" value="<?= $id_order ?>">
                                            <button type="submit" name="ajukan_konfirmasi" class="btn btn-primary btn-lg">Ajukan Konformasi Pembayaran</button>
                                        </form>
                                    @elseif ($order[0]['status'] == 4)
                                        <h5>Jika Pesanan anda sudah sampai, mohon untuk mengkonfirmasi pesanan diterima.</h5>
                                        <form action="" method="post" class="text-center">
                                            <input type="hidden" name="id" value="<?= $id_order ?>">
                                            <button type="submit" name="terima" class="btn btn-primary btn-lg">Pesanan Diterima</button>
                                        </form>
                                    @endif 
                                </div>
                            </div>
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
    
    <?php
    if (isset($_POST['pay'])) {
        if (!isset($_POST['payment'])) {
            echo "
                        <script type='text/javascript'>
                        Swal.fire({
                            title:'Opps!',
                            text:'Silahkan Pilih metode pembayaran terlebih dahulu',
                            icon:'warning',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                        })
                        </script>
                        ";
        } else {
            $bayar = bayar($_POST);
            if ($bayar == 'ok') {
                echo "
                        <script type='text/javascript'>
                        var getLink = '../transaction/detail.php?id=" .
                    $id_order .
                    "';
                        Swal.fire({
                            title:'Success!',
                            text:'Silahkan lakukan pembayaran',
                            icon:'success',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            window.location.href = getLink;
                        })
                        </script>
                        ";
            }
        }
    }
    
    if (isset($_POST['cancel'])) {
        $batal = batal($_POST);
        if ($batal == 'ok') {
            echo "
                        <script type='text/javascript'>
                        var getLink = '../transaction/detail.php?id=" .
                $id_order .
                "';
                        Swal.fire({
                            title:'Success!',
                            text:'Pesanan berhasil dibatalkan',
                            icon:'success',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            window.location.href = getLink;
                        })
                        </script>
                        ";
        }
    }
    
    if (isset($_POST['terima'])) {
        $terima = terima($_POST);
        if ($terima == 'ok') {
            echo "
                        <script type='text/javascript'>
                        var getLink = '../transaction/detail.php?id=" .
                $id_order .
                "';
                        Swal.fire({
                            title:'Success!',
                            text:'Pesanan Telah diterima, terimakasih atas pesanannya',
                            icon:'success',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            window.location.href = getLink;
                        })
                        </script>
                        ";
        }
    }
    
    if (isset($_POST['ajukan_konfirmasi'])) {
        $ajukan_konfirmasi = ajukan_konfirmasi($_POST);
    
        echo "
            <script type='text/javascript'>
            var getLink = '../transaction/detail.php?id=" .
            $id_order .
            "';
            Swal.fire({
                title:'Success!',
                text:'Pengajuan Sudah Dilakukan, Barang akan segera diproses',
                icon:'success',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK'
            }).then((result) => {
                window.location.href = getLink;
            })
            </script>
            ";
    }
    ?>