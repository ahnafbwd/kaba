<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $table = 'programs';

     // Kolom yang dapat diisi
     protected $fillable = [
        'kode_tingkat',
        'nama_program',
        'deskripsi_singkat',
        'deskripsi',
        'harga',
        'kode_jadwal',
        'kode_materi',
        'kuota_siswa',
        'status_program',
    ];

    protected $attributes = [
        'status_program' => 'tidak aktif',
    ];

    public function getStatusProgramAttribute($value)
    {
        return $value ?: $this->attributes['status_program'];
    }

    // Relasi dengan model Tingkat
    public function tingkat()
{
    return $this->belongsTo(Tingkat::class, 'kode_tingkat', 'kode_tingkat');
}
    public function kelompoks()
{
    return $this->hasMany(Kelompok::class, 'kode_program', 'kode_program');
}


     // Relasi dengan model Jadwal
     public function jadwal()
     {
         return $this->hasMany(Jadwal::class, 'kode_jadwal', 'kode_jadwal');
     }

     // Relasi dengan model Materi
     public function materi()
     {
         return $this->hasMany(Materi::class, 'kode_materi', 'kode_materi');
     }
     public function pengumpulans()
     {
         return $this->hasMany(Pengumpulan::class, 'kode_tugas', 'kode_tugas');
     }
     
     protected static function boot()
    {
        parent::boot();

        static::creating(function ($program) {
            $latestProgram = static::latest()->first();
            $latestId = $latestProgram ? $latestProgram->id : 0;

            $program->kode_program = 'KBPRG' . str_pad(($latestId + 1), 4, '0', STR_PAD_LEFT) . substr($program->kode_tingkat, -2);
        });
    }
    public function getRouteKeyName(){
        return "kode_program";
    }
}
