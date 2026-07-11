@extends('layouts.app')

@section('title', 'Buku')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3>Data Buku</h3>
    <a href="{{ route('buku.create') }}" class="btn btn-primary">Tambah Buku</a>
</div>

@if (session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

<div class="row g-3">
    @forelse ($buku as $item)
    <div class="col-md-3">
        <div class="card h-100 shadow-sm border-0" style="border-left: 6px solid {{ $item->kategori->warna }} !important;">
            <img src="{{ asset('storage/' . $item->cover) }}" class="card-img-top" style="height:180px;object-fit:cover;">
            <div class="card-body">
                <h6 class="card-title mb-1">{{ $item->judul }}</h6>
                <p class="text-muted small mb-2">{{ $item->penulis }} - {{ $item->tahun_terbit }}</p>
                <x-badge-kategori :nama="$item->kategori->nama_kategori" :warna="$item->kategori->warna" />
                <p class="small mt-2 mb-2">Stok: {{ $item->stok }}</p>
                <a href="{{ route('buku.edit', $item->id_buku) }}" class="btn btn-sm btn-warning">Edit</a>
                <form method="POST" action="{{ route('buku.destroy', $item->id_buku) }}" class="d-inline" onsubmit="return confirm('Yakin hapus buku ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
    @empty
    <p class="text-center">Belum ada buku.</p>
    @endforelse
</div>
@endsection