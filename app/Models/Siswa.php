<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswas';

    protected $fillable = [
        'kode_user',
        'kode_pendaftaran',
        'kode_kelas',
        'status_siswa',
        'tanggal_masuk',
        'tanggal_lulus',
    ];

    protected $attributes = [
        'status_siswa' => 'Aktif',
    ];

    public function getStatusSiswaAttribute($value)
    {
        return $value ?: $this->attributes['status_siswa'];
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($siswa) {
            $latestSiswa = static::latest()->first();
            $latestId = $latestSiswa ? $latestSiswa->id : 0;

            $siswa->kode_siswa = 'KBSWA' . str_pad(($latestId + 1), 4, '0', STR_PAD_LEFT) . substr($siswa->kode_user, -2) . substr($siswa->kode_pendaftaran, -3) . substr($siswa->kode_kelas, -4);
        });
    }
    public function getRouteKeyName(){
        return "kode_siswa";
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'kode_user', 'kode_user');
    }

    public function pendaftaran()
    {
        return $this->belongsTo(Pendaftaran::class, 'kode_pendaftaran', 'kode_pendaftaran');
    }

    public function kelompok()
    {
        return $this->belongsTo(Kelompok::class, 'kode_kelas', 'kode_kelas');
    }
    

}
