{{-- Footer --}}
<footer class="bg-gradient-to-r from-green-700 to-green-800 py-12 px-8 md:px-12 lg:px-24 grid grid-cols-1 md:grid-cols-3 gap-8 text-white">
    <!-- Logo & Deskripsi -->
    <div class="space-y-4">
        <div class="flex items-center space-x-2">
            <h3 class="font-bold text-3xl bg-clip-text text-transparent bg-white">Melontrack</h3>
        </div>
        <p class="text-green-100 leading-relaxed">Aplikasi manajemen pertanian modern berbasis web yang dirancang untuk optimalisasi pengelolaan, pemantauan, dan pelaporan budidaya melon secara real-time.</p>
    </div>

    <!-- Navigasi -->
    <div class="space-y-4">
        <h4 class="font-bold text-xl text-white border-b border-green-500 pb-2 w-max">Navigasi Cepat</h4>
        <ul class="space-y-3">
            <li>
                <a href="{{ route('admin.laporan') }}" class="flex items-center text-green-100 hover:text-white transition-colors duration-300 group">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-green-300 group-hover:translate-x-1 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                    </svg>
                    Pemantauan
                </a>
            </li>
            <li>
                <a href="{{ route('admin.hasilpanen') }}" class="flex items-center text-green-100 hover:text-white transition-colors duration-300 group">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-green-300 group-hover:translate-x-1 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                    </svg>
                    Hasil Panen
                </a>
            </li>
            <li>
                <a href="{{ route('admin.hasilpenjualan.index') }}" class="flex items-center text-green-100 hover:text-white transition-colors duration-300 group">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-green-300 group-hover:translate-x-1 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    Hasil Penjualan
                </a>
            </li>
        </ul>
    </div>

    <!-- Kontak -->
    <div class="space-y-4">
        <h4 class="font-bold text-xl text-white border-b border-green-500 pb-2 w-max">Hubungi Kami</h4>
        <div class="space-y-3 text-green-100">
            <div class="flex items-start">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 mt-0.5 text-green-300 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                <span class="font-medium">Email: <a href="mailto:melontrack@gmail.com" class="hover:text-white transition-colors duration-300">melontrack@gmail.com</a></span>
            </div>
            <div class="flex items-start">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 mt-0.5 text-green-300 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                </svg>
                <span class="font-medium">Telepon: <a href="tel:+6281234567890" class="hover:text-white transition-colors duration-300">+62 812 3456 7890</a></span>
            </div>
            <div class="flex items-start">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 mt-0.5 text-green-300 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                <span class="font-medium">Alamat: Jember, Jawa Timur, Indonesia</span>
            </div>
        </div>
    </div>
</footer>

<!-- Copyright -->
<div class="bg-green-900 text-green-300 text-center py-4 text-sm">
    <div class="container mx-auto px-6">
        <div class="flex flex-col md:flex-row justify-center items-center">
            <p>© 2025 <span class="text-white font-medium">Melontrack</span>. All rights reserved.</p>
        </div>
    </div>
</div>
