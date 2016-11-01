@extends('partials.main')
@section('content')
	<h2 class="page-header">Dashboard Pengguna</h2>
    <div class="alert alert-info" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    Jika status :<ul>
    <li> <strong>Menunggu</strong>, silahkan segera lakukan konfirmasi pembayaran agar pemesanan segera diproses.</li>
    <li> <strong>Proses</strong>, pemesanan sedang diproses dan proses pengiriman barang ke pemesan.</li>
    </div>
	<div class="row">
		<div class="col-md-6">
			<div class="box box-success">
		    	<div class="box-header with-border">
		            <h3 class="box-title">Informasi Pemesanan</h3>
		            <div class="box-tools pull-right">
		                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
		                </button>
		                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
		            </div>
		        </div>
		        <div class="box-body">
					<div class="table-responsive">
						<table class="table no-margin">
							<thead>
								<tr>
									<th>Order ID</th>
									<th>Barang</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody>
								@if(count($produks) > 0)
								@foreach($produks as $p)
								@foreach($p->produk as $pr)
								<tr>
									<td>
										{{ $p->kd_transaksi }}
									</td>
									<td>{{ $pr->judul }}</td>
									<td>
										{!! status($p->status_order_id) !!}
									</td>
								</tr>
								@endforeach
								@endforeach
								@else
								<tr>
									<td colspan="3"><h3 class="text-center">Anda belum melakukan pemesanan.</h3></td>
								</tr>
								@endif
							</tbody>
						</table>
		            </div>
		        </div>
		        <div class="box-footer clearfix">
	              	<a href="{{ url('konfirmasi_pembayaran') }}" class="btn btn-sm btn-success btn-flat pull-left">Lakukan Konfirmasi</a>
	              	<a href="{{ url('u/status_pemesanan') }}" class="btn btn-sm btn-default btn-flat pull-right">Tampilkan semua pemesanan</a>
	            </div>
		    </div>
		</div>
		<div class="col-md-6">
			<div class="box box-primary">
		    	<div class="box-header with-border">
		            <h3 class="box-title">Informasi Transaksi</h3>
		            <div class="box-tools pull-right">
		                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
		                </button>
		                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
		            </div>
		        </div>
		        <div class="box-body">
					<div class="table-responsive">
						<table class="table no-margin">
							<thead>
								<tr>
									<th>Order ID</th>
									<th>Barang</th>
									<th style="width: 25%;" class="text-right">Subtotal</th>
								</tr>
							</thead>
							<tbody>
								@if(count($transaksi) > 0)
								@foreach($transaksi as $trans)
								@foreach($trans->produk as $ps)
								<tr>
									<td>
										{{ $trans->kd_transaksi }}
									</td>
									<td>{{ $ps->judul }}</td>
									<td>
										<div class="text-right">{{ number_format($ps->pivot->subtotal, 0, '', '.') }}</div>
									</td>
								</tr>
								@endforeach
								@endforeach
								@else
								<tr>
									<td colspan="3"><h3 class="text-center">Belum ada transaksi.</h3></td>
								</tr>
								@endif
							</tbody>
						</table>
		            </div>
		        </div>
		        <div class="box-footer clearfix">
	              	<a href="{{ url('u/history') }}" class="btn btn-sm btn-default btn-flat pull-right">Tampilkan semua transaksi</a>
	            </div>
		    </div>
		</div>
	</div>
@endsection
