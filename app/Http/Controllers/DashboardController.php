<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Peminjaman;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBuku = Buku::count();
        $totalKategori = Kategori::count();
        $sedangDipinjam = Peminjaman::whereDoesntHave('pengembalian')->count();
        $terlambat = Peminjaman::whereDoesntHave('pengembalian')
            ->where('tanggal_kembali', '<', now())
            ->count();

        $distribusiKategori = Kategori::withCount('buku')->get();

        return view('dashboard', compact('totalBuku', 'totalKategori', 'sedangDipinjam', 'terlambat', 'distribusiKategori'));
    }
}