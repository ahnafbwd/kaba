<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;

class Pengajar extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guard = 'pengajar';
    protected $table = 'pengajars';

    protected $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama_lengkap',
        'email',
        'nomer_telepon',
        'jenis_kelamin',
        'tanggal_lahir',
        'alamat',
        'status_kerja',
        'password',
    ];

    protected $attributes = [
        'status_kerja' => 'Tidak Aktif',
    ];

    public function getStatusKerjaAttribute($value)
    {
        return $value ?: $this->attributes['status_kerja'];
    }
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

        static::creating(function ($pengajar) {
            $latestPengajar = static::latest()->first();
            $latestId = $latestPengajar ? $latestPengajar->id : 0;

            $pengajar->kode_pengajar = 'KBPGJ' . str_pad(($latestId + 1), 4, '0', STR_PAD_LEFT) . substr($pengajar->nomer_telepon, -4);
        });
    }
    public function getRouteKeyName(){
        return "kode_pengajar";
    }
}
