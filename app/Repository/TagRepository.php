<?php

namespace App\Repository;

use App\Models\Tag;

class TagRepository
{
    /**
     * Inialisasi tag model
     * @var Object
     */
	private $tag;

    /**
     * Konsturktor TagRepository
     */
	public function __construct(
		Tag $tag
	)
	{
		$this->tag = $tag;
	}

    /**
     * Simpan data tag yang sudah ada ke dalam tabel relasi atau
     * jika tag belum ada dalam database maka akan ditambahkan,
     * kemudian tambahkan juga dalam tabel relasi.
     * @param  [type] $input    [description]
     * @param  [type] $tags     [description]
     * @param  [type] $relation [description]
     * @return [type]           [description]
     */
	public function saveWithRelation($input, $tags, $relation)
	{
        $this->createNewTag(
            $this->getNewTag($input, $tags), $relation
        );

        $this->updatedRelatedTag($input, $tags, $relation);
	}

    /**
     * Membuat tag baru dan menambahkan relasi ke dalam database
     *
     * @param  array $tags     input tag yang belum ada didatabase
     * @param  object $relation model relasi
     * @return object
     */
    protected function createNewTag($tags, $relation)
    {
        if($tags) {
            foreach( $tags as $val) {
                $tag = $this->tag->create([ 'nama' => $val ]);
                $relation->tag()->attach($tag);
            }
        }
    }

    /**
     * Mengkompare tag dari database dengan tag dari input,
     * kemudian tampilkan tag yang tidak ada atau selain didalam database.
     * @param  array $input input dari form
     * @param  array $tags  data dari tabel tags
     * @return array
     */
	public function getNewTag($input, $tags)
    {
        $newTags = [];
        foreach ($input as $tag) {
            if(in_array($tag, array_pluck($tags, 'nama'))) continue;
            $newTags[] = $tag;
        }

        return $newTags;
    }

    /**
     * Mengkompare tag dari database dengan tag dari input,
     * kemudian simpan tag yang memiliki kesamaan ke dalam tabel relasi.
     * @param  array $input input dari form
     * @param  array $tags  data dari tabel tags
     * @param  object $relation  object relasi tabel
     * @return object
     */
    protected function updatedRelatedTag($input, $tags, $relation)
    {
        foreach($tags as $key => $tag) {
            foreach($input as $k => $arr) {
                if($arr === $tag['nama']) $relation->tag()->attach([$tag['id']]);
            }
        }
    }
}
