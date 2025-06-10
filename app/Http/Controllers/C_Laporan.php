<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Laporan;

class C_Laporan extends Controller
{
    public function index(Request $request)
    {
        if (auth('cabang')->user()->status != 1) {
            return redirect()->route('cabang.profil')->with('message', 'Akun Anda belum aktif. Silakan aktifkan terlebih dahulu di halaman profil.');
        }

        $query = Laporan::where('cabang_id', auth('cabang')->id());

        if ($request->has('search')) {
            $search = $request->search;
            $query->where('tanggal', 'like', "%$search%");
        }

        $laporans = $query->latest()->get();
        return view('cabang.laporan', compact('laporans'));
    }

    public function create()
    {
        return view('cabang.tambahlaporan');
    }

    public function show($id)
    {
        $laporan = Laporan::where('cabang_id', auth('cabang')->id())->findOrFail($id);
        return view('cabang.detaillaporan', compact('laporan'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'deskripsi' => 'required|string',
            'dokumentasi.*' => 'image|mimes:jpeg,png,jpg,gif|max:5120'
        ]);

        $paths = [];
        if ($request->hasFile('dokumentasi')) {
            foreach ($request->file('dokumentasi') as $file) {
                $paths[] = $file->store('dokumentasi', 'public');
            }
        }

        Laporan::create([
            'cabang_id' => auth('cabang')->id(),
            'tanggal' => now(),
            'deskripsi' => $request->deskripsi,
            'dokumentasi' => $paths,
        ]);

        return redirect()->route('cabang.laporan')->with('success', 'Laporan berhasil dikirim.');
    }
}
