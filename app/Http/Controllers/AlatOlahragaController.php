<?php

namespace App\Http\Controllers;

use App\Models\AlatOlahraga;
use Illuminate\Http\Request;

class AlatOlahragaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alatOlahraga = AlatOlahraga::latest()->paginate(10);

        return view('alat_olahraga.index', compact('alatOlahraga'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('alat_olahraga.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_alat'  => 'required|string|max:255',
            'kategori'   => 'required|string|max:100',
            'kondisi'    => 'required|string|max:50',
            'tarif_sewa' => 'required|numeric|min:0',
            'stok'       => 'required|numeric|integer|min:0',
        ], [
            'nama_alat.required'  => 'Nama alat olahraga wajib diisi.',
            'kategori.required'   => 'Kategori wajib dipilih/diisi.',
            'kondisi.required'    => 'Kondisi alat wajib dipilih/diisi.',
            'tarif_sewa.required' => 'Tarif sewa per hari wajib diisi.',
            'tarif_sewa.numeric'  => 'Tarif sewa harus berupa angka.',
            'stok.required'       => 'Jumlah stok wajib diisi.',
            'stok.numeric'        => 'Stok harus berupa angka.',
            'stok.integer'        => 'Stok harus berupa bilangan bulat.',
        ]);

        AlatOlahraga::create($validated);

        return redirect()->route('alat-olahraga.index')
            ->with('success', 'Data alat olahraga berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(AlatOlahraga $alatOlahraga)
    {
        return redirect()->route('alat-olahraga.edit', $alatOlahraga);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AlatOlahraga $alatOlahraga)
    {
        return view('alat_olahraga.edit', compact('alatOlahraga'));
        return view('alat')
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AlatOlahraga $alatOlahraga)
    {
        $validated = $request->validate([
            'nama_alat'  => 'required|string|max:255',
            'kategori'   => 'required|string|max:100',
            'kondisi'    => 'required|string|max:50',
            'tarif_sewa' => 'required|numeric|min:0',
            'stok'       => 'required|numeric|integer|min:0',
        ], [
            'nama_alat.required'  => 'Nama alat olahraga wajib diisi.',
            'kategori.required'   => 'Kategori wajib dipilih/diisi.',
            'kondisi.required'    => 'Kondisi alat wajib dipilih/diisi.',
            'tarif_sewa.required' => 'Tarif sewa per hari wajib diisi.',
            'tarif_sewa.numeric'  => 'Tarif sewa harus berupa angka.',
            'stok.required'       => 'Jumlah stok wajib diisi.',
            'stok.numeric'        => 'Stok harus berupa angka.',
            'stok.integer'        => 'Stok harus berupa bilangan bulat.',
        ]);

        $alatOlahraga->update($validated);

        return redirect()->route('alat-olahraga.index')
            ->with('success', 'Data alat olahraga berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AlatOlahraga $alatOlahraga)
    {
        $alatOlahraga->delete();

        return redirect()->route('alat-olahraga.index')
            ->with('success', 'Data alat olahraga berhasil dihapus!');
    }
}
