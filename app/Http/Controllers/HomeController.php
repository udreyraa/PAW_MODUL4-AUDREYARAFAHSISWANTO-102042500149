<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $buku = Buku::when($search, function ($query, $search) {
                return $query->where(function ($q) use ($search) {
                    $q->where('judul', 'like', "%{$search}%")
                      ->orWhere('penulis', 'like', "%{$search}%");
                });
            })
            ->when($request->stok === 'tersedia', fn ($q) => $q->where('stok', '>', 0))
            ->when($request->stok === 'habis', fn ($q) => $q->where('stok', '<=', 0));

        // Sorting
        switch ($request->sort) {
            case 'judul':
                $buku->orderBy('judul');
                break;
            case 'tahun':
                $buku->orderByDesc('tahun_terbit');
                break;
            case 'stok':
                $buku->orderByDesc('stok');
                break;
            default:
                $buku->latest();
        }

        $buku = $buku->paginate(5)->withQueryString();

        return view('home', compact('buku', 'search'));
    }

    public function show(Buku $buku)
    {
        return view('home_show', compact('buku'));
    }
}