<?php

namespace App\Services;

class ImageService  
{
	public function filename($file) 
	{
		$namafileTanpaExt = substr( 
			$file->getClientOriginalName(), 0, 
			strlen( $file->getClientOriginalName() ) - strlen( $file->getClientOriginalExtension() ) - 1
		);
		
		return ucwords(
			str_replace('-', ' ', $this->sanitize($namafileTanpaExt)) 
		);
	}

	public function file($file) 
	{
		return  md5( uniqid(time(), true) ).'.'.strtolower($file->getClientOriginalExtension());
	}

	protected function sanitize($string, $force_lowercase = true, $anal = false)
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

    public function makeDirectory($path, $mode = 0777, $recursive = false, $force = false)
	{
        return ($force) ? : @mkdir($path, $mode, $recursive);
	}


}