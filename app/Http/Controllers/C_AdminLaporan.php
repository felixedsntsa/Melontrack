<?php

namespace App\Http\Controllers;
use App\Models\Laporan;
use Illuminate\Http\Request;

class C_AdminLaporan extends Controller
{
    public function index(Request $request)
    {
        $query = Laporan::with('cabang')->latest();

        if ($request->has('search')) {
            $search = $request->search;
            $query->whereHas('cabang', function ($q) use ($search) {
                $q->where('nama', 'like', "%$search%");
            })->orWhere('deskripsi', 'like', "%$search%")
            ->orWhere('feedback', 'like', "%$search%");
        }

        $laporans = $query->simplePaginate(10);
            return view('admin.laporan', [
            'laporans' => $laporans,
            'totalLaporan' => Laporan::count(),
            'laporanHariIni' => Laporan::whereDate('created_at', today())->count(),
            'belumDirespon' => Laporan::whereNull('feedback')->count(),
            'totalDokumentasi' => Laporan::get()->sum(function($laporan) {
                return count($laporan->dokumentasi);
            })
        ]);
    }

    public function show($id)
    {
        $laporan = Laporan::with('cabang')->findOrFail($id);
        return view('admin.detaillaporan', compact('laporan'));
    }

    // method untuk form
    public function feedbackForm($id)
    {
        $laporan = Laporan::findOrFail($id);
        return view('admin.feedback', compact('laporan'));
    }

    // method untuk proses submit
    public function submitFeedback(Request $request, $id)
    {
        $request->validate([
            'feedback' => 'required|string|max:1000',
        ]);

        $laporan = Laporan::findOrFail($id);
        $laporan->update([
            'feedback' => $request->feedback,
        ]);

        return redirect()->route('admin.laporan')->with('success', 'Feedback berhasil dikirim.');
    }
}
