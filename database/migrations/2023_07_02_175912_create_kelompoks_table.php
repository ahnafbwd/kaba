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
        Schema::create('kelompoks', function (Blueprint $table) {
            $table->id();
            $table->string('kode_kelas');
            $table->string('kode_program');
            $table->string('kode_angkatan');
            $table->string('nama_kelas');
            $table->text('deskripsi')->nullable();
            $table->integer('jumlah_siswa')->nullable();
            $table->text('link_wa')->nullable();
            $table->string('status_kelas');
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
        Schema::dropIfExists('kelompoks');
    }
};
