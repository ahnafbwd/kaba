<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    use HasFactory;

    protected $table = "tugas";
    protected $fillable = [
        'kode_kelas',
        'kode_materi',
        'kode_pengajar',
        'nama_tugas',
        'deskripsi',
        'keterangan',
        'status_tugas',
        'tanggal_pengumpulan',
    ];

    protected $attributes = [
        'status_tugas' => 'Aktif',
    ];
    public function getStatusProgramAttribute($value)
    {
        return $value ?: $this->attributes['status_tugas'];
    }
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($tugas) {
            $latestTugas = static::latest()->first();
            $latestId = $latestTugas ? $latestTugas->id : 0;

            $tugas->kode_tugas = 'KBTGS' . str_pad(($latestId + 1), 4, '0', STR_PAD_LEFT);
        });
    }
    public function getRouteKeyName(){
        return "kode_tugas";
    }

    public function kelompok()
     {
         return $this->belongsTo(Kelompok::class, 'kode_kelas', 'kode_kelas');
     }
    public function pengajar()
     {
         return $this->belongsTo(Pengajar::class, 'kode_pengajar', 'kode_pengajar');
     }
    public function materi()
     {
         return $this->belongsTo(Materi::class, 'kode_materi', 'kode_materi');
     }
     public function pengumpulan()
    {
        return $this->hasMany(Pengumpulan::class, 'kode_tugas', 'kode_tugas');
    }
}
