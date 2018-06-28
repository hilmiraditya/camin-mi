<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KantongBelanja extends Model
{
    protected $table = 'kantong_belanja';

    protected $fillable = [
    	'jumlah', 'keterangan', 'katalog_id'
    ];

    public function katalog()
    {
    	return $this->belongsTo('App\Katalog');
    }
}
