@extends('partials.main')
@section('content')
	<h2 class="page-header">Semua Transaksi</h2>
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
@endsection
