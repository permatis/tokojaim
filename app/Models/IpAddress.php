  <?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IpAddress extends Model
{

	protected $table = 'ip_address';

    protected $fillable = [
    	'ip_address'	
    ];

    public function popular()
    {
    	return $this->belongsToMany(\App\Models\Produk::class, 'popular');
    }

}
