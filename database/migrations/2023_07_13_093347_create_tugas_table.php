<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tugas', function (Blueprint $table) {
            $table->id();
            $table->string('kode_tugas');
            $table->string('kode_kelas');
            $table->string('kode_materi');
            $table->string('kode_pengajar');
            $table->string('nama_tugas');
            $table->string('deskripsi');
            $table->string('keterangan')->nullable();
            $table->string('status_tugas')->default('Aktif');
            $table->date('tanggal_pengumpulan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tugas');
    }
};
