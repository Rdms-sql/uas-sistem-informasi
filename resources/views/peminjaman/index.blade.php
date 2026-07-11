@extends('layouts.app')

@section('title', 'Peminjaman')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3>Data Peminjaman</h3>
    <a href="{{ route('peminjaman.create') }}" class="btn btn-primary">Tambah Peminjaman</a>
</div>

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
@if (session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

<table class="table table-bordered bg-white">
    <thead>
        <tr>
            <th>Anggota</th>
            <th>Admin</th>
            <th>Buku Dipinjam</th>
            <th>Tanggal Pinjam</th>
            <th>Batas Kembali</th>
            <th>Status</th>
            <th style="width:100px">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($peminjaman as $item)
        <tr>
            <td>{{ $item->anggota->nama }}</td>
            <td>{{ $item->admin->username }}</td>
            <td>
                @foreach ($item->detailPeminjaman as $detail)
                    <div>{{ $detail->buku->judul }} ({{ $detail->jumlah }})</div>
                @endforeach
            </td>
            <td>{{ $item->tanggal_pinjam }}</td>
            <td>{{ $item->tanggal_kembali }}</td>
            <td>
                @if ($item->pengembalian)
                    <span class="badge bg-success">Sudah Kembali</span>
                @else
                    <span class="badge bg-warning text-dark">Dipinjam</span>
                @endif
            </td>
            <td>
                @if (!$item->pengembalian)
                <form method="POST" action="{{ route('peminjaman.destroy', $item->id_peminjaman) }}" class="d-inline" onsubmit="return confirm('Yakin hapus data peminjaman ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                </form>
                @endif
            </td>
        </tr>
        @empty
        <tr><td colspan="7" class="text-center">Belum ada data peminjaman.</td></tr>
        @endforelse
    </tbody>
</table>
@endsection