<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajaran extends Model
{
    use HasFactory;
    protected $table = 'pengajarans';

     // Kolom yang dapat diisi
     protected $fillable = [
        'kode_pengajaran',
        'kode_materi',
        'kode_pengajar',
        'hari',
        'kode_waktu',
        'status_pengajaran',
    ];

    protected $attributes = [
        'status_pengajaran' => 'Tidak Aktif',
    ];

    public function getStatusKerjaAttribute($value)
    {
        return $value ?: $this->attributes['status_kerja'];
    }

     protected static function boot()
    {
        parent::boot();

        static::creating(function ($pengajaran) {
            $latestPengajar = static::latest()->first();
            $latestId = $latestPengajar ? $latestPengajar->id : 0;

            $pengajaran->kode_pengajaran = 'KBAJR' . str_pad(($latestId + 1), 4, '0', STR_PAD_LEFT) . substr($pengajaran->kode_materi, -2) . substr($pengajaran->kode_pengajar, -2) . substr($pengajaran->kode_waktu, -2);
        });
    }
    public function getRouteKeyName(){
        return "kode_pengajaran";
    }

    public function jadwal()
{
    return $this->hasMany(Jadwal::class, 'kode_pengajaran', 'kode_pengajaran');
}

    public function pengajar()
{
    return $this->belongsTo(Pengajar::class, 'kode_pengajar', 'kode_pengajar');
}
public function materi()
{
    return $this->belongsTo(Materi::class, 'kode_materi', 'kode_materi');
}
public function waktu()
{
    return $this->belongsTo(Waktu::class, 'kode_waktu', 'kode_waktu');
}



}
