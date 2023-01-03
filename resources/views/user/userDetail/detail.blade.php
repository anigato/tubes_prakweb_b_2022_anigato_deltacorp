@extends('user.layouts.main')
@section('css')
    <style>
        .profile-pic {
            background: lightskyblue;
            color: #eeeeee;
            border-radius: 50%;
            height: 8rem;
            width: 8rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 8rem;
        }
    </style>
@endsection
@section('container')
    
<?php
function rupiah($harga)
{
    $hasil_harga = 'Rp. ' . number_format($harga, 0, ',', '.');
    return $hasil_harga;
}

// generate user img
function getProfilePicture($name)
{
    $name_slice = explode(' ', $name);
    $name_slice = array_filter($name_slice);
    $initials = '';
    $initials .= (isset($name_slice[0][0])) ? strtoupper($name_slice[0][0]) : '';
    return '<div class="profile-pic mx-auto">' . $initials . '</div>';
}
?>

    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2 class="text-capitalize">Profil Anda</h2>
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
                        <div class="container">
                            <div class="main-body">

                                <!-- Breadcrumb -->
                                <nav aria-label="breadcrumb" class="main-breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                                    </ol>
                                </nav>
                                <!-- /Breadcrumb -->

                                <div class="row gutters-sm">
                                    <div class="col-lg-4 mb-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-flex flex-column align-items-center text-center">
                                                    <?=  getProfilePicture(Auth()->user()->username) ?>
                                                    
                                                    <div class="mt-3">
                                                        <h4>{{ $user['username'] }}</h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="{{ url('user/' . $user['id'] . '/edit') }}"
                                                class='btn btn-sm btn-primary'>
                                                @empty($user->userDetail)
                                                    Atur Sekarang
                                                @else
                                                    Edit Profil
                                                @endempty
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="card mb-3">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <h6 class="mb-0">Username</h6>
                                                    </div>
                                                    <div class="col-md-7 text-secondary">{{ $user['username'] }}</div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-md-5">
                                                            <h6 class="mb-0">Nama Lengkap</h6>
                                                        </div>
                                                        <div class="col-md-7 text-secondary">
                                                            @empty($user->userDetail)
                                                                Belum Diatur
                                                            @else
                                                                {{ $user->userDetail->full_name }}
                                                            @endempty
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-md-5">
                                                            <h6 class="mb-0">Nama Panggilan</h6>
                                                        </div>
                                                        <div class="col-md-7 text-secondary">
                                                            @empty($user->userDetail)
                                                                Belum Diatur
                                                            @else
                                                                {{ $user->userDetail->nick_name }}
                                                            @endempty
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-md-5">
                                                            <h6 class="mb-0">Email</h6>
                                                        </div>
                                                        <div class="col-md-7 text-secondary">
                                                            {{ $user['email'] }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="row gutters-sm">
                                                <div class="col-md-12 mb-3">
                                                    <div class="card h-100">
                                                        <div class="card-body">
                                                            <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">Alamat</i>Pengiriman Anda</h6>
                                                            <div class="row">
                                                                <div class="col-md-5">
                                                                    <h6 class="mb-0">Nama Jalan</h6>
                                                                </div>
                                                                <div class="col-md-7 text-secondary">
                                                                    @empty($user->userDetail)
                                                                        Belum Diatur
                                                                    @else
                                                                        {{ $user->userDetail->street }}
                                                                    @endempty
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="col-md-5">
                                                                    <h6 class="mb-0">Nomor Telp.</h6>
                                                                </div>
                                                                <div class="col-md-7 text-secondary">
                                                                    @empty($user->userDetail)
                                                                        Belum Diatur
                                                                    @else
                                                                        {{ $user->userDetail->phone }}
                                                                    @endempty
                                                                </div>
                                                            </div>
                                                            <hr>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-3">
                                                    <div class="card h-100">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-md-5">
                                                                    <h6 class="mb-0">RT</h6>
                                                                </div>
                                                                <div class="col-md-7 text-secondary">
                                                                    @empty($user->userDetail)
                                                                        Belum Diatur
                                                                    @else
                                                                        {{ $user->userDetail->rt }}
                                                                    @endempty
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="col-md-5">
                                                                    <h6 class="mb-0">RW</h6>
                                                                </div>
                                                                <div class="col-md-7 text-secondary">
                                                                    @empty($user->userDetail)
                                                                        Belum Diatur
                                                                    @else
                                                                        {{ $user->userDetail->rw }}
                                                                    @endempty
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="col-md-5">
                                                                    <h6 class="mb-0">Dusun</h6>
                                                                </div>
                                                                <div class="col-md-7 text-secondary">
                                                                    @empty($user->userDetail)
                                                                        Belum Diatur
                                                                    @else
                                                                        {{ $user->userDetail->dusun }}
                                                                    @endempty
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="col-md-5">
                                                                    <h6 class="mb-0">Desa</h6>
                                                                </div>
                                                                <div class="col-md-7 text-secondary">
                                                                    @empty($user->userDetail)
                                                                        Belum Diatur
                                                                    @else
                                                                        {{ $user->userDetail->desa }}
                                                                    @endempty
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-3">
                                                    <div class="card h-100">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-md-5">
                                                                    <h6 class="mb-0">Kecamatan</h6>
                                                                </div>
                                                                <div class="col-md-7 text-secondary">
                                                                    @empty($user->userDetail)
                                                                        Belum Diatur
                                                                    @else
                                                                        {{ $user->userDetail->kecamatan }}
                                                                    @endempty
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="col-md-5">
                                                                    <h6 class="mb-0">Kabupaten</h6>
                                                                </div>
                                                                <div class="col-md-7 text-secondary">
                                                                    @empty($user->userDetail)
                                                                        Belum Diatur
                                                                    @else
                                                                        {{ $user->userDetail->kabupaten }}
                                                                    @endempty
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="col-md-5">
                                                                    <h6 class="mb-0">Provinsi</h6>
                                                                </div>
                                                                <div class="col-md-7 text-secondary">
                                                                    @empty($user->userDetail)
                                                                        Belum Diatur
                                                                    @else
                                                                        {{ $user->userDetail->provinsi }}
                                                                    @endempty
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="col-md-5">
                                                                    <h6 class="mb-0">Kode POS</h6>
                                                                </div>
                                                                <div class="col-md-7 text-secondary">
                                                                    @empty($user->userDetail)
                                                                        Belum Diatur
                                                                    @else
                                                                        {{ $user->userDetail->postal_code }}
                                                                    @endempty
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            @include('user.layouts.parts.related-product')
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
