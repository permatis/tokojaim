<?php

namespace App\Services;

class AllRequestService
{
	public function produks($request)
	{
        return array_except(
            	$request->all(), [ 'kategori', 'gambar', 'tag', '_wysihtml5_mode' ]
        	);
	}
}