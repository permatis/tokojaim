@extends('admin.partials.main')

@section('content')
    <section class="content-header">
          <h1>
            Tambah Kategori
          </h1>
    </section>
    <section class="content">
        {!! Form::open(array('route' => 'admin.kategori.store')) !!}
			<div class="box box-primary">				
				<div class="box-body">
					<div class="form-group">
						<label>Nama</label>
						<input name="nama" class="form-control" placeholder="Nama Kategori" type="text">		
						</input>
					</div>
					<div class="form-group">
						<label for="parent_id">Parent Kategori</label>
						<select name="parent_id" class="form-control kategori">
							<option value="0">Pilih parent kategori</option>
							@foreach($parent_id as $parent)
							@if(!empty($parent->id))
								<?php
								$childs = \App\Models\Kategori::where('parent_id', $parent->id)->get();
								?>
								@if(!empty($childs))
									<optgroup label="{{ $parent->nama }}">
									<option value="{{ $parent->id }}">{{ $parent->nama }}</option>
										@foreach($childs as $child)
										<option value="{{ $child->id }}">{{ $child->nama }}</option>
										@endforeach
									</optgroup>
								@else
									<option value="{{ $parent->id }}">{{ $parent->nama }}</option>
								@endif
							@endif
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label>Deskripsi</label>
						<textarea name="deskripsi" class="form-control" id="textarea" rows="8"></textarea>
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