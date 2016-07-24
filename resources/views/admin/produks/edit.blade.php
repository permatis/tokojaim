@extends('admin.partials.main')
@section('content')
   <section class="content-header">
          <h1>
            Edit Produk
          </h1>
    </section>
    <section class="content">
    	<div class="row">
			{!! Form::open(['url' => 'admin/produks/'.$produk->id, 'method' => 'put']) !!}

    		<div class="col-md-9">
    			<div class="box box-primary">				
    					<div class="box-body">
    						<div class="form-group">
    							<label>judul</label>
    							<input name="judul" class="form-control" placeholder="judul" type="text" value="{{ $produk->judul }}">		
    							</input>
    						</div>
    						
    						<div class="form-group">
    							<label>deskripsi</label>
    							<textarea name="deskripsi" class="form-control" id="textarea" rows="8">
    								{!! $produk->deskripsi !!}
    							</textarea>
    							</input>
    						</div>
    					</div>
    				
    			</div>
    		</div>

    		<div class="col-md-3">
    			<div class="box box-primary">
                    <div class="box-body">
                        <div class="form-group">
                            <label>harga</label>
                            <input name="harga" id="rupiah" class="form-control" placeholder="harga" type="hidden" value="{{ $produk->harga }}">
                            <input id="rupiah2" class="form-control" placeholder="harga" type="text" value="{{ $produk->harga }}">
                            </input>
                        </div>
                        <label>berat</label>
                        <div class="input-group">
                            <input name="berat" class="form-control" placeholder="berat" type="text" value="{{ $produk->berat }}">
                            <span class="input-group-addon">gram</span>
                            </input>
                        </div><br>
                        <div class="form-group">
                            <label>stok</label>
                            <input name="stok" class="form-control" placeholder="stok" type="text" value="{{ $produk->stok->jumlah }}">
                            </input>
                        </div>
                   </div>
                    <div class="box-footer">
                     <button type="submit" class="btn btn-info pull-right">Updated</button>
                    </div>

                </div>
    		</div>
            {!! Form::close() !!}
    	</div>
    </section>
@endsection