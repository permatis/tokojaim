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
Route::resource('/admin/produk','ProdukController');;
Route::get('/u/favorit','UserController@favorit');
Route::get('/u/pembelian/','UserController@pembelian');
Route::get('/u/pembelian/konfirmasi','UserController@konfirmasi');
Route::get('/u/pembelian/status_pemesanan','UserController@status_pemesanan');
Route::get('/u/pembelian/konfirmasi','UserController@konfirmasi');
Route::get('/u/pembelian/history','UserController@history');
Route::get('/u/pengaturan/biodata','UserController@biodata');
Route::get('/u/pengaturan/alamat','UserController@alamat');
Route::get('/u/pengaturan/rekening','UserController@rekening');

