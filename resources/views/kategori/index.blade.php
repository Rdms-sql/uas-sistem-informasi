@extends('layouts.app')

@section('title', 'Kategori')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3>Data Kategori</h3>
    <a href="{{ route('kategori.create') }}" class="btn btn-primary">Tambah Kategori</a>
</div>

@if (session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

<table class="table table-bordered bg-white">
    <thead>
        <tr>
            <th>Nama Kategori</th>
            <th>Preview</th>
            <th style="width:150px">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($kategori as $item)
        <tr>
            <td>{{ $item->nama_kategori }}</td>
            <td><x-badge-kategori :nama="$item->nama_kategori" :warna="$item->warna" /></td>
            <td>
                <a href="{{ route('kategori.edit', $item->id_kategori) }}" class="btn btn-sm btn-warning">Edit</a>
                <form method="POST" action="{{ route('kategori.destroy', $item->id_kategori) }}" class="d-inline" onsubmit="return confirm('Yakin hapus kategori ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
        @empty
        <tr><td colspan="3" class="text-center">Belum ada kategori.</td></tr>
        @endforelse
    </tbody>
</table>
@endsection