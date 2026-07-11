@extends('layouts.app')

@section('title', 'Edit Kategori')

@section('content')
<h3 class="mb-4">Edit Kategori</h3>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('kategori.update', $kategori->id_kategori) }}">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label class="form-label">Nama Kategori</label>
        <input type="text" name="nama_kategori" class="form-control" value="{{ old('nama_kategori', $kategori->nama_kategori) }}" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Warna</label><br>
        <input type="color" name="warna" value="{{ old('warna', $kategori->warna) }}" style="width:80px;height:40px;border:none;padding:0;" required>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('kategori.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection