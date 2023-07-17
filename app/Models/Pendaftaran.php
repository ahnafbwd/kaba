<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;
    protected $table = 'pendaftarans';

     // Kolom yang dapat diisi
     protected $fillable = [
        'kode_pendaftaran',
        'kode_user',
        'kode_kelas',
        'jumlah_pembayaran',
        'status_pembayaran',
        'status_pendaftaran',
        'tanggal_pembayaran',
     ];

     protected $attributes = [
        'status_pendaftaran' => 'Belum Bayar',
        'status_pembayaran' => 'Belum Bayar',
    ];

    public function getStatusPendaftaranAttribute($value)
    {
        return $value ?: $this->attributes['status_pendaftaran'];
    }
    public function getStatusPembayaranAttribute($value)
    {
        return $value ?: $this->attributes['status_pembayaran'];
    }

    // Relasi dengan model Tingkat
    public function user()
    {
        return $this->belongsTo(User::class, 'kode_user', 'kode_user');
    }
    public function kelompok()
    {
    return $this->belongsTo(Kelompok::class, 'kode_kelas', 'kode_kelas');
    }

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'kode_pendaftaran', 'kode_pendaftaran');
    }

     protected static function boot()
    {
        parent::boot();

        static::creating(function ($pendaftaran) {
            $latestPendaftaran = static::latest()->first();
            $latestId = $latestPendaftaran ? $latestPendaftaran->id : 0;
            $pendaftaran->kode_pendaftaran = 'KBDTR' . str_pad(($latestId + 1), 4, '0', STR_PAD_LEFT) . substr($pendaftaran->kode_user, -4) . substr($pendaftaran->kode_kelas, -4);
        });
    }
    public function getRouteKeyName(){
        return "kode_pendaftaran";
    }
}
