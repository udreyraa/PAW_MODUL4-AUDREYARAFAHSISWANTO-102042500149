@extends('layouts.app')
@section('content')

<form action="{{ route('buku.update', $buku->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Judul Buku</label>
        <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" value="{{ old('judul', $buku->judul) }}">
        @error('judul') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label>Penulis</label>
        <input type="text" name="penulis" class="form-control @error('penulis') is-invalid @enderror" value="{{ old('penulis', $buku->penulis) }}">
        @error('penulis') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label>Penerbit</label>
        <input type="text" name="penerbit" class="form-control @error('penerbit') is-invalid @enderror" value="{{ old('penerbit', $buku->penerbit) }}">
        @error('penerbit') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label>Tahun Terbit</label>
        <input type="number" name="tahun_terbit" class="form-control @error('tahun_terbit') is-invalid @enderror" value="{{ old('tahun_terbit', $buku->tahun_terbit) }}">
        @error('tahun_terbit') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label>Jumlah Stok</label>
        <input type="number" name="stok" class="form-control @error('stok') is-invalid @enderror" value="{{ old('stok', $buku->stok) }}">
        @error('stok') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label fw-semibold">Sampul Saat Ini</label><br>
        @if($buku->cover)
            <img src="{{ asset('storage/' . $buku->cover) }}" class="img-thumbnail" style="max-height: 120px;">
        @else
            <span class="text-muted">Belum ada sampul</span>
        @endif
    </div>

    <div class="mb-3">
        <label for="cover" class="form-label fw-semibold">Ganti Sampul (Opsional)</label>
        <input type="file" class="form-control @error('cover') is-invalid @enderror"
               id="cover" name="cover" accept="image/*">
        @error('cover') <div class="invalid-feedback">{{ $message }}</div> @enderror
        <small class="text-muted">Kosongkan jika tidak ingin mengubah sampul. Format: JPG, JPEG, PNG. Maks 2 MB.</small>
    </div>

    <button type="submit" class="btn btn-primary">Perbarui Buku</button>
</form>
@endsection