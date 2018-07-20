<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KantongBelanja extends Model
{
    protected $table = 'kantong_belanja';

    protected $fillable = [
    	'jumlah', 'keterangan', 'katalog_id', 'users_id', 'total_harga'
    ];

    public function katalog()
    {
    	return $this->belongsTo('App\Katalog');
    }

    public function User()
    {
        return $this->belongsTo('App\User');
    }
}
