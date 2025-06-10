@extends('master.public')
@section('title', 'Detail Laporan')
@section('content')

@include('master.navbar')

<div class="container mx-auto px-4 py-6">
    <div class="bg-white shadow rounded-lg p-6">

        <div class="flex items-center justify-between mb-4">
            <h2 class="text-xl font-semibold">Detail Laporan</h2>
            <a href="{{ route('admin.laporan.feedback', $laporan->id) }}"
                class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                Beri Feedback
            </a>
        </div>

        <p><strong>Cabang:</strong> {{ $laporan->cabang->nama }}</p>
        <p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($laporan->tanggal)->format('d-m-Y') }}</p>
        <p><strong>Deskripsi:</strong></p>
        <p class="mb-4">{{ $laporan->deskripsi }}</p>

        <div>
            <strong>Dokumentasi:</strong>
            <div class="flex flex-wrap gap-3 mt-2">
                @foreach ($laporan->dokumentasi as $img)
                    <img src="{{ asset('storage/' . $img) }}" class="w-32 h-32 object-cover rounded">
                @endforeach
            </div>
        </div>

        <div class="mt-4">
            <strong>Feedback:</strong>
            <p>{{ $laporan->feedback ?? '-' }}</p>
        </div>
    </div>
</div>

@endsection
