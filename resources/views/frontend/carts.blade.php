@extends('frontend.partials.main')

@section('content')

	<div class="check">
	 	<div class="col-md-3 cart-total">
	 		<div class="price-details">
				<h3>Price Details</h3>
				<span>Total</span>
				<span class="total1">6200.00</span>
				<span>Discount</span>
				<span class="total1">---</span>
				<span>Delivery Charges</span>
				<span class="total1">150.00</span>
				<div class="clearfix"></div>				 
	 		</div>	
	 
			<ul class="total_price">
				<li class="last_price"> <h4>TOTAL</h4></li>	
				<li class="last_price"><span>6350.00</span></li>
				<div class="clearfix"> </div>
			</ul>

	 		<a class="continue" href="#">Checkout</a>
		</div>
		<div class="col-md-9 cart-items">
	  		<div class="pull-right">
				<a class="btn btn-success" href="#">Recalculate</a>
			</div>
	 		<h1>My Shopping Bag (2)</h1>

	 		<div class="cart-header">
		 		<div class="close1"> </div>
		 		<div class="cart-sec simpleCart_shelfItem">
					<div class="cart-item cyc">
						<img src="{{ URL::asset('assets/images/pic1.jpg') }}" class="img-responsive" alt=""/>
					</div>
			   		<div class="cart-item-info">
						<h3><a href="#">Mountain Hopper(XS R034)</a><span></span></h3>
						<ul class="qty">
							<li><p>Total Barang: <input type="number" name="qty" min="1"></p></li>
						</ul>
						
						<div class="delivery">
							<p>Harga: Rp. 1234</p>
						 	<span>Subtotal: Rp. 1234</span>
						 	<div class="clearfix"></div>
			        	</div>	
			   		</div>
			   		<div class="clearfix"></div>				
		  		</div>
			</div>

	 		<div class="cart-header2">
		 		<div class="close2"> </div>
		  		<div class="cart-sec simpleCart_shelfItem">
					<div class="cart-item cyc">
					 	<img src="{{ URL::asset('assets/images/pic2.jpg') }}" class="img-responsive" alt=""/>
					</div>
			   		<div class="cart-item-info">
						<h3><a href="#">Mountain Hopper(XS R034)</a><span>Model No: 3578</span></h3>
						<ul class="qty">
							<li><p>Size : 5</p></li>
							<li><p>Qty : 1</p></li>
						</ul>
						<div class="delivery">
					 		<p>Service Charges : Rs.100.00</p>
					 		<span>Delivered in 2-3 bussiness days</span>
					 		<div class="clearfix"></div>
		        		</div>	
			   		</div>
			   		<div class="clearfix"></div>				
		  		</div>
	  		</div>
		</div>
		<div class="clearfix"> </div>
	</div>

@endsection