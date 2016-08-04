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
// Route::get('produks', 'FrontEndController@search');
Route::get('produk/{slug}', 'FrontEndController@detail');
Route::get('produks', function() {
	return view('frontend.produk');
});
Route::get('detail', function() {
	return view('frontend.single');
});
Route::get('checkout', function() {
	return view('frontend.checkout');
});
// Route::get('checkout', 'FrontEndController@checkout');

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

Route::resource('admin/produks','ProdukController');
Route::resource('admin/kategori','KategoriController');
Route::resource('admin/tags','TagController');
Route::resource('admin/brands','TagController');

Route::get('/u/favorit','UserController@favorit');
Route::get('/u/pembelian/','UserController@konfirmasi_pembayaran'); //sudah
Route::get('/u/pembelian/status_pemesanan','UserController@status_pemesanan');
Route::get('/u/pembelian/konfirmasi_pembayaran','UserController@konfirmasi_pembayaran'); //sudah
Route::get('/u/pembelian/konfirmasi_penerimaan','UserController@konfirmasi_penerimaan'); //sudah
Route::get('/u/pembelian/history','UserController@history'); //sudah
Route::get('/u/pengaturan/biodata','UserController@biodata');
Route::get('/u/pengaturan/alamat','UserController@alamat');
Route::get('/u/pengaturan/rekening','UserController@rekening');