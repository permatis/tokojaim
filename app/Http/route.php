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

// Route::resource('admin/produks','ProdukController');

Route::group(['prefix' => 'u'], function() {
	Route::get('favorit','UserController@favorit');
	
	Route::group(['prefix' => 'pembelian'], function() {
		Route::get('/','UserController@konfirmasi_pembayaran'); //sudah
		Route::get('status_pemesanan','UserController@status_pemesanan');
		Route::get('konfirmasi_pembayaran','UserController@konfirmasi_pembayaran'); //sudah
		Route::get('konfirmasi_penerimaan','UserController@konfirmasi_penerimaan'); //sudah
		Route::get('history','UserController@history'); //sudah
	});

	Route::group(['prefix' => 'pengaturan'], function() {
		Route::get('biodata','UserController@biodata');
		Route::get('alamat','UserController@alamat');
		Route::get('rekening','UserController@rekening');
	});
	
});

Route::resource('admin/kategori','KategoriController');
Route::resource('admin/tags','TagController');

