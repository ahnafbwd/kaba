<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'users';
    protected $fillable = [
        'nama_lengkap',
        'email',
        'nomer_telepon',
        'jenis_kelamin',
        'tanggal_lahir',
        'alamat',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            $latestUser = static::latest()->first();
            $latestId = $latestUser ? $latestUser->id : 0;

            $user->kode_user = 'KBUSR' . str_pad(($latestId + 1), 4, '0', STR_PAD_LEFT) . substr($user->nomer_telepon, -4);
        });
    }
    public function getRouteKeyName(){
        return "kode_user";
    }

    public function siswa()
    {
        return $this->hasOne(Siswa::class, 'kode_user', 'kode_user');
    }
}
