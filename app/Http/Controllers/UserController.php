<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class UserController extends Controller
{
    public function index() {

    }
    public function favorit() {
    	return view('user.favorit');
    }
    public function pembelian() {
    	return view('user.pembelian');
    }
    public function konfirmasi_pembayaran() {
        return view('user.konfirmasi_pembayaran');
    } 
    public function konfirmasi_penerimaan() {
    	return view('user.konfirmasi_penerimaan');
    }
    public function status_pemesanan() {
    	return view('user.status_pemesanan');
    }
    public function history() {
    	return view('user.history');
    }
    public function biodata() {
    	return view('user.biodata');
    }
    public function alamat() {
    	return view('user.alamat');
    }
    public function rekening() {
    	return view('user.rekening');
    }
}
