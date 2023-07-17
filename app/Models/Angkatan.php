<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Angkatan extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'angkatans';

    protected $fillable = [
        'angkatan',
        'tanggal_masuk',
        'tanggal_lulus',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($angkatan) {
            $latestAngkatan = static::latest()->first();
            $latestId = $latestAngkatan ? $latestAngkatan->id : 0;

            $angkatan->kode_angkatan = 'KBAGK' . str_pad(($latestId + 1), 4, '0', STR_PAD_LEFT) . substr($angkatan->tanggal_masuk, -4);
        });
    }
    public function getRouteKeyName(){
        return "kode_angkatan";
    }
    public function kelompok()
    {
        return $this->belongsTo(Angkatan::class,'kode_angkatan','kode_angkatan');
    }

}
