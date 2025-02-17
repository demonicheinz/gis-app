<?php

namespace App\Http\Controllers;

use App\Models\Kabupaten;
use App\Models\Kecamatan;
use Illuminate\Http\Request;

class KecamatanController extends Controller
{
    /**
     * Menampilkan daftar kecamatan
     */
    public function index()
    {
        $kecamatan = Kecamatan::with('kabupaten')->get();
        $title = 'Kecamatan';

        return view('kecamatan.kecamatan-index', compact('kecamatan', 'title'));
    }

    /**
     * Menampilkan form tambah kecamatan
     */
    public function create()
    {
        $kabupaten = Kabupaten::all();

        return view('kecamatan.create', compact('kabupaten'))->with('title', 'Kecamatan');
    }

    /**
     * Menyimpan kecamatan baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_kecamatan' => 'required|unique:kecamatans,kode_kecamatan',
            'nama_kecamatan' => 'required|string|max:255',
            'jumlah_penduduk' => 'required|integer|min:0',
            'luas_wilayah' => 'required|numeric|min:0',
            'id_kabupaten' => 'required|exists:kabupatens,id_kabupaten',
        ]);

        try {
            Kecamatan::create($request->all());

            session()->flash('success', 'Data kecamatan berhasil ditambahkan!');

            return redirect()->route('kecamatan.index');
        } catch (\Exception $e) {
            session()->flash('error', 'Gagal menambahkan data kecamatan!');

            return redirect()->back()->withInput();
        }
    }

    /**
     * Menampilkan detail kecamatan
     */
    public function show($kode_kecamatan)
    {
        $kecamatan = Kecamatan::with('kabupaten')->where('kode_kecamatan', $kode_kecamatan)->firstOrFail();

        return view('kecamatan.show', compact('kecamatan'));
    }

    /**
     * Menampilkan form edit kecamatan
     */
    public function edit($kode_kecamatan)
    {
        $kecamatan = Kecamatan::where('kode_kecamatan', $kode_kecamatan)->firstOrFail();
        $kabupaten = Kabupaten::all();
        $title = 'Kecamatan';

        return view('kecamatan.edit', compact('kecamatan', 'kabupaten', 'title'));
    }

    /**
     * Memperbarui kecamatan
     */
    public function update(Request $request, $kode_kecamatan)
    {
        $request->validate([
            'nama_kecamatan' => 'required',
            'jumlah_penduduk' => 'required|integer|min:0',
            'luas_wilayah' => 'required|numeric|min:0',
            'id_kabupaten' => 'required|exists:kabupatens,id_kabupaten',
        ]);

        $kecamatan = Kecamatan::where('kode_kecamatan', $kode_kecamatan)->firstOrFail();
        $kecamatan->update([
            'nama_kecamatan' => $request->nama_kecamatan,
            'jumlah_penduduk' => $request->jumlah_penduduk,
            'luas_wilayah' => $request->luas_wilayah,
            'id_kabupaten' => $request->id_kabupaten,
        ]);

        return redirect()->route('kecamatan.index')->with('success', 'Data kecamatan berhasil diperbarui');
    }

    /**
     * Menghapus kecamatan
     */
    public function destroy($kode_kecamatan)
    {
        $kecamatan = Kecamatan::where('kode_kecamatan', $kode_kecamatan)->firstOrFail();
        $kecamatan->delete();

        return response()->json;
    }
}
