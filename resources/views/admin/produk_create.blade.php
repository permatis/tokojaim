@extends('admin.part.main')

@section('content')



    <section class="content-header">
          <h1>
            Tambah Produk
          </h1>
    </section>
    <section class="content">
    	<div class="row">
            {!! Form::open(array('route' => 'admin.produk.store')) !!}
    		<div class="col-md-8">
    			<div class="box box-primary">				
    					<div class="box-body">
    						<div class="form-group">
    							<label>judul</label>
    							<input name="judul" class="form-control" placeholder="judul" type="text">						
    							</input>
    						</div>
    						
    						<div class="form-group">
    							<label>deskripsi</label>
    							<textarea name="deskripsi" class="form-control" rows="8"></textarea>
    							</input>
    						</div>
    					</div>
    				
    			</div>
    		</div>

    		<div class="col-md-4">
    			<div class="box box-primary">
                   <div class="box-body">
                            <div class="form-group">
                                <label>harga</label>
                                <input name="harga" class="form-control" placeholder="harga" type="text">
                                </input>
                            </div>
                            <div class="form-group">
                                <label>berat</label>
                                <input name="berat" class="form-control" placeholder="berat" type="text">
                                </input>
                            </div>
                            <div class="form-group">
                                <label>stok</label>
                                <input name="stok" class="form-control" placeholder="stok" type="text">
                                </input>
                            </div>
                   </div>
                   <div class="box-footer">
                    <button type="submit" class="btn btn-info pull-right">Simpan</button>
                  </div>
                </div>
    		</div>
            {!! Form::close() !!}
    	</div>
    </section>





@endsection