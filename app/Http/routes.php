<?php

Route::get('/', function () {
	return view('home')
		->with([ 'produk' => \App\Models\Produk::whereHas('stok', function($query)
			{
				$query->where('jumlah', '>', 0);
			})->paginate(3) ]);
});

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

Route::get('admin/dashboard', function () {
    return view('admin.dashboard');
});
