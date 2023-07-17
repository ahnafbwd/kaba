<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Waktu extends Model
{
    use HasFactory;
    protected $table = 'waktus';

     // Kolom yang dapat diisi
     protected $fillable = [
        'kode_waktu',
        'nama_waktu',
        'durasi',
        'waktu_mulai',
        'waktu_berakhir',
    ];

     protected static function boot()
    {
        parent::boot();

        static::creating(function ($waktu) {
            $latestWaktu = static::latest()->first();
            $latestId = $latestWaktu ? $latestWaktu->id : 0;

            $waktu->kode_waktu = 'KBWKT' . str_pad(($latestId + 1), 4, '0', STR_PAD_LEFT);
        });
    }
    public function getRouteKeyName(){
        return "kode_waktu";
    }
}
