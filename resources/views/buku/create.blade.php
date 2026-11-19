@extends('layouts.app')
@section('content')

<form action="{{ route('buku.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <!-- Input judul, penulis, penerbit, tahun, stok -->

    <div class="mb-3">
        <label>Judul Buku</label>
        <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" value="{{ old('judul') }}">
        @error('judul') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label>Penulis</label>
        <input type="text" name="penulis" class="form-control @error('penulis') is-invalid @enderror" value="{{ old('penulis') }}">
        @error('penulis') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label>Penerbit</label>
        <input type="text" name="penerbit" class="form-control @error('penerbit') is-invalid @enderror" value="{{ old('penerbit') }}">
        @error('penerbit') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label>Tahun Terbit</label>
        <input type="number" name="tahun_terbit" class="form-control @error('tahun_terbit') is-invalid @enderror" value="{{ old('tahun_terbit', date('Y')) }}">
        @error('tahun_terbit') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label>Jumlah Stok</label>
        <input type="number" name="stok" class="form-control @error('stok') is-invalid @enderror" value="{{ old('stok', 1) }}">
        @error('stok') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label for="cover" class="form-label fw-semibold">Sampul Buku (Opsional)</label>
        <input type="file" class="form-control @error('cover') is-invalid @enderror"
               id="cover" name="cover" accept="image/*" onchange="previewImage(event)">
        @error('cover') <div class="invalid-feedback">{{ $message }}</div> @enderror
        <small class="text-muted">Format: JPG, JPEG, PNG. Maksimal: 2 MB.</small>

        <!-- Wadah Pratinjau Gambar Sebelum Disimpan -->
        <div class="mt-2">
            <img id="imagePreview" src="#" alt="Pratinjau Sampul"
                 class="img-thumbnail d-none" style="max-height: 160px;">
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Simpan Buku</button>
</form>

<script>
    function previewImage(event) {
        var input = event.target;
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                var preview = document.getElementById('imagePreview');
                preview.src = e.target.result;
                preview.classList.remove('d-none');
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection