@extends('layouts.app')

@section('title', 'Anggota')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3>Data Anggota</h3>
    <a href="{{ route('anggota.create') }}" class="btn btn-primary">Tambah Anggota</a>
</div>

@if (session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

<table class="table table-bordered bg-white">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Alamat</th>
            <th>No HP</th>
            <th>Tanggal Daftar</th>
            <th style="width:150px">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($anggota as $item)
        <tr>
            <td>{{ $item->nama }}</td>
            <td>{{ $item->alamat }}</td>
            <td>{{ $item->no_hp }}</td>
            <td>{{ $item->tanggal_daftar }}</td>
            <td>
                <a href="{{ route('anggota.edit', $item->id_anggota) }}" class="btn btn-sm btn-warning">Edit</a>
                <form method="POST" action="{{ route('anggota.destroy', $item->id_anggota) }}" class="d-inline" onsubmit="return confirm('Yakin hapus anggota ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
        @empty
        <tr><td colspan="5" class="text-center">Belum ada anggota.</td></tr>
        @endforelse
    </tbody>
</table>
@endsection