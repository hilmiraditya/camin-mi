<?php
	
namespace App;
	
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
	
class User extends Authenticatable
{
    use Notifiable;
	
    protected $table='users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'no_handphone', 'name', 'email', 'password', 'cabang_id', 'isAdmin'
    ];
	
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function Cabang()
    {
        return $this->belongsTo('App\Cabang');
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