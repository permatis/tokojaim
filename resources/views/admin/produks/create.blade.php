@extends('admin.partials.main')

@section('content')
    <section class="content-header">
          <h1>
            Tambah Produk
          </h1>
    </section>
    <section class="content">
    	<div class="row">
            {!! Form::open(array('route' => 'admin.produks.store', 'files' => true)) !!}
    		<div class="col-md-9">
    			<div class="box box-primary">				
    				<div class="box-body">
    					<div class="form-group">
    						<label>judul</label>
    						<input name="judul" class="form-control" placeholder="judul" type="text">		
    						</input>
    					</div>
    					
    					<div class="form-group">
    						<label>deskripsi</label>
    						<textarea name="deskripsi" class="form-control" id="textarea" rows="8"></textarea>
    						</input>
    					</div>
                        
                        <div class="form-group">
                            <label class="control-label">Gambar</label>
                            <input id="gambar" type="file" multiple="true" name="gambar_id[]">
                        </div>
                    </div>
    			</div>
    		</div>

    		<div class="col-md-3">
    			<div class="box box-primary">
                   <div class="box-body">
                        <div class="form-group">
                            <label>harga</label>
                            <input name="harga" id="rupiah" class="form-control" placeholder="harga" type="hidden">
                            <input id="rupiah2" class="form-control" placeholder="harga" type="text">
                            </input>
                        </div>
                        <label>berat</label>
                        <div class="input-group">
                            <input name="berat" class="form-control" placeholder="berat" type="text">
                            <span class="input-group-addon">gram</span>
                            </input>
                        </div><br>
                        <div class="form-group">
                            <label>stok</label>
                            <input name="stok" class="form-control" placeholder="stok" type="text">
                            </input>
                        </div>

                   </div>
                    <div class="box-footer">
                     <button type="submit" class="btn btn-info pull-right">Publish</button>
                    </div>

                </div>
    		</div>
            {!! Form::close() !!}
    	</div>
    </section>





@endsection