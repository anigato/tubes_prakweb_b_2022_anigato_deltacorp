@extends('user.layouts.main')
@section('container')
    <?php
    function rupiah($harga)
    {
        $hasil_harga = 'Rp. ' . number_format($harga, 0, ',', '.');
        return $hasil_harga;
    }
    ?>
    {{-- {{ unserialize(serialize($_SESSION['cart'])) }} --}}

    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2 class="text-capitalize">Keranjang Saya</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">

                <div class="col-md-12 mb-4">
                    <table class="table table-condensed">

                        <?php
                        
                if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                ?>
                        <tr>
                            <td>Foto</td>
                            <td>Nama Produk</td>
                            <td>Jumlah</td>
                            <td>Harga</td>
                            <td>Total</td>
                            <td></td>
                        </tr>

                        <?php
                    $cart = unserialize(serialize($_SESSION['cart']));
                    $index = 0;
                    $total = 0;
                    $total_bayar = 0;

                    for ($i = 0; $i < count($cart); $i++) {
                        $total = $_SESSION['cart'][$i]['price'] * $_SESSION['cart'][$i]['qty'];
                        $total_bayar += $total;
                    ?>
                        <tr>
                            <td>
                                <img src="{{ asset('storage/img/product/' . $cart[$i]['img']) }}" class="rounded"
                                    width="70" alt="">
                            </td>
                            <td>
                                <a href="{{ url('product/' . $cart[$i]['product_id']) }}">{{ $cart[$i]['name'] }}</a>
                            </td>
                            <td>
                                <form action="{{ url('cart/' . $cart[$i]['product_id']) }}" method="post">
                                    @csrf
                                    @method('put')
                                    <input type="hidden" name="product_id" id="product_id"
                                        value="{{ $cart[$i]['product_id'] }}">
                                    <div class="row">
                                        <input type="number" class="form-control col-md-5" name="qty_update"
                                            value="{{ $cart[$i]['qty'] }}" onkeyup="submit()">
                                        <button type="submit" class="form-control col-md-3 btn btn-sm"><i
                                                class="fas fa-check"></i></button>
                                    </div>
                                </form>
                            </td>

                            <td>{{ rupiah($cart[$i]['price']) }}</td>
                            <td>{{ rupiah($total) }}</td>
                            <td>
                                <form action="{{ url('cart/' . $index) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <input type="hidden" name="index" id="index" value="{{ $index }}">
                                    <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>

                        <?php
                    $index++;
                }?>
                        <tr>
                            <td colspan="4"><strong>Total Bayar</strong></td>
                            <td colspan="2"><strong>{{ rupiah($total_bayar) }}</strong></td>
                            <td>
                                <form action="{{ url('cart/checkout') }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm">Checkout</button>
                                </form>
                            </td>
                        </tr>
                        <?php
                } else {
                echo "<h1 class='text-danger'>Anda Tidak memiliki produk di dalam keranjang</h1>";
                
                }
                ?>
                    </table>
                </div>


                <div class="col-md-4">
                    <div class="single-sidebar">

                        <!-- End new product -->
                        @include('user.layouts.parts.new-product')
                    </div>
                </div>
                <div class="col-md-8">
                    <!-- End related-product -->
                    @include('user.layouts.parts.related-product')
                </div>
            </div>
        </div>
    </div>
@endsection
