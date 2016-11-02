<?php

namespace App\Services;

use SammyK\LaravelFacebookSdk\LaravelFacebookSdk;

class SosialMediaService
{
    /**
     * untuk inject model facebook
     * @var object
     */
    protected $fb;

    /**
     * Menginject semua class
     */
    public function __construct(
        LaravelFacebookSdk $fb
    )
    {
        $this->fb = $fb;
    }

    /**
     * Posting di halaman wall sendiri dan pages
     *
     * @param  string $token access_token user
     * @param  array $data   data yang akan diposting
     * @return array
     */
    public function facebook($token, $data, $pageId = '')
    {
        $response = curl_post('https://graph.facebook.com/me/feed', $data, $token);

        if( $pageId ) {
            $response = $this->fb->get($pageId.'?fields=access_token', $token);
    	    curl_post('https://graph.facebook.com/'.$pageId.'/feed', $data, $response->getGraphUser()['access_token']);
        }

        return $response;
    }
}
