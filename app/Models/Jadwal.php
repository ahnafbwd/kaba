<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;
    protected $table = 'jadwals';
    protected $fillable = [
        'kode_pengajaran',
        'kode_kelas',
        'ruangan',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($jadwal) {
            $latestJadwal = static::latest()->first();
            $latestId = $latestJadwal ? $latestJadwal->id : 0;

            $jadwal->kode_jadwal = 'KBJDWL' . str_pad(($latestId + 1), 4, '0', STR_PAD_LEFT);
        });
    }
    public function getRouteKeyName(){
        return "kode_jadwal";
    }

    public function pengajaran()
{
    return $this->belongsTo(Pengajaran::class, 'kode_pengajaran', 'kode_pengajaran');
}

public function absensi()
{
    return $this->belongsTo(Absensi::class, 'kode_jadwal', 'kode_jadwal');
}

public function kelompok()
{
    return $this->belongsTo(Kelompok::class, 'kode_kelas', 'kode_kelas');
}


    public function program()
    {
        return $this->hasMany(Program::class,'kode_jadwal','kode_jadwal');
    }
//     public function jadwals()
// {
//     return $this->hasMany(Jadwal::class, 'kode_materi', 'kode_materi');
// }


}
