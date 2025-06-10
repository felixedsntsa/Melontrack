<?php

namespace App\Http\Controllers;

use App\Models\Cabang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class C_Cabang extends Controller
{
    public function show($id)
    {
        $cabang = Cabang::findOrFail($id);
        return view('admin.detailcabang', compact('cabang'));
    }

    public function profil()
    {
        return view('cabang.profilcabang', [
            'user' => Auth::guard('cabang')->user()
        ]);
    }

    public function editProfilCabang()
    {
        return view('cabang.editprofil', [
            'user' => Auth::guard('cabang')->user()
        ]);
    }

    public function updateProfilCabang(Request $request)
    {
        $cabang = auth('cabang')->user();

        $request->validate([
            'nama' => 'required|string|max:100',
            'email' => 'required|email|max:100|unique:cabangs,email,' . auth('cabang')->id(),
            'nama_pekerja' => 'required|string|max:100',
            'no_hp' => 'required|string|max:100',
            'lokasi' => 'required|string|max:100',
            'password' => 'nullable|string|min:6|confirmed',
            'status' => 'required|boolean',
        ]);

        $cabang->nama = $request->nama;
        $cabang->email = $request->email;
        $cabang->nama_pekerja = $request->nama_pekerja;
        $cabang->no_hp = $request->no_hp;
        $cabang->lokasi = $request->lokasi;
        $cabang->status = $request->status;

        if ($request->password) {
            $cabang->password = Hash::make($request->password);
        }

        $cabang->save();

        return redirect()->route('cabang.profil')->with('success', 'Profil berhasil diperbarui!');
    }

}
