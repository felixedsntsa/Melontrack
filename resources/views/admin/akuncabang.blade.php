@extends('master.public')
@section('title', 'Akun Cabang')
@section('content')

@include('master.navbar')

<div class="min-h-screen bg-gradient-to-br from-gray-50 to-green-50 py-8">
    <div class="container mx-auto px-4 max-w-7xl">
        <div x-data="{ showModal: {{ request('showModal') === 'true' ? 'true' : 'false' }} }">
            <!-- Header Section -->
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800">Manajemen Akun Cabang</h1>
                    <p class="text-gray-600">Kelola data akun cabang dan pekerja</p>
                </div>

                <!-- Search and Add Button -->
                <div class="flex flex-col sm:flex-row gap-4 w-full md:w-auto">
                    <form action="{{ route('admin.akuncabang') }}" method="GET" class="w-full">
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M11 19a8 8 0 100-16 8 8 0 000 16z" />
                                </svg>
                            </div>
                            <input
                                type="text"
                                name="nama"
                                value="{{ $nama }}"
                                class="w-full border border-gray-200 rounded-full py-2 px-4 pl-10 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent shadow-sm"
                                placeholder="Cari akun cabang..."
                            >
                        </div>
                    </form>

                    <button
                        @click="showModal = true"
                        class="bg-gradient-to-r from-green-600 to-green-700 text-white px-4 py-2 rounded-lg shadow-md hover:from-green-700 hover:to-green-800 transition-all duration-200 flex items-center justify-center whitespace-nowrap"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        Tambah Cabang
                    </button>
                </div>
            </div>

            <!-- Success Notification -->
            @if (Session::has('alertSuccess'))
                <div class="mb-6 bg-green-600 text-white px-4 py-3 rounded-lg flex items-center justify-between shadow-lg">
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M5 13l4 4L19 7" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <span>{{ Session::get('alertSuccess') }}</span>
                    </div>
                    <button onclick="this.parentElement.remove()" class="text-white hover:text-green-200">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            @endif

            <!-- Modal Tambah Cabang -->
            <div
                x-show="showModal"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                class="fixed inset-0 bg-black/50 z-50 flex items-center justify-center p-4"
                x-cloak
            >
                <div
                    x-show="showModal"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 scale-95"
                    x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="opacity-100 scale-100"
                    x-transition:leave-end="opacity-0 scale-95"
                    @click.away="showModal = false"
                    class="bg-white rounded-xl shadow-2xl w-full max-w-2xl max-h-[90vh] overflow-y-auto"
                >
                    <!-- Modal Header -->
                    <div class="sticky top-0 bg-gradient-to-r from-green-600 to-green-700 px-6 py-4 flex justify-between items-center z-10">
                        <h2 class="text-xl font-semibold text-white">Tambah Akun Cabang</h2>
                        <button @click="showModal = false" class="text-white hover:text-gray-200 focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <!-- Modal Content -->
                    <div class="p-6">
                        @if (Session::has('alertError'))
                            <div class="mb-6 bg-red-600 text-white px-4 py-3 rounded-lg flex items-center justify-between shadow-lg">
                                <div class="flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span class="font-medium">{{ Session::get('alertError') }}</span>
                                </div>
                                <button onclick="this.parentElement.remove()" class="text-white hover:text-red-200">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                        @endif

                        <form action="{{ route('admin.akuncabang.store') }}" method="POST">
                            @csrf
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Nama Cabang</label>
                                    <input type="text" name="nama" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500 focus:border-transparent" placeholder="Masukkan nama cabang" required>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Nomor Handphone</label>
                                    <input type="text" name="no_hp" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500 focus:border-transparent" placeholder="Masukkan nomor handphone" required>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                                    <input type="email" name="email" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500 focus:border-transparent" placeholder="Masukkan email" required>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Lokasi Lahan</label>
                                    <input type="text" name="lokasi" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500 focus:border-transparent" placeholder="Masukkan lokasi lahan" required>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                                    <input type="password" name="password" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500 focus:border-transparent" placeholder="Masukkan password" required>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                                    <select name="status" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500 focus:border-transparent">
                                        <option value="1">Aktif</option>
                                        <option value="0" selected>Tidak Aktif</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Nama Pekerja</label>
                                    <input type="text" name="nama_pekerja" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500 focus:border-transparent" placeholder="Masukkan nama pekerja" required>
                                </div>
                            </div>

                            <div class="flex justify-end mt-6 space-x-3">
                                <button type="button" @click="showModal = false" class="px-5 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition duration-200">
                                    Batal
                                </button>
                                <button type="submit" class="px-5 py-2 bg-gradient-to-r from-green-600 to-green-700 text-white font-medium rounded-lg hover:from-green-700 hover:to-green-800 transition-all duration-200 shadow-md hover:shadow-lg flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    Simpan Data
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Branch Accounts Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach ($cabang as $cbg)
                    <a href="{{ route('cabang.show', $cbg->id) }}" class="group transition-transform duration-200 hover:scale-[1.02]">
                        <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-100 hover:shadow-md transition-all duration-300 h-full flex flex-col">
                            <!-- Card Header with Icon and Name -->
                            <div class="p-5 pb-3 flex-1">
                                <div class="flex items-start space-x-4">
                                    <!-- Consistent Icon Container -->
                                    <div class="flex-shrink-0 bg-gradient-to-br from-green-50 to-green-100 p-3 rounded-xl shadow-inner border border-green-100">
                                        <img src="{{ asset('asset/farmericon.png') }}" alt="Cabang" class="w-10 h-10 object-contain"/>
                                    </div>

                                    <!-- Branch Info -->
                                    <div class="min-w-0">
                                        <h3 class="font-semibold text-lg text-gray-800 group-hover:text-green-600 transition-colors truncate">{{ $cbg->nama }}</h3>
                                        <p class="text-gray-500 text-sm mt-1 truncate">{{ $cbg->email }}</p>

                                        <!-- Status Badge -->
                                        <div class="mt-3 flex items-center">
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                                {{ $cbg->status ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                                <span class="w-2 h-2 rounded-full mr-1.5
                                                    {{ $cbg->status ? 'bg-green-500' : 'bg-red-500' }}"></span>
                                                {{ $cbg->status ? 'Aktif' : 'Nonaktif' }}
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Additional Info -->
                                <div class="mt-4 pt-3 border-t border-gray-100">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center text-sm text-gray-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                            <span class="truncate">{{ $cbg->lokasi }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Card Footer -->
                            <div class="bg-gray-50 px-5 py-3 border-t border-gray-100">
                                <div class="flex items-center justify-between text-sm">
                                    <span class="text-gray-500 font-medium group-hover:text-gray-700 transition-colors">Detail Cabang</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400 group-hover:text-green-600 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-8">
                {{ $cabang->links() }}
            </div>
        </div>
    </div>
</div>

@include('master.footer')

@endsection
