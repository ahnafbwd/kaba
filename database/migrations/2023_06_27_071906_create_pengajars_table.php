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
        Schema::create('pengajars', function (Blueprint $table) {
            $table->id();
            $table->string('kode_pengajar')->nullable();
            $table->string('nama_lengkap');
            $table->string('email')->unique();
            $table->string('nomer_telepon');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->date('tanggal_lahir')->nullable();
            $table->text('alamat');
            $table->string('password');
            $table->string('status_kerja')->nullable();
            $table->timestamp('tanggal_masuk')->useCurrent();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        DB::statement("UPDATE pengajars SET kode_pengajar = CONCAT('KBPGJ', id, SUBSTRING(nomer_telepon, -4))");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengajars');
    }
};
