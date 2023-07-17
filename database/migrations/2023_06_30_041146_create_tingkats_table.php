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
        Schema::create('tingkats', function (Blueprint $table) {
            $table->id();
            $table->string('kode_tingkat');
            $table->string('nama_tingkat');
            $table->string('deskripsi');
            $table->string('ikon');
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
        Schema::dropIfExists('tingkats');
    }
};
