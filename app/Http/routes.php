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
Route::resource('admin/brands','BrandController');

Route::get('/u/favorit','UserController@favorit');
Route::get('/u/pembelian/','UserController@konfirmasi_pembayaran'); //sudah
Route::get('/u/pembelian/status_pemesanan','UserController@status_pemesanan');
Route::get('/u/pembelian/konfirmasi_pembayaran','UserController@konfirmasi_pembayaran'); //sudah
Route::get('/u/pembelian/konfirmasi_penerimaan','UserController@konfirmasi_penerimaan'); //sudah
Route::get('/u/pembelian/history','UserController@history'); //sudah
Route::get('/u/pengaturan/biodata','UserController@biodata');
Route::get('/u/pengaturan/alamat','UserController@alamat');
Route::get('/u/pengaturan/rekening','UserController@rekening');

Route::get('uploader', function() {
	return view('uploader');	
});


use Intervention\Image\ImageManager;
use App\Models\Produk;
use App\Models\Gambar;
use App\Models\Stok;

Route::post('uploader', function() {

	$image = new ImageManager;
	
	function sanitize($string, $force_lowercase = true, $anal = false)
    {
        $strip = array("~", "`", "!", "@", "#", "$", "%", "^", "&", "*", "(", ")", "_", "=", "+", "[", "{", "]",
            "}", "\\", "|", ";", ":", "\"", "'", "&#8216;", "&#8217;", "&#8220;", "&#8221;", "&#8211;", "&#8212;",
            "â€”", "â€“", ",", "<", ".", ">", "/", "?");
        $clean = trim(str_replace($strip, "", strip_tags($string)));
        $clean = preg_replace('/\s+/', "-", $clean);
        $clean = ($anal) ? preg_replace("/[^a-zA-Z0-9]/", "", $clean) : $clean ;

        return ($force_lowercase) ?
            (function_exists('mb_strtolower')) ?
                mb_strtolower($clean, 'UTF-8') :
                strtolower($clean) :
            $clean;
    }

        $stok = Stok::create(['jumlah' => '4']);
        $produk = Produk::create(['nama' => 'TV 21 in', 'stok_id' => $stok->id]);

	foreach(request()->file('gambar') as $gambar) {
		$namafile = $gambar->getClientOriginalName();
		$extFile = $gambar->getClientOriginalExtension();
		$namafileTanpaExt = substr($namafile, 0, strlen($namafile) - strlen($extFile) - 1);
		$namafiles = sanitize($namafileTanpaExt);

		$filename = md5(uniqid(time(), true)).'.jpg';
  //    $image->make($gambar)->save(public_path('photo').'/'.$filename);
        $gambar = Gambar::create(['nama' => ucwords(str_replace('-', ' ', $namafiles)), 'file' => $filename ]);
        $produk->gambar()->attach($gambar);
	}

});

Route::get('facebook/login', function(SammyK\LaravelFacebookSdk\LaravelFacebookSdk $fb) {
	$login_url = $fb->getLoginUrl(['email', 'publish_actions','publish_pages','manage_pages','public_profile']);
	echo '<a href="' .$login_url. '">Login with Facebook</a>';
});

Route::get('facebook/callback', function(SammyK\LaravelFacebookSdk\LaravelFacebookSdk $fb) {
    try {
        $token = $fb->getAccessTokenFromRedirect();
    } catch (Facebook\Exceptions\FacebookSDKException $e) {
        dd($e->getMessage());
    }

    if (! $token) {
        // Get the redirect helper
        $helper = $fb->getRedirectLoginHelper();

        if (! $helper->getError()) {
            abort(403, 'Unauthorized action.');
        }

        // User denied the request
        dd(
            $helper->getError(),
            $helper->getErrorCode(),
            $helper->getErrorReason(),
            $helper->getErrorDescription()
        );
    }


    $fb->setDefaultAccessToken($token);

    // Save for later
    Session::put('fb_user_access_token', (string) $token);

    // Get basic info on the user from Facebook.
    try {
        $response = $fb->get('/me?fields=id,name,email');
    } catch (Facebook\Exceptions\FacebookSDKException $e) {
        dd($e->getMessage());
    }

    // Convert the response to a `Facebook/GraphNodes/GraphUser` collection
    
    $fb->post('564033333749449/feed', [
    	'link' => 'facebook.com',
    	'message' => 'test development'
    ], $token);

    if (! $token) {

    $helper = $fb->getRedirectLoginHelper();
        // Get the redirect helper

        // if (! $helper->getError()) {
        //     abort(403, 'Unauthorized action.');
        // }

        // User denied the request
        // dd(
        //     $helper->getError(),
        //     $helper->getErrorCode(),
        //     $helper->getErrorReason(),
        //     $helper->getErrorDescription()
        // );
    }

});

