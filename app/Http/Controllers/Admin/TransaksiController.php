<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use App\Models\StatusOrder;
use App\Models\Produk;

class TransaksiController extends Controller
{
    protected $transaksi;
    protected $status;
    protected $produk;

    public function __construct(
        Transaksi $transaksi,
        StatusOrder $status,
        Produk $produk
    )
    {
        $this->transaksi = $transaksi;
        $this->status = $status;
        $this->produk = $produk;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi = $this->transaksi->with('produk')->get();
        $status = $this->getId(['menunggu']);

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
        $status = $this->status->all();

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
        $idRejectCancel = $this->getId(['ditolak', 'cancel']);

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

    /**
     * Get id by name
     *
     * @param  array $search
     * @return array
     */
    protected function getId($search = [])
    {
        $status = $this->status->where( function($query) use($search) {
            if( $search ) {
                $query->where('nama', 'like', '%'.$search[0].'%');
                $nextSearch = array_slice($search, 1);

                if( $nextSearch ) {
                    foreach( $nextSearch as $nama) {
                        $query->orWhere('nama', 'like', '%'.$nama.'%');
                    }
                }
            }
        })->get();

        return array_pluck($status, 'id');
    }

}
