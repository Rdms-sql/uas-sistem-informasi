@extends('layouts.app')

@section('title', 'Edit Kategori')

@section('content')
<h3 class="mb-4">Edit Kategori</h3>

<form method="POST" action="{{ route('kategori.update', $kategori->id_kategori) }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Nama Kategori</label>
        <input type="text" name="nama_kategori" class="form-control @error('nama_kategori') is-invalid @enderror" value="{{ old('nama_kategori', $kategori->nama_kategori) }}">
        @error('nama_kategori')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Warna Label</label>
        <input type="color" name="warna" class="form-control form-control-color @error('warna') is-invalid @enderror" value="{{ old('warna', $kategori->warna) }}">
        @error('warna')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{ route('kategori.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection