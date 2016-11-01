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
Route::post('checkout', 'FrontEndController@checkout');
Route::get('konfirmasi_pembayaran', function() {
	return view('themes.shoppe.konfirmasi_pembayaran');
});
Route::post('konfirmasi_pembayaran', 'FrontEndController@konfirmasi');
Route::get('detail', function() {
	return view('frontend.single');
});
Route::get('checkout', function() {
	return (count(carts()) > 0 ) ? view('themes.shoppe.checkout') : redirect('/');
});
Route::get('keranjang', function() {
	return view('themes.shoppe.keranjang');
});

/**
 * Route untuk keranjang belanja & checkout
 */
Route::group(['prefix' => 'cart'], function() {
    Route::post('tambah', 'FrontEndController@tambah');
    Route::delete('{id}', 'FrontEndController@hapus');
});

Route::group(['middleware' => 'auth'], function() {
	Route::group(['prefix' => 'admin', 'middleware' => 'roles', 'roles' => ['admin']], function() {
		Route::get('/', 'Admin\DashboardController@index');
		Route::resource('produks','Admin\ProdukController');
		Route::resource('kategori','Admin\KategoriController');
		Route::resource('tags','Admin\TagController');
		Route::resource('users','Admin\UserController');
		Route::resource('transaksi','Admin\TransaksiController', ['only' => ['index', 'edit', 'update', 'destroy']]);
		Route::resource('konfirmasi','Admin\KonfirmasiController', ['only' => ['index', 'edit', 'update', 'destroy']]);
	});

	Route::group(['prefix' => 'user', 'middleware' => 'roles', 'roles' => ['user']], function() {
		Route::get('/','UserController@index');
		Route::get('status_pemesanan','UserController@status_pemesanan');
		Route::get('history', 'UserController@history');
	});

});

// Route::auth();
//
Route::get('login', 'Auth\AuthController@showLoginForm');
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('register', 'Auth\AuthController@showRegistrationForm');
Route::post('register', 'Auth\AuthController@postRegistration');
Route::get('logout', 'Auth\AuthController@getLogout');
