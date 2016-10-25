@extends('themes/shoppe/partials/main')
@section('content')
    <div class="header">
        @include('themes.shoppe.partials.navbar')
    </div>
    <div class="main">
        <div class="content">
			<div class="section split">
		    	<div class="span_1_of_2">
		            <div class="content_top">
		                <div class="heading">
		                    <h3>Kategori : 
		                    	<span style="color:red">
		                    	"{{ (request()->segment(4)) ? request()->segment(4) : (request()->segment(3)) ? request()->segment(3) : request()->segment(2) }}"
		                    	</span>
		                    </h3>
		                </div>
		                <div class="see">
		                </div>
		                <div class="clear"></div>
		            </div>
		            <div class="section group">
		            	@if( count($produks) > 0 )
		                @foreach($produks as $p)
		                <div class="grid_1_of_4 images_1_of_4">
		                    <a href="{{ url('produk/'.$p->slug) }}">

		                            <img src="{{ asset('fileimages/'.$p->gambar()->first()->file) }}" alt="{{ $p->gambar()->first()->nama }}" />
		                    <h2>{{ $p->judul }}</h2>
		                        </a>
		                    <div class="price-details">
		                        <div class="price-number">
		                            <p><span class="harga">Rp. {{ number_format($p->harga, 0, '', '.') }}</span></p>
		                        </div>
		                        <div class="add-cart">
									<form action="{{ url('cart/tambah') }}" method="post">
										{!! csrf_field() !!}
										<input type="hidden" name="config_id" value="{{ $p->id }}">
										<input type="hidden" name="jumlah" value="1">
										<button type="submit" name="submit" value="belanja">Add Cart</button>
									</form>
		                        </div>
		                        <div class="clear"></div>
		                    </div>
		                </div>
		                @endforeach
		                @else
		                <h3 class="not-found">Tidak ada produk.</h3>
		                @endif
		            </div>
		        </div>
		        <div class="span_3_of_1">
		            <div class="categories">
		                <h3>Categories</h3>
		                <ul>
		                	{!! widget_kategori() !!}
		                </ul>
		            </div>
		        	
		        </div>
		    </div>
		</div>
    </div>
@endsection