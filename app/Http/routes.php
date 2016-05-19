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
Route::resource('/admin/produk','ProdukController');
