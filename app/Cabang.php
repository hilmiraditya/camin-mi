<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Cabang extends Model
{
    protected $table = 'cabang';

    protected $fillable = [
        'nama', 'gambar', 'alamat', 'keterangan', 'no'
    ];
    
    public function User()
    {
        return $this->hasMany('App\User');
    }

    public function Penjualan()
    {
    	return $this->hasMany('App\Penjualan');
    }

    public function KantongBelanja()
    {
        return $this->hasMany('App\KantongBelanja');
    }
}