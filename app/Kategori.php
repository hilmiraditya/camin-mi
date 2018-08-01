<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori';

    protected $fillable = [
    	'nama', 'keterangan', 'no_telpon', 'alamat', 'gambar'
    ];

    public function Katalog()
    {
    	return $this->hasMany('App\Katalog');
    }
    
    public function Penjualan()
    {
    	return $this->hasMany('App\Penjualan');
    }
}
