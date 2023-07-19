<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengumpulan extends Model
{
    use HasFactory;

    protected $table = 'pengumpulans';

    protected $fillable = [
        'kode_tugas',
        'kode_siswa',
        'keterangan',
        'nilai',
        'file_tugas',
        'status_pengumpulan',
        'tanggal_upload',
        'waktu_upload',
    ];

    protected $attributes = [
        'status_pengumpulan' => 'Sudah Dikumpulkan',
    ];

    public function getStatusPengumpulanAttribute($value)
    {
        return $value ?: $this->attributes['status_pengumpulan'];
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($pengumpulan) {
            $latestPengumpulan = static::latest()->first();
            $latestId = $latestPengumpulan ? $latestPengumpulan->id : 0;

            $pengumpulan->kode_pengumpulan = 'KBKMPTGS' . str_pad(($latestId + 1), 4, '0', STR_PAD_LEFT) . substr($pengumpulan->kode_tugas, -2) . substr($pengumpulan->kode_siswa, -2);
        });
    }
    public function getRouteKeyName(){
        return "kode_pengumpulan";
    }
    public function tugas()
    {
        return $this->belongsTo(Tugas::class, 'kode_tugas', 'kode_tugas');
    }
    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'kode_siswa', 'kode_siswa');
    }
}
