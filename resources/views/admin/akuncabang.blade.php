@extends('master.public')
@section('title', 'Akun Cabang')
@section('content')

    @include('master.navbar')

    <div class="container mx-auto px-4 py-6 mb-6">
        <div x-data="{ showModal: {{ request('showModal') === 'true' ? 'true' : 'false' }} }">

        <div class="flex justify-between items-center mb-6">
            <form action="{{ route('admin.akuncabang') }}" method="GET">

                @if (Session::has('alertSuccess'))
                    <div class="bg-green-600 text-white px-4 py-2 rounded-md flex items-center justify-between shadow-md">
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M5 13l4 4L19 7" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <span>{{ Session::get('alertSuccess') }}</span>
                        </div>
                        <button onclick="this.parentElement.remove()" class="text-white text-lg font-bold">&times;</button>
                    </div>
                @endif

                <div class="relative flex items-center mb-4">
                    <div class="absolute left-3 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-4.35-4.35M11 19a8 8 0 100-16 8 8 0 000 16z" />
                        </svg>
                    </div>
                    <input
                        type="text"
                        name="nama"
                        value="{{ $nama }}"
                        class="w-full border border-gray-300 rounded-full py-2 px-4 pl-10 focus:outline-none focus:ring-2 focus:ring-green-500"
                        placeholder="Cari akun"
                    >
                </div>
            </form>

            <!-- Tombol Tambah Data -->
            <button
                @click="showModal = true"
                class="bg-green-600 text-white px-4 py-2 rounded-md shadow hover:bg-green-700 transition">
            Tambah Data
            </button>

        </div>
            <!-- Modal Tambah Cabang -->
            <div
                x-show="showModal"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 scale-90"
                x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-90"
                class="fixed inset-0 bg-black/50 z-60 flex items-center justify-center"
                x-cloak>
                <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-2xl relative z-50">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-lg font-semibold">Tambah Data Akun Cabang</h2>
                        <button @click="showModal = false" class="text-2xl font-bold text-gray-500 hover:text-red-600">&times;</button>
                    </div>

                    @if (Session::has('alertError'))
                        <div class="mb-4 flex items-center justify-between bg-red-600 text-white px-4 py-3 rounded-md shadow-md">
                            <div class="flex items-center gap-3">
                                <img src="/asset/cross-circle.svg" class="w-5 h-5 brightness-0 invert" alt="Error Icon">
                                <span class="font-medium">{{ Session::get('alertError') }}</span>
                            </div>
                            <button onclick="this.parentElement.remove()" class="text-white hover:text-red-200 focus:outline-none">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>
                    @endif

                    <form action="{{ route('admin.akuncabang.store') }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium mb-1.5">Nama Cabang</label>
                                <input type="text" name="nama" class="w-full border rounded-lg px-3 py-2" placeholder="Masukkan nama cabang" required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-1.5">Nomor Handphone</label>
                                <input type="text" name="no_hp" class="w-full border rounded-lg px-3 py-2" placeholder="Masukkan nomor handphone" required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-1.5">Email</label>
                                <input type="email" name="email" class="w-full border rounded-lg px-3 py-2" placeholder="Masukkan email" required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-1.5">Lokasi Lahan</label>
                                <input type="text" name="lokasi" class="w-full border rounded-lg px-3 py-2" placeholder="Masukkan lokasi lahan" required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-1.5">Password</label>
                                <input type="password" name="password" class="w-full border rounded-lg px-3 py-2" placeholder="Masukkan password" required>
                            </div>
                            <div>
                                <label for="status" class="block text-sm font-medium mb-1.5">Status</label>
                                <select name="status" id="status" class="w-full border rounded-lg px-3 py-2">
                                    <option value="1">Aktif</option>
                                    <option value="0" selected>Tidak Aktif</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-1.5">Nama Pekerja</label>
                                <input type="text" name="nama_pekerja" class="w-full border rounded-lg px-3 py-2" placeholder="Masukkan nama" required>
                            </div>
                        </div>

                        <div class="flex justify-end mt-6 space-x-2">
                            <button type="button" @click="showModal = false" class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600">Batal</button>
                            <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Card Akun Cabang -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($cabang as $cbg)
                <a href="{{ route('cabang.show', $cbg->id) }}"
                    class="cursor-pointer flex items-center bg-white shadow-md rounded-lg p-4 space-x-4 hover:bg-gray-100 transition">
                    <img src="{{ asset('asset/farmericon.png') }}" alt="Cabang" class="w-12 h-12 rounded-full" />
                    <div class="flex-1">
                        <h2 class="font-bold text-lg text-green-800">{{ $cbg->nama }}</h2>
                        <p class="text-gray-500 text-sm">{{ $cbg->email }}</p>
                    </div>
                    <div>
                        <span class="w-3 h-3 rounded-full inline-block {{ $cbg->status ? 'bg-green-500' : 'bg-red-500' }}"></span>
                    </div>
                </a>
            @endforeach
        </div>

        {{-- Pagination --}}
        <div class="mt-4">
            {{ $cabang->links() }}
        </div>

    </div>

    @include('master.footer')

@endsection
