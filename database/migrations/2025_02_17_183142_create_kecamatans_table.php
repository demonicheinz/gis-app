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
        Schema::create('kecamatans', function (Blueprint $table) {
            $table->string('kode_kecamatan', 100)->primary();
            $table->integer('id_kabupaten');
            $table->string('nama_kecamatan', 100);
            $table->integer('jumlah_penduduk');
            $table->float('luas_wilayah', 15, 2);
            $table->timestamps();

            $table->foreign('id_kabupaten')->references('id_kabupaten')->on('kabupatens')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kecamatans');
    }
};
