@extends('master.public')
@section('title', 'Dashboard Admin')
@section('content')

@include('master.navbar')

<div class="container mx-auto mt-6 p-6 bg-white rounded-xl shadow-md">

    <h2 class="text-2xl font-semibold mb-4">Feedback Laporan</h2>

    {{-- Dokumentasi --}}
    @if ($laporan->dokumentasi && count($laporan->dokumentasi) > 0)
        <div class="mb-6">
            <label class="block font-semibold text-black mb-2">Unggah Dokumentasi</label>
            <div class="border-2 border-dashed border-gray-300 rounded-lg p-4 flex flex-wrap gap-4 bg-gray-50">
                @foreach ($laporan->dokumentasi as $doc)
                    <img src="{{ asset('storage/' . $doc) }}" class="w-32 h-24 object-cover rounded-md">
                @endforeach
            </div>
        </div>
    @endif

    {{-- Deskripsi --}}
    <div class="mb-6">
        <label class="block text-black font-semibold mb-2">Deskripsi</label>
        <div class="border border-gray-300 rounded-lg bg-gray-50 p-4 text-gray-800 text-sm">
            {{ $laporan->deskripsi }}
        </div>
    </div>

    {{-- Jika feedback sudah diisi --}}
    @if ($laporan->feedback)
        <div class="mb-6">
            <label class="block text-black font-semibold mb-2">Feedback</label>
            <div class="border border-green-300 bg-green-50 p-4 rounded-lg text-gray-800 text-sm">
                {{ $laporan->feedback }}
            </div>
            <p class="text-sm text-gray-500 mt-2 italic">Feedback sudah dikirim. Tidak dapat mengubah.</p>
        </div>
    @else
        {{-- Jika belum ada feedback --}}
        <form action="{{ route('admin.laporan.feedback.submit', $laporan->id) }}" method="POST">
            @csrf
            <div class="mb-6">
                <label for="feedback" class="block text-black font-semibold mb-2">Feedback</label>
                <textarea
                    name="feedback"
                    id="feedback"
                    rows="4"
                    placeholder="Masukkan deskripsi"
                    class="w-full border border-gray-300 rounded-lg p-4 text-sm focus:outline-none focus:ring-2 focus:ring-green-500 resize-none"
                >{{ old('feedback') }}</textarea>
            </div>

            <div class="flex justify-end">
                <button
                    type="submit"
                    class="bg-green-600 text-white font-semibold py-2 px-6 rounded-lg hover:bg-green-700 transition duration-200"
                >
                    Kirim
                </button>
            </div>
        </form>
    @endif
</div>



@endsection
