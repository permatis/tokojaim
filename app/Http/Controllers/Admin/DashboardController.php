<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\AccessToken;
use App\Models\Konfirmasi;
use App\Models\Transaksi;
use App\Http\Controllers\Controller;
use App\Repository\StatusRepository;
use SammyK\LaravelFacebookSdk\LaravelFacebookSdk;

class DashboardController extends Controller
{
    /**
	 * Instance untuk facebook sdk
	 * @var object
	 */
	private $fb;

	/**
	 * Intance untuk tabel access token
	 * @var [type]
	 */
	private $token;

    /**
     * set permission untuk akses akun
     * @var array
     */
    protected $permission = [
        'email',
        'publish_actions',
        'publish_pages',
        'manage_pages'
    ];

    /**
     * Inialisasi untuk class model konfirmasi
     * @var object
     */
    protected $konfirmasi;

    /**
     * Inialisasi untuk class model transaksi
     * @var object
     */
    protected $transaksi;

    /**
     * Inialisasi untuk class model status
     * @var object
     */
    protected $status;

	/**
	 * Konstruktor untuk mendlekarasikan Class yang akan digunakan.
	 * @param LaravelFacebookSdk $fb
	 * @param AccessToken        $token
	 */
	public function __construct(
		LaravelFacebookSdk $fb,
		AccessToken $token,
        Konfirmasi $konfirmasi,
        Transaksi $transaksi,
        StatusRepository $status
	)
	{
		$this->fb = $fb;
		$this->token = $token;
        $this->konfirmasi = $konfirmasi;
        $this->transaksi = $transaksi;
        $this->status = $status;
	}

    /**
	 * Untuk menampilkan tampilan status koneksi facebook,
	 * informasi pemesanan, informasi konfirmasi pembayaran.
	 * @return array
	 */
    public function index()
    {
        $data = $this->dataAccessToken();
        $konfirmasi = $this->konfirmasi->limit(5)->get();
        $status = $this->status->getId(['proses']);
        $transaksi = $this->transaksi->with('produk')->where('status_order_id', $status)->limit(5)->get();

        return view('admin.dashboard', compact('transaksi', 'konfirmasi', 'status'))->with($data);
    }

    /**
     * Menghapus akun facebook dari pengaturan
     * @return redirect
     */
    public function facebook_connect()
    {
    	return redirect(
            $this->fb->getLoginUrl($this->permission)
    	);
    }

    /**
     * Mendapatkan hasil callback berupa token dari facebook.
     * Lalu check terlebih dahulu jika masa aktif token pendek maka dibuat menjadi lama.
     * Dan kemudian menyimpan token ke dalam database.
     * @return redirect
     */
    public function facebook_callback()
    {
        $token = $this->fb->getAccessTokenFromRedirect();

        if (! $token->isLongLived()) {
	    	$oauth_client = $this->fb->getOAuth2Client();
	    	try {
	        	$token = $oauth_client->getLongLivedAccessToken($token);
	   	 	} catch (Facebook\Exceptions\FacebookSDKException $e) {
	        	dd($e->getMessage());
	    	}
		}

		$this->fb->setDefaultAccessToken($token);
		$this->createOrUpdate($token, 'facebook');

		return redirect('admin');
    }

    /**
    * Menghapus akun facebook dari pengaturan
    * @return redirect
    */
    public function facebook_disconnect()
    {
        $this->token->destroy(
            $this->tokenByUserId()[0]->id
        );

        return redirect('admin');
    }

    public function dataAccessToken()
    {
        return [
            'columns' => \Schema::getColumnListing('access_token'),
            'tokens' => $this->tokenByUserId()
        ];
    }

    /**
     * Method untuk mencari token dari tabel acess_token berdasarkan user_id
     * @return Object
     */
    protected function tokenByUserId()
    {
    	return $this->token->where('user_id', auth()->user()->id)->get();
    }

    /**
     * Method untuk menambah atau memperbarui token berdasarkan user_id
     * Jika token tidak ada atau null maka token akan ditambahkan.
     * Jika token ada maka token akan diperbarui.
     * @param  array $token   data token
     * @param  string $sosmed type sosial media
     * @return object
     */
    protected function createOrUpdate($token, $sosmed)
    {
    	$userId = $this->tokenByUserId();

        return (count($userId) > 0) ? $userId->update([ 'tk_'.$sosmed => $token ]) :
    		$this->token->create([ 'tk_'.$sosmed => $token , 'user_id' => 1]);
    }
}
