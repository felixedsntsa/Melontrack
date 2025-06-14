<?php

namespace App\Http\Controllers;

use App\Models\HasilPanen;
use Illuminate\Http\Request;

class C_HasilPanen extends Controller
{
    public function index(Request $request)
    {
        if (auth('cabang')->user()->status != 1) {
            return redirect()->route('cabang.profil')->with('error', 'Akun Anda belum aktif. Silakan aktifkan terlebih dahulu di halaman profil.');
        }

        $query = HasilPanen::with('cabang')->where('cabang_id', auth('cabang')->id());

        if ($request->has('search')) {
            $search = $request->search;

            $query->where(function($q) use ($search) {
                $q->where('periode_panen', 'like', "%$search%")
                    ->orWhereHas('cabang', function ($q2) use ($search) {
                    $q2->where('nama', 'like', "%$search%");
                });
            });
        }

        $hasilPanens = $query->latest()->get();

        return view('cabang.hasilpanen', compact('hasilPanens'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'periode_panen' => 'required|string',
            'total_panen' => 'required|integer',
            'keterangan' => 'nullable|string',
        ]);

        HasilPanen::create([
            'cabang_id' => auth()->user()->id,
            'periode_panen' => $request->periode_panen,
            'total_panen' => $request->total_panen,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->back()->with('success', 'Laporan hasil panen berhasil ditambahkan.');
    }

}
