<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HasilPenjualan;

class C_HasilPenjualan extends Controller
{
    public function index(Request $request)
    {
        $tahun = $request->tahun ?? date('Y');

        $data = HasilPenjualan::where('tahun', $tahun)->get();

        $bulans = [];
        $jumlahs = [];

        foreach ($data as $d) {
            $bulans[] = $d->bulan;
            $jumlahs[] = $d->jumlah;
        }

        $tahunList = HasilPenjualan::select('tahun')->distinct()->orderBy('tahun')->pluck('tahun');

        return view('admin.hasilpenjualan', compact('bulans', 'jumlahs', 'tahunList', 'tahun'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'jumlah' => 'required|numeric',
        ]);

        $tanggal = \Carbon\Carbon::parse($request->tanggal);
        $tahun = $tanggal->year;
        $bulan = $tanggal->format('F'); 

        HasilPenjualan::updateOrCreate(
            ['tahun' => $tahun, 'bulan' => $bulan],
            ['jumlah' => $request->jumlah]
        );

        return redirect()->back()->with('success', 'Pendapatan berhasil ditambahkan!');
    }

}
