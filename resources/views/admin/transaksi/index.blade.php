@extends('partials.main')

@section('content')
	<div class="box box-primary">
    	<div class="box-header with-border">
            <h3 class="box-title">Semua Transaksi</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
			<table class="table no-margin table-bordered table-hover" id="table">
            	<thead>
            		<tr>
            			<th>Kode Transaksi</th>
						<th>Nama</th>
                        <th>Status</th>
						<th>Produk</th>
						<th>Subtotal</th>
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
							{{ $produk->judul }}
                        </td>
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

@endsection
