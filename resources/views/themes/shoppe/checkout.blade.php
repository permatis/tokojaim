@extends('themes/shoppe/partials/main')
@section('content')
    <div class="header">
        @include('themes.shoppe.partials.navbar')
    </div>

    <div class="main">
        <div class="content">
            <ul class="steps">
                <li id="login" @if( auth()->guest()) class="ini active"@endif>Login</li>
                <li id="pembeli" @if(! auth()->guest() && ! session()->has('transaksi')) class="ini active"@endif>Data Pembeli</li>
                <li id="pembayaran" @if(! auth()->guest() && session()->has('transaksi')) class="ini active"@endif>Pembayaran</li>
            </ul>
            <div class="form-steps">
                @if(! session()->has('transaksi') )
                <div class="section split">
                    <div class="span_1_of_2 checkout">
                        @if(auth()->guest())
                        <div id="login-field">
                                <div class="text-center">
                                    <h2>login</h2>
                                    <p>Silahkan masukkan email dan password anda.</p>
                                </div>
                                <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                                    {{ csrf_field() }}
                                    
                                    <label for="email">E-Mail Address</label>
                                    <input id="email" type="email" name="email" value="{{ old('email') }}">
                                    @if ($errors->has('email'))
                                        <span class="error">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif

                                    <label for="password">Password</label>
                                    <input id="password" type="password" name="password">

                                    @if ($errors->has('password'))
                                        <span class="error">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif

                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember"> Remember Me
                                        </label>
                                    </div>
                                    
                                    <div class="all-btn">
                                        <button type="submit"> Login </button> 
                                        <a href="/register" class="btn btn_register">Register</a>
                                        {{-- <div class="right">
                                            <a href="#" class="btn btn_facebook">Login with facebook</a>
                                        </div> --}}
                                    </div>

                                    {{-- <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a> --}}
                                </form>
                        </div>
                        @endif
                        @if(! auth()->guest() && ! session()->has('transaksi')) 
                        <div id="pembeli-field">
                                <div class="text-center">
                                    <h2>Data Pembeli</h2>
                                    <p>Silahkan isi informasi data anda di form yang disediakan untuk informasi pengiriman barang.</p>
                                </div>              
                                <form role="form" method="POST" action="{{ url('/checkout') }}">
                                {{ csrf_field() }}

                                    <label for="name">Nama Lengkap</label>
                                        <input id="nama_lengkap" type="text" name="nama_lengkap" value="{{ old('nama_lengkap') }}">

                                        @if ($errors->has('nama_lengkap'))
                                            <span class="error">
                                                <strong>{{ $errors->first('nama_lengkap') }}</strong>
                                            </span>
                                        @endif

                                    <label for="alamat">Alamat</label>
                                    <textarea name="alamat"></textarea>

                                        @if ($errors->has('alamat'))
                                            <span class="error">
                                                <strong>{{ $errors->first('alamat') }}</strong>
                                            </span>
                                        @endif

                                    <label for="no_hp">Nomor Handphone</label>
                                        <input id="no_hp" type="text" name="no_hp">

                                        @if ($errors->has('no_hp'))
                                            <span class="error">
                                                <strong>{{ $errors->first('no_hp') }}</strong>
                                            </span>
                                        @endif

                                        <button type="submit">Lanjut ke Pembayaran</button>
                                </form>
                        </div>
                        @endif
                    </div>

                    <div class="span_3_of_1">
                        <div class="cart-items newitems">
                            <h3>Barang di Keranjang</h3>
                            @foreach(carts() as $cart)
                            <p class="title">{{ $cart->name }} </p>
                            <span class="right">{{ number_format($cart->subtotal , 0, '', '.') }}</span>
                            @endforeach
                            <p class="total">TOTAL</p>
                            <span class="right">{{ number_format(array_sum(array_pluck(carts(), 'subtotal')) , 0, '', '.') }}</span>
                        </div>
                    </div>
                </div>
                @endif

                @if(session()->has('transaksi'))
                <div id="pembayaran-field" class="well active">
                    <h1 class="text-center">Terima Kasih, Pesanan Anda Akan Segera di Kirim.</h1>
                    <hr>
                    <p>Hai <b>{{ auth()->user()->name }}</b>, </p>
                    <p>Terima kasih telah berbelanja di <b>Toko Online</b>.</p>
                    <p>Kami telah mengirimkan detail pesanan anda ke email <span class="email">{{ auth()->user()->email }}</span>. Silahkan cek inbox atau spam.</p>
                    <p>Silahkan ikuti petunjuk dibawah ini untuk memproses pesanan barang anda lebih lanjut.</p>
                    <div class="confirmations">
                        <div class="column_3">
                            <img src="{{ url('assets/images/cart1.png') }}">
                            <p>Transfer uang tunai ke rekening bank <b>"Toko Online"</b>, dengan mencamtunkan nomor kode pemesanan.</p>
                        </div>
                        <div class="column_3">
                            <img src="{{ url('assets/images/cart2.png') }}">
                            <p>Lakukan <a href="/konfirmasi_pembayaran">konfirmasi pembayaran</a> dengan mengisikan data pada form yang telah disediakan.</p>
                        </div>
                        <div class="column_3">
                            <img src="{{ url('assets/images/cart3.png') }}">
                            <p>Proses pengiriman barang akan segera dilakukan setelah anda mengkonfirmasi pembayaran.</p>
                        </div>
                    </div>
                    <div class="text-center">
                        <p>Kode Pemesanan Anda:</p>
                        <span class="kode_pemesanan">{{ session('transaksi')->kd_transaksi }}</span>
                        <p>Jumlah uang yang harus ditransfer : Rp. {{ number_format(session('transaksi')->total_pembayaran, 2, ',', '.') }}</p>
                        <p>Silahkan untuk melakukan transfer ke rekening bank <b>"Toko Online"</b>.</p>
                        <p>Kemudian lakukan <a href="/konfirmasi_pembayaran">konfirmasi pembayaran</a></p>
                    </div>
                </div>
                <?php cart_destroy(); ?>
                @endif
            </div>          
        </div>
    </div>

@endsection
