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
        Schema::create('waktus', function (Blueprint $table) {
            $table->id();
            $table->string('kode_waktu');
            $table->string('nama_waktu');
            $table->string('durasi');
            $table->time('waktu_mulai');
            $table->time('waktu_berakhir');
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
        Schema::dropIfExists('waktus');
    }
};
