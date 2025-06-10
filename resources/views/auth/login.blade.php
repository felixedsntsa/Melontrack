@extends('master.public2')
@section('title', 'Login')
@section('content')

<div class="absolute inset-0 bg-black/60"></div></div>
        <div class="relative z-10 flex items-center justify-center h-full">
        <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-md ">
        <div class="flex items-center justify-center">
            <img src="asset/melonrepo.svg" alt="" class="w-20 mb-5">
        </div>
        <h1 class="text-3xl font-extrabold text-center text-green-600 mb-8">Melontrack</h1>

            @if ($errors->any())
                <div class="mb-4 w-full max-w-md bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Terjadi kesalahan:</strong>
                    <ul class="mt-2 list-disc list-inside text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session('error'))
                <div class="flex justify-center"> <!-- Parent container untuk mengatur posisi horizontal -->
                    <div class="flex items-center gap-3 border border-red-500 bg-gray-100 text-red-700 px-4 py-2 rounded-full mb-4 w-fit">
                        <!-- Icon lingkaran dengan X -->
                        <div class="w-5 h-5 border border-red-500 rounded-full flex items-center justify-center text-sm font-bold">
                            &times;
                        </div>
                        <span class="text-sm font-medium">Email/Password tidak valid</span>
                    </div>
                </div>
            @endif


        <form method="POST" action="{{ route('login.proses') }}">
            @csrf
            <!-- Email Input -->
            <div class="mb-6">
                <label for="email" class="block text-gray-700 font-bold mb-2">Email</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    placeholder="Masukkan Email"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500"
                    required
                >
            </div>

            <!-- Password Input -->
            <div class="mb-6">
                <label for="password" class="block text-gray-700 font-bold mb-2">Password</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Masukkan Password"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500"
                    required
                >
            </div>

            <!-- Submit Button -->
            <button
                type="submit"
                class="w-full bg-green-600 text-white font-bold py-2 px-4 rounded-lg hover:bg-green-700 transition duration-200 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                Masuk
            </button>
        </form>
    </div>

@endsection
