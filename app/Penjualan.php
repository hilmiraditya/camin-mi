<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    protected $table = 'Penjualan';

    protected $fillable = [
    	'jumlah', 'keterangan', 'atas_nama', 'katalog_id'
    ];

    public function Katalog()
    {
    	return $this->belongsTo('App\Katalog');
    }
}