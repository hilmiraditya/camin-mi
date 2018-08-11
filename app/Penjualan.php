<?php

namespace App;

use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use Notifiable;

    protected $table = 'Penjualan';

    protected $fillable = [
    	'jumlah', 'keterangan', 'katalog_id', 'kategori_id', 'karyawan_id'
    ];

    public function Katalog()
    {
    	return $this->belongsTo('App\Katalog');
    }

    public function Kategori()
    {
        return $this->belongsTo('App\Kategori');
    }

    public function Users()
    {
        return $this->belongsTo('App\User');
    }
}