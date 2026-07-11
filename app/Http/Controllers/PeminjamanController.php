<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\DetailPeminjaman;
use App\Models\Buku;
use App\Models\Anggota;
use App\Http\Requests\StorePeminjamanRequest;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjaman = Peminjaman::with(['anggota', 'admin', 'detailPeminjaman.buku', 'pengembalian'])
            ->orderByDesc('id_peminjaman')->get();
        return view('peminjaman.index', compact('peminjaman'));
    }

    public function create()
    {
        $anggota = Anggota::orderBy('nama')->get();
        $buku = Buku::where('stok', '>', 0)->orderBy('judul')->get();
        return view('peminjaman.create', compact('anggota', 'buku'));
    }

    public function store(StorePeminjamanRequest $request)
    {
        DB::transaction(function () use ($request) {
            $lamaPinjam = config('perpustakaan.lama_pinjam_hari');

            $peminjaman = Peminjaman::create([
                'id_anggota' => $request->id_anggota,
                'id_admin' => Auth::id(),
                'tanggal_pinjam' => Carbon::now()->toDateString(),
                'tanggal_kembali' => Carbon::now()->addDays($lamaPinjam)->toDateString(),
            ]);

            foreach ($request->buku as $item) {
                $buku = Buku::lockForUpdate()->find($item['id_buku']);

                if ($buku->stok < $item['jumlah']) {
                    throw new \Exception("Stok buku '{$buku->judul}' tidak mencukupi.");
                }

                DetailPeminjaman::create([
                    'id_peminjaman' => $peminjaman->id_peminjaman,
                    'id_buku' => $buku->id_buku,
                    'jumlah' => $item['jumlah'],
                ]);

                $buku->decrement('stok', $item['jumlah']);
            }
        });

        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil dicatat.');
    }

    public function destroy(Peminjaman $peminjaman)
    {
        try {
            $peminjaman->delete();
            return redirect()->route('peminjaman.index')->with('success', 'Data peminjaman dihapus.');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('peminjaman.index')->with('error', 'Data tidak bisa dihapus karena sudah ada pengembalian terkait.');
        }
    }
}