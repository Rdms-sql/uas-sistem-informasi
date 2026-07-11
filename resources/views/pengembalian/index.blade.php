@extends('layouts.app')

@section('title', 'Pengembalian')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3>Data Pengembalian</h3>
    <a href="{{ route('pengembalian.create') }}" class="btn btn-primary">Proses Pengembalian</a>
</div>

<table class="table table-bordered bg-white">
    <thead>
        <tr>
            <th>Anggota</th>
            <th>Tanggal Kembali</th>
            <th>Denda</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($pengembalian as $item)
        <tr>
            <td>{{ $item->peminjaman->anggota->nama }}</td>
            <td>{{ $item->tanggal_dikembalikan }}</td>
            <td>Rp {{ number_format($item->denda, 0, ',', '.') }}</td>
            <td>
                <span class="badge {{ $item->status == 'Terlambat' ? 'bg-danger' : 'bg-success' }}">
                    {{ $item->status }}
                </span>
            </td>
        </tr>
        @empty
        <tr><td colspan="4" class="text-center">Belum ada data.</td></tr>
        @endforelse
    </tbody>
</table>
@endsection