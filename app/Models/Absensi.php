<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;
    protected $table = "absensis";

    protected $fillable = [
        'kode_jadwal',
        'status_kehadiran_pengajar',
        'waktu_mulai',
        'waktu_berakhir',
        'tanggal_absensi',
        'keterangan',
    ];
    protected $attributes = [
        'status_kehadiran_pengajar' => 'Hadir',
    ];

    public function getStatusKehadiranPengajarttribute($value)
    {
        return $value ?: $this->attributes['status_kehadiran_pengajar'];
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($absensi) {
            $latestAbsensi = static::latest()->first();
            $latestId = $latestAbsensi ? $latestAbsensi->id : 0;

            $absensi->kode_absensi = 'KBABS' . str_pad(($latestId + 1), 4, '0', STR_PAD_LEFT) . substr($absensi->kode_jadwal, -4);
        });
    }
    public function getRouteKeyName(){
        return "kode_absensi";
    }
    public function jadwal()
{
    return $this->belongsTo(Jadwal::class, 'kode_jadwal', 'kode_jadwal');
}
    public function presensi()
{
    return $this->hasMany(Presensi::class, 'kode_absensi', 'kode_absensi');
}

}
