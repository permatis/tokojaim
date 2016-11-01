@extends('partials.main')
@section('content')
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">List Produk</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
    </div>
    <div class="box-body"><button id="konfirmasi">konfirmasi</button> <button>batal</button><br>
        tanggal transaksi dari tgl 18 januari 2016 => 20 januari 2016<br>
        total tagihan Rp.30.000<br><br>
        <button id="detail">detail</button>
        <!-- tabel -->
        <div class="data">
            <table border="1">
                <tr><td colspan="3">INV/20160518/XVI/V/36372775
                </td></tr>
                <tr>
                    <th>kaos butu<br>
                        1 barang (0.02kg) x Rp.200.000
                    </th>
                    <th>keterangan<br>
                        -
                    </th>
                    <th>Harga Barang<br>Rp.200.000
                    </th>
                </tr>
                <tr>
                    <td><b>Alamat Tujuan ( JNE - Reguler )</b><br>
                        hariyansah eko santoso<br>
                        Jl.Pucang asri 8 no 29, Pucang Gading<br>
                        Semarang Timur Kota Semarang, 59567<br>
                        Jawa Tengah<br>
                    Telp: 08985622347</td>
                    <td colspan="2">Jumlah Barang 1 Barang (0.02 kg) <br>
                        Ongkos Kirim Rp 17.000 <br>
                        Biaya Asuransi Rp 0
                    </td>
                </tr>
                <tr><td colspan="3">Total Pembayaran: Rp 31.500
                </td></tr>
            </table>
        </div>
        <!-- form konfirmasi -->
        <form id="data_konfirmasi">
            <label>invoice</label> INV/20160518/XVI/V/36372775 <br>
            <label>jumlah dibayar</label> Rp.300.000 <br>
            <label>metode pembayaran</label>
            <select>
                <option value="#">pilih metode pembayaran</option>
                <option value="#">transfer ATM</option>
                <option value="#">internet banking</option>
                <option value="#">mobile banking</option>
                <option value="#">setoran/transfer tunai</option>
            </select> <br>
            <label>keterangan (optional)</label> <input type="text" /><br>
            <button>kirim</button>
        </form>
    </div>
    
    <div class="box-footer clearfix">
        {!! link_to('admin/produks/create', 'Tambah Produk', ['class' => 'btn btn-sm btn-danger btn-flat pull-left']) !!}
    </div>
</div>
@endsection

<script src='{{ URL::asset('jquery-1.12.3.min.js') }}'></script>
<script type="text/javascript">
    $(".data").hide();
$("#data_konfirmasi").hide();
    
$("#detail").click(function(){
$(".data").toggle();
    });
$("#konfirmasi").click(function(){
$("#data_konfirmasi").toggle();
});
</script>