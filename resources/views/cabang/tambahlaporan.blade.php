@extends('master.public')
@section('title', 'Tambah Laporan')
@section('content')

@include('master.navbar2')

<div class="container mx-auto px-4 py-6">
    <div class="bg-white shadow rounded-lg p-6">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-xl font-semibold">Tambah Laporan</h3>
        </div>

        @if ($errors->any())
            <div class="mb-4 text-red-600">
                <ul class="list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('cabang.laporan.store') }}" method="POST" enctype="multipart/form-data" id="uploadForm">
            @csrf

            {{-- Upload Box --}}
            <div class="mb-6">
                <label class="block text-sm font-semibold mb-2">Unggah Dokumentasi</label>
                <div id="dropArea"
                    class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center cursor-pointer bg-gray-50 relative">

                    {{-- Preview Gambar --}}
                    <div id="previewContainer" class="flex flex-wrap gap-2 justify-start mb-4"></div>

                    <div id="uploadPrompt" class="text-gray-400">
                        <p>Letakkan berkas disini<br><span class="text-sm">atau</span></p>
                        <label class="inline-flex items-center mt-2 text-blue-600 cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M4 3a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V7.414A2 2 0 0017.414 6L14 2.586A2 2 0 0012.586 2H4z" />
                            </svg>
                            <span class="underline">Tambahkan File</span>
                            <input type="file" name="dokumentasi[]" id="fileInput" multiple class="hidden">
                        </label>
                    </div>
                </div>
            </div>

            {{-- Deskripsi --}}
            <div class="mb-6">
                <label for="deskripsi" class="block text-sm font-semibold mb-2">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" rows="4"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 text-sm placeholder-gray-400 focus:outline-none focus:ring focus:border-green-500"
                    placeholder="Masukkan deskripsi"></textarea>
            </div>

            {{-- Tombol Submit --}}
            <div class="flex justify-end">
                <button type="submit"
                        class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">
                        Kirim Laporan
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    const dropArea = document.getElementById('dropArea');
    const fileInput = document.getElementById('fileInput');
    const previewContainer = document.getElementById('previewContainer');
    const uploadPrompt = document.getElementById('uploadPrompt');

    // Simpan semua file yang dipilih ke array global
    let selectedFiles = [];

    dropArea.addEventListener('click', () => fileInput.click());

    fileInput.addEventListener('change', (e) => {
        const newFiles = Array.from(e.target.files);

        // Gabungkan file baru dengan yang lama
        selectedFiles = selectedFiles.concat(newFiles);

        // Update input file secara manual (karena fileInput tidak bisa diatur ulang begitu saja)
        const dataTransfer = new DataTransfer();
        selectedFiles.forEach(file => dataTransfer.items.add(file));
        fileInput.files = dataTransfer.files;

        // Render ulang preview
        previewContainer.innerHTML = '';
        selectedFiles.forEach(file => {
            const reader = new FileReader();
            reader.onload = function(evt) {
                const img = document.createElement('img');
                img.src = evt.target.result;
                img.className = 'w-20 h-20 object-cover rounded border';
                previewContainer.appendChild(img);
            };
            reader.readAsDataURL(file);
        });

        uploadPrompt.classList.add('hidden');
    });
</script>



@endsection
