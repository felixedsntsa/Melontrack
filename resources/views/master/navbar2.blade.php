{{-- Navbar --}}
{{-- <nav class="bg-[#539442]/60 py-4 shadow-lg border-b">
    <div class="container mx-auto px-4 flex items-center justify-between">
        <!-- Logo -->
        <div class="flex items-center">
            <img src="/asset/melonrepo.svg" alt="" class="w-9 mr-3">
            <h1 class="text-3xl font-bold text-green-900"><a href="{{ url('/cabang/dashboard') }}">LahanTani</a></h1>
        </div>

        <!-- Navigation Links -->
        <div class="hidden md:flex space-x-8 items-center">
        <a href="{{ route('cabang.laporan') }}" class="text-black hover:text-green-900 font-medium">Pemantauan</a>
        <a href="{{ route('cabang.jadwal.index') }}" class="text-black hover:text-green-900 font-medium">Jadwal Kunjungan</a>
        <a href="{{ route('cabang.hasilpanen') }}" class="text-black hover:text-green-900 font-medium">Hasil Panen</a>

        <!-- Profil Dropdown -->
        <div x-data="{ open: false }" class="relative">
            <button @click="open = !open" class="w-8 h-8 rounded-full flex items-center justify-center focus:outline-none">
                <img src="/asset/profilerepo.svg" alt="Profile" />
            </button>

        <!-- Dropdown -->
        <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 bg-white shadow-lg rounded-md z-50 py-2 text-sm">
            <a href="{{ route('cabang.profil') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Data Akun</a>
            <form method="POST" action="{{ route('logout.cabang') }}">
                @csrf
                <button type="submit" class="w-full text-left px-4 py-2 text-red-600 hover:bg-red-100">Logout</button>
            </form>
        </div>
    </div>
    </div>
    </div>
</nav> --}}

{{-- Navbar Cabang --}}
<nav class="bg-white shadow-md border-b border-gray-100 py-3 sticky top-0 z-50">
    <div class="mx-auto px-3 sm:px-6 ml-5 mr-5">
        <div class="flex justify-between h-16">
            <!-- Logo & Main Navigation -->
            <div class="flex items-center">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <img src="/asset/melonfavicon.png" alt="Melontrack Logo" class="h-10 w-auto">
                    <span class="ml-3 text-2xl font-bold text-green-700 hidden sm:block"><a href="{{ url('/cabang/dashboard') }}">Melon<span class="text-green-600">track</span></a></span>
                </div>

                <!-- Desktop Navigation -->
                <div class="hidden md:ml-10 md:flex md:space-x-8">
                    <a href="{{ route('cabang.laporan') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium text-gray-500 hover:text-green-700 hover:border-green-500 transition duration-150 ease-in-out">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2h-1V9z" clip-rule="evenodd" />
                        </svg>
                        Pemantauan
                    </a>

                    <a href="{{ route('cabang.hasilpanen') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium text-gray-500 hover:text-green-700 hover:border-green-500 transition duration-150 ease-in-out">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        Hasil Panen
                    </a>
                </div>
            </div>

            <!-- Right Side (Profile & Mobile Menu) -->
            <div class="flex items-center">
                <!-- Profile dropdown -->
                <div x-data="{ open: false }" class="ml-4 relative flex-shrink-0">
                    <div class="bg-gradient-to-r from-green-600 to-green-700 rounded-full px-3 py-2 hover:from-green-800 hover:to-green-900 transition duration-150 ease-in-out">
                        <button @click="open = !open" class="flex items-center text-sm rounded-full focus:outline-none" id="user-menu" aria-expanded="false" aria-haspopup="true">
                            <span class="sr-only">Open user menu</span>
                            <img class="h-7 w-7 rounded-full filter brightness-0 invert" src="/asset/profilerepo.svg" alt="Profile">
                            <span class="ml-2 text-white font-semibold hidden md:inline">Halo, {{ auth('cabang')->user()->nama }}</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="ml-1 h-4 w-4 text-white hidden md:inline" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>

                    <!-- Dropdown menu -->
                    <div x-show="open" @click.away="open = false" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-50">
                        <a href="{{ route('cabang.profil') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            <svg xmlns="http://www.w3.org/2000/svg" class="inline h-4 w-4 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                            </svg>
                            Data Akun
                        </a>
                        <form method="POST" action="{{ route('logout.cabang') }}">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50">
                                <svg xmlns="http://www.w3.org/2000/svg" class="inline h-4 w-4 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd" />
                                </svg>
                                Keluar
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Mobile menu button -->
                <div class="-mr-2 flex items-center md:hidden">
                    <button @click="mobileMenuOpen = !mobileMenuOpen" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-green-500">
                        <span class="sr-only">Open main menu</span>
                        <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile menu -->
    <div x-show="mobileMenuOpen" @click.away="mobileMenuOpen = false" class="md:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <a href="{{ route('cabang.laporan') }}" class="block pl-3 pr-4 py-2 border-l-4 border-green-500 text-base font-medium text-green-700 bg-green-50">Pemantauan</a>
            <a href="{{ route('cabang.hasilpanen') }}" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300">Hasil Panen</a>
        </div>
        <div class="pt-4 pb-3 border-t border-gray-200">
            <div class="flex items-center px-4">
                <div class="flex-shrink-0">
                    <img class="h-10 w-10 rounded-full" src="/asset/profilerepo.svg" alt="Profile">
                </div>
                <div class="ml-3">
                    <div class="text-base font-medium text-gray-800">{{ auth('cabang')->user()->nama }}</div>
                    <div class="text-sm font-medium text-gray-500">{{ auth('cabang')->user()->email }}</div>
                </div>
            </div>
            <div class="mt-3 space-y-1">
                <a href="{{ route('cabang.profil') }}" class="block px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100">Data Akun</a>
                <form method="POST" action="{{ route('logout.cabang') }}">
                    @csrf
                    <button type="submit" class="block w-full text-left px-4 py-2 text-base font-medium text-red-600 hover:text-red-800 hover:bg-red-100">Keluar</button>
                </form>
            </div>
        </div>
    </div>
</nav>

<script>
    // Inisialisasi Alpine.js untuk mobile menu
    document.addEventListener('alpine:init', () => {
        Alpine.data('navbar', () => ({
            mobileMenuOpen: false
        }))
    })
</script>
