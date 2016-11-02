<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use App\Models\StatusOrder;
use App\Models\Produk;
use App\Repository\StatusRepository;

class TransaksiController extends Controller
{
    protected $transaksi;
    protected $status;
    protected $produk;
    protected $order;

    public function __construct(
        Transaksi $transaksi,
        StatusOrder $status,
        Produk $produk,
        StatusRepository $order
    )
    {
        $this->transaksi = $transaksi;
        $this->status = $status;
        $this->produk = $produk;
        $this->order = $order;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi = $this->transaksi->with('produk')->get();
        $status = $this->order->getId(['proses']);

        return view('admin.transaksi.index', compact('transaksi', 'status'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transaksi = $this->transaksi->find($id);
        $status = $this->status->whereIn('id', [2,4,5])->get();

        return view('admin.transaksi.edit', compact('transaksi', 'status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $transaksi = $this->transaksi->find($id);
        $idRejectCancel = $this->order->getId(['ditolak', 'cancel']);

        $stok = [
            'stok' => $transaksi->produk[0]->pivot->jumlah + $transaksi->produk[0]->stok
        ];

        if(in_array($request->get('status'), $idRejectCancel)) {
            $produk = $this->produk->find( $transaksi->produk[0]->pivot->produk_id );
            $produk->update($stok);
        }

        $transaksi->update(['status_order_id' => $request->get('status')]);

        return redirect('admin/transaksi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
