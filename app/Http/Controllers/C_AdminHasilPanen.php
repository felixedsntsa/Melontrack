<?php

namespace App\Http\Controllers;

use App\Models\HasilPanen;
use Illuminate\Http\Request;

class C_AdminHasilPanen extends Controller
{
    public function index(Request $request)
    {
        $query = HasilPanen::with('cabang')->latest();

        if ($request->has('search')) {
            $search = $request->search;
            $query->whereHas('cabang', function ($q) use ($search) {
                $q->where('nama', 'like', "%$search%");
            })->orWhere('periode_panen', 'like', "%$search%")
            ->orWhere('keterangan', 'like', "%$search%");
        }

        $hasilPanens = $query->simplePaginate(10);

        return view('admin.hasilpanen', compact('hasilPanens'));
    }
}
