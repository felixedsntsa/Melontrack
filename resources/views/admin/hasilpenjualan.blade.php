@extends('master.public')
@section('title', 'Hasil Penjualan')
@section('content')

@include('master.navbar')

<div class="min-h-screen bg-gradient-to-br from-gray-50 to-green-50 py-6 px-4 sm:px-6 lg:px-8">
    <div class="flex flex-col lg:flex-row gap-6">
        <!-- Sidebar Tahun -->
        <div class="lg:w-1/6">
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-4 lg:p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    Filter Tahun
                </h3>
                <form action="" method="get">
                    <ul class="space-y-3">
                        @foreach ($tahunList as $th)
                            <li>
                                <button type="submit" name="tahun" value="{{ $th }}"
                                    class="w-full text-left px-4 py-2 rounded-lg transition-all
                                    {{ $tahun == $th ?
                                        'bg-green-600 text-white font-medium shadow-sm' :
                                        'text-gray-600 hover:bg-gray-100 hover:text-gray-800' }}">
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                        </svg>
                                        {{ $th }}
                                    </div>
                                </button>
                            </li>
                        @endforeach
                    </ul>
                </form>
            </div>
        </div>

        <!-- Konten Utama -->
        <div class="lg:w-5/6">
            <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-200">
                <!-- Header dengan Statistik -->
                <div class="bg-gradient-to-r from-green-700 to-green-600 px-6 py-4 text-white">
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center">
                        <div>
                            <h2 class="text-xl font-bold">Hasil Penjualan Tahun {{ $tahun }}</h2>
                            <p class="text-green-100">Statistik pendapatan per bulan</p>
                        </div>
                        <button onclick="toggleModal(true)"
                                class="mt-3 sm:mt-0 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-green-700 bg-white hover:bg-green-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-all">
                            <svg xmlns="http://www.w3.org/2000/svg" class="-ml-1 mr-2 h-5 w-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            Tambah Pendapatan
                        </button>
                    </div>
                </div>

                <!-- Card Body -->
                <div class="p-6">
                    <!-- Summary Cards -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                        <div class="bg-green-50 rounded-lg p-4 border border-green-100">
                            <div class="flex items-center">
                                <div class="bg-green-100/50 p-2 rounded-full mr-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">Total Pendapatan</p>
                                    <p class="font-bold text-lg text-gray-800">Rp {{ number_format(array_sum($jumlahs), 0, ',', '.') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="bg-blue-50 rounded-lg p-4 border border-blue-100">
                            <div class="flex items-center">
                                <div class="bg-blue-100/50 p-2 rounded-full mr-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">Bulan Tertinggi</p>
                                    {{-- <p class="font-bold text-lg text-gray-800">{{ $bulans[array_search(max($jumlahs), $jumlahs)] }}</p> --}}
                                    @if (!empty($jumlahs))
                                        <p class="font-bold text-lg text-gray-800">
                                            {{ $bulans[array_search(max($jumlahs), $jumlahs)] }}
                                        </p>
                                    @else
                                        <p class="text-gray-500">Data belum tersedia</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="bg-purple-50 rounded-lg p-4 border border-purple-100">
                            <div class="flex items-center">
                                <div class="bg-purple-100/50 p-2 rounded-full mr-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">Rata-rata Bulanan</p>
                                    <p class="font-bold text-lg text-gray-800">Rp {{ number_format(array_sum($jumlahs)/12, 0, ',', '.') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Chart Container -->
                    <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                        <canvas id="salesChart" height="150"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Pendapatan -->
<div id="modalPendapatan" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-50 transition-opacity duration-300">
    <div class="bg-white rounded-xl shadow-xl w-full max-w-md transform transition-all duration-300 scale-95 opacity-0" id="modalContent">
        <div class="p-6">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold text-gray-800 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    Tambah Pendapatan
                </h2>
                <button onclick="toggleModal(false)" class="text-gray-400 hover:text-gray-500 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <form action="{{ route('admin.hasilpenjualan.store') }}" method="POST">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal</label>
                        <div class="relative">
                            <input type="date" name="tanggal" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500 focus:border-transparent" required>
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Jumlah Pendapatan</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="text-gray-500">Rp</span>
                            </div>
                            <input type="number" name="jumlah" class="w-full border border-gray-300 rounded-lg pl-10 pr-4 py-2 focus:ring-2 focus:ring-green-500 focus:border-transparent" required>
                        </div>
                    </div>
                </div>
                <div class="mt-6 flex justify-end space-x-3">
                    <button type="button" onclick="toggleModal(false)" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-all">
                        Batal
                    </button>
                    <button type="submit" class="px-4 py-2 border border-transparent rounded-lg shadow-sm text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-all">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@include('master.footer')

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Inisialisasi Chart
    const ctx = document.getElementById('salesChart').getContext('2d');
    const salesChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: {!! json_encode($bulans) !!},
            datasets: [{
                label: 'Hasil Pendapatan',
                data: {!! json_encode($jumlahs) !!},
                borderColor: '#10B981',
                backgroundColor: 'rgba(16, 185, 129, 0.1)',
                borderWidth: 2,
                fill: true,
                pointBackgroundColor: '#10B981',
                pointBorderColor: '#fff',
                pointBorderWidth: 2,
                pointRadius: 5,
                pointHoverRadius: 7
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'top',
                    labels: {
                        font: {
                            size: 14,
                            weight: 'bold'
                        },
                        padding: 20,
                        usePointStyle: true,
                        pointStyle: 'circle'
                    }
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return 'Rp ' + new Intl.NumberFormat('id-ID').format(context.raw);
                        }
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        drawBorder: false,
                        color: 'rgba(0, 0, 0, 0.05)'
                    },
                    ticks: {
                        callback: function(value) {
                            return 'Rp ' + new Intl.NumberFormat('id-ID').format(value);
                        },
                        padding: 10
                    }
                },
                x: {
                    grid: {
                        display: false,
                        drawBorder: false
                    },
                    ticks: {
                        padding: 10
                    }
                }
            },
            interaction: {
                intersect: false,
                mode: 'index'
            }
        }
    });

    // Fungsi Toggle Modal dengan Animasi
    function toggleModal(show) {
        const modal = document.getElementById('modalPendapatan');
        const modalContent = document.getElementById('modalContent');

        if (show) {
            modal.classList.remove('hidden');
            setTimeout(() => {
                modalContent.classList.remove('scale-95', 'opacity-0');
                modalContent.classList.add('scale-100', 'opacity-100');
            }, 10);
        } else {
            modalContent.classList.remove('scale-100', 'opacity-100');
            modalContent.classList.add('scale-95', 'opacity-0');
            setTimeout(() => {
                modal.classList.add('hidden');
            }, 300);
        }
    }
</script>

@endsection
