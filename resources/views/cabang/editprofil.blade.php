@extends('master.public')
@section('title', 'Edit Profil')
@section('content')

@include('master.navbar2')

<div class="container mx-auto px-4 py-6 mb-4">
    <div class="bg-white p-8 rounded-xl shadow max-w-2xl mx-auto border border-gray-200">
        <h2 class="text-3xl font-bold text-gray-800 mb-2">Profil Saya</h2>
        <p class="text-gray-600 mb-6">Kelola informasi profil Anda untuk mengobrol, melindungi dan mengamankan akun</p>
        <hr class="mb-6">

        @if(session('message'))
            <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">
                {{ session('message') }}
            </div>
        @endif

        <form method="POST" action="{{ route('cabang.profil.update') }}">
            @csrf

            {{-- Nama Cabang --}}
            <div class="mb-4 flex items-center">
                <label class="w-1/3 font-semibold text-gray-700">Nama Cabang</label>
                <input type="text" name="nama" value="{{ old('nama', $user->nama) }}"
                    class="w-2/3 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-green-500">
            </div>
            @error('nama') <p class="text-red-500 text-sm text-right w-full">{{ $message }}</p> @enderror

            {{-- Email --}}
            <div class="mb-4 flex items-center">
                <label class="w-1/3 font-semibold text-gray-700">Email</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}"
                    class="w-2/3 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-green-500">
            </div>
            @error('email') <p class="text-red-500 text-sm text-right w-full">{{ $message }}</p> @enderror

            {{-- Password --}}
            <div class="mb-4 flex items-center">
                <label class="w-1/3 font-semibold text-gray-700">Password</label>
                <input type="password" name="password"
                    class="w-2/3 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-green-500">
            </div>
            @error('password') <p class="text-red-500 text-sm text-right w-full">{{ $message }}</p> @enderror

            {{-- Konfirmasi Password --}}
            <div class="mb-4 flex items-center">
                <label class="w-1/3 font-semibold text-gray-700">Konfirmasi Password</label>
                <input type="password" name="password_confirmation"
                    class="w-2/3 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-green-500">
            </div>
            @error('password_confirmation') <p class="text-red-500 text-sm text-right w-full">{{ $message }}</p> @enderror
            
            {{-- Nama Pekerja --}}
            <div class="mb-4 flex items-center">
                <label class="w-1/3 font-semibold text-gray-700">Nama Pekerja</label>
                <input type="text" name="nama_pekerja" value="{{ old('nama_pekerja', $user->nama_pekerja) }}"
                    class="w-2/3 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-green-500">
            </div>
            @error('nama_pekerja') <p class="text-red-500 text-sm text-right w-full">{{ $message }}</p> @enderror

            {{-- No HP --}}
            <div class="mb-4 flex items-center">
                <label class="w-1/3 font-semibold text-gray-700">Nomor HP</label>
                <input type="text" name="no_hp" value="{{ old('no_hp', $user->no_hp) }}"
                    class="w-2/3 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-green-500">
            </div>
            @error('no_hp') <p class="text-red-500 text-sm text-right w-full">{{ $message }}</p> @enderror

            {{-- Lokasi --}}
            <div class="mb-4 flex items-center">
                <label class="w-1/3 font-semibold text-gray-700">Lokasi Lahan</label>
                <input type="text" name="lokasi" value="{{ old('lokasi', $user->lokasi) }}"
                    class="w-2/3 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-green-500">
            </div>
            @error('lokasi') <p class="text-red-500 text-sm text-right w-full">{{ $message }}</p> @enderror

            {{-- Status --}}
            <div class="mb-6 flex items-center">
                <label class="w-1/3 font-semibold text-gray-700">Status</label>
                <select name="status"
                    class="w-2/3 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-green-500">
                    <option disabled selected>Pilih</option>
                    <option value="1" {{ old('status', $user->status) == 1 ? 'selected' : '' }}>Aktif</option>
                    <option value="0" {{ old('status', $user->status) == 0 ? 'selected' : '' }}>Tidak Aktif</option>
                </select>
            </div>
            @error('status') <p class="text-red-500 text-sm text-right w-full">{{ $message }}</p> @enderror

            <div class="flex justify-end gap-3">
                <a href="{{ url('/profilcabang') }}"
                    class="bg-red-500 text-white px-6 py-2 rounded-lg hover:bg-red-600 transition">Batal</a>
                <button type="submit"
                    class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition">Simpan</button>
            </div>
        </form>
    </div>
</div>

@include('master.footer2')

@endsection
