@extends('layouts.app')
@section('content')

@if(session('error'))
    <div class="alert alert-danger alert-dismissible">{{ session('error') }}</div>
@endif

<h2 class="text-center">Katalog Koleksi Buku</h2>

<form method="GET" action="{{ route('home') }}" class="row g-2 mb-4">
    <div class="col-md-5">
        <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Cari judul, penulis...">
    </div>
    <div class="col-md-3">
        <select name="stok" class="form-select">
            <option value="">Semua Status</option>
            <option value="tersedia" @selected(request('stok') == 'tersedia')>Tersedia</option>
            <option value="habis" @selected(request('stok') == 'habis')>Stok Habis</option>
        </select>
    </div>
    <div class="col-md-3">
        <select name="sort" class="form-select">
            <option value="">Urutkan: Terbaru</option>
            <option value="judul" @selected(request('sort') == 'judul')>Judul</option>
            <option value="tahun" @selected(request('sort') == 'tahun')>Tahun</option>
            <option value="stok"  @selected(request('sort') == 'stok')>Stok</option>
        </select>
    </div>
    <div class="col-md-1"><button class="btn btn-primary w-100">Filter</button></div>
</form>

<div class="row">
    @forelse($buku as $item)
    <div class="col-md-3 mb-4">
        <div class="card h-100 shadow-sm">
            @if($item->cover)
                <img src="{{ asset('storage/' . $item->cover) }}" class="card-img-top"
                     style="height: 240px; object-fit: cover;" alt="{{ $item->judul }}">
            @else
                <div class="text-center py-5 bg-light text-muted" style="height: 240px;">Tidak Ada Sampul</div>
            @endif
            <div class="card-body">
                <h6>{{ $item->judul }}</h6>
                <p class="text-muted small">{{ $item->penulis }}</p>
                <span class="badge {{ $item->stok > 0 ? 'bg-success' : 'bg-danger' }}">
                    {{ $item->stok > 0 ? 'Tersedia (' . $item->stok . ')' : 'Stok Habis' }}
                </span>
            </div>
            <div class="card-footer bg-white border-top-0">
                <a href="{{ route('buku.publik.show', $item->id) }}" class="btn btn-outline-primary btn-sm w-100">Lihat Detail</a>
            </div>
        </div>
    </div>
    @empty
        <p class="text-center text-muted">Buku tidak ditemukan.</p>
    @endforelse
</div>

{{ $buku->links() }}
@endsection