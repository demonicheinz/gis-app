<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kecamatan extends Model
{
    use HasFactory;

    protected $table = 'kecamatans'; // Pastikan nama tabel benar

    protected $primaryKey = 'kode_kecamatan';

    public $timestamps = false;

    protected $fillable = [
        'kode_kecamatan',
        'nama_kecamatan',
        'jumlah_penduduk',
        'luas_wilayah',
        'id_kabupaten',
    ];

    public function kabupaten()
    {
        return $this->belongsTo(Kabupaten::class, 'id_kabupaten', 'id_kabupaten');
    }
}
