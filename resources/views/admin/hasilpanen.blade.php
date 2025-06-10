@extends('master.public')
@section('title', 'Hasil Panen')
@section('content')

@include('master.navbar')

<div x-data="panenDetail()" class="container mx-auto px-4 py-6">

    <h2 class="text-2xl font-bold mb-2">Hasil Panen</h2>
    <div class="bg-white shadow rounded-lg p-6 mb-16">
        <div class="overflow-x-auto">
            <div class="flex justify-between items-center mb-4 mt-3 ml-3">
            <form method="GET" action="{{ route('admin.hasilpanen') }}" class="w-full max-w-sm">
                <div class="relative">
                    <input
                        type="text"
                        name="search"
                        placeholder="Cari hasil panen..."
                        value="{{ request('search') }}"
                        class="w-full border border-gray-300 rounded-full py-2 px-4 pl-10 focus:outline-none focus:ring-1 focus:ring-green-300
"
                    />
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
                        <th class="py-2 px-4 border-b">No</th>
                        <th class="py-2 px-4 border-b">Tanggal</th>
                        <th class="py-2 px-4 border-b">Nama Cabang</th>
                        <th class="py-2 px-4 border-b">Periode Panen</th>
                        <th class="py-2 px-4 border-b">Total Panen</th>
                        <th class="py-2 px-4 border-b">Keterangan</th>
                        <th class="py-2 px-4 border-b"></th>
                    </tr>
                </thead>
                <tbody class="divide-y">
                    @forelse ($hasilPanens as $index => $panen)
                        <tr @click="showDetail({{ $panen->toJson() }})">
                            <td class="py-2 px-4">{{ $index + 1 }}</td>
                            <td class="py-2 px-4">{{ \Carbon\Carbon::parse($panen->created_at)->format('d-m-Y') }}</td>
                            <td class="py-2 px-4">{{ $panen->cabang->nama }}</td>
                            <td class="py-2 px-4">{{ $panen->periode_panen }}</td>
                            <td class="py-2 px-4">{{ $panen->total_panen }} kg</td>
                            <td class="py-2 px-4">
                                <div class="flex items-center justify-between">
                                    <span>{{ \Illuminate\Support\Str::limit($panen->keterangan, 50, '...') }}</span>
                                    <button
                                        @click.stop="showDetail({{ $panen->toJson() }})"
                                        class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 text-sm"
                                    >
                                        Selengkapnya
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-4 text-center text-gray-500">Belum ada data hasil panen</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="mt-4">
                {{ $hasilPanens->links() }}
            </div>
        </div>
    </div>

    <!-- Modal Detail Card -->
    <div x-show="isDetailVisible" class="fixed inset-0 bg-black bg-opacity-30 flex items-center justify-center z-50">
        <div class="bg-white rounded-2xl shadow-lg w-full max-w-lg mx-auto px-8 py-6 relative" @click.away="isDetailVisible = false">
            <!-- Tombol Close -->
            <button @click="isDetailVisible = false" class="absolute top-3 right-4 text-2xl text-gray-600 hover:text-black">&times;</button>

            <!-- Preview Content Modal -->
            <div class="mb-4">
                <h2 class="text-xl font-semibold mb-6 text-black">Detail Hasil Panen</h2>

                <div class="space-y-4">
                    <!-- Nama Cabang -->
                    <div class="flex items-start">
                        <label class="w-1/3 font-medium text-black mt-2">Nama Cabang</label>
                        <input type="text" class="w-2/3 border border-gray-300 rounded-xl px-4 py-2 bg-gray-100"
                            x-bind:value="detailData.cabang?.nama" readonly>
                    </div>

                    <!-- Tanggal -->
                    <div class="flex items-start">
                        <label class="w-1/3 font-medium text-black mt-2">Tanggal</label>
                        <input type="text" class="w-2/3 border border-gray-300 rounded-xl px-4 py-2 bg-gray-100"
                            :value="formatDate(detailData.created_at)" readonly>
                    </div>

                    <!-- Periode Panen -->
                    <div class="flex items-start">
                        <label class="w-1/3 font-medium text-black mt-2">Periode panen</label>
                        <input type="text" class="w-2/3 border border-gray-300 rounded-xl px-4 py-2 bg-gray-100"
                            x-bind:value="detailData.periode_panen" readonly>
                    </div>

                    <!-- Total Panen -->
                    <div class="flex items-start">
                        <label class="w-1/3 font-medium text-black mt-2">Total panen</label>
                        <input type="text" class="w-2/3 border border-gray-300 rounded-xl px-4 py-2 bg-gray-100"
                            x-bind:value="detailData.total_panen + ' Kg'" readonly>
                    </div>

                    <!-- Keterangan -->
                    <div class="flex items-start">
                        <label class="w-1/3 font-medium text-black mt-2">Keterangan</label>
                        <textarea rows="5" class="w-2/3 border border-gray-300 rounded-xl px-4 py-2 bg-gray-100 text-sm text-black text-justify resize-none"
                            x-text="detailData.keterangan" readonly></textarea>
                    </div>

                    <!-- Tombol Cetak PDF -->
                    {{-- <div class="text-right mt-6">
                        <button @click="printPDF()" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-xl text-sm shadow">
                            Cetak PDF
                        </button>
                    </div> --}}
                </div>
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
                return `${day} - ${month} - ${year}`;
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
                                    ${this.detailData.cabang?.nama || 'Lahan Tani'}
                                </div>
                            </div>
                        </div>

                        <!-- Summary cards -->
                        <div style="display: flex; justify-content: space-between; margin-bottom: 30px; gap: 15px;">
                            <div style="flex: 1; background: #f8f9fa; border-radius: 8px; padding: 15px; box-shadow: 0 2px 4px rgba(0,0,0,0.05);">
                                <div style="color: #6e84a3; font-size: 14px; margin-bottom: 5px;">Periode Panen</div>
                                <div style="font-size: 24px; font-weight: 600; color: #2c7be5;">${this.detailData.periode_panen} Hari</div>
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
                            <p>© ${new Date().getFullYear()} Lahan Tani. All rights reserved.</p>
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
