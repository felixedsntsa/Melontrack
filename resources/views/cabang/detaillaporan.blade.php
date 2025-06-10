@extends('master.public')
@section('title', 'Detail Laporan')
@section('content')

@include('master.navbar2')

<div class="container mx-auto px-4 py-6">
    <div class="bg-white shadow rounded-lg p-6">
        <div class="flex justify-between items-start mb-4">
            <h2 class="text-2xl font-semibold">Unggah Dokumentasi</h2>
            <a href="{{ route('cabang.laporan') }}" class="text-xl text-gray-500 hover:text-gray-700 font-bold">&times;</a>
        </div>

        <div class="border-2 border-dashed border-gray-300 p-4 rounded-lg mb-6 overflow-x-auto">
            <div class="flex gap-2 flex-wrap">
                @forelse ($laporan->dokumentasi as $doc)
                    <img src="{{ asset('storage/' . $doc) }}" class="w-28 h-28 object-cover rounded border">
                @empty
                    <p class="text-gray-400">Tidak ada dokumentasi</p>
                @endforelse
            </div>
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 font-semibold mb-2">Deskripsi</label>
            <div class="border border-gray-300 rounded-lg bg-gray-50 p-4 text-gray-800 text-sm">
                {{ $laporan->deskripsi }}
            </div>
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 font-semibold mb-2">Feedback</label>
            <div class="border border-gray-300 bg-gray-50 p-4 rounded-lg text-gray-800 text-sm">
                {{ $laporan->feedback }}
            </div>
        </div>

    </div>
</div>

@endsection
