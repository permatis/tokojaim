@include('frontend.partials.keranjang')
<h3>{{ $produk->judul }}</h3>
<p>Harga: {{ $produk->harga }}</p>
<p>Deskripsi: <br/>{{ $produk->deskripsi }}</p>
<form action="{{ url('cart/tambah') }}" method="post">
	{!! csrf_field() !!}
	<input type="hidden" name="config_id" value="{{ $produk->id }}">
	<input type="hidden" name="type_cart" value="belanja">
	Stok : {{ $produk->stok->jumlah }} barang
	@if( $produk->stok->jumlah != 0 ) 
		<input type="number" name="jumlah" min="1" max="{{ $produk->stok->jumlah }}" value="1"> 
	@endif
	@if( $produk->stok->jumlah != 0 ) 
		<button type="submit" name="submit" value="belanja">tambah ke keranjang</button> 
	@else <b>Hub. CS</b> @endif
		<button type="submit" name="submit" value="favorit">tambah ke favorit</button>
</form>

<a href="{{ url('/') }}">Kembali</a>