<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Transaksi;

class UserController extends Controller
{
    private $produk;
    private $transaksi;

    public function __construct(
        Produk $produk,
        Transaksi $transaksi
    )
    {
        $this->produk = $produk;
        $this->transaksi = $transaksi;
    }

    public function index() 
    {
        return view('user.index')
            ->with([ 'produks' => $this->getAllPemesanan(5), 'transaksi' => $this->getAllTransaksi(5) ]);
    }

    public function status_pemesanan() 
    {
    	return view('user.status_pemesanan')
            ->with([ 'produks' => $this->getAllPemesanan(10) ]);
    }
    
    public function history() 
    {
    	return view('user.history')
            ->with([ 'transaksi' => $this->getAllTransaksi(10) ]);
    }

    protected function getAllPemesanan($limit = 0)
    {
        return $this->transaksi->with([ 'produk' => function($query) { 
                $query->select('produk.judul'); 
            }])->where('user_id', auth()->user()->id)
            ->where('status_order_id', '!=', 5)
            ->orderBy('updated_at', 'DESC')
            ->limit($limit)->get();
    }

    protected function getAllTransaksi($limit = 0)
    {
        return $this->transaksi->with([ 'produk' => function($query) { 
                $query->select('produk.judul'); 
            }])->where('user_id', auth()->user()->id)
            ->where('status_order_id', 5)
            ->orderBy('updated_at', 'DESC')
            ->limit($limit)->get();
    }
}
