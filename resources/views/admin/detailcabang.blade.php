@extends('master.public')
@section('title', 'Detail Cabang - ' . $cabang->nama)
@section('content')

@include('master.navbar')

<div class="container mx-auto py-8">
    <div class="max-w-4xl mx-auto">
        <!-- Header Section -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Detail Cabang</h1>
            <span class="px-3 py-1 rounded-full text-sm font-medium {{ $cabang->status ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                {{ $cabang->status ? 'Aktif' : 'Tidak Aktif' }}
            </span>
        </div>

        <!-- Main Card -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100">
            <!-- Card Header -->
            <div class="bg-gradient-to-r from-green-600 to-green-800 p-6 text-white">
                <h2 class="text-2xl font-semibold">{{ $cabang->nama }}</h2>
                <p class="text-green-100">{{ $cabang->lokasi }}</p>
            </div>

            <!-- Card Body -->
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Contact Information -->
                    <div class="space-y-4">
                        <div>
                            <h3 class="text-lg font-medium text-gray-500 mb-2">Kontak</h3>
                            <div class="space-y-3">
                                <div class="flex items-start">
                                    <svg class="h-5 w-5 text-green-600 mr-3 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                    </svg>
                                    <div>
                                        <p class="text-sm text-gray-500">Telepon</p>
                                        <p class="font-medium">{{ $cabang->no_hp ?? '-' }}</p>
                                    </div>
                                </div>

                                <div class="flex items-start">
                                    <svg class="h-5 w-5 text-green-600 mr-3 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                    <div>
                                        <p class="text-sm text-gray-500">Email</p>
                                        <p class="font-medium">{{ $cabang->email ?? '-' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Additional Information -->
                    <div class="space-y-4">
                        <div>
                            <h3 class="text-lg font-medium text-gray-500 mb-2">Informasi</h3>
                            <div class="space-y-3">
                                <div>
                                    <p class="text-sm text-gray-500">Lokasi Lahan</p>
                                    <p class="font-medium">{{ $cabang->lokasi ?? '-' }}</p>
                                </div>

                                <div>
                                    <p class="text-sm text-gray-500">Penanggung Jawab</p>
                                    <p class="font-medium">{{ $cabang->nama_pekerja ?? '-' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Divider -->
                <hr class="my-6 border-gray-200">

            <!-- Card Footer -->
            <div class="bg-gray-50 px-6 py-4 flex justify-end rounded-lg">
                <a href="{{ url()->previous() }}" class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                    <svg class="-ml-1 mr-2 h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Kembali
                </a>
            </div>
        </div>
    </div>
</div>

@endsection
