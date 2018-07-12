<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Katalog extends Model
{
    protected $table = 'katalog';

    protected $fillable = [
    	'nama', 'gambar', 'harga', 'diskon', 'keterangan', 'kategori_id', 'keuntungan'
    ];

    public function StokCabang()
    {
    	return $this->hasMany('App\StokCabang');
    }

    public function Penjualan()
    {
    	return $this->hasMany('App\Penjualan');
    }

    public function KantongBelanja()
    {
    	return $this->hasMany('App\KantongBelanja');
    }

    public function Kategori()
    {
        return $this->belongsTo('App\Kategori');
    }
}
