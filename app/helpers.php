<?php
use App\Repository\CartRepository as Cart;
use App\Models\Kategori;
use App\Models\StatusOrder;

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

if(! function_exists('cart_destroy'))
{
	function cart_destroy()
	{
		return Cart::destroy('belanja');
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

if(! function_exists('kode_pemesanan'))
{
	function kode_pemesanan($length = 10)
	{
	    return substr(sha1(time()), 0, $length);
	}
}

if(! function_exists('status'))
{
	function status($id)
	{
		$id = StatusOrder::find($id);
		$status = StatusOrder::all(['id' , 'nama']);

		$labels = array_combine(
			array_pluck($status, 'id'),
			['warning', 'info', 'default', 'danger', 'success']
		);

		foreach( $labels as $key => $val) {
			foreach($status as $v) {
				if($key == $id->id && $v->id == $id->id){
					return '<span class="label label-'.$val.'">'.ucwords($v->nama).'</span>';
				}
			}
		}
	}
}
