@extends('master.public')
@section('title', 'Profil Saya')
@section('content')

@include('master.navbar')

<div class="container mx-auto px-4 py-6">
    <div class="bg-white p-8 rounded-xl shadow-lg mt-6 mb-10 border max-w-2xl mx-auto">
        <h2 class="text-3xl font-bold text-gray-800 mb-2">Profil Saya</h2>
        <p class="text-gray-600 mb-6">Kelola informasi profil Anda untuk mengobrol, melindungi dan mengamankan akun</p>
        <hr class="mb-6">

        <div class="space-y-4">
            @php
                $fields = [
                    'Username' => $user->username ?? '-',
                    'Email' => $user->email ?? '-',
                    'Password' => '********',
                ];
            @endphp

            @foreach ($fields as $label => $value)
                <div class="flex items-center">
                    <label class="w-1/3 text-gray-700 font-medium">{{ $label }}</label>
                    <input type="text" value="{{ $value }}" class="w-2/3 border border-gray-300 rounded-lg px-4 py-2 bg-gray-100" disabled>
                </div>
            @endforeach
        </div>

        <div class="mt-6 flex justify-end">
            <a href="{{ route('profil.edit') }}" class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700">Ubah</a>
        </div>
    </div>
</div>

@include('master.footer')

@endsection
