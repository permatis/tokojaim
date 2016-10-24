@extends('frontend.partials.main')

@section('content')
@include('frontend.partials.banner')

	<div class="content-top">
		<h2 class="new">NEW ARRIVALS</h2>
		<div class="pink">
			<div id="owl-demo" class="owl-carousel text-center">
				<div class="item">
					<div class=" box-in">
						<div class=" grid_box">
							<a href="single.html">
								<img src="{{ URL::asset('assets/images/pi.jpg') }}" class="img-responsive" alt="">
								<h5>fuel t-shirt  mod : 9509</h5>
							</a>
					    </div>
			    		<div class="grid_1 simpleCart_shelfItem">
			    			<a href="#" class="cup item_add"><span class=" item_price" >123 $ <i> </i> </span></a>
						</div>
					</div>
				</div>

				<div class="item">
					<div class=" box-in">
						<div class=" grid_box">
							<a href="single.html" >
								<img src="{{ URL::asset('assets/images/pi12.jpg') }}" class="img-responsive" alt="">
							</a>
		           		</div>
		           		<div class="grid_1 simpleCart_shelfItem">
							<a href="#" class="cup item_add"><span class=" item_price" >123 $ <i> </i> </span></a>
						</div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>

	<div class="content-middle">
		<h2 class="middle">BEST SALES</h2>
		<div class="col-best">
			<div class="col-md-4">
				<a href="single.html"><div class="col-in">
					<div class="col-in-left">
						<img src="{{ URL::asset('assets/images/ni.jpg') }}" class="img-responsive" alt="">
					</div>
					</a>
					<div class="col-in-right grid_1 simpleCart_shelfItem">
						<h5>fuel t-shirt  mod : 9509</h5>
						<ul class="star">
							<li><a href="#"><i> </i> </a> </li>
							<li><a href="#"><i> </i> </a> </li>
							<li><a href="#"><i> </i> </a> </li>
							<li><i class="in-star"> </i>  </li>
						</ul>
						<!---->
						<a href="#" class="item_add"><span class="white item_price" >123 $ <i> </i> </span></a>
						<!---->
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-4">
				<a href="single.html"><div class="col-in">
					<div class="col-in-left">
						<img src="{{ URL::asset('assets/images/ni1.jpg') }}" class="img-responsive" alt="">
					</div>
					</a>
					<div class="col-in-right grid_1 simpleCart_shelfItem">
						<h5>fuel t-shirt  mod : 9509</h5>
						<ul class="star">
							<li><i> </i>  </li>
							<li><i> </i>  </li>
							<li><i> </i>  </li>
							<li><i class="in-star"> </i>  </li>
						</ul>
						<!---->
						<a href="#" class="item_add"><span class="white item_price" >123 $ <i> </i> </span></a>
						<!---->
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-4">
				<a href="single.html"><div class="col-in">
					<div class="col-in-left">
						<img src="{{ URL::asset('assets/images/ni.jpg') }}" class="img-responsive" alt="">
					</div>
					</a>
					<div class="col-in-right grid_1 simpleCart_shelfItem">
						<h5>fuel t-shirt  mod : 9509</h5>
						<ul class="star">
							<li><i> </i>  </li>
							<li><i> </i>  </li>
							<li><i> </i>  </li>
							<li><i class="in-star"> </i>  </li>
						</ul>
						<!---->
						<a href="#" class="item_add"><span class="white item_price" >123 $ <i> </i> </span></a>
						<!---->
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>

	<div class="content-bottom" style="margin-bottom: 40px;">
		<div class="col-md-8 latter">
			<h6>NEWSLETTER</h6>
			<p>sign up now to our newsletter discount! to get the Welcome discount</p>

			<div class="clearfix"> </div>
		</div>
		<div class="col-md-4 latter-right">
			<form>
				<div class="join">
					<input type="text" value="your email here" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'your email here';}">
					<i> </i>
				</div>
				<input type="submit" value="join us">
			</form>
		</div>
		<div class="clearfix"> </div>
	</div>
@endsection
