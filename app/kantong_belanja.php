<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kantong_belanja extends Model
{
    protected $table = 'kantong_belanja';
    
	protected $primaryKey = 'idKantongBelanja';
    
    protected $fillable = [
    	'nama_cabang', 'gambar_cabang', 'alamat_cabang', 'no_telfon_cabang'
    ];
}
