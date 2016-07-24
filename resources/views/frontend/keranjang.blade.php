<<<<<<< HEAD
<h3>Login</h3>
<form>
	<input type="text" name="">
</form>

<h3>Mendaftar</h3>
<form action="">
	<input type="text" name="name" placeholder="Nama">
	<input type="email" name="email" placeholder="Email">
	<input type="" name="email" placeholder="Email">
</form>
=======
@extends('frontend.partials.main')

@section('content')

<style media="screen">
  table, th, td {
    border: 1px solid black;
  }
  th {
    text-align: center;
  }
  td {
    text-align: center; 
  }
</style>

<div class="banner-top">
	<div class="container">
		<h1>Checkout</h1>
		<em></em>
		<h2><a href="index.html">Home</a><label>/</label>Checkout</a></h2>
	</div>
</div>

@if(count($carts) > 0)

<div class="container">
	<div class="check-out">
	<div class="bs-example4" data-example-id="simple-responsive-table">
    <div class="table-responsive">
    <table class="table-heading simpleCart_shelfItem">
		  <tr>
			<th class="table-grid">Produk</th>

			<th>Jumlah Item</th>
			<th >Harga Barang </th>
			<th>Total</th>
		  </tr>

      @foreach($carts as $cart)

		  <tr class="cart-header">

			<td>{{ $cart->name }}	</td>
			<td>{{ $cart->qty }}</td>
			<td>Rp.{{ $cart->price }}</td>
			<td class="item_price">Rp.{{ $total = $cart->price * $cart->qty }}</td>

		  </tr>

      @endforeach

	</table>
	</div>
	</div>
	<div class="produced">
	<a href="single.html" class="hvr-skew-backward">Produced To Buy</a>
	 </div>
    </div>
</div>
@else
  belum ada barang yang di beli
@endif

@endsection
>>>>>>> 325ead55446daa2b9d194ff4374327ca41286aaf
