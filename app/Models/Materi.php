<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;
    protected $table = 'materis';

     // Kolom yang dapat diisi
     protected $fillable = [
        'kode_materi',
        'nama_materi',
        'deskripsi_singkat',
        'deskripsi',
        'modul',
    ];

     protected static function boot()
    {
        parent::boot();

        static::creating(function ($materi) {
            $latestMateri = static::latest()->first();
            $latestId = $latestMateri ? $latestMateri->id : 0;

            $materi->kode_materi = 'KBMTR' . str_pad(($latestId + 1), 4, '0', STR_PAD_LEFT);
        });
    }
    public function getRouteKeyName(){
        return "kode_materi";
    }
    public function program()
     {
         return $this->hasMany(Program::class, 'kode_materi', 'kode_materi');
     }
    public function pengajaran()
     {
         return $this->belongsTo(Pengajaran::class, 'kode_materi', 'kode_materi');
     }
     public function jadwal()
{
    return $this->hasMany(Jadwal::class, 'kode_materi', 'kode_materi');
}

}
