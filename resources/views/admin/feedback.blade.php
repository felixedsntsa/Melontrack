@extends('master.public')
@section('title', 'Dashboard Admin')
@section('content')

@include('master.navbar')

<div class="min-h-screen bg-gradient-to-br from-gray-50 to-green-50 py-8">
    <div class="container mx-auto px-4 max-w-5xl">
        <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100">
            {{-- Header --}}
            <div class="bg-gradient-to-r from-green-600 to-green-700 px-6 py-4">
                <div class="flex items-center justify-between">
                    <h2 class="text-2xl font-semibold text-white">Feedback Laporan</h2>
                    <div class="text-sm text-green-100">
                        <span class="font-medium">ID:</span> #{{ $laporan->id }}
                    </div>
                </div>
                <div class="mt-2 text-green-100 text-sm">
                    <span class="font-medium">{{ $laporan->cabang->nama }}</span> |
                    <span class="font-medium">{{ \Carbon\Carbon::parse($laporan->tanggal)->format('d M Y') }}</span>
                </div>
            </div>

            <div class="p-6">
                {{-- Dokumentasi --}}
                @if ($laporan->dokumentasi && count($laporan->dokumentasi) > 0)
                    <div class="mb-8">
                        <label class="block font-medium text-gray-700 mb-3">Dokumentasi</label>
                        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                            @foreach ($laporan->dokumentasi as $doc)
                                <div class="group relative rounded-lg overflow-hidden border border-gray-200 shadow-sm hover:shadow-md transition-shadow duration-200">
                                    <img src="{{ asset('storage/' . $doc) }}" class="w-full h-32 object-cover">
                                    <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-20 transition-all duration-300 flex items-center justify-center">
                                        <button onclick="openModal('{{ asset('storage/' . $doc) }}')" class="opacity-0 group-hover:opacity-100 transform translate-y-2 group-hover:translate-y-0 transition-all duration-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                {{-- Deskripsi --}}
                <div class="mb-8">
                    <label class="block font-medium text-gray-700 mb-3">Deskripsi Laporan</label>
                    <div class="bg-gray-50 border-l-4 border-green-500 rounded-r-lg p-4 text-gray-700">
                        <div class="prose max-w-none">
                            {!! nl2br(e($laporan->deskripsi)) !!}
                        </div>
                    </div>
                </div>

                {{-- Feedback Section --}}
                <div class="border-t border-gray-200 pt-6">
                    @if ($laporan->feedback)
                        <div class="mb-4">
                            <label class="block font-medium text-gray-700 mb-3">Feedback Anda</label>
                            <div class="bg-green-50 border-l-4 border-green-600 rounded-r-lg p-4 text-gray-700">
                                <div class="prose max-w-none">
                                    {!! nl2br(e($laporan->feedback)) !!}
                                </div>
                            </div>
                            <p class="text-sm text-gray-500 mt-2 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Feedback sudah dikirim dan tidak dapat diubah.
                            </p>
                        </div>
                    @else
                        <form action="{{ route('admin.laporan.feedback.submit', $laporan->id) }}" method="POST">
                            @csrf
                            <div class="mb-6">
                                <label for="feedback" class="block font-medium text-gray-700 mb-3">Beri Feedback</label>
                                <textarea
                                    name="feedback"
                                    id="feedback"
                                    rows="5"
                                    placeholder="Tulis feedback yang jelas dan konstruktif..."
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-200 shadow-sm"
                                >{{ old('feedback') }}</textarea>
                                <p class="text-sm text-gray-500 mt-1">Feedback yang baik membantu meningkatkan kualitas pelayanan.</p>
                            </div>

                            <div class="flex justify-end space-x-3">
                                <a href="{{ route('admin.laporan') }}" class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition duration-200">
                                    Kembali
                                </a>
                                <button
                                    type="submit"
                                    class="px-6 py-2 bg-gradient-to-r from-green-600 to-green-700 text-white font-medium rounded-lg hover:from-green-700 hover:to-green-800 transition-all duration-200 shadow-md hover:shadow-lg"
                                >
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                        </svg>
                                        Kirim Feedback
                                    </div>
                                </button>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@include('master.footer')

{{-- Image Modal --}}
<div id="imageModal" class="fixed inset-0 bg-black bg-opacity-75 z-50 hidden items-center justify-center p-4">
    <div class="relative max-w-4xl max-h-screen">
        <button onclick="closeModal()" class="absolute -top-10 right-0 text-white hover:text-gray-200">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
        <img id="modalImage" src="" class="max-w-full max-h-[90vh] rounded-lg shadow-xl">
    </div>
</div>

<script>
    function openModal(imageSrc) {
        document.getElementById('modalImage').src = imageSrc;
        document.getElementById('imageModal').classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    function closeModal() {
        document.getElementById('imageModal').classList.add('hidden');
        document.body.style.overflow = 'auto';
    }

    // Close modal when clicking outside the image
    document.getElementById('imageModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeModal();
        }
    });
</script>

@endsection
