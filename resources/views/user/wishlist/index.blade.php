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
                        <h2 class="text-capitalize">Daftar Keinginan Anda</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-sidebar">
                        @include('user.layouts.parts.new-product')
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="product-content-right">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3>Daftar Keinginan</h3>
                            </div>
                            <div class="card-body">
                                @empty($record)
                                <h1 class='text-danger'>Anda tidak memiliki produk di dalam daftar keinginan</h1>
                                @else
                                <table class="table table-condensed">
                                    <tr>
                                        <td>Foto</td>
                                        <td>Nama</td>
                                        <td>Harga</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    @foreach ($wishlist as $wish)
                                        <tr>
                                            <td>
                                                <img src="{{ asset('storage/img/product/' . $wish->product->img) }}"
                                                    alt=""class="rounded" width="70" alt="">
                                            </td>
                                            <td>
                                                <a
                                                    href="{{ url('product/' . $wish->product->id) }}">{{ $wish->product->name }}</a>
                                            </td>
                                            <td>
                                                {{ rupiah($wish->product->price) }}
                                            </td>
                                            <td>
                                                <a href="{{ url('wishlist/delete/' . $wish['id']) }}"
                                                    class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i></a>
                                            </td>
                                            <td>
                                                <form method="post" action="{{ url('cart') }}" class="cart">
                                                    @csrf
                                                    <div class="quantity">
                                                        <input type="hidden" name="product_id"
                                                            value="{{ $wish->product['id'] }}">
                                                        <input type="hidden" name="img"
                                                            value="{{ $wish->product['img'] }}">
                                                        <input type="hidden" name="name"
                                                            value="{{ $wish->product['name'] }}">
                                                        <input type="hidden" name="price"
                                                            value="{{ $wish->product['price'] }}">
                                                        <input type="hidden" name="qty" value="1">

                                                        <button type="submit" class="btn btn-primary add_to_cart_button">
                                                            <i class="fas fa-cart-plus"></i>
                                                        </button>
                                                    </div>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach


                                </table>
                                @endempty
                            </div>
                        </div>
                        @include('user.layouts.parts.related-product')
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
