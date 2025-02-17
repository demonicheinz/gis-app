<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\Sekolah;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;

class SekolahController extends Controller
{
    /**
     * Menampilan daftar sekolah
     */
    public function index()
    {
        $sekolah = Sekolah::with('kecamatan')->get();
        $title = 'Sekolah';

        return view('sekolah.sekolah-index', compact('sekolah', 'title'));
    }

    /**
     * Menampilkan form tambah
     */
    public function create()
    {
        $kecamatan = Kecamatan::all();
        $title = 'Tambah Data Sekolah';

        return view('sekolah.create', compact('kecamatan', 'title'));
    }

    /**
     * Menyimpan sekolah baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'npsn' => 'required|unique:sekolahs,npsn',
            'kode_kecamatan' => 'required',
            'nama_sekolah' => 'required',
            'alamat_sekolah' => 'required',
            'status' => 'required',
            'jenjang_pendidikan' => 'required',
            'koordinat' => 'required',
        ]);

        try {
            Sekolah::create($request->all());

            // Debugging: Tambahkan dd() untuk mengecek apakah pesan terkirim
            session()->flash('success', 'Data sekolah berhasil ditambahkan!');

            return redirect()->route('sekolah.index');
        } catch (\Exception $e) {
            session()->flash('error', 'Gagal menambahkan data sekolah!');

            return redirect()->back()->withInput();
        }
    }

    /**
     * Menampilkan detail sekolah
     */
    public function show($npsn)
    {
        return redirect()->route('sekolah.index');
    }

    /**
     * Menampilkan form edit sekolah
     */
    public function edit($npsn)
    {
        $sekolah = Sekolah::findOrFail($npsn);
        $kecamatan = Kecamatan::all();
        $title = 'Sekolah';

        return view('sekolah.edit', compact('sekolah', 'kecamatan', 'title'));
    }

    /**
     * Memperbarui sekolah
     */
    public function update(Request $request, $npsn)
    {
        $request->validate([
            'npsn' => 'required',
            'kode_kecamatan' => 'required',
            'nama_sekolah' => 'required',
            'alamat_sekolah' => 'required',
            'status' => 'required',
            'jenjang_pendidikan' => 'required',
            'koordinat' => 'required',
        ]);

        $sekolah = Sekolah::findOrFail($npsn);
        $sekolah->update($request->all());

        return redirect()->route('sekolah.index')->with('success', 'Data sekolah berhasil diperbarui');
    }

    /**
     * Menghapus sekolah
     */
    public function destroy($npsn)
    {
        $sekolah = Sekolah::where('npsn', $npsn)->firstOrFail();
        $sekolah->delete();

        return response()->json;
    }
}
