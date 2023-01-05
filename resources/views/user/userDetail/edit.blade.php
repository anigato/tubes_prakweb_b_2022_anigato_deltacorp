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
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Atur Profil Anda</h3>
                </div>
                <div class="card-body">
                    <form class="row needs-validation" novalidate method="post" action="{{ url('user/'.$user['id']) }}" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <input type="hidden" required name="user_id" value="{{ $user['id'] }}">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Username</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="username" id="username" placeholder="username" value="{{ $user['username'] }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Password (Biarkan jika tidak ingin ubah password)</label>
                                <div class="input-group mb-3">
                                    <input type="password" class="form-control" name="password" value="" id="password">
                                    <div class="invalid-feedback">
                                        Silahkan perbaiki Password.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" required name="full_name" id="full_name" placeholder="Nama Lengkap" value="<?= (empty($user->userDetail->full_name))?null:$user->userDetail->full_name ?>">
                                    <div class="invalid-feedback">
                                        Silahkan perbaiki Nama Lengkap.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Panggilan</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" required name="nick_name" id="nick_name" placeholder="Nama Panggilan" value="<?= (empty($user->userDetail->nickname))?null:$user->userDetail->nickname ?>">
                                    <div class="invalid-feedback">
                                        Silahkan perbaiki Nama Panggilan.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>No Telp</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" required name="phone" id="phone" placeholder="No Telp" value="<?= (empty($user->userDetail->phone))?null:$user->userDetail->phone ?>">
                                    <div class="invalid-feedback">
                                        Silahkan perbaiki No Telp.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email</label>
                                <div class="input-group mb-3">
                                    <input type="email" class="form-control" required name="email" id="email" placeholder="Email" value="{{ $user->email }}">
                                    <div class="invalid-feedback">
                                        Silahkan perbaiki Email.
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="col-md-10">
                            <div class="form-group">
                                <label>Nama Jalan / Nomor Rumah</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="street" id="street" placeholder="Nama Jalan / Nomor Rumah" value="<?= (empty($user->userDetail->street))?null:$user->userDetail->street ?>">
                                    <div class="invalid-feedback">
                                        Silahkan perbaiki Nama Jalan / Nomor Rumah.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Kode POS</label>
                                <div class="input-group mb-3">
                                    <input type="number" class="form-control" required name="postal_code" onkeypress="return onlyNumber(event)" minlength="3" maxlength="6"  id="kode_pos" placeholder="Kode POS" value="<?= (empty($user->userDetail->postal_code))?null:$user->userDetail->postal_code ?>">
                                    <div class="invalid-feedback">
                                        Silahkan perbaiki Kode POS.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>RT</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" required name="rt" id="rt" onkeypress="return onlyNumber(event)" minlength="1" maxlength="3"  placeholder="RT" value="<?= (empty($user->userDetail->rt))?null:$user->userDetail->rt ?>">
                                    <div class="invalid-feedback">
                                        Silahkan perbaiki RT.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>RW</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" required name="rw" id="rw" onkeypress="return onlyNumber(event)" minlength="1" maxlength="3"  placeholder="RW" value="<?= (empty($user->userDetail->rw))?null:$user->userDetail->rw ?>">
                                    <div class="invalid-feedback">
                                        Silahkan perbaiki RW.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Dusun</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" required name="dusun" id="dusun" placeholder="Dusun" value="<?= (empty($user->userDetail->dusun))?null:$user->userDetail->dusun ?>">
                                    <div class="invalid-feedback">
                                        Silahkan perbaiki Dusun.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Desa</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" required name="desa" id="desa" placeholder="Desa" value="<?= (empty($user->userDetail->desa))?null:$user->userDetail->desa ?>">
                                    <div class="invalid-feedback">
                                        Silahkan perbaiki Userame.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Kecamatan</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" required name="kecamatan" id="kecamatan" placeholder="Kecamatan" value="<?= (empty($user->userDetail->kecamatan))?null:$user->userDetail->kecamatan ?>">
                                    <div class="invalid-feedback">
                                        Silahkan perbaiki Kecamatan.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Kabupaten</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" required name="kabupaten" id="kabupaten" placeholder="Kabupaten" value="<?= (empty($user->userDetail->kabupaten))?null:$user->userDetail->kabupaten ?>">
                                    <div class="invalid-feedback">
                                        Silahkan perbaiki Kabupaten.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Provinsi</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" required name="provinsi" id="provinsi" placeholder="Provinsi" value="<?= (empty($user->userDetail->provinsi))?null:$user->userDetail->provinsi ?>">
                                    <div class="invalid-feedback">
                                        Silahkan perbaiki Provinsi.
                                    </div>
                                </div>
                            </div>
                        </div>




                        <div class="col-md-12">
                            <label>Foto Profil</label>
                            <div class="custom-file mb-2">
                                <input type="file" class="custom-file-input form-control" name="img" id="img" onchange="showImage(this);">
                                <input type="hidden" name="old_img" value="<?= (empty($user->userDetail->img))?null:$user->userDetail->img ?>">
                                <label class="custom-file-label" for="img">Pilih Foto</label>
                                <div class="invalid-feedback">
                                    Silahkan perbaiki Foto Profil
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3 mx-auto d-block">
                                    <p class="text-center">Foto Baru</p>
                                    <img class="rounded" src="#" alt="" id="show-image" style="width: 100%;">
                                </div>
                                <div class="col-md-3 mx-auto d-block">
                                    <p class="text-center">Foto Lama</p>
                                    <?=  getProfilePicture(Auth()->user()->username) ?>
                                    {{-- <img class="rounded" src="{{ asset('storage/img/user'.(empty($user->userDetail->img))?null:$user->userDetail->img) }}" alt="" style="width: 100%;"> --}}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mt-5">
                            <div class="form-group ">
                                <button type="submit" class="btn btn-primary  start" name="edit">
                                    <i class="fas fa-upload"></i>
                                    <span> Perbarui Profil</span>
                                </button>
                                <a href="{{ url('user/'.$user['id']) }}" class="btn btn-warning  cancel">
                                    <i class="fas fa-times-circle"></i>
                                    <span> Batal</span>
                                </a>
                            </div>
                        </div>
                    </form>
                    <!-- /input-group -->
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
    
@endsection
@section('custom-script')
    <script>
        // menampilkan gambar ketika dipilih
        function showImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#show-image')
                        .attr('src', e.target.result)
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection