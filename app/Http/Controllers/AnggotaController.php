<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Http\Requests\StoreAnggotaRequest;
use App\Http\Requests\UpdateAnggotaRequest;

class AnggotaController extends Controller
{
    public function index()
    {
        $anggota = Anggota::orderBy('nama')->get();
        return view('anggota.index', compact('anggota'));
    }

    public function create()
    {
        return view('anggota.create');
    }

    public function store(StoreAnggotaRequest $request)
    {
        Anggota::create($request->validated());
        return redirect()->route('anggota.index')->with('success', 'Anggota berhasil ditambahkan.');
    }

    public function edit(Anggota $anggotum)
    {
        return view('anggota.edit', ['anggota' => $anggotum]);
    }

    public function update(UpdateAnggotaRequest $request, Anggota $anggotum)
    {
        $anggotum->update($request->validated());
        return redirect()->route('anggota.index')->with('success', 'Anggota berhasil diperbarui.');
    }

    public function destroy(Anggota $anggotum)
    {
        try {
            $anggotum->delete();
            return redirect()->route('anggota.index')->with('success', 'Anggota berhasil dihapus.');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('anggota.index')->with('error', 'Anggota tidak bisa dihapus karena masih memiliki riwayat peminjaman.');
        }
    }
}