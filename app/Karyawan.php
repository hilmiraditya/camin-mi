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
        'gambar_karyawan', 'asal_karyawan', 'foto_ktp_karyawan',
        'alamat_karyawan', 'tanggal_lahir_karyawan', 'no_handphone_karyawan',
        'name_karyawan', 'email_karyawan', 'password_karyawan'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password_karyawan', 'remember_token',
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
}
