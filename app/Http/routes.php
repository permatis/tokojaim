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
