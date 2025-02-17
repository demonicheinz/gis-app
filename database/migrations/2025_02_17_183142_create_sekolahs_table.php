<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sekolahs', function (Blueprint $table) {
            $table->integer('npsn')->primary();
            $table->string('kode_kecamatan', 100);
            $table->string('nama_sekolah', 100);
            $table->string('alamat_sekolah', 100);
            $table->string('status', 100);
            $table->string('jenjang_pendidikan', 100);
            $table->string('koordinat', 100);
            $table->timestamps();

            $table->foreign('kode_kecamatan')->references('kode_kecamatan')->on('kecamatans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sekolahs');
    }
};
