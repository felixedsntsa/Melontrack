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

        $query = HasilPanen::with('cabang')->where('cabang_id', auth('cabang')->id())->latest();

        if ($request->has('search')) {
            $search = $request->search;

            $query->where(function($q) use ($search) {
                $q->where('periode_panen', 'like', "%$search%")
                    ->orWhereHas('cabang', function ($q2) use ($search) {
                    $q2->where('nama', 'like', "%$search%");
                });
            });
        }

        $hasilPanens = $query->simplePaginate(10);
        // Hitung data untuk summary
        $totalPanen = HasilPanen::where('cabang_id', auth('cabang')->id())->sum('total_panen');
        $totalPeriode = HasilPanen::where('cabang_id', auth('cabang')->id())->distinct('periode_panen')->count('periode_panen');
        $lastUpdate = HasilPanen::where('cabang_id', auth('cabang')->id())->latest()->value('created_at');

        return view('cabang.hasilpanen', compact('hasilPanens', 'totalPanen', 'totalPeriode', 'lastUpdate'));
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

    public function edit($id)
    {
        $panen = HasilPanen::where('cabang_id', auth()->user()->id)->findOrFail($id);
        return view('cabang.edithasilpanen', compact('panen'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'periode_panen' => 'required|string',
            'total_panen' => 'required|integer',
            'keterangan' => 'nullable|string',
        ]);

        $panen = HasilPanen::where('cabang_id', auth()->user()->id)->findOrFail($id);
        $panen->update($request->only(['periode_panen', 'total_panen', 'keterangan']));

        return redirect()->route('cabang.hasilpanen')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $panen = HasilPanen::where('cabang_id', auth()->user()->id)->findOrFail($id);
        $panen->delete();

        return redirect()->route('cabang.hasilpanen')->with('success', 'Data berhasil dihapus.');
    }
}
