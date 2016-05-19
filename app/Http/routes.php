<?php

Route::get('/', 'CartController@index');

Route::group(['prefix' => 'produk'], function() {
    Route::get('{slug}', function($slug) {
    	$produk = \App\Models\Produk::where('slug', $slug)->first();

        return ($produk) ? 
        	view('detail_produk', compact('produk')) : 
        	abort(404);
    });
});
		
Route::group(['prefix' => 'cart'], function() {
    Route::post('tambah', 'CartController@tambah');
    Route::delete('{id}', 'CartController@hapus');
});

//===== route gawean e Hari ======//
Route::get('admin/dashboard', function () {
    return view('admin.dashboard');
});
Route::resource('/admin/produk','ProdukController');
Route::get('/u/dashboard','UserController@index');
Route::get('/u/favorit','UserController@index');
Route::get('/u/pembelian/','UserController@index');
Route::get('/u/pembelian/konfirmasi','UserController@index');
Route::get('/u/pembelian/status_pemesanan','UserController@index');
Route::get('/u/pembelian/konfirmasi','UserController@index');
Route::get('/u/pembelian/history','UserController@index');
Route::get('/u/pengaturan/biodata','UserController@index');
Route::get('/u/pengaturan/alamat','UserController@index');
Route::get('/u/pengaturan/rekening','UserController@index');

