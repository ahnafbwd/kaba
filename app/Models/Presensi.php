<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    use HasFactory;
    protected $table = "presensis";

    protected $fillable = [
        'kode_absensi',
        'kode_siswa',
        'status_kehadiran',
        'waktu_presensi',
        'keterangan',
    ];
    protected $attributes = [
        'status_kehadiran' => 'Hadir',
    ];

    public function getStatusKehadiranttribute($value)
    {
        return $value ?: $this->attributes['status_kehadiran'];
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($presensi) {
            $latestPresensi = static::latest()->first();
            $latestId = $latestPresensi ? $latestPresensi->id : 0;

            $presensi->kode_presensi = 'KBPRS' . str_pad(($latestId + 1), 4, '0', STR_PAD_LEFT) . substr($presensi->kode_absensi, -3) . substr($presensi->kode_siswa, -3);
        });
    }
    public function getRouteKeyName(){
        return "kode_absensi";
    }
    public function absensi()
{
    return $this->belongsTo(Absensi::class, 'kode_absensi', 'kode_absensi');
}
    public function siswa()
{
    return $this->belongsTo(Siswa::class, 'kode_siswa', 'kode_siswa');
}
}
