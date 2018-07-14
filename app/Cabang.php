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
}