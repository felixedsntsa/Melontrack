@extends('master.public')
@section('title', 'Landing Page')
@section('content')

<div class="relative min-h-screen bg-cover bg-center" style="background-image: url('asset/plantmelon.jpg'); background-position: center 30%;">
    <!-- Gradient overlay -->
    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-black/40"></div>

    <div class="relative z-10 flex flex-col items-center justify-center min-h-screen text-white text-center px-4">
        <!-- Glass blur container -->
        <div class="backdrop-blur-md bg-white/10 p-8 rounded-2xl border border-white/20 shadow-2xl animate-fadeIn">
            <!-- Animated heading -->
            <h1 class="text-4xl md:text-5xl font-bold mb-4 animate-fadeInDown">
                Sistem Pemantauan dan Manajemen Budidaya Melon
            </h1>

            <!-- Logo/Title -->
            <div class="my-6 animate-fadeIn">
                <h2 class="text-5xl md:text-6xl font-extrabold tracking-tight">
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-green-300 to-green-500">Melon</span>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-300 to-yellow-500">Track</span>
                </h2>
                <div class="w-24 h-1.5 bg-gradient-to-r from-green-400 to-yellow-400 mx-auto mt-2 rounded-full"></div>
            </div>

            <!-- Brief tagline -->
            <p class="text-lg md:text-xl font-medium mb-8 animate-fadeInUp">
                Pantau dan optimalkan produksi melon Anda dengan solusi digital yang inovatif.
            </p>

            <!-- Primary CTA -->
            <div class="animate-fadeInUp">
                <a href="{{ url('/login') }}" class="inline-block px-8 py-3 bg-gradient-to-r from-green-500 to-green-600 rounded-lg font-semibold shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300">
                    Masuk ke Sistem
                </a>
            </div>
        </div>
    </div>
</div>

<style>
    .animate-fadeIn {
        animation: fadeIn 1s ease-out;
    }
    .animate-fadeInDown {
        animation: fadeInDown 1s ease-out;
    }
    .animate-fadeInUp {
        animation: fadeInUp 1s ease-out;
    }
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }
    @keyframes fadeInDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

@endsection
