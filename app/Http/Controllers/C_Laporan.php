<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class C_Laporan extends Controller
{
    public function index(Request $request)
    {
        if (auth('cabang')->user()->status != 1) {
            return redirect()->route('cabang.profil')->with('error', 'Akun Anda belum aktif. Silakan aktifkan terlebih dahulu di halaman profil.');
        }

        $query = Laporan::where('cabang_id', auth('cabang')->id())->latest();

        if ($request->has('search')) {
            $search = $request->search;
            $query->where('tanggal', 'like', "%$search%");
        }

        $laporans = $query->simplePaginate(10);
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
            'dokumentasi.*' => 'image|mimes:jpeg,png,jpg,gif|max:10240'
        ]);

        $paths = [];
        if ($request->hasFile('dokumentasi')) {
            foreach ($request->file('dokumentasi') as $file) {
                $paths[] = $file->store('laporan-foto', 'public');
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

    public function edit($id)
    {
        $laporan = Laporan::where('cabang_id', auth('cabang')->id())->findOrFail($id);
        return view('cabang.editlaporan', compact('laporan'));
    }

    public function update(Request $request, $id)
    {
        $laporan = Laporan::where('cabang_id', auth('cabang')->id())->findOrFail($id);

        $request->validate([
            'deskripsi' => 'required|string',
            'dokumentasi.*' => 'image|mimes:jpeg,png,jpg,gif|max:10240',
        ]);

        // Ambil dokumentasi lama
        $existingDocs = $laporan->dokumentasi ?? [];

        // Proses penghapusan dokumentasi yang ditandai
        if ($request->has('deleted_docs')) {
            foreach ($request->deleted_docs as $index) {
                if (isset($existingDocs[$index])) {
                    Storage::disk('public')->delete($existingDocs[$index]); // Hapus dari storage
                    unset($existingDocs[$index]); // Hapus dari array
                }
            }
            $existingDocs = array_values($existingDocs); // Reindex array
        }

        // Hapus dokumentasi lama jika ada upload baru
        if ($request->hasFile('dokumentasi') && !empty($laporan->dokumentasi)) {
            foreach ($laporan->dokumentasi as $file) {
                Storage::disk('public')->delete($file);
            }
        }

        // Upload dokumentasi baru
        $paths = [];
        if ($request->hasFile('dokumentasi')) {
            foreach ($request->file('dokumentasi') as $file) {
                $paths[] = $file->store('laporan-foto', 'public');
            }
        }

        // Kalau ada file baru, ganti dokumentasi lama
        if (!empty($paths)) {
            $laporan->dokumentasi = $paths;
        }

        $laporan->update([
            'deskripsi' => $request->deskripsi,
            'dokumentasi' => $laporan->dokumentasi,
        ]);

        return redirect()->route('cabang.laporan')->with('success', 'Laporan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $laporan = Laporan::where('cabang_id', auth('cabang')->id())->findOrFail($id);

        if (!empty($laporan->dokumentasi)) {
            foreach ($laporan->dokumentasi as $file) {
                Storage::disk('public')->delete($file);
            }
        }

        try {
            $laporan->delete();
            return redirect()->route('cabang.laporan')->with('success', 'Laporan berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->route('cabang.laporan')->with('error', 'Gagal menghapus laporan');
        }
    }
}
