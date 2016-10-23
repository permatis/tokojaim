<?php

namespace App\Repository;

use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\File;
use App\Models\Gambar;
use App\Services\ImageService;

class ImageRepository
{
	private $image;
	private $gambar;
	private $images;
	public $folder = 'fileimages/';

	public function __construct(
		ImageManager $image,
		Gambar $gambar,
		ImageService $images
	)
	{
		$this->image = $image;
		$this->gambar = $gambar;
		$this->images = $images;
	}

	public function save($files, $relation)
	{

		$folder = public_path($this->folder);

		foreach($files as $file) {
			$filename = $this->images->file($file);
			if(! file_exists($folder)) {
				$this->images->makeDirectory($folder);
			}

	     	$this->image->make($file)
	     		->fit(200)->save($folder.'/'.$filename );

	        $gambar = $this->gambar->create([
	        	'nama' => $this->images->filename($file),
	        	'file' => $filename
	        ]);

	        $relation->gambar()->attach($gambar);
		}
	}
	
	public function deleteByRelation($model)
	{
		$images = $model->gambar()->get(['file']);
		$this->getFiles($images);
        $model->gambar()->delete();
        $model->gambar()->detach();
	}

	public function getFiles($images)
	{
		$arr = array_map(function($value) {
			return $this->folder.$value;
		}, array_pluck($images, 'file'));

		return File::delete($arr);
	}

}
