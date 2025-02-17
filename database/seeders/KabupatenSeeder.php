<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KabupatenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kabupatens')->insert([
            'id_kabupaten' => 1,
            'kode_kabupaten' => '3302',
            'nama_kabupaten' => 'Banyumas',
            'koordinat' => '-7.516901470028657, 109.29390160882824',
            'jumlah_penduduk' => 1828573,
            'luas_wilayah' => 1391.15,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
