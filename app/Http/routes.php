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
 * Route Authentication
 */
Route::get('login', 'Auth\AuthController@showLoginForm');
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('register', 'Auth\AuthController@showRegistrationForm');
Route::post('register', 'Auth\AuthController@postRegistration');
Route::get('logout', 'Auth\AuthController@getLogout');

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

		Route::get('facebook_callback', 'Admin\DashboardController@facebook_callback');
		Route::get('facebook_connect', 'Admin\DashboardController@facebook_connect');
		Route::get('facebook_disconnect', 'Admin\DashboardController@facebook_disconnect');

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

// Route::get('test', function(SammyK\LaravelFacebookSdk\LaravelFacebookSdk $fb) {
//
// 	$accessToken = \App\Models\AccessToken::where('user_id', auth()->user()->id)->first();
//
// 	$data = [
// 	 	'message' => 'Hello from localhost',
// 	];
//
// 	curl_post('https://graph.facebook.com/me/feed', $data, $accessToken->tk_facebook);
// 	$response = $fb->get('1232603263447483?fields=access_token', $accessToken->tk_facebook);
// 	$reponse = curl_post('https://graph.facebook.com/1232603263447483/feed', $data, $response->getGraphUser()['access_token']);
// 	dd($reponse);
// });
