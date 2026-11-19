@extends('layouts.app')
@section('content')

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<form method="GET" class="mb-3 d-flex gap-2">
    <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Cari judul / penulis...">
    <button class="btn btn-primary">Cari</button>
</form>

<table class="table table-bordered align-middle">
    <thead>
        <tr>
            <th>No</th><th>Sampul</th><th>Judul</th><th>Penulis</th><th>Stok</th><th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($buku as $item)
        <tr>
            <td>{{ $buku->firstItem() + $loop->index }}</td>
            <td>
                @if($item->cover)
                    <img src="{{ asset('storage/' . $item->cover) }}" width="60" class="img-thumbnail">
                @else
                    <span class="text-muted small">-</span>
                @endif
            </td>
            <td>{{ $item->judul }}</td>
            <td>{{ $item->penulis }}</td>
            <td>{{ $item->stok }}</td>
            <td>
                <a href="{{ route('buku.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('buku.destroy', $item->id) }}" method="POST" class="d-inline"
                      onsubmit="return confirm('Hapus buku ini?')">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
        @empty
        <tr><td colspan="6" class="text-center text-muted">Belum ada data.</td></tr>
        @endforelse
    </tbody>
</table>

{{ $buku->links() }}
@endsection