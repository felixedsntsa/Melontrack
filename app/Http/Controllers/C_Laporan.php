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
            return redirect()->route('cabang.profil')->with('message', 'Akun Anda belum aktif. Silakan aktifkan terlebih dahulu di halaman profil.');
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

        $paths = [];

        // Hapus dokumentasi lama jika ada upload baru
        if ($request->hasFile('dokumentasi') && !empty($laporan->dokumentasi)) {
            foreach ($laporan->dokumentasi as $file) {
                Storage::disk('public')->delete($file);
            }
        }

        // Upload dokumentasi baru
        if ($request->hasFile('dokumentasi')) {
            foreach ($request->file('dokumentasi') as $file) {
                $paths[] = $file->store('laporan-foto', 'public');
            }
        } else {
            $paths = $laporan->dokumentasi ?? [];
        }

        $laporan->dokumentasi = array_merge($laporan->dokumentasi ?? [], $paths);

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
