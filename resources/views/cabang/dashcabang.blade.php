@extends('master.public')
@section('title', 'Dashboard Admin')
@section('content')

    @include('master.navbar2')

    {{-- Hero Section --}}
    <section class="relative overflow-hidden bg-gradient-to-br from-green-50 to-white">
        <div class="container mx-auto px-6 py-16 md:py-24 flex flex-col md:flex-row items-center justify-between gap-12">
            <div class="max-w-2xl" data-aos="fade-right">
                <h1 class="text-4xl md:text-5xl font-bold leading-tight mb-6">
                    <span class="text-green-700">Melon<span class="text-green-600">track</span></span><br>
                    <span class="text-gray-800">Manajemen Budidaya Melon</span><br>
                    <span class="text-green-600">Cabang Anda</span>
                </h1>
                <p class="text-lg text-gray-600 mb-8 leading-relaxed">
                    Platform terintegrasi untuk memantau dan mengelola produksi melon di cabang Anda secara digital.
                </p>
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('cabang.laporan') }}" class="px-8 py-3 bg-gradient-to-r from-green-600 to-green-700 text-white font-medium rounded-lg shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                        Pemantauan
                    </a>

                </div>
            </div>
            <div class="relative" data-aos="fade-left">
                <img src="/asset/hero-melon.png" alt="Dashboard Preview" class="w-full max-w-xl rounded-xl shadow-2xl border-8 border-white transform rotate-1 hover:rotate-0 transition-transform duration-500">
                <div class="absolute -bottom-6 -left-6 w-24 h-24 bg-green-100 rounded-full opacity-70"></div>
                <div class="absolute -top-6 -right-6 w-32 h-32 bg-yellow-100 rounded-full opacity-70"></div>
            </div>
        </div>
        <div class="absolute bottom-0 left-0 right-0 h-16 bg-gradient-to-t from-white to-transparent"></div>
    </section>

    {{-- Fitur Section --}}
    <section class="py-16 bg-white">
        <div class="container mx-auto px-6 mt-8">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Fitur untuk Cabang</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">Alat lengkap untuk manajemen budidaya melon tingkat cabang</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Kartu 1 -->
                <div class="bg-white rounded-xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden border border-gray-100 transform hover:-translate-y-2" data-aos="fade-up" data-aos-delay="100">
                    <div class="p-1 bg-gradient-to-r from-yellow-400 to-yellow-500"></div>
                    <div class="p-6">
                        <div class="w-14 h-14 bg-yellow-100 rounded-full flex items-center justify-center mb-4">
                            <img src="/asset/pemantauan.svg" class="w-7">
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Pemantauan Real-time</h3>
                        <p class="text-gray-600">Pantau kondisi lahan melon cabang Anda secara real-time dengan data terupdate.</p>
                        <a href="{{ route('cabang.laporan') }}" class="mt-4 inline-flex items-center text-yellow-600 font-medium hover:text-yellow-700 transition-colors">
                            Akses Pemantauan
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Kartu 2 -->
                <div class="bg-white rounded-xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden border border-gray-100 transform hover:-translate-y-2" data-aos="fade-up" data-aos-delay="300">
                    <div class="p-1 bg-gradient-to-r from-blue-400 to-blue-500"></div>
                    <div class="p-6">
                        <div class="w-14 h-14 bg-blue-100 rounded-full flex items-center justify-center mb-4">
                            <img src="/asset/bill.svg" class="w-7">
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Laporan Panen</h3>
                        <p class="text-gray-600">Catat dan laporkan hasil panen cabang Anda dengan sistem terstruktur.</p>
                        <a href="{{ route('cabang.hasilpanen') }}" class="mt-4 inline-flex items-center text-blue-600 font-medium hover:text-blue-700 transition-colors">
                            Buat Laporan
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Keuntungan Section --}}
    <section class="py-20 bg-gradient-to-r from-green-700 to-green-800 text-white">
        <div class="container mx-auto px-6">
            <div class="flex flex-col lg:flex-row items-center gap-12">
                <div class="lg:w-1/2" data-aos="fade-right">
                    <h2 class="text-3xl font-bold mb-8">Manfaat untuk Cabang Anda</h2>

                    <div class="space-y-6">
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 mt-1">
                                <div class="w-8 h-8 rounded-full bg-green-600 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <h3 class="font-semibold text-lg">Pemantauan Terpusat</h3>
                                <p class="text-green-100">Pantau semua lahan melon cabang dari satu dashboard terintegrasi.</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 mt-1">
                                <div class="w-8 h-8 rounded-full bg-green-600 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <h3 class="font-semibold text-lg">Efisiensi Operasional</h3>
                                <p class="text-green-100">Optimalkan sumber daya dengan perencanaan yang terdata.</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 mt-1">
                                <div class="w-8 h-8 rounded-full bg-green-600 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <h3 class="font-semibold text-lg">Pelaporan Mudah</h3>
                                <p class="text-green-100">Sistem pelaporan terstruktur untuk hasil panen cabang.</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 mt-1">
                                <div class="w-8 h-8 rounded-full bg-green-600 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <h3 class="font-semibold text-lg">Koordinasi Tim</h3>
                                <p class="text-green-100">Sistem terintegrasi untuk koordinasi seluruh tim lapangan cabang.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="lg:w-1/2" data-aos="fade-left">
                    <div class="relative">
                        <img src="/asset/farmer_man.png" alt="Petani Melon" class="rounded-xl shadow-2xl border-8 border-white/20 w-full max-w-lg mx-auto">
                        <div class="absolute -bottom-6 -left-6 w-32 h-32 bg-yellow-400/10 rounded-full"></div>
                        <div class="absolute -top-6 -right-6 w-24 h-24 bg-white/10 rounded-full"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Testimoni --}}
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Apa Kata Pengguna Kami?</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">Dengarkan pengalaman nyata dari petani dan manajer budidaya melon</p>
            </div>

            <!-- Slider main container -->
            <div class="swiper testimonial-swiper" data-aos="fade-up" data-aos-delay="200">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper pb-12">
                    <!-- Slides -->
                    <div class="swiper-slide">
                        <div class="bg-white rounded-xl shadow-lg p-8 md:p-12 relative h-full">
                            <div class="absolute top-0 left-0 right-0 h-2 bg-gradient-to-r from-green-500 to-yellow-400 rounded-t-xl"></div>
                            <div class="flex flex-col md:flex-row items-center gap-8">
                                <div class="flex-shrink-0">
                                    <img src="/asset/testiavatar.png" class="w-20 h-20 rounded-full border-4 border-green-100 shadow-md" alt="Bapak Felix">
                                </div>
                                <div class="text-center md:text-left">
                                    <div class="text-yellow-500 mb-2">
                                        ★ ★ ★ ★ ★
                                    </div>
                                    <blockquote class="text-lg italic text-gray-700 mb-4">
                                        "Melontrack telah mengubah cara kami mengelola budidaya melon. Dengan sistem pemantauan real-time dan analisis data, kami bisa meningkatkan hasil panen hingga 30% dalam satu musim."
                                    </blockquote>
                                    <div>
                                        <p class="font-bold text-gray-800">Bapak Rendy</p>
                                        <p class="text-sm text-gray-600">Petani Melon Cabang Rambipuji</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="bg-white rounded-xl shadow-lg p-8 md:p-12 relative h-full">
                            <div class="absolute top-0 left-0 right-0 h-2 bg-gradient-to-r from-blue-500 to-green-400 rounded-t-xl"></div>
                            <div class="flex flex-col md:flex-row items-center gap-8">
                                <div class="flex-shrink-0">
                                    <img src="/asset/ibusiti.png" class="w-20 h-20 rounded-full border-4 border-green-100 shadow-md" alt="Ibu Siti">
                                </div>
                                <div class="text-center md:text-left">
                                    <div class="text-yellow-500 mb-2">
                                        ★ ★ ★ ★ ☆
                                    </div>
                                    <blockquote class="text-lg italic text-gray-700 mb-4">
                                        "Sistem penjadwalan dari LahanTani sangat membantu tim kami mengorganisir kunjungan ke lahan. Tidak ada lagi yang terlewat dan semua tercatat rapi."
                                    </blockquote>
                                    <div>
                                        <p class="font-bold text-gray-800">Ibu Mila</p>
                                        <p class="text-sm text-gray-600">Petani Melon Cabang Patrang</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="bg-white rounded-xl shadow-lg p-8 md:p-12 relative h-full">
                            <div class="absolute top-0 left-0 right-0 h-2 bg-gradient-to-r from-purple-500 to-blue-400 rounded-t-xl"></div>
                            <div class="flex flex-col md:flex-row items-center gap-8">
                                <div class="flex-shrink-0">
                                    <img src="/asset/bapakagus.png" class="w-20 h-20 rounded-full border-4 border-green-100 shadow-md" alt="Bapak Agus">
                                </div>
                                <div class="text-center md:text-left">
                                    <div class="text-yellow-500 mb-2">
                                        ★ ★ ★ ★ ★
                                    </div>
                                    <blockquote class="text-lg italic text-gray-700 mb-4">
                                        "Laporan keuangan yang otomatis sangat memudahkan kami. Sekarang kami bisa melihat profitabilitas setiap lahan dengan mudah dan membuat keputusan lebih cepat."
                                    </blockquote>
                                    <div>
                                        <p class="font-bold text-gray-800">Bapak Naufal</p>
                                        <p class="text-sm text-gray-600">Petani Melon Cabang Mangli</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Navigation buttons -->
                <div class="swiper-button-next hidden md:flex after:text-green-600"></div>
                <div class="swiper-button-prev hidden md:flex after:text-green-600"></div>

                <!-- Pagination -->
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>

    @include('master.footer2')

    {{-- CSS & JS untuk Swiper --}}
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
    <style>
        .testimonial-swiper {
            padding: 0 20px;
        }
        .swiper-slide {
            height: auto;
            opacity: 0.7;
            transition: opacity 0.3s ease;
        }
        .swiper-slide-active {
            opacity: 1;
        }
        .swiper-pagination-bullet {
            width: 12px;
            height: 12px;
            background: #ddd;
            opacity: 1;
        }
        .swiper-pagination-bullet-active {
            background: #4CAF50;
        }
        .swiper-button-next,
        .swiper-button-prev {
            background-color: white;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }
        .swiper-button-next:hover,
        .swiper-button-prev:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 16px rgba(0,0,0,0.15);
        }
        .swiper-button-next:after,
        .swiper-button-prev:after {
            font-size: 1.2rem;
            font-weight: bold;
        }
    </style>
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const testimonialSwiper = new Swiper('.testimonial-swiper', {
                loop: true,
                slidesPerView: 1,
                spaceBetween: 30,
                centeredSlides: true,
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                breakpoints: {
                    768: {
                        slidesPerView: 1.5,
                    },
                    1024: {
                        slidesPerView: 2,
                    }
                }
            });
        });
    </script>

    {{-- AOS Animation --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            once: true
        });
    </script>

@endsection
