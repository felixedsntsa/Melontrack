@extends('master.public')
@section('title', 'Profil Saya')
@section('content')

@include('master.navbar2')

<div class="container mx-auto px-4 py-6 mb-4">
    <div class="bg-white p-8 rounded-xl shadow-md border max-w-2xl mx-auto">
        @if(session('message'))
            <div class="mb-4 p-4 bg-red-100 border border-red-300 text-red-800 rounded-lg">
                {{ session('message') }}
            </div>
        @endif
        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 border border-green-300 text-green-800 rounded-lg">
                {{ session('success') }}
            </div>
        @endif
        <h2 class="text-3xl font-bold text-gray-800 mb-2">Profil Saya</h2>
        <p class="text-gray-600 mb-6">Kelola informasi profil Anda untuk mengobrol, melindungi dan mengamankan akun</p>
        <hr class="mb-6">

        <div class="space-y-4">
            @php
                $fields = [
                    'Nama Cabang' => $user->nama ?? '-',
                    'Email' => $user->email ?? '-',
                    'Password' => '********',
                    'Nama Pekerja' => $user->nama_pekerja ?? '-',
                    'Nomor Hp' => $user->no_hp ?? '-',
                    'Lokasi Lahan' => $user->lokasi ?? '-',
                    'Status' => $user->status == 1 ? 'Aktif' : 'Tidak Aktif',
                ];
            @endphp

            @foreach ($fields as $label => $value)
                <div class="flex items-center">
                    <label class="w-1/3 text-gray-700 font-medium">{{ $label }}</label>
                    <input type="text" value="{{ $value }}" class="w-2/3 border border-gray-300 rounded-lg px-4 py-2 bg-gray-100" disabled>
                </div>
            @endforeach
        </div>

        <div class="mt-6 text-right">
            <a href="{{ route('cabang.profil.edit') }}" class="bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-6 rounded-lg">
                Ubah
            </a>
        </div>
    </div>
</div>

@include('master.footer2')

@endsection
