@extends('layouts.app')

@section('title', 'Proses Pengembalian')

@section('content')
<h3 class="mb-4">Proses Pengembalian</h3>

<form method="POST" action="{{ route('pengembalian.store') }}">
    @csrf

    <div class="mb-3">
        <label class="form-label">Peminjaman</label>
        <select name="id_peminjaman" class="form-select">
            <option value="">-- Pilih Peminjaman --</option>
            @foreach ($peminjaman as $p)
                <option value="{{ $p->id_peminjaman }}">
                    {{ $p->anggota->nama }} - Pinjam {{ $p->tanggal_pinjam }} (batas: {{ $p->tanggal_kembali }})
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Tanggal Dikembalikan</label>
        <input type="date" name="tanggal_dikembalikan" class="form-control" value="{{ date('Y-m-d') }}">
    </div>

    <button type="submit" class="btn btn-primary">Proses</button>
    <a href="{{ route('pengembalian.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection