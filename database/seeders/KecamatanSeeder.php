<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KecamatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['kode_kecamatan' => '3302010', 'id_kabupaten' => 1, 'nama_kecamatan' => 'Lumbir', 'jumlah_penduduk' => 50546, 'luas_wilayah' => 107.96, 'created_at' => now(), 'updated_at' => now()],
            ['kode_kecamatan' => '3302020', 'id_kabupaten' => 1, 'nama_kecamatan' => 'Wangon', 'jumlah_penduduk' => 84755, 'luas_wilayah' => 68.99, 'created_at' => now(), 'updated_at' => now()],
            ['kode_kecamatan' => '3302030', 'id_kabupaten' => 1, 'nama_kecamatan' => 'Jatilawang', 'jumlah_penduduk' => 67483, 'luas_wilayah' => 48.90, 'created_at' => now(), 'updated_at' => now()],
            ['kode_kecamatan' => '3302040', 'id_kabupaten' => 1, 'nama_kecamatan' => 'Rawalo', 'jumlah_penduduk' => 53711, 'luas_wilayah' => 51.68, 'created_at' => now(), 'updated_at' => now()],
            ['kode_kecamatan' => '3302050', 'id_kabupaten' => 1, 'nama_kecamatan' => 'Kebasen', 'jumlah_penduduk' => 68650, 'luas_wilayah' => 52.70, 'created_at' => now(), 'updated_at' => now()],
            ['kode_kecamatan' => '3302060', 'id_kabupaten' => 1, 'nama_kecamatan' => 'Kemranjen', 'jumlah_penduduk' => 73478, 'luas_wilayah' => 62.88, 'created_at' => now(), 'updated_at' => now()],
            ['kode_kecamatan' => '3302070', 'id_kabupaten' => 1, 'nama_kecamatan' => 'Sumpiuh', 'jumlah_penduduk' => 58580, 'luas_wilayah' => 61.88, 'created_at' => now(), 'updated_at' => now()],
            ['kode_kecamatan' => '3302080', 'id_kabupaten' => 1, 'nama_kecamatan' => 'Tambak', 'jumlah_penduduk' => 51223, 'luas_wilayah' => 53.39, 'created_at' => now(), 'updated_at' => now()],
            ['kode_kecamatan' => '3302090', 'id_kabupaten' => 1, 'nama_kecamatan' => 'Somagede', 'jumlah_penduduk' => 38230, 'luas_wilayah' => 44.68, 'created_at' => now(), 'updated_at' => now()],
            ['kode_kecamatan' => '3302100', 'id_kabupaten' => 1, 'nama_kecamatan' => 'Kalibagor', 'jumlah_penduduk' => 58369, 'luas_wilayah' => 40.66, 'created_at' => now(), 'updated_at' => now()],
            ['kode_kecamatan' => '3302110', 'id_kabupaten' => 1, 'nama_kecamatan' => 'Banyumas', 'jumlah_penduduk' => 53668, 'luas_wilayah' => 40.48, 'created_at' => now(), 'updated_at' => now()],
            ['kode_kecamatan' => '3302120', 'id_kabupaten' => 1, 'nama_kecamatan' => 'Patikraja', 'jumlah_penduduk' => 61998, 'luas_wilayah' => 45.76, 'created_at' => now(), 'updated_at' => now()],
            ['kode_kecamatan' => '3302130', 'id_kabupaten' => 1, 'nama_kecamatan' => 'Purwojati', 'jumlah_penduduk' => 37789, 'luas_wilayah' => 42.18, 'created_at' => now(), 'updated_at' => now()],
            ['kode_kecamatan' => '3302140', 'id_kabupaten' => 1, 'nama_kecamatan' => 'Ajibarang', 'jumlah_penduduk' => 103490, 'luas_wilayah' => 69.04, 'created_at' => now(), 'updated_at' => now()],
            ['kode_kecamatan' => '3302150', 'id_kabupaten' => 1, 'nama_kecamatan' => 'Gumelar', 'jumlah_penduduk' => 54347, 'luas_wilayah' => 93.00, 'created_at' => now(), 'updated_at' => now()],
            ['kode_kecamatan' => '3302160', 'id_kabupaten' => 1, 'nama_kecamatan' => 'Pekuncen', 'jumlah_penduduk' => 76883, 'luas_wilayah' => 82.61, 'created_at' => now(), 'updated_at' => now()],
            ['kode_kecamatan' => '3302170', 'id_kabupaten' => 1, 'nama_kecamatan' => 'Cilongok', 'jumlah_penduduk' => 126255, 'luas_wilayah' => 135.31, 'created_at' => now(), 'updated_at' => now()],
            ['kode_kecamatan' => '3302180', 'id_kabupaten' => 1, 'nama_kecamatan' => 'Karanglewas', 'jumlah_penduduk' => 68467, 'luas_wilayah' => 31.89, 'created_at' => now(), 'updated_at' => now()],
            ['kode_kecamatan' => '3302190', 'id_kabupaten' => 1, 'nama_kecamatan' => 'Kedung Banteng', 'jumlah_penduduk' => 63201, 'luas_wilayah' => 56.92, 'created_at' => now(), 'updated_at' => now()],
            ['kode_kecamatan' => '3302200', 'id_kabupaten' => 1, 'nama_kecamatan' => 'Baturraden', 'jumlah_penduduk' => 54092, 'luas_wilayah' => 45.93, 'created_at' => now(), 'updated_at' => now()],
            ['kode_kecamatan' => '3302210', 'id_kabupaten' => 1, 'nama_kecamatan' => 'Sumbang', 'jumlah_penduduk' => 95916, 'luas_wilayah' => 57.42, 'created_at' => now(), 'updated_at' => now()],
            ['kode_kecamatan' => '3302220', 'id_kabupaten' => 1, 'nama_kecamatan' => 'Kembaran', 'jumlah_penduduk' => 82592, 'luas_wilayah' => 26.55, 'created_at' => now(), 'updated_at' => now()],
            ['kode_kecamatan' => '3302230', 'id_kabupaten' => 1, 'nama_kecamatan' => 'Sokaraja', 'jumlah_penduduk' => 90525, 'luas_wilayah' => 29.49, 'created_at' => now(), 'updated_at' => now()],
            ['kode_kecamatan' => '3302710', 'id_kabupaten' => 1, 'nama_kecamatan' => 'Purwokerto Selatan', 'jumlah_penduduk' => 73053, 'luas_wilayah' => 16.15, 'created_at' => now(), 'updated_at' => now()],
            ['kode_kecamatan' => '3302720', 'id_kabupaten' => 1, 'nama_kecamatan' => 'Purwokerto Barat', 'jumlah_penduduk' => 53349, 'luas_wilayah' => 7.26, 'created_at' => now(), 'updated_at' => now()],
            ['kode_kecamatan' => '3302730', 'id_kabupaten' => 1, 'nama_kecamatan' => 'Purwokerto Timur', 'jumlah_penduduk' => 55270, 'luas_wilayah' => 7.80, 'created_at' => now(), 'updated_at' => now()],
            ['kode_kecamatan' => '3302740', 'id_kabupaten' => 1, 'nama_kecamatan' => 'Purwokerto Utara', 'jumlah_penduduk' => 50093, 'luas_wilayah' => 9.65, 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('kecamatans')->insert($data);
    }
}
