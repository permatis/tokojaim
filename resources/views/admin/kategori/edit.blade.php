@extends('partials.main')
@section('content')
    {!! Form::open(array('route' => ['admin.kategori.update', $kategori->id], 'method' => 'put')) !!}
		<div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Kategori</h3>
            </div>
			<div class="box-body">
				<div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
					<label>Nama Kategori</label>
					<input name="nama" class="form-control" placeholder="Nama Kategori" type="text" value="{{ $kategori->nama }}">
					</input>
                    @if ($errors->has('nama'))
                        <span class="text-danger">{{ $errors->first('nama') }}</span>
                    @endif
				</div>
				<div class="form-group{{ $errors->has('parent_id') ? ' has-error' : '' }}">
					<label for="parent_id">Parent Kategori</label>
					<select name="parent_id" class="form-control kategori" id="kategori">
						<option value="0">Pilih parent kategori</option>
						@foreach($parent_id as $parent)
						@if(!empty($parent->id))
							<?php
							$childs = \App\Models\Kategori::where('parent_id', $parent->id)->get();
							?>
							@if(!empty($childs))
								<optgroup label="{{ $parent->nama }}">
								<option value="{{ $parent->id }}" {{ ( $parent->id == $kategori->parent_id) ? 'selected' : '' }}>{{ $parent->nama }}</option>
									@foreach($childs as $child)
									<option value="{{ $child->id }}">{{ $child->nama }}</option>
									@endforeach
								</optgroup>
							@else
								<option value="{{ $parent->id }}" {{ ( $parent->id == $kategori->parent_id) ? 'selected' : '' }}>{{ $parent->nama }}</option>
							@endif
						@endif
						@endforeach
					</select>

                    @if ($errors->has('parent_id'))
                        <span class="text-danger">{{ $errors->first('parent_id') }}</span>
                    @endif
				</div>
				<div class="form-group{{ $errors->has('deskripsi') ? ' has-error' : '' }}">
					<label>Deskripsi Kategori</label>
					<textarea name="deskripsi" class="form-control" id="textarea" rows="8">{!! $kategori->deskripsi !!}</textarea>

                    @if ($errors->has('deskripsi'))
                        <span class="text-danger">{{ $errors->first('deskripsi') }}</span>
                    @endif
				</div>
            </div>

            <div class="box-footer">
             	<button type="submit" class="btn btn-info pull-right">Update</button>
            </div>
		</div>
    {!! Form::close() !!}
@endsection
