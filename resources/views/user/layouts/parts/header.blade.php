<div class="header-area">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="user-menu">
                    <ul>
                        @auth
                            <li>
                                <a class="text-uppercase" href="{{ url('user/'.auth()->user()->id) }}"><i class="fa fa-user"></i>{{ auth()->user()->name }}</a>
                            </li>
                            <li>
                                <a href="{{ url('wishlist') }}"><i class="fa fa-heart"></i> Daftar Keinginan</a>
                            </li>
                            <li>
                                <a href="{{ url('cart') }}"><i class="fas fa-shopping-cart"></i> Keranjang Saya</a>
                            </li>
                            <li>
                                <a href="{{ url('transaction') }}"><i class="fas fa-vote-yea"></i> Transaksi Saya</a>
                            </li>
                            <li>
                                <a href="" onclick="return logout()"><i class="fa fa-user"></i> Logout</a>
                            </li>
                        @else
                            <li><a href="{{ route('loginUser') }}"><i class="fa fa-user"></i> Daftar/Masuk</a></li>
                        @endauth
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function logout() {
        Swal.fire({
            title: 'Opps!',
            text: 'Anda Yakin Mau Keluar?',
            icon: 'warning',
            showCancelButton: true,
            cancelButtonColor: '#d33',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Ya!',
            allowOutsideClick: false
        }).then((result) => {
            if (result.value) {
                Swal.fire({
                    title: 'Success!',
                    text: 'Anda Berhasil Keluar',
                    icon: 'success',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK',
                    allowOutsideClick: false
                }).then((result) => {
                    if (result.value) {
                        window.location.href = '{{ url("logout") }}';
                    }
                })

            }
        });
        return false;
    }
</script>
