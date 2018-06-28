<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class katalog extends Model
{
    protected $table = 'katalog';

	protected $primaryKey = 'idKatalog';
    
    protected $fillable = [
    	'nama_katalog', 'gambar_katalog', 'harga_katalog', 'diskon_katalog',
    	'keterangan_katalog'
    ];

    
}
