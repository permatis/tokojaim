<?php

namespace App\Repository;

use App\Models\StatusOrder;

class StatusRepository
{

    protected $status;

    public function __construct(
        StatusOrder $status
    )
    {
        $this->status = $status;
    }

    /**
     * Get id by name
     *
     * @param  array $search
     * @return array
     */
    public function getId($search = [])
    {
        $status = $this->status->where( function($query) use($search) {
            if( $search ) {
                $query->where('nama', 'like', '%'.$search[0].'%');
                $nextSearch = array_slice($search, 1);

                if( $nextSearch ) {
                    foreach( $nextSearch as $nama) {
                        $query->orWhere('nama', 'like', '%'.$nama.'%');
                    }
                }
            }
        })->get();

        return array_pluck($status, 'id');
    }
}
