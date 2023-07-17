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
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->string('kode_program');
            $table->string('kode_tingkat');
            $table->string('nama_program');
            $table->string('deskripsi_singkat');
            $table->text('deskripsi');
            $table->decimal('harga', 16, 2);
            $table->string('kode_jadwal');
            $table->string('kode_materi');
            $table->integer('kuota_siswa');
            $table->string('status_program');
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
        Schema::dropIfExists('programs');
    }
};
