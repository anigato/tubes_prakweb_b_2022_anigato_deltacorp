<div class="footer-top-area">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-3 col-sm-6">
                <div class="footer-about-us">
                    <h2>Delta<span>corp</span></h2>
                    <p>Deltacorp tersedia di online shop Tokopedia dan Shopee.</p>
                    <h4><span>About</span>Us</h4>
                    <p><a href="{{ url('about/us') }}" target="_blank">ANIGATO</a> Anam Qisti Zay Fakih</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 col-sm-6">
                <div class="footer-menu">
                    <h2 class="footer-wid-title">Navigasi</h2>
                    <ul>
                        @auth
                            <li><a href="{{ url('user/' . auth()->user()->id) }}">Akun Saya</a></li>
                            <li><a href="{{ url('wishlist') }}"></i> Daftar Keinginan</a></li>
                            <li><a href="{{ url('cart') }}"> Keranjang Saya</a></li>
                            <li><a href="{{ url('transaction') }}"> Transaksi Saya</a></li>
                        @else
                            <li><a href="{{ url('cart') }}"> Keranjang Saya</a></li>
                        @endauth
                    </ul>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 col-sm-6">
                <div class="footer-menu">
                    <h2 class="footer-wid-title">Kategori</h2>
                    <ul>
                        @foreach ($categories as $category)
                            <li><a href="{{ url('product?category=' . $category->id) }}">{{ $category['name'] }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 col-sm-6">
                <div class="footer-menu">
                    <h2 class="footer-wid-title">Brand</h2>
                    <ul>
                        @foreach ($brands as $brand)
                            <li><a href="{{ url('product?brand=' . $brand->id) }}">{{ $brand['name'] }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End footer top area -->

<div class="footer-bottom-area">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="copyright">
                    <p>&copy; 2022 <a href="http://www.youtube.com/anigato" target="_blank">DeltaCorp</a>. All Rights
                        Reserved. </p>
                </div>
            </div>
        </div>
    </div>
</div>
