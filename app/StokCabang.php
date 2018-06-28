<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StokCabang extends Model
{
    protected $table = 'stok_cabang';

    protected $fillable = [
    	'jumlah', 'cabang_id', 'katalog_id'
    ];

    public function cabang()
    {
    	return $this->belongsTo('App\Cabang');
    }

    public function katalog()
    {
    	return $this->belongsTo('App\Katalog');
    }
}
