@extends('themes/shoppe/partials/main')
@section('content')
    <div class="header">
        @include('themes.shoppe.partials.navbar')
        @include('themes.shoppe.partials.slider')
    </div>
    <div class="main">
        <div class="content">
            <div class="content_top">
                <div class="heading">
                    <h3>New Products</h3>
                </div>
                <div class="see">
                    <p><a href="#">See all Products</a></p>
                </div>
                <div class="clear"></div>
            </div>
            <div class="section group">
                @foreach($produk as $p)
                <div class="grid_1_of_4 images_1_of_4">
                    <a href="{{ url('produk/'.$p->slug) }}">
                        <img src="{{ asset('fileimages/'.$p->gambar()->first()->file) }}" alt="{{ $p->gambar()->first()->nama }}" />
                        <h2>{{ $p->judul }}</h2>
                    </a>
                    <div class="price-details">
                        <div class="price-number">
                            <p><span class="harga">Rp. {{ number_format($p->harga, 0, '', '.') }}</span></p>
                        </div>
                        <div class="add-cart">
                            <form action="{{ url('cart/tambah') }}" method="post">
                                {!! csrf_field() !!}
                                <input type="hidden" name="config_id" value="{{ $p->id }}">
                                <input type="hidden" name="jumlah" value="1">
                                <button type="submit" name="submit" value="belanja">Add Cart</button>
                            </form>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="content_bottom">
                <div class="heading">
                    <h3>Feature Products</h3>
                </div>
                <div class="see">
                    <p><a href="#">See all Products</a></p>
                </div>
                <div class="clear"></div>
            </div>
            <div class="section group">
                @foreach($featured as $f)
                <div class="grid_1_of_4 images_1_of_4">
                    <a href="{{ url('produk/'.$f->slug) }}">
                        <img src="{{ asset('fileimages/'.$f->gambar()->first()->file) }}" alt="{{ $f->gambar()->first()->nama }}" />
                        <h2>{{ $f->judul }}</h2>
                    </a>
                    <div class="price-details">
                        <div class="price-number">
                            <p><span class="harga">Rp. {{ number_format($f->harga, 0, '', '.') }}</span></p>
                        </div>
                        <div class="add-cart">
                            <form action="{{ url('cart/tambah') }}" method="post">
                                {!! csrf_field() !!}
                                <input type="hidden" name="config_id" value="{{ $f->id }}">
                                <input type="hidden" name="jumlah" value="1">
                                <button type="submit" name="submit" value="belanja">Add Cart</button>
                            </form>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
