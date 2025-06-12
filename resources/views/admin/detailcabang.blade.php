@extends('master.public')
@section('title', 'Detail Cabang - ' . $cabang->nama)
@section('content')

@include('master.navbar')

<div class="min-h-screen bg-gradient-to-br from-gray-50 to-green-50 py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-5xl mx-auto">
        <!-- Header Section -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8 gap-4">
            <div>
                <h1 class="text-3xl font-bold text-gray-800">Detail Cabang</h1>
                <p class="text-gray-500 mt-1">Informasi lengkap cabang {{ $cabang->nama }}</p>
            </div>
            <span class="px-4 py-1.5 rounded-full text-sm font-medium shadow-sm {{ $cabang->status ? 'bg-green-100 text-green-800 border border-green-200' : 'bg-red-100 text-red-800 border border-red-200' }}">
                {{ $cabang->status ? '✓ Aktif' : '✗ Tidak Aktif' }}
            </span>
        </div>

        <!-- Main Card -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100 transform transition-all hover:shadow-xl">
            <!-- Card Header with Gradient -->
            <div class="bg-gradient-to-r from-green-700 to-green-600 p-6 text-white relative">
                <div class="absolute top-0 right-0 p-4">
                    <div class="bg-white/20 backdrop-blur-sm rounded-full p-3">
                        <img src="{{ asset('asset/farmericon.png') }}" alt="Cabang" class="w-10 h-10 object-contain"/>
                    </div>
                </div>
                <h2 class="text-2xl font-semibold">{{ $cabang->nama }}</h2>
                <div class="flex items-center mt-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-200 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <p class="text-green-100 font-medium">{{ $cabang->lokasi }}</p>
                </div>
            </div>

            <!-- Card Body -->
            <div class="p-6 bg-white/90 backdrop-blur-sm">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Contact Information -->
                    <div class="space-y-6">
                        <div class="bg-gray-50 p-5 rounded-lg border border-gray-100">
                            <h3 class="text-lg font-semibold text-gray-700 mb-4 flex items-center">
                                <svg class="h-5 w-5 text-green-600 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                                Informasi Kontak
                            </h3>
                            <div class="space-y-4">
                                <div class="flex items-start">
                                    <div class="bg-green-100/50 p-2 rounded-lg mr-3">
                                        <svg class="h-5 w-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500">Telepon</p>
                                        <p class="font-medium text-gray-800">{{ $cabang->no_hp ?? '-' }}</p>
                                    </div>
                                </div>

                                <div class="flex items-start">
                                    <div class="bg-green-100/50 p-2 rounded-lg mr-3">
                                        <svg class="h-5 w-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500">Email</p>
                                        <p class="font-medium text-gray-800">{{ $cabang->email ?? '-' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Additional Information -->
                    <div class="space-y-6">
                        <div class="bg-gray-50 p-5 rounded-lg border border-gray-100">
                            <h3 class="text-lg font-semibold text-gray-700 mb-4 flex items-center">
                                <svg class="h-5 w-5 text-green-600 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                                Informasi Tambahan
                            </h3>
                            <div class="space-y-4">
                                <div class="flex items-start">
                                    <div class="bg-green-100/50 p-2 rounded-lg mr-3">
                                        <svg class="h-5 w-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500">Lokasi Lahan</p>
                                        <p class="font-medium text-gray-800">{{ $cabang->lokasi ?? '-' }}</p>
                                    </div>
                                </div>

                                <div class="flex items-start">
                                    <div class="bg-green-100/50 p-2 rounded-lg mr-3">
                                        <svg class="h-5 w-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500">Penanggung Jawab</p>
                                        <p class="font-medium text-gray-800">{{ $cabang->nama_pekerja ?? '-' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Divider -->
                <div class="my-6 relative">
                    <div class="absolute inset-0 flex items-center" aria-hidden="true">
                        <div class="w-full border-t border-gray-200"></div>
                    </div>
                    <div class="relative flex justify-center">
                        <span class="px-2 bg-white text-sm text-gray-500">Detail Cabang</span>
                    </div>
                </div>

                <!-- Additional Content Section -->
                <div class="bg-gray-50 p-5 rounded-lg border border-gray-100">
                    <h3 class="text-lg font-semibold text-gray-700 mb-4">Informasi Tambahan</h3>
                    <p class="text-gray-600">Tambahkan bagian ini untuk informasi lain yang relevan tentang cabang, seperti sejarah, pencapaian, atau catatan khusus.</p>
                </div>
            </div>

            <!-- Card Footer -->
            <div class="bg-gray-50 px-6 py-4 flex justify-between items-center border-t border-gray-200">
                <div class="text-sm text-gray-500">
                    Terakhir diperbarui: {{ now()->format('d M Y') }}
                </div>
                <div class="flex space-x-3">
                    <a href="{{ url()->previous() }}" class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-all">
                        <svg class="-ml-1 mr-2 h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@include('master.footer')

@endsection
