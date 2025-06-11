@extends('master.public')
@section('title', 'Hasil Panen')
@section('content')

@include('master.navbar2')

<div x-data="{ open: false, showDetail: false, detailData: {} }" class="container mx-auto px-4 py-10 mb-9 h-screen max-w-6xl">
    <div class="flex justify-between items-center mb-6">
        <form action="{{ route('cabang.hasilpanen') }}" method="GET" class="relative w-1/3">
            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Cari hasil panen..."
                class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-full focus:outline-none focus:border-green-500"
            >
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-4.35-4.35M11 19a8 8 0 100-16 8 8 0 000 16z"/>
                </svg>
            </div>
        </form>
        <button @click="open = true" class="text-3xl text-green-700 font-bold hover:text-green-800">+</button>
    </div>

    {{-- Tabel --}}
    <div class="bg-white border rounded-xl p-4">
        <div class="overflow-x-auto">
            <h3 class="text-xl font-semibold mb-4">Riwayat Hasil Panen</h3>
            <table class="min-w-full text-sm text-left border border-gray-200">
                <thead>
                    <tr class="border-b">
                        <th class="py-2 px-4">No.</th>
                        <th class="py-2 px-4">Tanggal</th>
                        <th class="py-2 px-4">Nama Cabang</th>
                        <th class="py-2 px-4">Periode panen</th>
                        <th class="py-2 px-4">Total panen</th>
                        <th class="py-2 px-4">Keterangan</th>
                        <th class="py-2 px-4"></th>
                    </tr>
                </thead>
                <tbody class="divide-y">
                    @forelse ($hasilPanens as $index => $panen)
                        <tr>
                            <td class="py-2 px-4">{{ $index + 1 }}</td>
                            <td class="py-2 px-4">{{ \Carbon\Carbon::parse($panen->created_at)->format('d-m-Y') }}</td>
                            <td class="py-2 px-4">{{ $panen->cabang->nama ?? '-' }}</td>
                            <td class="py-2 px-4">{{ $panen->periode_panen }}</td>
                            <td class="py-2 px-4">{{ number_format($panen->total_panen, 0, ',', '.') }} Kg</td>
                            <td class="py-2 px-4 truncate max-w-[200px]">{{ Str::limit($panen->keterangan, 25, '...') }}</td>
                            <td class="py-2 px-4">
                                <button @click="showDetail = true; detailData = {{ $panen->toJson() }}"
                                        class="bg-green-600 text-white px-3 py-1 rounded-lg hover:bg-green-700 text-sm">
                                    Selengkapnya
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-4 text-gray-500">Belum ada data hasil panen</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Modal Tambah --}}
    <div x-show="open" class="fixed inset-0 bg-black bg-opacity-30 flex items-center justify-center z-50">
        <div class="bg-white p-6 rounded-xl w-full max-w-md shadow-lg relative">
            <button @click="open = false" class="absolute top-4 right-5 text-2xl font-bold text-gray-600 hover:text-black">
                &times;
            </button>

            <h2 class="text-xl font-bold mb-5">Tambah Laporan Hasil Panen</h2>

            <form action="{{ route('cabang.hasilpanen.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block font-semibold mb-1">Periode panen</label>
                    <input type="text" name="periode_panen" placeholder="Contoh: 60 Hari"
                        class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500" required>
                </div>

                <div>
                    <label class="block font-semibold mb-1">Total panen</label>
                    <input type="text" name="total_panen" placeholder="Contoh: 3.100 Kg"
                        class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500" required>
                </div>

                <div>
                    <label class="block font-semibold mb-1">Keterangan</label>
                    <textarea name="keterangan" rows="4" placeholder="Tuliskan deskripsi hasil panen..."
                        class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500" required></textarea>
                </div>

                <button type="submit"
                    class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-2 rounded-full transition duration-200">
                    Kirim
                </button>
            </form>
        </div>
    </div>


    {{-- Modal Detail --}}
    <div x-show="showDetail" class="fixed inset-0 bg-black bg-opacity-30 flex items-center justify-center z-50">
        <div class="bg-white rounded-2xl shadow-lg w-full max-w-md mx-auto p-6 relative" @click.away="showDetail = false">
            <button @click="showDetail = false" class="absolute top-3 right-4 text-2xl text-gray-600 hover:text-black">&times;</button>
            <h2 class="text-xl font-semibold mb-5 text-center">Detail Hasil Panen</h2>
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium mb-1">Tanggal</label>
                    <input type="text" class="w-full border rounded px-3 py-2 bg-gray-100"
                            x-bind:value="new Date(detailData.created_at).toLocaleDateString('id-ID')" readonly>
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Periode panen</label>
                    <input type="text" class="w-full border rounded px-3 py-2 bg-gray-100"
                            x-bind:value="detailData.periode_panen" readonly>
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Total panen</label>
                    <input type="text" class="w-full border rounded px-3 py-2 bg-gray-100"
                            x-bind:value="detailData.total_panen + ' Kg'" readonly>
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Keterangan</label>
                    <textarea class="w-full border rounded px-3 py-2 bg-gray-100" rows="4"
                            x-text="detailData.keterangan || '-'" readonly></textarea>
                </div>
            </div>
        </div>
    </div>
</div>

@include('master.footer2')

@endsection
