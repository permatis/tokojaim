@extends('admin.partials.main')
@section('content') {{ $produk->kategori[0] }}
    {!! Form::open(['route' => ['admin.produks.update', $produk->id], 'files' => true, 'method' => 'put' ]) !!}
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Tambah Produk</h3>
            </div>
            <div class="box-body">

                <div class="form-group{{ $errors->has('judul') ? ' has-error' : '' }}">
                    <label>Nama Produk</label>
                    <input name="judul" class="form-control" placeholder="Masukkan nama produk" type="text" value="{{ $produk->judul }}"></input>
                    @if ($errors->has('judul'))
                        <span class="text-danger">{{ $errors->first('judul') }}</span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('kategori') ? ' has-error' : '' }}">
                    <label for="kategori">Kategori</label>
                    <select name="kategori" class="form-control" id="kategori">

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
                                    <option value="{{ $child->id }}" asdas>{{ ucwords(str_replace('-', ' ', $child->nama)) }}</option>
                                        @foreach($subs as $key => $val)

                                        @if($key == 0)
                                        <optgroup label="&nbsp;&nbsp;&nbsp;&nbsp;{{ ucwords(str_replace('-', ' ', $child->nama)) }}"></optgroup>
                                        @endif
                                        <option value="{{ $val->id }}"  fds {{ ( $val->id == $produk->kategori[0]->id) ? 'selected' : '' }}>
                                        &nbsp;&nbsp;&nbsp;&nbsp;{{ ucwords(str_replace('-', ' ', $val->nama)) }}
                                        </option>
                                        @endforeach
                                    @endif
                                    @endforeach
                            @else
                                <option value="{{ $kat->id }}"  {{ ( $kat->id == $produk->kategori[0]->id) ? 'selected' : '' }}>{{ ucwords(str_replace('-', ' ', $kat->nama)) }}</option>
                            @endif
                        @endif
                        @endforeach
                    </select>
                    @if ($errors->has('kategori'))
                        <span class="text-danger">{{ $errors->first('kategori') }}</span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('deskripsi') ? ' has-error' : '' }}">
                    <label>Deskripsi Produk</label>
                    <textarea name="deskripsi" class="form-control" id="textarea" rows="8">{{ $produk->deskripsi }}</textarea>
                    @if ($errors->has('deskripsi'))
                        <span class="text-danger">{{ $errors->first('deskripsi') }}</span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('gambar') ? ' has-error' : '' }}">
                    <label class="control-label">Gambar Produk</label>
                    <input id="gambar" type="file" multiple="true" name="gambar[]">
                    @if ($errors->has('gambar'))
                        <span class="text-danger">{{ $errors->first('gambar') }}</span>
                    @endif
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('berat') ? ' has-error' : '' }}">
                            <label>Perkiraan berat</label>
                            <div class="input-group">
                                <input name="berat" class="form-control" placeholder="berat" type="text" value="{{ $produk->berat }}">
                                    <span class="input-group-addon">kg</span>
                                </input>
                            </div>
                            @if ($errors->has('berat'))
                                <span class="text-danger">{{ $errors->first('berat') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('stok') ? ' has-error' : '' }}">
                            <label>Stok</label>
                            <input name="stok" class="form-control" placeholder="stok" type="text" value="{{ $produk->stok }}"></input>
                            @if ($errors->has('stok'))
                                <span class="text-danger">{{ $errors->first('stok') }}</span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-group{{ $errors->has('harga') ? ' has-error' : '' }}">
                    <label>Harga</label>
                    <input id="rupiah" class="form-control" placeholder="harga" type="hidden">
                    <input id="rupiah2" class="form-control" placeholder="harga" type="text" name="harga" value="{{ $produk->harga }}">
                    @if ($errors->has('harga'))
                        <span class="text-danger">{{ $errors->first('harga') }}</span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('tag') ? ' has-error' : '' }}">
                    <label>Tags</label>
                    <input name="tag" class="form-control" placeholder="Pilih tag" type="text" id="tags" value="" />
                    @if ($errors->has('tag'))
                        <span class="text-danger">{{ $errors->first('tag') }}</span>
                    @endif
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
    @push('script-tag')
    <script>
        $("#tags").selectize({
            delimiter: ',',
            maxItems: 5,
            valueField: 'nama',
            labelField: 'nama',
            searchField: ['nama'],
            preload: true,
            options: {!! $tag !!},
            create: function (input, callback) {
                    return { "nama": input };
            },
            render: {
                option: function (item, escape) {
                    return '<div>' + escape(item.nama) + '</div>';
                }
            },
            onInitialize: function() {
                var values = {!! $produk->tag !!};
                var self = this;
                if(Object.prototype.toString.call( values ) === "[object Array]") {
                    values.forEach( function (val) {
                        self.addOption(val);
                        self.addItem(val[self.settings.valueField]);
                    });
                }
                else if (typeof values === 'object') {
                    self.addOption(values);
                    self.addItem(values[self.settings.valueField]);
                }
            },
            plugins: {
                'remove_button': { 'title': 'Hapus' }
            }
        });
    </script>
    @endpush
    @push('script-images')
    <script type="text/javascript">
        $("#gambar").fileinput({
            initialPreview: [
                @if($produk->gambar)
                    @foreach($produk->gambar as $gambar)
                    '<img src="{{ asset('fileimages/'.$gambar->file) }}" class="file-preview-image" alt="{{ $gambar->nama }}" title="{{ $gambar->nama }}">',
                    @endforeach
                @endif
            ],
            showUpload: false,
            overwriteInitial: true,
            maxFileCount: 5,
            allowedFileExtensions: ["png", "jpg", "jpeg"]
        });
    </script>
    @endpush
    @push('script-select2')
    <script type="text/javascript">
        $('#kategori').val({{ $produk->kategori[0]->id }}).trigger('change');
    </script>
    @endpush
@endsection
