<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kabupaten extends Model
{
    use HasFactory;

    protected $table = 'kabupatens';

    protected $primaryKey = 'id_kabupaten';

    public $timestamps = false;

    protected $fillable = [
        'kode_kabupaten',
        'nama_kabupaten',
        'koordinat',
        'jumlah_penduduk',
        'luas_wilayah',
    ];

    public function kecamatan()
    {
        return $this->hasMany(kecamatan::class, 'id_kabupaten', 'id_kabupaten');
    }

    public function sekolah()
    {
        return $this->hasManyThrough(Sekolah::class, Kecamatan::class, 'id_kabupaten', 'kode_kecamatan', 'id_kabupaten', 'kode_kecamatan');
    }
}
