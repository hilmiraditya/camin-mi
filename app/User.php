<?php
	
namespace App;
	
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
	
class User extends Authenticatable
{
    use Notifiable;
	
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'gambar', 'asal', 'foto',
        'alamat', 'tanggal_lahir', 'no',
        'name', 'email', 'password', 'cabang_id', 'isAdmin'
    ];
	
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function cabang()
    {
        return $this->belongsTo('App\Cabang');
    }
}