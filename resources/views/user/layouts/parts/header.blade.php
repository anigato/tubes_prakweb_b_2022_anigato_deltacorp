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
                                {{-- <a href id="logout" ><i class="bi bi-box-arrow-right"></i> Logout</a> --}}
                                
                                <form action="/logout" method="post" id="form-logout">
                                    @csrf
                                    {{-- <a href onclick="submit()"><i class="bi bi-box-arrow-right"></i> Logout</a> --}}
                                    <button class="btn btn-outline-light"><i class="bi bi-box-arrow-right"></i> Logout</button>
                                </form>
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