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
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->string('kode_siswa');
            $table->string('kode_user');
            $table->string('kode_pendaftaran');
            $table->string('kode_kelas');
            $table->string('status_siswa')->default('Aktif');
            $table->date('tanggal_masuk')->useCurrent();
            $table->date('tanggal_lulus')->nullable();
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
        Schema::dropIfExists('siswas');
    }
};
