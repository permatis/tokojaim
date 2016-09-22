{!! Form::open(['url' => 'uploader', 'files' => true]) !!}
	
	{!! Form::file('gambar[]', ['multiple' => 'multiple']) !!}

	{!! Form::submit('Simpan') !!}

{!! Form::close() !!}