@extends('partials.main')

@section('content')
    <h2 class="page-header">Dashboard Admin</h2>
    <div class="row">
    <div class="col-md-8">
        <div class="box box-primary">
            <div class="box-header with-border">
                <i class="fa fa-area-chart"></i>
                <h3 class="box-title">Informasi Transaksi Terbaru</h3>
            </div>
            <div class="box-body">
    			<table class="table no-margin table-bordered table-hover" id="table">
                	<thead>
                		<tr>
                			<th>Kode Transaksi</th>
    						<th>Nama</th>
                            <th>Status</th>
    						<th>Nominal</th>
    						<th>Tanggal</th>
                			<th>Action</th>
                		</tr>
                	</thead>
                	<tbody>
                	@foreach($transaksi as $tr)
    					@foreach($tr->produk as $produk)
                		<tr>
    						<td>{{ $tr->kd_transaksi }}</td>
                			<td>{{ ucwords($tr->user->name) }}</td>
                			<td>{!! status($tr->status_order_id) !!}</td>
    						<td>
    							{{ $produk->pivot->subtotal }}
    						</td>
                			<td>{{ $tr->updated_at->diffForHumans() }}</td>
                			<td>
    							@if($tr->status_order_id == $status[0] )
    							<div class="btn-group">
    								<button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
    								Choose Action <span class="caret"></span></button>
    								<ul class="dropdown-menu" role="menu">
    									<li><a href="{{ URL::to('admin/transaksi/'.$tr->id.'/edit') }}" title="Edit">
    										<i class="fa fa-pencil-square-o"></i> Update Status
    									</a></li>
    								</ul>
    							</div>
    							@else
    								<span class="label label-danger text-center">Sudah diperbarui</span>
    							@endif
    						</td>
                		</tr>
    					@endforeach
                	@endforeach
                	</tbody>
                </table>
            </div>
        </div>
        <div class="box box-success">
            <div class="box-header with-border">
                <i class="fa fa-file"></i>
                <h3 class="box-title">Konfirmasi Pembayaran Terbaru</h3>
            </div>
            <div class="box-body">
    			<table class="table no-margin table-bordered table-hover" id="table">
                	<thead>
                		<tr>
    						<th>Kode Transaksi </th>
    						<th>Nama Pengirim</th>
                            <th>Nominal</th>
    						<th>Tanggal</th>
                            <th>Gambar</th>
                		</tr>
                	</thead>
                	<tbody>
                	@foreach($konfirmasi as $k)
                		<tr>
    						<td>{{ $k->transaksi->kd_transaksi }}</td>
    						<td>{{ $k->nama_pengirim }}</td>
                			<td>{{ number_format($k->jumlah, 0, '', '.') }}</td>
                			<td>{{ \Carbon\Carbon::parse($k->tgl_transfer)->diffForHumans() }}</td>
                			<td>
                                <a class="scan" rel="group" href="{{ asset('fileimages/konfirmasi/'.$k->gambar()->first()->file) }}">
                                    {{ $k->gambar()->first()->nama }}
                                </a>
                			</td>
                		</tr>
                	@endforeach
                	</tbody>
                </table>
            </div>
        </div>
    </div>

        <!-- Add the extra clearfix for only the required viewport -->
            <div class="col-md-4">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <i class="fa fa-bullhorn"></i>
                        <h3 class="box-title">Aktifkan Fitur Sharing Produk</h3>
                    </div>
                    <div class="box-body">
                        <div class="callout callout-info">
                            <h4></h4>
                            <p>
                                @foreach($columns as $column)
                                    @if(strrpos($column, 'tk_') !== false)
                                    <?php $newColumn = str_replace('tk_', '', $column); ?>
                                    <span class="label label-default">{{ ucwords($newColumn) }}</span> :
                                        @if(count($tokens) > 0 && $tokens[0]->$column)
                                            Connected (<a href="{{ url('admin/'.$newColumn.'_disconnect') }}">disconnect</a>) <br />
                                        @else
                                            <a href="{{ url('admin/'.$newColumn.'_connect') }}">
                                                Connect with {{ ucwords($newColumn) }}
                                            </a> <br />
                                        @endif
                                    @endif
                                @endforeach
                            </p>
                        </div>
                    </div>
                </div>
            </div>
    </div>

@endsection
