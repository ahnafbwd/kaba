<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Tingkat extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = "tingkats";
    protected $fillable = [
        'nama_tingkat',
        'deskripsi',
        'ikon',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($tingkat) {
            $latestTingkatan = static::latest()->first();
            $latestId = $latestTingkatan ? $latestTingkatan->id : 0;

            $tingkat->kode_tingkat = 'KBTGK' . str_pad(($latestId + 1), 4, '0', STR_PAD_LEFT);
        });
    }
    public function getRouteKeyName(){
        return "kode_tingkat";
    }

    public function programs()
    {
        return $this->hasMany(Program::class, 'kode_tingkat', 'kode_tingkat');
    }
}
