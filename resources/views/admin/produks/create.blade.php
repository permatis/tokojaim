@extends('admin.partials.main')

@section('content')
    {!! Form::open(array('route' => 'admin.produks.store', 'files' => true)) !!}
		<div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Tambah Produk</h3>
            </div>				
			<div class="box-body">

				<div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
					<label>Nama Produk</label>
					<input name="judul" class="form-control" placeholder="Masukkan nama produk" type="text">		
					</input>
				</div>
                
                <div class="form-group{{ $errors->has('kategori') ? ' has-error' : '' }}">
                    <label for="kategori">Kategori</label>
                    <select name="kat_id" class="form-control" id="kategori">
                        <option value="">Pilih Kategori</option>
                        @foreach($kategori as $kat)
                        @if(!empty($kat->id))
                            <?php
                            $childs = \App\Models\Kategori::where('parent_id', $kat->id)->orderBy('nama', 'ASC')->get();
                            ?>
                            @if(!empty($childs))
                                <optgroup label="{{ ucwords(str_replace('-', ' ', $kat->nama)) }}"></optgroup>
                                    @foreach($childs as $child)
                                    <?php
                                    $subs = \App\Models\Kategori::where('parent_id', $child->id)->orderBy('nama', 'ASC')->get();
                                    ?>
                                    @if($subs)
                                    <option value="{{ $child->id }}">{{ ucwords(str_replace('-', ' ', $child->nama)) }}</option>
                                        @foreach($subs as $key => $val)
                                        @if($key == 0)
                                        <optgroup label="&nbsp;&nbsp;&nbsp;&nbsp;{{ ucwords(str_replace('-', ' ', $child->nama)) }}"></optgroup>
                                        @endif
                                        <option value="{{ $val->id }}">&nbsp;&nbsp;&nbsp;&nbsp;{{ ucwords(str_replace('-', ' ', $val->nama)) }}</option>
                                        @endforeach
                                    @endif
                                    @endforeach
                            @else
                                <option value="{{ $kat->id }}">{{ ucwords(str_replace('-', ' ', $kat->nama)) }}</option>
                            @endif
                        @endif
                        @endforeach
                    </select>
                </div>
				
				<div class="form-group{{ $errors->has('deskripsi') ? ' has-error' : '' }}">
					<label>Deskripsi Produk</label>
					<textarea name="deskripsi" class="form-control" id="textarea" rows="8"></textarea>
					</input>
				</div>
                    
                <div class="form-group{{ $errors->has('gambar') ? ' has-error' : '' }}">
                    <label class="control-label">Gambar Produk</label>
                    <input id="gambar" type="file" multiple="true" name="gambar[]">
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('berat') ? ' has-error' : '' }}">
                            <label>Perkiraan berat</label>
                            <div class="input-group">
                                <input name="berat" class="form-control" placeholder="berat" type="text">
                                    <span class="input-group-addon">kg</span>
                                </input>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('stok') ? ' has-error' : '' }}">
                            <label>Stok</label>
                            <input name="stok" class="form-control" placeholder="stok" type="text">
                            </input>
                        </div>
                    </div>
                </div>

                <div class="form-group{{ $errors->has('harga') ? ' has-error' : '' }}">
                    <label>Harga</label>
                    <input name="harga" id="rupiah" class="form-control" placeholder="harga" type="hidden">
                    <input id="rupiah2" class="form-control" placeholder="harga" type="text">
                </div>

                <div class="form-group{{ $errors->has('tag') ? ' has-error' : '' }}">
                    <label>Tags</label>
                    <input name="tag" class="form-control" placeholder="Pilih tag" type="text" id="tags"/>
                </div>

            </div>

            <div class="box-footer">
                <div class="pull-right">
                    <a  href="{{ URL::to('admin/produks') }}" class="btn btn-default">Kembali</a> &nbsp;
                    <button type="submit" class="btn btn-primary">Simpan</button> 
                </div>
            </div>
		</div>
    {!! Form::close() !!}

@endsection