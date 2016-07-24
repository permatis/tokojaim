@extends('admin.partials.main')
@section('content')
    <section class="content-header">
          <h1>
            Tambah Brand
          </h1>
    </section>
    <section class="content">
        {!! Form::open(array('route' => 'admin.brands.store')) !!}
			<div class="box box-primary">	   				
				<div class="box-body">
					<div class="form-group">
						<label>Nama</label>
						<input name="nama" class="form-control" placeholder="Nama Tag" type="text">		
						</input>
					</div>
                </div>

                <div class="box-footer">
                 	<button type="submit" class="btn btn-info pull-right">Publish</button>
                </div>
			</div>
        {!! Form::close() !!}
    </section>

@endsection