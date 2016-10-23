@extends('admin.partials.main')
@section('content')
    {!! Form::open(array('route' => ['admin.tags.update', $tag->id], 'method' => 'put')) !!}
		<div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Tambah Tag</h3>
            </div>
			<div class="box-body">
				<div class="form-group"{{ $errors->has('nama') ? ' has-error' : '' }}>
					<label>Tambahkan tag baru</label>
					<input name="nama" class="form-control" value="{{ $tag->nama }}" type="text" id="tags">
					</input>
                    @if ($errors->has('nama'))
                        <span class="text-danger">{{ $errors->first('nama') }}</span>
                    @endif
				</div>
            </div>

            <div class="box-footer">
             	<button type="submit" class="btn btn-info pull-right">Publish</button>
            </div>
		</div>
    {!! Form::close() !!}

@endsection
