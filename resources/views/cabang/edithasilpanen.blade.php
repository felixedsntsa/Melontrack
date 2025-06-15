@extends('master.public')
@section('title', 'Edit Hasil Panen')
@section('content')

@include('master.navbar2')

<div class="container mx-auto px-4 py-10 max-w-3xl">
    <div class="bg-white p-6 rounded-xl shadow-lg">
        <h2 class="text-2xl font-bold mb-6 text-center">Edit Laporan Hasil Panen</h2>

        <form action="{{ route('cabang.hasilpanen.update', $panen->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block font-semibold mb-1">Periode Panen</label>
                <input type="text" name="periode_panen" value="{{ old('periode_panen', $panen->periode_panen) }}"
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500" required>
            </div>

            <div>
                <label class="block font-semibold mb-1">Total Panen</label>
                <input type="number" name="total_panen" value="{{ old('total_panen', $panen->total_panen) }}"
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500" required>
            </div>

            <div>
                <label class="block font-semibold mb-1">Keterangan</label>
                <textarea name="keterangan" rows="4"
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500"
                    placeholder="Tuliskan deskripsi hasil panen...">{{ old('keterangan', $panen->keterangan) }}</textarea>
            </div>

            <div class="flex justify-between mt-6">
                <a href="{{ route('cabang.hasilpanen') }}"
                    class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-5 py-2 rounded-full">
                    Batal
                </a>
                <button type="submit"
                    class="bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded-full font-semibold">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>

@include('master.footer2')

@endsection
