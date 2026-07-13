@extends('layouts.app')

@section('title', 'Edit Buku')

@section('content')
<<<<<<< HEAD
<h3 class="mb-4">Edit Buku</h3>

<form method="POST" action="{{ route('buku.update', $buku->id_buku) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Judul</label>
        <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" value="{{ old('judul', $buku->judul) }}">
        @error('judul')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Penulis</label>
        <input type="text" name="penulis" class="form-control @error('penulis') is-invalid @enderror" value="{{ old('penulis', $buku->penulis) }}">
        @error('penulis')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <label class="form-label">Tahun Terbit</label>
            <input type="number" name="tahun_terbit" class="form-control @error('tahun_terbit') is-invalid @enderror" value="{{ old('tahun_terbit', $buku->tahun_terbit) }}">
            @error('tahun_terbit')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="col-md-6 mb-3">
            <label class="form-label">Stok</label>
            <input type="number" name="stok" class="form-control @error('stok') is-invalid @enderror" value="{{ old('stok', $buku->stok) }}">
            @error('stok')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
    </div>

    <div class="mb-3">
        <label class="form-label">Kategori</label>
        <select name="id_kategori" class="form-select @error('id_kategori') is-invalid @enderror">
            <option value="">-- Pilih Kategori --</option>
            @foreach ($kategori as $k)
                <option value="{{ $k->id_kategori }}" {{ old('id_kategori', $buku->id_kategori) == $k->id_kategori ? 'selected' : '' }}>
                    {{ $k->nama_kategori }}
                </option>
            @endforeach
        </select>
        @error('id_kategori')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Cover Saat Ini</label>
        <div class="mb-2">
            <img src="{{ asset('storage/' . $buku->cover) }}" style="height:100px;object-fit:cover;border-radius:6px;">
        </div>
        <label class="form-label">Ganti Cover (opsional)</label>
        <input type="file" name="cover" class="form-control @error('cover') is-invalid @enderror">
        <small class="text-muted">Kosongkan jika tidak ingin mengganti cover.</small>
        @error('cover')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{ route('buku.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection
=======
    <h3 class="mb-4">Edit Buku</h3>

    <form method="POST" action="{{ route('buku.update', $buku->id_buku) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Judul</label>
            <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror"
                value="{{ old('judul', $buku->judul) }}">

            @error('judul')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Penulis</label>
            <input type="text" name="penulis" class="form-control @error('penulis') is-invalid @enderror"
                value="{{ old('penulis', $buku->penulis) }}">

            @error('penulis')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="row">

            <div class="col-md-6 mb-3">
                <label class="form-label">Tahun Terbit</label>

                <input type="number" name="tahun_terbit" class="form-control @error('tahun_terbit') is-invalid @enderror"
                    value="{{ old('tahun_terbit', $buku->tahun_terbit) }}">

                @error('tahun_terbit')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Stok</label>

                <input type="number" name="stok" class="form-control @error('stok') is-invalid @enderror"
                    value="{{ old('stok', $buku->stok) }}">

                @error('stok')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

        </div>

        <div class="mb-3">
            <label class="form-label">Kategori</label>

            <select name="id_kategori" class="form-select @error('id_kategori') is-invalid @enderror">

                @foreach ($kategori as $k)
                    <option value="{{ $k->id_kategori }}"
                        {{ old('id_kategori', $buku->id_kategori) == $k->id_kategori ? 'selected' : '' }}>

                        {{ $k->nama_kategori }}

                    </option>
                @endforeach

            </select>

            @error('id_kategori')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Cover Saat Ini</label>
            <br>

            <img src="{{ asset('storage/' . $buku->cover) }}" id="preview-cover" width="150" class="img-thumbnail mb-3">

        </div>

        <div class="mb-3">
            <label class="form-label">Ganti Cover (Opsional)</label>

            <input type="file" name="cover" id="cover" class="form-control @error('cover') is-invalid @enderror">

            @error('cover')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button class="btn btn-primary">
            Update
        </button>

        <a href="{{ route('buku.index') }}" class="btn btn-secondary">

            Batal

        </a>

    </form>

    <script>
        document.getElementById('cover').addEventListener('change', function(e) {

            if (e.target.files.length) {

                document.getElementById('preview-cover').src =
                    URL.createObjectURL(e.target.files[0]);

            }

        });
    </script>

@endsection
>>>>>>> c6ee52177f630d295f8b0e11f8aff892b756dc03
