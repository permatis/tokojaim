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

	public function save($files, $relation = false)
	{

		$folder = public_path($this->folder);

		if(! file_exists($folder)) {
			$this->images->makeDirectory($folder);
		}

		if(is_array($files)) {
			foreach($files as $file) {
				$filename = $this->images->file($file);
		     	$this->image->make($file)
		     		->fit(200)->save($folder.'/'.$filename );

		        $gambar = $this->gambar->create([
		        	'nama' => $this->images->filename($file),
		        	'file' => $filename
		        ]);

		        if($relation) {
		        	$relation->gambar()->attach($gambar);
		        }
			}
		} else {
			$filename = $this->images->file($files);

		    $this->image->make($files)
		     	->fit(200)->save($folder.'/'.$filename );

		    $gambar = $this->gambar->create([
		        	'nama' => $this->images->filename($files),
		        	'file' => $filename
		        ]);
		    
		    return $gambar;
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
