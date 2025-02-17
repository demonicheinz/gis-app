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
        Schema::create('kabupatens', function (Blueprint $table) {
            $table->integer('id_kabupaten')->primary();
            $table->string('kode_kabupaten', 100);
            $table->string('nama_kabupaten', 100);
            $table->string('koordinat', 100);
            $table->integer('jumlah_penduduk');
            $table->float('luas_wilayah', 15, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kabupatens');
    }
};
