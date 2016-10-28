@extends('themes/shoppe/partials/main')
@section('content')
    <div class="header">
        @include('themes.shoppe.partials.navbar')
    </div>
    <div class="main">
        <div class="content">
			<div class="section split">
		    	<div class="span_1_of_2">
                    @if(count(carts()) > 0) 
		        	<table class="table">
		        		<thead>
		        			<tr>
		        				<th>Barang</th>
		        				<th>Harga</th>
		        				<th>Jumlah</th>
		        				<th>Subtotal</th>
		        			</tr>
		        		</thead>
		        		<tbody>
                        	@foreach(carts() as $cart)
			        		<tr>
			        			<td>
			        				<div class="images">
                            			<img src="{{ asset('fileimages/'. \App\Models\Produk::find($cart->id)->gambar()->first()->file) }}">
			        				</div>
			        				<div class="info">
				        				<div class="title">
				        					<a href="{{ url('produk/'.str_slug($cart->name)) }}">{{ $cart->name }}</a>
				        				</div>
			        				</div>
			        			</td>
			        			<td>{{ number_format($cart->price, 0, '', '.') }}</td>
			        			<td>{{ $cart->qty }}</td>
			        			<td>
			        				<div class="sub-total">
				        				<p>{{ number_format($cart->subtotal, 0, '', '.') }}</p>
			                            <form action="{{ url('cart/') }}" method="POST">
			                                {!! csrf_field(); !!}
			                                <input type="hidden" name="_method" value="DELETE">
			                                <input type="hidden" name="type_cart" value="belanja">
			                            	<button type="submit">hapus</button>
			                            </form>
		                            </div>
			        			</td>
			        		</tr>
			        		@endforeach
		        		</tbody>
		        	</table>
		        	@else
		        		<div class="empty-carts">
		        			<h3 class="text-center">Keranjang belanja masih kosong. <a href="/">lanjutkan belanja</a></h3>
		        		</div>
		        	@endif
		        </div>
		        <div class="span_3_of_1">
                    @if(count(carts()) > 0) 
		        	<div class="cart-items">
		        		<h3>Barang di Keranjang</h3>
		        		<p>Subtotal <span class="right">{{ number_format(array_sum(array_pluck(carts(), 'subtotal')) , 0, '', '.') }}</span></p>
		        		<p class="total">TOTAL <span class="right">{{ number_format(array_sum(array_pluck(carts(), 'subtotal')) , 0, '', '.') }}</span></p>
		        		<a href="/checkout">Lanjut ke Pembayaran</a>
		        	</div>
		        	@endif
		        </div>
		    </div>
        </div>
    </div>
@endsection