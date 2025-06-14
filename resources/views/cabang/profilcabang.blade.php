@extends('master.public')
@section('title', 'Profil Saya')
@section('content')

@include('master.navbar2')

<div class="min-h-screen bg-gradient-to-br from-gray-50 to-green-50 py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl mx-auto">
        <!-- Profile Card -->
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-200 transform transition-all hover:shadow-2xl">
            <!-- Header Section with Gradient -->
            <div class="bg-gradient-to-r from-green-600 to-green-700 px-8 py-6 text-white">
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center">
                    <div class="flex items-center">
                        <div class="bg-white/20 backdrop-blur-sm rounded-full p-3 mr-4 border-2 border-white/30">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-2xl font-bold">Profil Cabang</h1>
                            <p class="text-green-100 mt-1">Kelola informasi profil cabang Anda</p>
                        </div>
                    </div>
                    <div class="mt-4 sm:mt-0">
                        <span class="inline-flex items-center px-4 py-1.5 rounded-full text-sm font-medium shadow-sm {{ $user->status == 1 ? 'bg-white text-green-700' : 'bg-red-100 text-red-800' }}">
                            <span class="w-2.5 h-2.5 rounded-full mr-2 {{ $user->status == 1 ? 'bg-green-500' : 'bg-red-500' }}"></span>
                            {{ $user->status == 1 ? 'Aktif' : 'Tidak Aktif' }}
                        </span>
                    </div>
                </div>
            </div>

            <!-- Profile Information -->
            <div class="px-8 py-6 bg-white/90 backdrop-blur-sm">
                <div class="space-y-6">
                    @php
                        $fields = [
                            'Nama Cabang' => [
                                'value' => $user->nama ?? '-',
                                'icon' => '<svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>'
                            ],
                            'Email' => [
                                'value' => $user->email ?? '-',
                                'icon' => '<svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>'
                            ],
                            'Password' => [
                                'value' => '********',
                                'icon' => '<svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>'
                            ],
                            'Nama Pekerja' => [
                                'value' => $user->nama_pekerja ?? '-',
                                'icon' => '<svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>'
                            ],
                            'Nomor HP' => [
                                'value' => $user->no_hp ?? '-',
                                'icon' => '<svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>'
                            ],
                            'Lokasi Lahan' => [
                                'value' => $user->lokasi ?? '-',
                                'icon' => '<svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>'
                            ]
                        ];
                    @endphp

                    @foreach ($fields as $label => $data)
                        <div class="flex flex-col sm:flex-row gap-4">
                            <div class="flex items-center sm:w-1/3">
                                <div class="bg-green-100/50 p-2 rounded-lg mr-3">
                                    {!! $data['icon'] !!}
                                </div>
                                <label class="block text-sm font-medium text-gray-800">{{ $label }}</label>
                            </div>
                            <div class="sm:w-2/3">
                                <div class="bg-gray-50 px-4 py-3 rounded-lg border border-gray-200">
                                    <p class="text-gray-900 font-normal">{{ $data['value'] }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Divider -->
                <div class="my-8 relative">
                    <div class="absolute inset-0 flex items-center" aria-hidden="true">
                        <div class="w-full border-t border-gray-200"></div>
                    </div>
                    <div class="relative flex justify-center">
                        <span class="px-2 bg-white text-sm text-gray-500">Informasi Profil</span>
                    </div>
                </div>

                <!-- Edit Button -->
                <div class="flex justify-end">
                    <a href="{{ route('cabang.profil.edit') }}"
                        class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-lg shadow-sm text-white bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-all transform hover:scale-105">
                        <svg class="-ml-1 mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                        Ubah Profil
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@include('master.footer2')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<style>
    .swal2-popup {
        font-family: 'Inter', sans-serif;
        border-radius: 0.75rem;
    }

    .swal2-title {
        color: #1F2937;
        font-weight: 600;
    }

    .swal2-confirm {
        background-color: #10B981 !important;
        transition: all 0.2s;
    }

    .swal2-confirm:hover {
        background-color: #059669 !important;
    }

    .swal2-icon.swal2-error {
        color: #EF4444;
        border-color: #EF4444;
    }

    .swal2-icon.swal2-success {
        color: #10B981;
        border-color: #10B981;
    }
</style>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Cek jika ada pesan error dari session
    @if(session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Akses Dibatasi',
            text: '{{ session('error') }}',
            confirmButtonText: 'Ke Halaman Profil',
            confirmButtonColor: '#10B981',
            allowOutsideClick: false,
            allowEscapeKey: false,
            backdrop: `
                rgba(0,0,0,0.7)
                url("{{ asset('images/attention-icon.png') }}")
                center top
                no-repeat
            `
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "{{ route('cabang.profil') }}";
            }
        });
    @endif

    // Untuk pesan sukses
    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: '{{ session('success') }}',
            confirmButtonText: 'OK',
            confirmButtonColor: '#10B981'
        });
    @endif
});
</script>

@endsection
