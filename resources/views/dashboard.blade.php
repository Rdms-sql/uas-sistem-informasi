@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <h3 class="mb-4">Dashboard</h3>

    <div class="row g-3">
        <div class="col-md-3">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <div class="text-muted small">Total Buku</div>
                    <div class="fs-3 fw-bold">{{ $totalBuku }}</div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <div class="text-muted small">Total Kategori</div>
                    <div class="fs-3 fw-bold">{{ $totalKategori }}</div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <div class="text-muted small">Sedang Dipinjam</div>
                    <div class="fs-3 fw-bold">{{ $sedangDipinjam }}</div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <div class="text-muted small">Keterlambatan Aktif</div>
                    <div class="fs-3 fw-bold">{{ $terlambat }}</div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-4">
        <div class="alert alert-info mb-0">
            Chart distribusi buku per kategori (berdasarkan warna) akan ditambahkan di sini oleh Person 5.
        </div>
    </div>
@endsection