@extends('master.public')
@section('title', 'Laporan Cabang')
@section('content')

@include('master.navbar')

<div class="container h-screen mx-auto px-4 py-10 max-w-6xl">
    <h2 class="text-2xl font-bold mb-4">Laporan Pemantauan</h2>

    <div class="bg-white shadow rounded-lg p-6 mb-16">
        <div class="flex justify-between items-center mb-4">
            <form method="GET" action="{{ route('admin.laporan') }}" class="w-full max-w-sm">
                <div class="relative">
                    <input
                        type="text"
                        name="search"
                        placeholder="Cari laporan..."
                        value="{{ request('search') }}"
                        class="w-full border border-gray-300 rounded-full py-2 px-4 pl-10 focus:outline-none focus:ring-2 focus:ring-green-500"
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

        <table class="min-w-full text-sm text-left border border-gray-200">
            <thead class="bg-gray-100 text-gray-700 font-semibold">
                <tr>
                    <th class="py-2 px-4">No</th>
                    <th class="py-2 px-4">Tanggal</th>
                    <th class="py-2 px-4">Nama Cabang</th>
                    <th class="py-2 px-4">Dokumentasi</th>
                    <th class="py-2 px-4">Deskripsi</th>
                    <th class="py-2 px-4">Feedback</th>
                    <th class="py-2 px-4"></th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse ($laporans as $laporan)
                <tr>
                    <td class="py-2 px-4">{{ ($laporans->currentPage() - 1) * $laporans->perPage() + $loop->iteration }}</td>
                    <td class="py-2 px-4">{{ \Carbon\Carbon::parse($laporan->tanggal)->format('d-m-Y') }}</td>
                    <td class="py-2 px-4">{{ $laporan->cabang->nama }}</td>
                    <td class="py-2 px-4">
                        <div class="inline-flex items-center bg-gray-100 border rounded px-2 py-1 gap-1">
                            <img src="{{ asset('asset/image-icon.png') }}" alt="Dokumentasi" class="w-4 h-4">
                            <span>{{ count($laporan->dokumentasi) }}+</span>
                        </div>
                    </td>
                    <td class="py-2 px-4">{{ Str::limit($laporan->deskripsi, 30, '...') }}</td>
                    <td class="py-2 px-4">
                        <div class="flex items-center justify-between gap-2">
                            <span>{{ $laporan->feedback ?? '-' }}</span>
                        </div>
                    </td>
                    <td class="py-2 px-4">
                        <a href="{{ route('admin.laporan.feedback', $laporan->id) }}"
                            class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 text-sm">Selengkapnya</a>
                    </td>
                </tr>
                @empty
                <tr><td colspan="7" class="text-center py-4">Belum ada laporan.</td></tr>
                @endforelse
            </tbody>
        </table>
        <div class="mt-4">
            {{ $laporans->links() }}
        </div>
    </div>
</div>

@include('master.footer')

@endsection
