<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
	protected $table = 'berita';

	protected $primaryKey = 'id';

    protected $fillable = [
        'judul', 'header', 'isi', 'user_id', 'kategori_id', 'status',
    ];

    public function category()
    {
    	return $this->belongsTo('App\Category', 'kategori_id', 'id');
    }
}
