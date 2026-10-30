<?php

namespace App\Http\Controllers;

use App\Models\AlatOlahraga;
use Illuminate\Http\Request;

class AlatOlahragaController extends Controller
{
    /**
     * Menampilkan daftar seluruh data alat olahraga.
     */
    public function index()
    {
        $alatOlahraga = AlatOlahraga::all();

        return view('alat_olahraga.index', compact('alatOlahraga'));
    }

    /**
     * Menampilkan form untuk menambahkan data alat olahraga.
     */
    public function create()
    {
        return view('alat_olahraga.create');
    }

    /**
     * Menyimpan data baru alat olahraga ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_alat'  => 'required',
            'kategori'   => 'required',
            'kondisi'    => 'required',
            'tarif_sewa' => 'required|numeric',
            'stok'       => 'required|numeric',
        ]);

        AlatOlahraga::create($request->all());

        return redirect()->route('alat-olahraga.index')
            ->with('success', 'Data alat olahraga berhasil ditambahkan!');
    }

    /**
     * Menampilkan detail alat olahraga (dialihkan ke halaman edit).
     */
    public function show($id)
    {
        return redirect()->route('alat-olahraga.edit', $id);
    }

    /**
     * Menampilkan form edit untuk data alat olahraga tertentu.
     */
    public function edit($id)
    {
        $alatOlahraga = AlatOlahraga::findOrFail($id);

        return view('alat_olahraga.edit', compact('alatOlahraga'));
    }

    /**
     * Memperbarui data alat olahraga di database.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_alat'  => 'required',
            'kategori'   => 'required',
            'kondisi'    => 'required',
            'tarif_sewa' => 'required|numeric',
            'stok'       => 'required|numeric',
        ]);

        $alatOlahraga = AlatOlahraga::findOrFail($id);
        $alatOlahraga->update($request->all());

        return redirect()->route('alat-olahraga.index')
            ->with('success', 'Data alat olahraga berhasil diperbarui!');
    }

    /**
     * Menghapus data alat olahraga dari database.
     */
    public function destroy($id)
    {
        $alatOlahraga = AlatOlahraga::findOrFail($id);
        $alatOlahraga->delete();

        return redirect()->route('alat-olahraga.index')
            ->with('success', 'Data alat olahraga berhasil dihapus!');
    }
}
