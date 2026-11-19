@extends('layouts.app')
@section('content')
<a href="{{ route('home') }}" class="btn btn-outline-secondary btn-sm mb-3">← Kembali ke Katalog</a>

<div class="card">
    <div class="row g-0">
        <div class="col-md-4 p-3">
            @if($buku->cover)
                <img src="{{ $buku->cover }}"
                    class="img-fluid rounded"
                    alt="{{ $buku->judul }}">
            @else
                <div class="bg-light text-center text-muted py-5">Tidak Ada Sampul</div>
            @endif
        </div>
        <div class="col-md-8 p-3">
            <h3>{{ $buku->judul }}</h3>
            <p class="text-muted">{{ $buku->penulis }}</p>
            <hr>
            <p><strong>Penerbit:</strong> {{ $buku->penerbit }}</p>
            <p><strong>Tahun Terbit:</strong> {{ $buku->tahun_terbit }}</p>
            <p><strong>Status:</strong>
                <span class="badge {{ $buku->stok > 0 ? 'bg-success' : 'bg-danger' }}">
                    {{ $buku->stok > 0 ? 'Tersedia (' . $buku->stok . ' eksemplar)' : 'Stok Habis' }}
                </span>
            </p>
            @guest
                <div class="alert alert-info">Ingin meminjam buku ini? Silakan <a href="{{ route('login') }}">Login</a> dulu atau temui petugas perpustakaan.</div>
            @endguest
        </div>
    </div>
</div>
@endsection