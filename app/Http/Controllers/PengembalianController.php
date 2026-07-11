<?php

namespace App\Http\Controllers;

use App\Models\Pengembalian;
use App\Models\Peminjaman;
use App\Http\Requests\StorePengembalianRequest;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PengembalianController extends Controller
{
    public function index()
    {
        $pengembalian = Pengembalian::with('peminjaman.anggota')->orderByDesc('id_pengembalian')->get();
        return view('pengembalian.index', compact('pengembalian'));
    }

    public function create()
    {
        $peminjaman = Peminjaman::with('anggota')
            ->whereDoesntHave('pengembalian')
            ->orderByDesc('id_peminjaman')
            ->get();

        return view('pengembalian.create', compact('peminjaman'));
    }

    public function store(StorePengembalianRequest $request)
    {
        DB::transaction(function () use ($request) {
            $peminjaman = Peminjaman::with('detailPeminjaman')->findOrFail($request->id_peminjaman);

            $tanggalKembaliSeharusnya = Carbon::parse($peminjaman->tanggal_kembali);
            $tanggalDikembalikan = Carbon::parse($request->tanggal_dikembalikan);

            $telat = $tanggalDikembalikan->gt($tanggalKembaliSeharusnya)
                ? $tanggalKembaliSeharusnya->diffInDays($tanggalDikembalikan)
                : 0;

            $denda = $telat * config('perpustakaan.denda_per_hari');
            $status = $telat > 0 ? 'Terlambat' : 'Tepat Waktu';

            Pengembalian::create([
                'id_peminjaman' => $peminjaman->id_peminjaman,
                'tanggal_dikembalikan' => $request->tanggal_dikembalikan,
                'denda' => $denda,
                'status' => $status,
            ]);

            foreach ($peminjaman->detailPeminjaman as $detail) {
                $detail->buku->increment('stok', $detail->jumlah);
            }
        });

        return redirect()->route('pengembalian.index')->with('success', 'Pengembalian berhasil dicatat.');
    }
}