<?php
use App\Repository\CartRepository as Cart;

if (! function_exists('changeIdKeys'))
{
	function changeIdKeys($array, $key)
	{
		foreach($key as $k)
		{
			$array[$k.'_id'] = $array[$k];
			unset($array[$k]);
		}

		return $array;
	}
}

if(! function_exists('carts'))
{
	function carts()
	{
		return Cart::getContent('belanja');
	}
}
