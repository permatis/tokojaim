@extends('themes.shoppe.partials.main')

@section('content')
    <div class="header">
    @include('themes.shoppe.partials.navbar')
    </div>
    <div class="main">
        <div class="content">
            <h2 style="text-align: center;margin-bottom: -30px;">Konfirmasi Pembayaran</h2>
            <div class="forms">
            	@if(session()->has('sukses'))
	                <span class="sukses">
	                    <strong>{{ session('sukses') }}</strong>
	                </span>
            	@endif
                <form role="form" method="POST" action="{{ url('/konfirmasi_pembayaran') }}" enctype="multipart/form-data">
	                {{ csrf_field() }}
	                <label for="kd_pemesanan">Kode Pemesanan</label>
	                <input id="kd_pemesanan" type="text" name="kd_pemesanan" value="{{ old('kd_pemesanan') }}">
	                @if ($errors->has('kd_pemesanan'))
	                <span class="error">
	                    <strong>{{ $errors->first('kd_pemesanan') }}</strong>
	                </span>
	                @endif

	                <label for="nama_pengirim">Nama Pengirim</label>
	                <input id="nama_pengirim" type="text" name="nama_pengirim" value="{{ old('nama_pengirim') }}">
	                @if ($errors->has('nama_pengirim'))
	                <span class="error">
	                    <strong>{{ $errors->first('nama_pengirim') }}</strong>
	                </span>
	                @endif

	                <label for="jumlah">Jumlah Dana</label>
	                <input id="jumlah" type="text" name="jumlah" value="{{ old('jumlah') }}">
	                @if ($errors->has('jumlah'))
	                <span class="error">
	                    <strong>{{ $errors->first('jumlah') }}</strong>
	                </span>
	                @endif

	                <label for="rekening_pengirim">Rekening Bank Anda</label>
	                <select name="rekening_pengirim" id="rekening_pengirim">
	                	<option value="">Pilih Bank</option>
	                	<option value="BCA">BCA</option>
	                	<option value="BNI">BNI</option>
	                	<option value="BRI">BRI</option>
	                	<option value="Mandiri">Mandiri</option>
	                	<option value="lain">Bank Lainnya</option>
	                </select>
	                @if ($errors->has('rekening_pengirim'))
	                <span class="error">
	                    <strong>{{ $errors->first('rekening_pengirim') }}</strong>
	                </span>
	                @endif

	                <label for="rekening_toko">Rekening Toko</label>
	                <select name="rekening_toko" id="rekening_toko">
	                	<option value="">Pilih Bank</option>
	                	<option value="BCA">BCA</option>
	                	<option value="BNI">BNI</option>
	                	<option value="BRI">BRI</option>
	                	<option value="Mandiri">Mandiri</option>
	                </select>
	                @if ($errors->has('rekening_toko'))
	                <span class="error">
	                    <strong>{{ $errors->first('rekening_toko') }}</strong>
	                </span>
	                @endif

	                <label for="metode_transfer">Metode Transfer</label>
	                <select name="metode_transfer" id="metode">
	                	<option value="">Pilih Metode Pembayaran</option>
	                	<option value="ATM">ATM</option>
	                	<option value="e-Banking">e-Banking</option>
	                	<option value="Counter Bank">Counter Bank</option>
	                </select>
	                @if ($errors->has('metode_transfer'))
	                <span class="error">
	                    <strong>{{ $errors->first('metode_transfer') }}</strong>
	                </span>
	                @endif

	                <label for="tgl_transfer">Tanggal Transfer</label>
	                <input type="text" name="tgl_transfer" id="tgl_transfer" value="{{ old('tgl_transfer') }}">
	                @if ($errors->has('tgl_transfer'))
	                <span class="error">
	                    <strong>{{ $errors->first('tgl_transfer') }}</strong>
	                </span>
	                @endif

	                <label for="gambar">Upload bukti transfer</label>
	                <div class="upload">
	                	<input type="file" name="gambar">
	                </div>
	                @if ($errors->has('gambar'))
	                <span class="error">
	                    <strong>{{ $errors->first('gambar') }}</strong>
	                </span> 
	                @endif
					<button type="submit" class="btn btn">Simpan</button>	
                </form>
        </div>
    </div>
    @push('scripts')
    <script type="text/javascript"> 
	    $('select').each( function(i,v) {
	        $('#'+$(this).attr('id')).select2({
     			width: 'element',
    			minimumResultsForSearch: Infinity
  			});
	    });
	    $('#tgl_transfer').datetimepicker({
	    	maxDate: 0,
	    	maxTime: 0,
	    	format:'Y-m-d H:i:00',
	    });
    </script>
    @endpush
@endsection