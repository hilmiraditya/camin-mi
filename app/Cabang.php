<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Cabang extends Model
{
    protected $table = 'cabang';
    protected $fillable = [
        'nama', 'gambar', 'alamat', 'keterangan', 'no'
    ];
    public function karyawan()
    {
        return $this->hasMany('App\Users');
    }
    public function stokcabang()
    {
        return $this->hasMany('App\StokCabang');
    }
}