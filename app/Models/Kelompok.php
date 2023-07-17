<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelompok extends Model
{
    use HasFactory;

    protected $table = 'kelompoks';

     // Kolom yang dapat diisi
     protected $fillable = [
        'kode_kelas',
        'kode_program',
        'kode_angkatan',
        'nama_kelas',
        'deskripsi',
        'jumlah_siswa',
        'link_wa',
        'status_kelas',
    ];

    protected $attributes = [
        'status_kelas' => 'Tidak Aktif',
    ];

    public function getStatusProgramAttribute($value)
    {
        return $value ?: $this->attributes['status_kelas'];
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($kelompok) {
            $latestKelompok = static::latest()->first();
            $latestId = $latestKelompok ? $latestKelompok->id : 0;

            $kelompok->kode_kelas = 'KBKLS' . str_pad(($latestId + 1), 4, '0', STR_PAD_LEFT);
        });
    }
    public function getRouteKeyName(){
        return "kode_kelas";
    }

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class, 'kode_kelas', 'kode_kelas');
    }

    public function program()
{
    return $this->belongsTo(Program::class, 'kode_program', 'kode_program');
}
    public function angkatan()
    {
        return $this->belongsTo(Angkatan::class,'kode_angkatan','kode_angkatan');
    }

    public function siswa()
    {
        return $this->hasMany(Siswa::class, 'kode_kelas', 'kode_kelas');
    }
}
