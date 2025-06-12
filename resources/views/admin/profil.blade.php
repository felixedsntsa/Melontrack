@extends('master.public')
@section('title', 'Profil Saya')
@section('content')

@include('master.navbar')

<div class="min-h-screen bg-gradient-to-br from-gray-50 to-green-50 py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-3xl mx-auto">
        <!-- Profile Card -->
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100 transform transition-all hover:shadow-2xl">
            <!-- Profile Header with Gradient -->
            <div class="bg-gradient-to-r from-green-600 to-green-700 p-6 text-white relative">
                <div class="flex items-center space-x-4">
                    <div class="relative">
                        <div class="w-16 h-16 rounded-full bg-white/20 backdrop-blur-sm flex items-center justify-center border-2 border-white/30">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold">Profil Saya</h2>
                        <p class="text-green-100">Kelola informasi profil akun Anda</p>
                    </div>
                </div>
            </div>

            <!-- Profile Body -->
            <div class="p-6 bg-white/90 backdrop-blur-sm">
                <div class="space-y-6">
                    @php
                        $fields = [
                            [
                                'label' => 'Username',
                                'value' => $user->username ?? '-',
                                'icon' => 'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z'
                            ],
                            [
                                'label' => 'Email',
                                'value' => $user->email ?? '-',
                                'icon' => 'M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z'
                            ],
                            [
                                'label' => 'Password',
                                'value' => '********',
                                'icon' => 'M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z'
                            ]
                        ];
                    @endphp

                    @foreach ($fields as $field)
                        <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4">
                            <div class="flex items-center w-full sm:w-1/3">
                                <div class="bg-green-100/50 p-2 rounded-lg mr-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $field['icon'] }}" />
                                    </svg>
                                </div>
                                <label class="text-gray-700 font-medium">{{ $field['label'] }}</label>
                            </div>
                            <div class="w-full sm:w-2/3">
                                <div class="relative">
                                    <input type="text"
                                            value="{{ $field['value'] }}"
                                            class="w-full bg-gray-50 border border-gray-200 rounded-lg px-4 py-3 pl-12 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent"
                                            disabled>
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Divider -->
                <div class="my-6 relative">
                    <div class="absolute inset-0 flex items-center" aria-hidden="true">
                        <div class="w-full border-t border-gray-200"></div>
                    </div>
                    <div class="relative flex justify-center">
                        <span class="px-2 bg-white text-sm text-gray-500">Informasi Akun</span>
                    </div>
                </div>

                <!-- Additional Security Info -->
                <div class="bg-gray-50 p-5 rounded-lg border border-gray-100">
                    <h3 class="text-lg font-semibold text-gray-700 mb-3 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                        Keamanan Akun
                    </h3>
                    <p class="text-gray-600 text-sm">Untuk keamanan akun Anda, pastikan untuk tidak membagikan informasi login kepada siapapun.</p>
                </div>
            </div>

            <!-- Card Footer -->
            <div class="bg-gray-50 px-6 py-4 flex justify-between items-center border-t border-gray-200">
                <div class="text-sm text-gray-500">
                    Terakhir diperbarui: {{ now()->format('d M Y') }}
                </div>
                <div>
                    <a href="{{ route('profil.edit') }}" class="inline-flex items-center px-5 py-2.5 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" class="-ml-1 mr-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                        Ubah Profil
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@include('master.footer')

@endsection
