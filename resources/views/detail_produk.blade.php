@include('cart.keranjang')
<h3>{{ $produk->judul }}</h3>
<p>Harga: {{ $produk->harga }}</p>
<p>Deskripsi: <br/>{{ $produk->deskripsi }}</p>
<form action="{{ url('cart/tambah') }}" method="post">
	{!! csrf_field() !!}
	<input type="hidden" name="config_id" value="{{ $produk->id }}">
	<input type="hidden" name="type_cart" value="belanja">
	Stok : {{ $produk->stok->jumlah }} barang
	<input type="number" name="jumlah" min="1" max="{{ $produk->stok->jumlah }}" value="1">
	<button type="submit">tambah ke keranjang</button>
</form>

<a href="{{ url('/') }}">Kembali</a>