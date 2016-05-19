<?php

/**
 * Route untuk frontend
 * 1. Home atau halaman depan
 * 2. Halaman kategori produk
 * 3. Halaman search produk
 * 4. Halaman detail produk
 * 5. Halaman checkout
 */
Route::get('/', 'FrontEndController@index');
Route::get('kategori/{parent}/{child?}', 'FrontEndController@kategori');
Route::get('produks', 'FrontEndController@search');
Route::get('produk/{slug}', 'FrontEndController@detail');
Route::get('checkout', 'FrontEndController@checkout');

/**
 * Route untuk keranjang belanja & checkout
 */
Route::group(['prefix' => 'cart'], function() {
    Route::post('tambah', 'FrontEndController@tambah');
    Route::delete('{id}', 'FrontEndController@hapus');
});

//===== route gawean e Hari ======//
Route::get('admin/dashboard', function () {
    return view('admin.dashboard');
});
<<<<<<< HEAD
=======
Route::resource('/admin/produk','ProdukController');
Route::get('/u/favorit','UserController@favorit');
Route::get('/u/pembelian/','UserController@konfirmasi_pembayaran'); //sudah
Route::get('/u/pembelian/status_pemesanan','UserController@status_pemesanan');
Route::get('/u/pembelian/konfirmasi_pembayaran','UserController@konfirmasi_pembayaran'); //sudah
Route::get('/u/pembelian/konfirmasi_penerimaan','UserController@konfirmasi_penerimaan'); //sudah
Route::get('/u/pembelian/history','UserController@history'); //sudah
Route::get('/u/pengaturan/biodata','UserController@biodata');
Route::get('/u/pengaturan/alamat','UserController@alamat');
Route::get('/u/pengaturan/rekening','UserController@rekening');
>>>>>>> d4de4a3bf9286d0c32b79219d7ce100be9fdf5a5

Route::resource('admin/produk','ProdukController');;

/**
 * Route untuk halaman user
 */
Route::group(['prefix' => 'u'], function() {
	Route::get('favorit', 'UserController@favorit');
	Route::get('pembelian', 'UserController@pembelian');
	Route::get('pembelian/konfirmasi', 'UserController@konfirmasi');
	Route::get('pembelian/status_pemesanan', 'UserController@status_pemesanan');
	Route::get('pembelian/konfirmasi', 'UserController@konfirmasi');
	Route::get('pembelian/history', 'UserController@history');
	Route::get('pengaturan/biodata', 'UserController@biodata');
	Route::get('pengaturan/alamat', 'UseController@alamat');
	Route::get('pengaturan/rekening', 'UserController@rekening');
});
