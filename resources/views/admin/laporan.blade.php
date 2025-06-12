@extends('master.public')
@section('title', 'Laporan Cabang')
@section('content')

@include('master.navbar')

<div class="min-h-screen bg-gradient-to-br from-gray-50 to-green-50">
    <div class="container mx-auto px-4 py-10 max-w-6xl">
        <div class="bg-white/90 backdrop-blur-sm shadow-xl rounded-xl p-6 mb-16 border border-gray-100">
            <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
                <h2 class="text-2xl font-bold text-gray-800">Laporan Pemantauan</h2>
                <form method="GET" action="{{ route('admin.laporan') }}" class="w-full md:max-w-sm">
                    <div class="relative">
                        <input
                            type="text"
                            name="search"
                            placeholder="Cari laporan..."
                            value="{{ request('search') }}"
                            class="w-full border border-gray-200 rounded-full py-2 px-4 pl-10 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent shadow-sm"
                        >
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-4.35-4.35M11 19a8 8 0 100-16 8 8 0 000 16z" />
                            </svg>
                        </div>
                    </div>
                </form>
            </div>

            <div class="overflow-x-auto rounded-lg border border-gray-200 shadow-sm">
                <table class="min-w-full text-sm">
                    <thead class="bg-gradient-to-r from-green-600 to-green-700 text-white font-semibold">
                        <tr>
                            <th class="py-3 px-4 text-left">No</th>
                            <th class="py-3 px-4 text-left">Tanggal</th>
                            <th class="py-3 px-4 text-left">Nama Cabang</th>
                            <th class="py-3 px-4 text-left">Dokumentasi</th>
                            <th class="py-3 px-4 text-left">Deskripsi</th>
                            <th class="py-3 px-4 text-left">Feedback</th>
                            <th class="py-3 px-4 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse ($laporans as $laporan)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="py-3 px-4">{{ ($laporans->currentPage() - 1) * $laporans->perPage() + $loop->iteration }}</td>
                            <td class="py-3 px-4">{{ \Carbon\Carbon::parse($laporan->tanggal)->format('d-m-Y') }}</td>
                            <td class="py-3 px-4 font-medium text-gray-800">{{ $laporan->cabang->nama }}</td>
                            <td class="py-3 px-4">
                                <div class="inline-flex items-center bg-gray-100 border border-gray-200 rounded-full px-3 py-1 gap-1 shadow-sm">
                                    <img src="{{ asset('asset/image-icon.png') }}" alt="Dokumentasi" class="w-4 h-4">
                                    <span class="text-sm">{{ count($laporan->dokumentasi) }}+</span>
                                </div>
                            </td>
                            <td class="py-3 px-4 text-gray-600">{{ Str::limit($laporan->deskripsi, 30, '...') }}</td>
                            <td class="py-3 px-4">
                                <div class="flex items-center justify-between gap-2">
                                    <span class="{{ $laporan->feedback ? 'text-gray-700' : 'text-gray-400' }}">{{ $laporan->feedback ?? '-' }}</span>
                                </div>
                            </td>
                            <td class="py-3 px-4 text-center">
                                <a href="{{ route('admin.laporan.feedback', $laporan->id) }}"
                                    class="inline-block bg-gradient-to-r from-green-600 to-green-700 text-white px-4 py-2 rounded-lg hover:from-green-700 hover:to-green-800 text-sm shadow-md hover:shadow-lg transition-all">
                                    Selengkapnya
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center py-6 text-gray-500">
                                <div class="flex flex-col items-center justify-center py-8">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <p class="mt-2 text-lg">Belum ada laporan.</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-6 px-2">
                {{ $laporans->links() }}
            </div>
        </div>
    </div>
</div>

@include('master.footer')

@endsection
