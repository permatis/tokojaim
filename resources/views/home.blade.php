<h1>All Product</h1>

@include('cart.keranjang')

<ul>
	@foreach($produk as $p)
	<li>
		<h4><a href="{{ url('produk/'.$p->slug) }}">{{ $p->judul }}</a></h4>
		<p>Harga: {{ $p->harga }}</p>
		<p>Deskripsi: <br/>{{ $p->deskripsi }}</p>
		<form action="{{ url('cart/tambah') }}" method="post">
			{!! csrf_field() !!}
			<input type="hidden" name="config_id" value="{{ $p->id }}">
			<input type="hidden" name="type_cart" value="belanja">
			Stok : {{ $p->stok->jumlah }} barang
			<input type="number" name="jumlah" min="1" max="{{ $p->stok->jumlah }}" value="1">
			<button type="submit">tambah ke keranjang</button>
		</form>
	</li>
	@endforeach
</ul>
