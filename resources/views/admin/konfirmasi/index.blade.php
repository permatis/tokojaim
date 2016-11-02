@extends('partials.main')

@section('content')
	<div class="box box-primary">
    	<div class="box-header with-border">
            <h3 class="box-title">Semua Konfirmasi Pembayaran</h3>
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
						<th>Kode Transaksi </th>
						<th>Nama Pengirim</th>
                        <th>Nominal</th>
						<th>Rek. Toko</th>
						<th>Rek. Pengirim</th>
						<th>Metode</th>
						<th>Tanggal</th>
            			<th>Action</th>
            		</tr>
            	</thead>
            	<tbody>
            	@foreach($konfirmasi as $k)
            		<tr>
						<td>{{ $k->transaksi->kd_transaksi }}</td>
						<td>{{ $k->nama_pengirim }}</td>
            			<td>{{ number_format($k->jumlah, 0, '', '.') }}</td>
            			<td>{{ $k->rekening_toko }}</td>
            			<td>{{ $k->rekening_pengirim }}</td>
						<td>{{ $k->metode_transfer }}</td>
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
@endsection

@push('script-images')
<script type="text/javascript">
    $(".scan").fancybox();
</script>
@endpush
