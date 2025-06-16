@extends('master.public')
@section('title', 'Hasil Panen')
@section('content')

@include('master.navbar')

<div x-data="panenDetail()" class="min-h-screen bg-gradient-to-br from-gray-50 to-green-50 py-8">
    <div class="container max-w-6xl mx-auto px-4">
        <div class="bg-white/90 backdrop-blur-sm shadow-xl rounded-xl p-6 mb-16 border border-gray-100">
            <!-- Header Section -->
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
                <div>
                    <h2 class="text-2xl font-bold text-gray-800">Hasil Panen</h2>
                    <p class="text-gray-600">Rekap data hasil panen seluruh cabang</p>
                </div>

                <!-- Search Form -->
                <form method="GET" action="{{ route('admin.hasilpanen') }}" class="w-full md:w-96">
                    <div class="relative">
                        <input
                            type="text"
                            name="search"
                            placeholder="Cari hasil panen..."
                            value="{{ request('search') }}"
                            class="w-full border border-gray-200 rounded-full py-2 px-4 pl-10 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent shadow-sm transition-all duration-200"
                        />
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M11 19a8 8 0 100-16 8 8 0 000 16z" />
                            </svg>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                @foreach($rekapPerCabang as $rekap)
                <div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden">
                    <div class="p-5">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-green-50 text-green-600 mr-4">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-800">{{ $rekap->cabang->nama }}</h3>
                                <div class="flex items-center mt-1">
                                    <span class="text-xs text-gray-500 mr-2">Terakhir update:</span>
                                    <span class="text-xs font-medium text-gray-600">
                                        {{ \Carbon\Carbon::parse($rekap->last_update)->diffForHumans() }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-4 mt-4">
                            <div class="bg-gray-50 p-3 rounded-lg">
                                <p class="text-sm text-gray-500">Total Panen</p>
                                <p class="text-xl font-bold text-green-600">{{ number_format($rekap->total_kg, 0, ',', '.') }} kg</p>
                            </div>
                            <div class="bg-gray-50 p-3 rounded-lg">
                                <p class="text-sm text-gray-500">Jumlah Periode</p>
                                <p class="text-xl font-bold text-blue-600">{{ $rekap->total_periode }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Main Card -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden border border-gray-100">
                <!-- Table Section -->
                <div class="overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead class="bg-gradient-to-r from-green-600 to-green-700 text-white">
                            <tr>
                                <th class="py-3 px-4 text-left font-medium">No</th>
                                <th class="py-3 px-4 text-left font-medium">Tanggal</th>
                                <th class="py-3 px-4 text-left font-medium">Nama Cabang</th>
                                <th class="py-3 px-4 text-left font-medium">Periode</th>
                                <th class="py-3 px-4 text-left font-medium">Total Panen</th>
                                <th class="py-3 px-4 text-left font-medium">Keterangan</th>
                                <th class="py-3 px-4 text-center font-medium">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse ($hasilPanens as $index => $panen)
                                <tr class="hover:bg-gray-50 transition-colors cursor-pointer" @click="showDetail({{ $panen->toJson() }})">
                                    <td class="py-3 px-4">{{ ($hasilPanens->currentPage() - 1) * $hasilPanens->perPage() + $loop->iteration }}</td>
                                    <td class="py-3 px-4">{{ \Carbon\Carbon::parse($panen->created_at)->format('d-m-Y') }}</td>
                                    <td class="py-3 px-4 font-medium text-gray-800">{{ $panen->cabang->nama }}</td>
                                    <td class="py-3 px-4">{{ $panen->periode_panen }}</td>
                                    <td class="py-3 px-4 font-semibold text-green-700">{{ $panen->total_panen }} kg</td>
                                    <td class="py-3 px-4 text-gray-600">
                                        {{ \Illuminate\Support\Str::limit($panen->keterangan, 50, '...') }}
                                    </td>
                                    <td class="py-3 px-4 text-center">
                                        <button @click.stop="showDetail({{ $panen->toJson() }})"
                                            class="inline-flex items-center bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg text-sm shadow-md hover:shadow-lg transition-all duration-200"
                                        >
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                            Detail
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="py-8 text-center text-gray-500">
                                        <div class="flex flex-col items-center justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            <p class="mt-2 text-lg">Belum ada data hasil panen</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="px-2 mt-6 border-t border-gray-100">
                    {{ $hasilPanens->links() }}
                </div>
            </div>
        </div>
    </div>

    <!-- Detail Modal -->
    <div x-show="isDetailVisible" x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4">
        <div x-show="isDetailVisible" x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
             x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 scale-100"
             x-transition:leave-end="opacity-0 scale-95" @click.away="isDetailVisible = false"
             class="bg-white rounded-xl shadow-2xl w-full max-w-2xl max-h-[90vh] overflow-y-auto">
            <!-- Modal Header -->
            <div class="sticky top-0 bg-gradient-to-r from-green-600 to-green-700 px-6 py-4 flex justify-between items-center z-10">
                <h3 class="text-xl font-semibold text-white">Detail Hasil Panen</h3>
                <button @click="isDetailVisible = false" class="text-white hover:text-gray-200 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Modal Content -->
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <!-- Cabang Info -->
                    <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                        <div class="flex items-center mb-3">
                            <div class="bg-green-100 p-2 rounded-full mr-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                            </div>
                            <h4 class="font-semibold text-gray-800">Informasi Cabang</h4>
                        </div>
                        <div class="space-y-2">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Nama Cabang</span>
                                <span class="font-medium" x-text="detailData.cabang?.nama"></span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Tanggal Laporan</span>
                                <span class="font-medium" x-text="formatDate(detailData.created_at)"></span>
                            </div>
                        </div>
                    </div>

                    <!-- Panen Info -->
                    <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                        <div class="flex items-center mb-3">
                            <div class="bg-green-100 p-2 rounded-full mr-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                                </svg>
                            </div>
                            <h4 class="font-semibold text-gray-800">Data Panen</h4>
                        </div>
                        <div class="space-y-2">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Periode Panen</span>
                                <span class="font-medium" x-text="detailData.periode_panen"></span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Total Panen</span>
                                <span class="font-semibold text-green-700" x-text="detailData.total_panen + ' Kg'"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Keterangan -->
                <div class="mb-6">
                    <label class="block font-semibold text-gray-700 mb-2">Keterangan</label>
                    <div class="bg-gray-50 border-l-4 border-green-500 rounded-r-lg p-4 text-gray-700">
                        <div class="prose max-w-none" x-text="detailData.keterangan"></div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex justify-end space-x-3 pt-4 border-t border-gray-200">
                    <button @click="isDetailVisible = false" class="px-5 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition duration-200">
                        Tutup
                    </button>
                    <button @click="printPDF()" class="px-5 py-2 bg-gradient-to-r from-green-600 to-green-700 text-white font-medium rounded-lg hover:from-green-700 hover:to-green-800 transition-all duration-200 shadow-md hover:shadow-lg flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                        </svg>
                        Cetak PDF
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div id="print-area" style="display: none;"></div>
</div>

@include('master.footer')

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
<script>
    function panenDetail() {
        return {
            isDetailVisible: false,
            detailData: {},

            showDetail(data) {
                this.detailData = data;
                this.isDetailVisible = true;
            },

            formatDate(dateString) {
                if (!dateString) return '';
                const d = new Date(dateString);
                const day = String(d.getDate()).padStart(2, '0');
                const month = String(d.getMonth() + 1).padStart(2, '0');
                const year = d.getFullYear();
                return `${day}-${month}-${year}`;
            },

            printPDF() {
                const content = `
                    <div style="width: 100%; max-width: 800px; margin: 0 auto; padding: 20px; font-family: 'Segoe UI', Arial, sans-serif;">
                        <!-- Header with logo and title -->
                        <div style="display: flex; align-items: center; margin-bottom: 20px; border-bottom: 2px solid #2c7be5; padding-bottom: 15px;">
                            <div style="flex: 1;">
                                <h1 style="color: #2c7be5; font-size: 28px; margin: 0; font-weight: 600;">Laporan Hasil Panen</h1>
                                <p style="color: #6e84a3; margin: 5px 0 0; font-size: 14px;">${this.formatDate(this.detailData.created_at)}</p>
                            </div>
                            <div style="text-align: right;">
                                <!-- Replace with your actual logo or company name -->
                                <div style="background-color: #2c7be5; color: white; padding: 10px 15px; border-radius: 4px; font-weight: bold; display: inline-block;">
                                    ${this.detailData.cabang?.nama || 'Melontrack'}
                                </div>
                            </div>
                        </div>

                        <!-- Summary cards -->
                        <div style="display: flex; justify-content: space-between; margin-bottom: 30px; gap: 15px;">
                            <div style="flex: 1; background: #f8f9fa; border-radius: 8px; padding: 15px; box-shadow: 0 2px 4px rgba(0,0,0,0.05);">
                                <div style="color: #6e84a3; font-size: 14px; margin-bottom: 5px;">Periode Panen</div>
                                <div style="font-size: 24px; font-weight: 600; color: #2c7be5;">${this.detailData.periode_panen}</div>
                            </div>
                            <div style="flex: 1; background: #f8f9fa; border-radius: 8px; padding: 15px; box-shadow: 0 2px 4px rgba(0,0,0,0.05);">
                                <div style="color: #6e84a3; font-size: 14px; margin-bottom: 5px;">Total Panen</div>
                                <div style="font-size: 24px; font-weight: 600; color: #2c7be5;">${this.detailData.total_panen} Kg</div>
                            </div>
                            <div style="flex: 1; background: #f8f9fa; border-radius: 8px; padding: 15px; box-shadow: 0 2px 4px rgba(0,0,0,0.05);">
                                <div style="color: #6e84a3; font-size: 14px; margin-bottom: 5px;">Lokasi</div>
                                <div style="font-size: 18px; font-weight: 600; color: #2c7be5;">${this.detailData.cabang?.nama || '-'}</div>
                            </div>
                        </div>

                        <!-- Detailed information -->
                        <div style="background: white; border-radius: 8px; padding: 20px; box-shadow: 0 2px 10px rgba(0,0,0,0.05); margin-bottom: 30px;">
                            <h2 style="color: #2c7be5; font-size: 18px; margin-top: 0; margin-bottom: 15px; border-bottom: 1px solid #edf2f9; padding-bottom: 10px;">Detail Laporan</h2>

                            <table style="width: 100%; border-collapse: collapse;">
                                <tr>
                                    <td style="padding: 12px 10px; border-bottom: 1px solid #edf2f9; width: 30%; color: #6e84a3; font-weight: 500;">Tanggal Laporan</td>
                                    <td style="padding: 12px 10px; border-bottom: 1px solid #edf2f9;">${this.formatDate(this.detailData.created_at)}</td>
                                </tr>
                                <tr>
                                    <td style="padding: 12px 10px; border-bottom: 1px solid #edf2f9; color: #6e84a3; font-weight: 500;">Lokasi Cabang</td>
                                    <td style="padding: 12px 10px; border-bottom: 1px solid #edf2f9;">${this.detailData.cabang?.nama || '-'}</td>
                                </tr>
                                <tr>
                                    <td style="padding: 12px 10px; border-bottom: 1px solid #edf2f9; color: #6e84a3; font-weight: 500;">Periode Panen</td>
                                    <td style="padding: 12px 10px; border-bottom: 1px solid #edf2f9;">${this.detailData.periode_panen} Hari</td>
                                </tr>
                                <tr>
                                    <td style="padding: 12px 10px; border-bottom: 1px solid #edf2f9; color: #6e84a3; font-weight: 500;">Total Hasil Panen</td>
                                    <td style="padding: 12px 10px; border-bottom: 1px solid #edf2f9;">${this.detailData.total_panen} Kg</td>
                                </tr>
                                ${this.detailData.catatan ? `
                                <tr>
                                    <td style="padding: 12px 10px; border-bottom: 1px solid #edf2f9; color: #6e84a3; font-weight: 500;">Catatan Tambahan</td>
                                    <td style="padding: 12px 10px; border-bottom: 1px solid #edf2f9;">${this.detailData.catatan}</td>
                                </tr>
                                ` : ''}
                            </table>
                        </div>

                        <!-- Keterangan section -->
                        <div style="background: white; border-radius: 8px; padding: 20px; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
                            <h2 style="color: #2c7be5; font-size: 18px; margin-top: 0; margin-bottom: 15px; border-bottom: 1px solid #edf2f9; padding-bottom: 10px;">Keterangan</h2>
                            <p style="color: #12263f; line-height: 1.6; margin: 0;">${this.detailData.keterangan || 'Tidak ada keterangan tambahan'}</p>
                        </div>

                        <!-- Footer -->
                        <div style="margin-top: 40px; padding-top: 15px; border-top: 1px solid #edf2f9; text-align: center; color: #95aac9; font-size: 12px;">
                            <p>Dokumen ini dicetak secara otomatis pada ${new Date().toLocaleString()}</p>
                            <p>© ${new Date().getFullYear()} Melontrack. All rights reserved.</p>
                        </div>
                    </div>
                `;

                // Masukkan ke elemen tersembunyi
                const printArea = document.getElementById('print-area');
                printArea.innerHTML = content;
                printArea.style.display = 'block';

                const opt = {
                    margin: [0.5, 0.5, 0.5, 0.5],
                    filename: 'laporan-hasil-panen-' + new Date().toISOString().slice(0,10) + '.pdf',
                    image: { type: 'jpeg', quality: 0.98 },
                    html2canvas: {
                        scale: 2,
                        logging: true,
                        useCORS: true,
                        allowTaint: true,
                        letterRendering: true
                    },
                    jsPDF: {
                        unit: 'in',
                        format: 'a4',
                        orientation: 'portrait',
                        hotfixes: ["px_scaling"]
                    }
                };

                html2pdf().set(opt).from(printArea).save().then(() => {
                    printArea.innerHTML = '';
                    printArea.style.display = 'none';
                });
            }
        };
    }
</script>

@endsection
