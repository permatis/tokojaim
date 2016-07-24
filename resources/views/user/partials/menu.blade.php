<ul>
	<li><a href="{{ url('u/favorit') }}">Favorit</a></li>
	<li>
		<a href="{{ url('u/pembelian') }}">Pembelian</a>
		<ul>
			<li><a href="{{ url('u/pembelian/konfirmasi_pembayaran') }}">Konfirmasi Pembayaran</a></li>
			<li><a href="{{ url('u/pembelian/status_pemesanan') }}">Status Pengiriman</a></li>
			<li><a href="{{ url('u/pembelian/konfirmasi_penerimaan') }}">Konfirmasi Penerimaan</a></li>
			<li><a href="{{ url('u/pembelian/history') }}">History</a></li>
		</ul>
	</li>
	<li>
		<a href="{{ url('u/pengaturan') }}">Pengaturan</a>
		<ul>
			<li><a href="{{ url('u/pengaturan/biodata') }}">biodata</a></li>
			<li><a href="{{ url('u/pengaturan/alamat') }}">alamat</a></li>
			<li><a href="{{ url('u/pengaturan/rekening') }}">rekening</a></li>
		</ul>
	</li>
</ul>