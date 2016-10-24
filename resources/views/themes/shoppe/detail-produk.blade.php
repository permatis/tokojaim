@extends('themes/shoppe/partials/main')
@section('content')
	<div class="header">
    @include('themes.shoppe.partials.navbar')
    </div>
    <div class="main">
		<div class="content">
		    <div class="section group">
		        <div class="cont-desc span_1_of_2">
		            <div class="product-details">
		                <div class="grid images_3_of_2">
		                    <div id="container">
		                        <div id="products_example">
		                            <div id="products">
		                                <div class="slides_container">
		                                	@foreach($produk->gambar as $gb)
		                                    	<a href="#" target="_blank"><img src="{{ asset('fileimages/'.$gb->file) }}" alt=" " /></a>
		                                    @endforeach
		                                </div>
		                                <ul class="pagination">
		                                	@foreach($produk->gambar as $g)
		                                    <li><a href="#"><img src="{{ asset('fileimages/'.$g->file) }}" alt=" "/></a></li>
		                                    @endforeach
		                                </ul>
		                            </div>
		                        </div>
		                    </div>
		                </div>
		                <div class="desc span_3_of_2">
		                    <h2>{{ $produk->judul }}</h2>
		                    <div class="available">
			                    <div class="price">
			                        <p>Harga : <span>{{ number_format($produk->harga, 0, '', '.') }}</span></p>
			                    </div>
			                    <p>Kategori :  <a href="{{ $kategori_link }}">{{ $produk->kategori[0]->nama }}</a></p>
			                    <p>Jumlah : 
			                    	<select>
	                            		@for($i = 1; $i < 10; $i++)
										<option>{{ $i }}</option>
										@endfor
									</select>
								</p>
			                        
		                    </div>
		                    <div class="share-desc">
								<div class="button"><span><a href="#">Add to Cart</a></span></div>					
								<div class="clear"></div>
							</div>
		                </div>
		                <div class="clear"></div>
		            </div>
		            <div class="product_desc">
		                <div id="horizontalTab">
		                    <ul class="resp-tabs-list">
		                        <li>Product Details</li>
		                        <li>product Tags</li>
		                        <div class="clear"></div>
		                    </ul>
		                    <div class="resp-tabs-container">
		                        <div class="product-desc">
		                            {!! $produk->deskripsi !!}
		                        </div>

		                        <div class="product-tags">
		                            @foreach($produk->tag as $tag)
		                            	{{ $tag->nama }} 
		                            @endforeach
		                        </div>
		                    </div>
		                </div>
		            </div>
		            <script type="text/javascript">
		                $(document).ready(function() {
		                    $('#horizontalTab').easyResponsiveTabs({
		                        type: 'default', //Types: default, vertical, accordion           
		                        width: 'auto', //auto or any width like 600px
		                        fit: true // 100% fit in a container
		                    });
		                });
		            </script>
		        </div>
		        <div class="rightsidebar span_3_of_1">
		            <h2>CATEGORIES</h2>
		            <ul>
		                <li><a href="#">Mobile Phones</a></li>
		                <li><a href="#">Desktop</a></li>
		                <li><a href="#">Laptop</a></li>
		                <li><a href="#">Accessories</a></li>
		                <li><a href="#">Software</a></li>
		                <li><a href="#">Sports &amp; Fitness</a></li>
		                <li><a href="#">Footwear</a></li>
		                <li><a href="#">Jewellery</a></li>
		                <li><a href="#">Clothing</a></li>
		                <li><a href="#">Home Decor &amp; Kitchen</a></li>
		                <li><a href="#">Beauty &amp; Healthcare</a></li>
		                <li><a href="#">Toys, Kids &amp; Babies</a></li>
		            </ul>
		        </div>
		    </div>
		</div>
	</div>
	@push('scripts')
	<script>
		$(function(){
			$('#products').slides({
				preload: true,
				preloadImage: 'img/loading.gif',
				effect: 'slide, fade',
				crossfade: true,
				slideSpeed: 350,
				fadeSpeed: 500,
				generateNextPrev: true,
				generatePagination: false
			});
		});
	</script>
	@endpush
@endsection