<?php
use App\Repository\CartRepository as Cart;
use App\Models\Kategori;

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

if(! function_exists('widget_kategori'))
{
	function widget_kategori()
	{
		$kategori = Kategori::where('parent_id', '')->get();
		foreach($kategori as $kat) {
			$childs = \App\Models\Kategori::where('parent_id', $kat->id)->get();


			$widget[] = '<li><a href="'.strtolower(url("kategori/".str_slug($kat->nama))).'">'.$kat->nama.'</a>';
		    $widget[] .= '<ul class="child">';
		    foreach($childs as $c){
		    	$widget[] .= '<li><a href="'.strtolower(url('kategori/'.str_slug($kat->nama).'/'.str_slug($c->nama) )).'">'.$c->nama.'</a></li>';
			}
				$widget[] .= '</ul></li>';
		}
		
		return implode('', $widget);
	}
}