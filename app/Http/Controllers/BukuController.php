<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use App\Http\Requests\StoreBukuRequest;
use App\Http\Requests\UpdateBukuRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BukuController extends Controller
{
    public function index(Request $request)
    {
        $buku = Buku::with('kategori')
            ->when($request->cari, function ($query, $cari) {
                $query->where('judul', 'like', '%' . $cari . '%')
                      ->orWhere('penulis', 'like', '%' . $cari . '%');
            })
            ->when($request->kategori, function ($query, $kategoriId) {
                $query->where('id_kategori', $kategoriId);
            })
            ->orderBy('judul')
            ->get();

        $kategori = Kategori::orderBy('nama_kategori')->get();

        return view('buku.index', compact('buku', 'kategori'));
    }

    public function create()
    {
        $kategori = Kategori::orderBy('nama_kategori')->get();
        return view('buku.create', compact('kategori'));
    }

    public function store(StoreBukuRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('cover')) {
            $data['cover'] = $request->file('cover')->store('cover-buku', 'public');
        } else {
            $data['cover'] = 'cover-buku/default.png';
        }

        Buku::create($data);
        return redirect()->route('buku.index')->with('success', 'Buku berhasil ditambahkan.');
    }

    public function edit(Buku $buku)
    {
        $kategori = Kategori::orderBy('nama_kategori')->get();
        return view('buku.edit', compact('buku', 'kategori'));
    }

    public function update(UpdateBukuRequest $request, Buku $buku)
    {
        $data = $request->validated();

        if ($request->hasFile('cover')) {
            if ($buku->cover && $buku->cover !== 'cover-buku/default.png') {
                Storage::disk('public')->delete($buku->cover);
            }
            $data['cover'] = $request->file('cover')->store('cover-buku', 'public');
        } else {
            unset($data['cover']);
        }

        $buku->update($data);
        return redirect()->route('buku.index')->with('success', 'Buku berhasil diperbarui.');
    }

    public function destroy(Buku $buku)
    {
        try {
            if ($buku->cover && $buku->cover !== 'cover-buku/default.png') {
                Storage::disk('public')->delete($buku->cover);
            }
            $buku->delete();
            return redirect()->route('buku.index')->with('success', 'Buku berhasil dihapus.');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('buku.index')->with('error', 'Buku tidak bisa dihapus karena masih ada riwayat peminjaman.');
        }
    }
}