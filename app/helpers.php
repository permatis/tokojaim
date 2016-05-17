<?php

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
