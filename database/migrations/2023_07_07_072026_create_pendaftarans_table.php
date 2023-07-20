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
        Schema::create('pendaftarans', function (Blueprint $table) {
            $table->id();
            $table->string('kode_pendaftaran');
            $table->string('kode_user');
            $table->string('kode_kelas');
            $table->decimal('jumlah_pembayaran', 16, 2);
            $table->string('status_pembayaran');
            $table->string('status_pendaftaran');
            $table->timestamp('tanggal_pendaftaran')->useCurrent();
            $table->timestamp('tanggal_pembayaran')->nullable();
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
        Schema::dropIfExists('pendaftarans');
    }
};
