<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cabang extends Model
{
    protected $table = 'cabang';

	protected $primaryKey = 'idCabang';

    protected $fillable = [
    	'nama_cabang', 'gambar_cabang', 'alamat_cabang', 'no_telfon_cabang'
    ];

    public function karyawan()
    {
    	return $this->hasMany('App\Karyawan');
    }

    //public function stok_cabang()
    //{
    //	return $this->hasMany('App\stok_cabang');
    //}
}
