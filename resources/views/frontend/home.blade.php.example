<<<<<<< HEAD
@extends('frontend.partials.main')

@section('content')


<div class="banner">
<div class="container">
<section class="rw-wrapper">
				<h1 class="rw-sentence">
					<span>Fashion &amp; Beauty</span>
					<div class="rw-words rw-words-1">
						<span>Beautiful Designs</span>
						<span>Sed ut perspiciatis</span>
						<span> Totam rem aperiam</span>
						<span>Nemo enim ipsam</span>
						<span>Temporibus autem</span>
						<span>intelligent systems</span>
					</div>
					<div class="rw-words rw-words-2">
						<span>We denounce with right</span>
						<span>But in certain circum</span>
						<span>Sed ut perspiciatis unde</span>
						<span>There are many variation</span>
						<span>The generated Lorem Ipsum</span>
						<span>Excepteur sint occaecat</span>
					</div>
				</h1>
			</section>
			</div>
</div>
	<!--content-->
		<div class="content">
			<div class="container">

				<!--products-->
			<div class="content-mid">
				<h3>Trending Items</h3>
				<label class="line"></label>
				<div class="mid-popular">

          {{-- content produk --}}
	         @foreach($produk as $p)


					<div class="col-md-3 item-grid simpleCart_shelfItem">
					<div class=" mid-pop">
					<div class="pro-img">
						<img src="asset/images/pc.jpg" class="img-responsive" alt="">
						<div class="zoom-icon ">
						<a class="picture" href="asset/images/pc.jpg" rel="title" class="b-link-stripe b-animate-go  thickbox"><i class="glyphicon glyphicon-search icon "></i></a>
						<a href="single.html"><i class="glyphicon glyphicon-menu-right icon"></i></a>
						</div>
						</div>
						<div class="mid-1">
						<div class="women">
						<div class="women-top">
							<span>Women</span>
							<h6><a href="{{ url('produk/'.$p->slug) }}">{{ $p->judul }}</a></h6>
							</div>
							<div class="img item_add">
								{{-- <a href="#"></a> --}}

                <form action="{{ url('cart/tambah') }}" method="post">
            			{!! csrf_field() !!}
            			<input type="hidden" name="config_id" value="{{ $p->id }}">

            			@if( $p->stok->jumlah != 0 )
            				<input type="hidden" name="jumlah" min="1" max="{{ $p->stok->jumlah }}" value="1">
            			@endif
            			@if( $p->stok->jumlah != 0 )
            			     <button type="submit" name="submit" value="belanja"><img src="asset/images/ca.png" alt=""></button>
            			@else <b>Hub. CS</b> @endif
            			{{-- <button type="submit" name="submit" value="favorit">tambah ke favorit</button> --}}
            		</form>

							</div>
							<div class="clearfix"></div>
							</div>
							<div class="mid-2">
								<p >Rp. {{ $p->harga }}</p>

								</div>

								<div class="clearfix"></div>
							</div>

						</div>
					</div>
					</div>

          @endforeach

					@include('frontend.partials.keranjang')
          {{-- end content produk --}}

					<div class="clearfix"></div>
				</div>
			</div>
			<!--//products-->

@endsection
=======
<h1>All Product</h1>

@include('frontend.partials.keranjang')

<form action="{{ url('produks') }}">
	<input type="text" name="search[keywords]" placeholder="Find produk here.">
	<button type="submit"> Search</button>
</form>

<ul>
	@foreach($produk as $p)
	<li>
		<h4><a href="{{ url('produk/'.$p->slug) }}">{{ $p->judul }}</a></h4>
		<p>Harga: {{ $p->harga }}</p>
		<p>Deskripsi: <br/>{{ $p->deskripsi }}</p>
		<form action="{{ url('cart/tambah') }}" method="post">
			{!! csrf_field() !!}
			<input type="hidden" name="config_id" value="{{ $p->id }}">
			Stok : {{ $p->stok->jumlah }} barang
			<input type="number" name="jumlah" min="1" max="{{ $p->stok->jumlah }}" value="1"> 
			<button type="submit" name="submit" value="belanja">tambah ke keranjang</button> 
			<button type="submit" name="submit" value="favorit">tambah ke favorit</button>
		</form>
	</li>
	@endforeach
</ul>
>>>>>>> c1d254b794019644fb1bb86ff4d59b6edd359e8c
