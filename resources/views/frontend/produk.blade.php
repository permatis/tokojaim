@extends('frontend.partials.main')

@section('content')
<div class="products">
	<div class="col-md-3">
		<div class="single-bottom">
			<h4>Brands</h4>
			<ul>
			<li>
				<input type="checkbox"  id="brand" value="">
				<label for="brand"><span></span> Contrary belief</label>
			</li>
			<li>
				<input type="checkbox"  id="brand1" value="">
				<label for="brand1"><span></span> Lorem Ipsum</label>
			</li>
			<li>
				<input type="checkbox"  id="brand2" value="">
				<label for="brand2"><span></span> Fusce feugiat</label>
			</li>
			<li>
				<input type="checkbox"  id="brand3" value="">
				<label for="brand3"><span></span> Contrary belief</label>
			</li>
			<li>
				<input type="checkbox"  id="brand4" value="">
				<label for="brand4"><span></span>Injected humour</label>
			</li>
			</ul>
		</div>
		<div class="single-bottom">
			<h4>Colors</h4>
			<ul>
			<li>
				<input type="checkbox"  id="color" value="">
				<label for="color"><span></span> Red</label>
			</li>
			<li>
				<input type="checkbox"  id="color1" value="">
				<label for="color1"><span></span> Blue</label>
			</li>
			<li>
				<input type="checkbox"  id="color2" value="">
				<label for="color2"><span></span> Black</label>
			</li>
			<li>
				<input type="checkbox"  id="color3" value="">
				<label for="color3"><span></span> White</label>
			</li>
			<li>
				<input type="checkbox"  id="color4" value="">
				<label for="color4"><span></span>Green</label>
			</li>
			</ul>
		</div>
	</div>

	<div class="col-md-9">
		<div class="product">
			<h2 class="new">NEW ARRIVALS</h2>
			<div class="pink">
				<div class="col-md-4 box-in-at">
					<div class=" grid_box portfolio-wrapper">
						<a href="single.html" >
							<img src="{{ URL::asset('assets/images/fa.jpg') }}" class="img-responsive" alt="">
							<div class="zoom-icon">
								<h5>Food blade</h5>
							</div>
						</a>
					</div>
					<div class="grid_1 simpleCart_shelfItem">
						<a href="#" class="cup item_add">
							<span class=" item_price" >$ 3000 <i></i> </span>
						</a>
					</div>
				</div>
				<div class="col-md-4 box-in-at">
					<div class="grid_box portfolio-wrapper">
						<a href="single.html" > <img src="{{ URL::asset('assets/images/fa4.jpg') }}" class="img-responsive" alt=""></a> 	
			        </div>
			        <div class="grid_1 simpleCart_shelfItem">
			        	<a href="#" class="cup item_add"><span class=" item_price" >123 $ <i> </i> </span></a>					
					</div>
				</div>
				<div class="col-md-4 box-in-at">
					<div class="grid_box portfolio-wrapper">
						<a href="single.html" > <img src="{{ URL::asset('assets/images/fa4.jpg') }}" class="img-responsive" alt=""></a> 	
			        </div>
			        <div class="grid_1 simpleCart_shelfItem">
			        	<a href="#" class="cup item_add"><span class=" item_price" >123 $ <i> </i> </span></a>					
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
</div>
@endsection