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
