<?php
    
namespace App;
    
use App\Notifications\KaryawanResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
    
class Karyawan extends Authenticatable
{
    use Notifiable;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'karyawan';
    
    protected $fillable = [
        'gambar', 'asal', 'foto',
        'alamat', 'tanggal_lahir', 'no',
        'name', 'email', 'password', 'cabang_id'
    ];
    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember',
    ];
    
    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new KaryawanResetPassword($token));
    }
    
    public function cabang()
    {
        return $this->belongsTo('App\Cabang');
    }
    }