@extends('master.public')
@section('title', 'Hasil Penjualan')
@section('content')

@include('master.navbar')

    <div class="flex mt-5 mb-16">
        <!-- Sidebar Tahun -->
        <div class="w-1/6 bg-white border-r p-4 text-center">
            <form action="" method="get">
                <ul class="space-y-4">
                    @foreach ($tahunList as $th)
                        <li>
                            <button type="submit" name="tahun" value="{{ $th }}"
                                class="w-full text-center text-lg font-medium {{ $tahun == $th ? 'text-black font-bold border-l-4 border-black pl-2' : 'text-gray-500 hover:text-black' }}">
                                {{ $th }}
                            </button>
                        </li>
                    @endforeach
                </ul>
            </form>
        </div>

        <!-- Konten Grafik -->
        <div class="w-5/6 p-6 mb-16">
            <div class="bg-white shadow p-6 rounded relative">
                <!-- Header Chart + Tombol -->
                <div class="flex justify-end items-center mb-4">
                    <button onclick="toggleModal(true)" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">
                        Tambah Pendapatan
                    </button>
                </div>

                <!-- Chart -->
                <canvas id="myChart" height="150"></canvas>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Pendapatan -->
    <div id="modalPendapatan" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-50">
        <div class="bg-white p-6 rounded-lg w-full max-w-md relative">
            <button onclick="toggleModal(false)" class="absolute top-2 right-3 text-xl">&times;</button>
            <h2 class="text-lg font-bold mb-4">Tambah Pendapatan</h2>
            <form action="{{ route('admin.hasilpenjualan.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="block font-medium">Tanggal</label>
                    <input type="date" name="tanggal" class="w-full border px-3 py-2 rounded" required>
                </div>
                <div class="mb-4">
                    <label class="block font-medium">Jumlah Pendapatan</label>
                    <input type="number" name="jumlah" class="w-full border px-3 py-2 rounded" required>
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>

    @include('master.footer')

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('myChart');
    const chart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: {!! json_encode($bulans) !!},
            data: {!! json_encode($jumlahs) !!},
            datasets: [{
                label: 'Hasil Pendapatan',
                data: {!! json_encode($jumlahs) !!},
                borderColor: 'red',
                backgroundColor: 'red',
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function (value) {
                            return 'Rp. ' + new Intl.NumberFormat('id-ID').format(value);
                        }
                    }
                }
            },
            plugins: {
                legend: {
                    display: true,
                    labels: {
                        usePointStyle: false,
                        color: 'black',
                        boxWidth: 35,
                        boxHeight: 15,
                        font: {
                            size: 15,
                            weight: 'bold'
                        }
                    }
                }
            }
        }
    });

    function toggleModal(show) {
        const modal = document.getElementById('modalPendapatan');
        modal.classList.toggle('hidden', !show);
    }
</script>

@endsection
