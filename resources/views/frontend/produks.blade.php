<h1>Search Produk : {{ $keywords }}</h1>
@include('frontend.partials.keranjang')

<ul>
	@foreach($produks as $p)
	<li>
		<h4><a href="{{ url('produk/'.$p->slug) }}">{{ $p->judul }}</a></h4>
		<p>Harga: {{ $p->harga }}</p>
		<p>Deskripsi: <br/>{{ $p->deskripsi }}</p>
		<form action="{{ url('cart/tambah') }}" method="post">
			{!! csrf_field() !!}
			<input type="hidden" name="config_id" value="{{ $p->id }}">
			Stok : {{ $p->stok->jumlah }} barang
			@if( $p->stok->jumlah != 0 ) 
				<input type="number" name="jumlah" min="1" max="{{ $p->stok->jumlah }}" value="1"> 
			@endif
			@if( $p->stok->jumlah != 0 ) 
				<button type="submit" name="submit" value="belanja">tambah ke keranjang</button> 
			@else <b>Hub. CS</b> @endif
			<button type="submit" name="submit" value="favorit">tambah ke favorit</button>
		</form>
	</li>
	@endforeach
</ul>