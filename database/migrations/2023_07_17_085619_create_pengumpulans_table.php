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
        Schema::create('pengumpulans', function (Blueprint $table) {
            $table->id();
            $table->string('kode_pengumpulan');
            $table->string('kode_tugas');
            $table->string('kode_siswa');
            $table->string('keterangan')->nullable();
            $table->string('nilai')->nullable();
            $table->string('file_tugas');
            $table->string('status_pengumpulan');
            $table->date('tanggal_upload')->default(now());
            $table->time('waktu_upload')->default(now());
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
        Schema::dropIfExists('pengumpulans');
    }
};
