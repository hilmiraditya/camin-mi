<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    protected $table = 'Penjualan';

    protected $fillable = [
    	'jumlah', 'keterangan', 'idTransaksi', 'katalog_id', 'keuntungan'
    ];

    public function Katalog()
    {
    	return $this->belongsTo('App\Katalog');
    }
}