@if(count(carts()) > 0)
<?php $no = 1; ?>
<table>
	<tr>
		<th>No</th>
		<th>Nama Barang</th>
		<th>Harga</th>
		<th>Qty</th>
		<th>Total</th>
		<th>Action</th>
	</tr>
	@foreach(carts() as $cart)
	<tr>
		<td>{{ $no++ }}</td>
		<td>{{ $cart->name }}</td>
		<td>{{ $cart->price }}</td>
		<td>{{ $cart->qty }}</td>
		<td>{{ $total = $cart->price * $cart->qty }}</td>
		<td>
			<form action="{{ url('cart/'.$cart->rowid) }}" method="POST">
			{!! csrf_field(); !!}
			<input type="hidden" name="_method" value="DELETE">
			<input type="hidden" name="type_cart" value="belanja">
			<button type="submit">Hapus</button>
			</form>
		</td>
	</tr>
	@endforeach
	<tr>
		<td colspan="4" align="right">Sub Total</td>
		<td colspan="2"><b>{{ \Cart::total() }}</b></td>
	</tr>
</table>
@endif