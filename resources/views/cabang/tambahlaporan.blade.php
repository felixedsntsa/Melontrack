@extends('master.public')
@section('title', 'Tambah Laporan')
@section('content')

@include('master.navbar2')

<div class="min-h-screen bg-gradient-to-br from-gray-50 to-green-50 py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-3xl mx-auto">
        <!-- Header Section -->
        <div class="mb-8 text-center">
            <h1 class="text-3xl font-bold text-gray-800 flex items-center justify-center">
                <svg class="w-8 h-8 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                </svg>
                Tambah Laporan Baru
            </h1>
            <p class="mt-2 text-gray-600">Lengkapi formulir berikut untuk membuat laporan baru</p>
        </div>

        <!-- Error Messages -->
        @if ($errors->any())
            <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 rounded-lg shadow-sm">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-red-800">Terdapat {{ $errors->count() }} kesalahan yang perlu diperbaiki</h3>
                        <div class="mt-2 text-sm text-red-700">
                            <ul class="list-disc pl-5 space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <!-- Form Card -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100">
            <form action="{{ route('cabang.laporan.store') }}" method="POST" enctype="multipart/form-data" id="uploadForm">
                @csrf

                <!-- Dokumentasi Section -->
                <div class="px-6 py-5 border-b border-gray-200 bg-gradient-to-r from-green-50 to-gray-50">
                    <h3 class="text-lg font-semibold text-gray-800 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        Dokumentasi
                    </h3>
                </div>

                <div class="p-6">
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Unggah dokumentasi pendukung</label>
                        <div id="dropArea" class="border-2 border-dashed border-gray-300 rounded-lg p-8 text-center cursor-pointer bg-gray-50 hover:bg-gray-100 transition duration-150 relative">
                            <div id="previewContainer" class="flex flex-wrap gap-3 justify-start mb-4"></div>

                            <div id="uploadPrompt" class="text-gray-500">
                                <svg class="mx-auto h-12 w-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                                </svg>
                                <p class="mt-2 text-sm font-medium">Seret file ke sini atau klik untuk memilih</p>
                                <p class="mt-1 text-xs text-gray-400">Format: JPG, PNG, JPEG (maks. 5MB per file)</p>
                                <label class="inline-flex items-center mt-3 text-green-600 hover:text-green-700 cursor-pointer transition duration-150">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M4 3a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V7.414A2 2 0 0017.414 6L14 2.586A2 2 0 0012.586 2H4z" />
                                    </svg>
                                    <span class="text-sm underline">Pilih File</span>
                                    <input type="file" name="dokumentasi[]" id="fileInput" multiple class="hidden" accept="image/*">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Deskripsi Section -->
                <div class="px-6 py-5 border-t border-b border-gray-200 bg-gradient-to-r from-green-50 to-gray-50">
                    <h3 class="text-lg font-semibold text-gray-800 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2"/>
                        </svg>
                        Deskripsi Laporan
                    </h3>
                </div>

                <div class="p-6">
                    <div class="mb-6">
                        <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-2">Isi laporan</label>
                        <textarea name="deskripsi" id="deskripsi" rows="6"
                            class="block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500 transition duration-150"
                            placeholder="Jelaskan secara detail tentang laporan Anda"></textarea>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex justify-end">
                    <button type="submit"
                            class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition duration-150 transform hover:scale-105">
                        <svg class="-ml-1 mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7"/>
                        </svg>
                        Kirim Laporan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@include('master.footer2')

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const dropArea = document.getElementById('dropArea');
        const fileInput = document.getElementById('fileInput');
        const previewContainer = document.getElementById('previewContainer');
        const uploadPrompt = document.getElementById('uploadPrompt');

        let selectedFiles = [];

        // Handle click on drop area
        dropArea.addEventListener('click', () => fileInput.click());

        // Handle file selection
        fileInput.addEventListener('change', (e) => {
            handleFiles(e.target.files);
        });

        // Handle drag and drop
        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            dropArea.addEventListener(eventName, preventDefaults, false);
        });

        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }

        ['dragenter', 'dragover'].forEach(eventName => {
            dropArea.addEventListener(eventName, highlight, false);
        });

        ['dragleave', 'drop'].forEach(eventName => {
            dropArea.addEventListener(eventName, unhighlight, false);
        });

        function highlight() {
            dropArea.classList.add('border-green-500', 'bg-green-50');
        }

        function unhighlight() {
            dropArea.classList.remove('border-green-500', 'bg-green-50');
        }

        dropArea.addEventListener('drop', handleDrop, false);

        function handleDrop(e) {
            const dt = e.dataTransfer;
            const files = dt.files;
            handleFiles(files);
        }

        function handleFiles(files) {
            const newFiles = Array.from(files);

            // Validate file types and sizes
            const validFiles = newFiles.filter(file => {
                const validTypes = ['image/jpeg', 'image/png', 'image/jpg'];
                const isValidType = validTypes.includes(file.type);
                const isValidSize = file.size <= 5 * 1024 * 1024; // 5MB

                if (!isValidType) {
                    alert(`File ${file.name} bukan gambar (hanya JPG, PNG, JPEG yang diperbolehkan)`);
                    return false;
                }

                if (!isValidSize) {
                    alert(`File ${file.name} terlalu besar (maksimal 5MB)`);
                    return false;
                }

                return true;
            });

            selectedFiles = selectedFiles.concat(validFiles);

            // Update input file
            const dataTransfer = new DataTransfer();
            selectedFiles.forEach(file => dataTransfer.items.add(file));
            fileInput.files = dataTransfer.files;

            // Render preview
            renderPreview();
        }

        function renderPreview() {
            previewContainer.innerHTML = '';

            if (selectedFiles.length > 0) {
                uploadPrompt.classList.add('hidden');

                selectedFiles.forEach((file, index) => {
                    const reader = new FileReader();
                    reader.onload = function(evt) {
                        const previewItem = document.createElement('div');
                        previewItem.className = 'relative group';

                        const img = document.createElement('img');
                        img.src = evt.target.result;
                        img.className = 'w-24 h-24 object-cover rounded-lg border border-gray-200 shadow-sm';

                        const removeBtn = document.createElement('button');
                        removeBtn.type = 'button';
                        removeBtn.className = 'absolute -top-2 -right-2 bg-red-500 text-white rounded-full w-5 h-5 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-150';
                        removeBtn.innerHTML = '&times;';
                        removeBtn.addEventListener('click', () => removeFile(index));

                        previewItem.appendChild(img);
                        previewItem.appendChild(removeBtn);
                        previewContainer.appendChild(previewItem);
                    };
                    reader.readAsDataURL(file);
                });
            } else {
                uploadPrompt.classList.remove('hidden');
            }
        }

        function removeFile(index) {
            selectedFiles.splice(index, 1);

            // Update input file
            const dataTransfer = new DataTransfer();
            selectedFiles.forEach(file => dataTransfer.items.add(file));
            fileInput.files = dataTransfer.files;

            renderPreview();
        }
    });
</script>

@endsection
