@extends('layouts.app')

@section('title', 'Edit Anggota')

@section('content')
<h3 class="mb-4">Edit Anggota</h3>

<form method="POST" action="{{ route('anggota.update', $anggota->id_anggota) }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Nama</label>
        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama', $anggota->nama) }}">
        @error('nama')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Alamat</label>
        <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" rows="3">{{ old('alamat', $anggota->alamat) }}</textarea>
        @error('alamat')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="mb-3">
        <label class="form-label">No HP</label>
        <input type="text" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror" value="{{ old('no_hp', $anggota->no_hp) }}">
        @error('no_hp')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Tanggal Daftar</label>
        <input type="date" name="tanggal_daftar" class="form-control @error('tanggal_daftar') is-invalid @enderror" value="{{ old('tanggal_daftar', $anggota->tanggal_daftar) }}">
        @error('tanggal_daftar')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{ route('anggota.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection