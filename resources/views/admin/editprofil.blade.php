@extends('master.public')
@section('title', 'Ubah Profil')
@section('content')

@include('master.navbar')

<div class="container mx-auto px-4 py-6">
    <div class="bg-white p-6 rounded-xl mt-6 shadow-lg border max-w-2xl mx-auto mb-10">
        <h2 class="text-3xl font-bold text-gray-800 mb-2">Profil Saya</h2>
        <p class="text-gray-600 mb-6">Kelola informasi profil Anda untuk mengobrol, melindungi dan menggunakan akun</p>
        <hr class="mb-6">

        @if(session('message'))
            <div class="mb-4 text-green-700 bg-green-100 border border-green-400 px-4 py-2 rounded">
                {{ session('message') }}
            </div>
        @endif

        <form action="{{ route('profil.update') }}" method="POST">
            @csrf

            <div class="space-y-4">
                <div class="flex items-center">
                    <label class="font-semibold w-1/3">Username</label>
                    <div class="w-2/3">
                        <input type="text" name="username" value="{{ old('username', $user->username) }}"
                            class="w-full border px-3 py-2 rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-green-400">
                        @error('username')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex items-center">
                    <label class="font-semibold w-1/3">Email</label>
                    <div class="w-2/3">
                        <input type="email" name="email" value="{{ old('email', $user->email) }}"
                            class="w-full border px-3 py-2 rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-green-400">
                        @error('email')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex items-center">
                    <label class="font-semibold w-1/3">Password</label>
                    <div class="w-2/3">
                        <input type="password" name="password"
                            class="w-full border px-3 py-2 rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-green-400">
                        @error('password')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mt-6 flex justify-end gap-3">
                <a href="{{ url('/profiladmin') }}" class="bg-red-500 text-white px-6 py-2 rounded-lg hover:bg-red-600">Batal</a>
                <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700">Simpan</button>
            </div>
        </form>
    </div>
</div>

@include('master.footer')

@endsection
