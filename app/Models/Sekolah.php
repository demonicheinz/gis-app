<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sekolah extends Model
{
    use HasFactory;

    protected $table = 'sekolahs';

    protected $primaryKey = 'npsn';

    public $timestamps = false;

    protected $fillable = [
        'npsn',
        'kode_kecamatan',
        'nama_sekolah',
        'alamat_sekolah',
        'status',
        'jenjang_pendidikan',
        'koordinat',
    ];

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'kode_kecamatan', 'kode_kecamatan');
    }
}
