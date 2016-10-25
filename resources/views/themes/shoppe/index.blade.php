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
                <div class="grid_1_of_4 images_1_of_4">
                    <a href="preview.html"><img src="images/new-pic1.jpg" alt="" /></a>
                    <h2>Lorem Ipsum is simply </h2>
                    <div class="price-details">
                        <div class="price-number">
                            <p><span class="rupees">$849.99</span></p>
                        </div>
                        <div class="add-cart">
                            <h4><a href="preview.html">Add to Cart</a></h4>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
                <div class="grid_1_of_4 images_1_of_4">
                    <a href="preview.html"><img src="images/new-pic2.jpg" alt="" /></a>
                    <h2>Lorem Ipsum is simply </h2>
                    <div class="price-details">
                        <div class="price-number">
                            <p><span class="rupees">$599.99</span></p>
                        </div>
                        <div class="add-cart">
                            <h4><a href="preview.html">Add to Cart</a></h4>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
                <div class="grid_1_of_4 images_1_of_4">
                    <a href="preview.html"><img src="images/new-pic4.jpg" alt="" /></a>
                    <h2>Lorem Ipsum is simply </h2>
                    <div class="price-details">
                        <div class="price-number">
                            <p><span class="rupees">$799.99</span></p>
                        </div>
                        <div class="add-cart">
                            <h4><a href="preview.html">Add to Cart</a></h4>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
                <div class="grid_1_of_4 images_1_of_4">
                    <a href="preview.html"><img src="images/new-pic3.jpg" alt="" /></a>
                    <h2>Lorem Ipsum is simply </h2>
                    <div class="price-details">
                        <div class="price-number">
                            <p><span class="rupees">$899.99</span></p>
                        </div>
                        <div class="add-cart">
                            <h4><a href="preview.html">Add to Cart</a></h4>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
