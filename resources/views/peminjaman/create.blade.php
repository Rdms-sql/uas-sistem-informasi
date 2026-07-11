@extends('layouts.app')

@section('title', 'Tambah Peminjaman')

@section('content')
<h3 class="mb-4">Tambah Peminjaman</h3>

@if ($errors->any())
<div class="alert alert-danger">
    <ul class="mb-0">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form method="POST" action="{{ route('peminjaman.store') }}">
    @csrf

    <div class="mb-3">
        <label class="form-label">Anggota</label>
        <select name="id_anggota" class="form-select">
            <option value="">-- Pilih Anggota --</option>
            @foreach ($anggota as $a)
                <option value="{{ $a->id_anggota }}">{{ $a->nama }}</option>
            @endforeach
        </select>
    </div>

    <label class="form-label">Buku yang Dipinjam</label>
    <div id="buku-list">
        <div class="row g-2 mb-2 buku-row">
            <div class="col-md-7">
                <select name="buku[0][id_buku]" class="form-select">
                    <option value="">-- Pilih Buku --</option>
                    @foreach ($buku as $b)
                        <option value="{{ $b->id_buku }}">{{ $b->judul }} (stok: {{ $b->stok }})</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <input type="number" name="buku[0][jumlah]" class="form-control" placeholder="Jumlah" min="1" value="1">
            </div>
        </div>
    </div>
    <button type="button" id="tambah-buku" class="btn btn-sm btn-outline-secondary mb-3">+ Tambah Buku</button>

    <div>
        <button type="submit" class="btn btn-primary">Simpan Peminjaman</button>
        <a href="{{ route('peminjaman.index') }}" class="btn btn-secondary">Batal</a>
    </div>
</form>
@endsection

@section('scripts')
<script>
let index = 1;
document.getElementById('tambah-buku').addEventListener('click', function () {
    const container = document.getElementById('buku-list');
    const row = container.querySelector('.buku-row').cloneNode(true);
    row.querySelectorAll('select, input').forEach(el => {
        const name = el.getAttribute('name').replace(/\[\d+\]/, `[${index}]`);
        el.setAttribute('name', name);
        el.value = el.tagName === 'INPUT' ? 1 : '';
    });
    container.appendChild(row);
    index++;
});
</script>
@endsection