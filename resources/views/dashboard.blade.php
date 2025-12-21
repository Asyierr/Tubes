<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <img src="{{ asset('images/boxbuddylogofix-removebg-preview.png') }}"
                 class="h-9"
                 alt="BoxBuddy">
            <h2 class="font-semibold text-xl text-gray-100 tracking-tight">
                Dashboard
            </h2>
        </div>
    </x-slot>

    <style>
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-up {
            animation: fadeUp 0.7s ease-out forwards;
        }
    </style>

    <div class="py-12 bg-gradient-to-br from-[#0f172a] via-[#020617] to-black min-h-screen">
        <div class="max-w-7xl mx-auto px-6 space-y-12">

            <!-- Welcome Section -->
            <section class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-slate-900 to-slate-800 p-10 shadow-xl animate-fade-up">
                <div class="absolute inset-0 bg-blue-500/10 blur-3xl"></div>
                <h1 class="relative text-3xl md:text-4xl font-bold text-white">
                    Selamat datang, {{ Auth::user()->name }}
                </h1>
                <p class="relative mt-3 text-gray-300 max-w-2xl">
                    Semua pengiriman dan pindahan barangmu sekarang bisa kamu kelola dengan rapi, aman, dan tanpa ribet.
                </p>
            </section>

            <!-- Stats Section -->
            <section class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                <div class="rounded-2xl bg-white/5 backdrop-blur border border-white/10 p-6 shadow-lg animate-fade-up" style="animation-delay:0.1s">
                    <p class="text-sm text-gray-400">Total Order</p>
                    <h2 class="mt-2 text-4xl font-bold text-white">{{ $totalOrders ?? 0 }}</h2>
                </div>
                <div class="rounded-2xl bg-white/5 backdrop-blur border border-white/10 p-6 shadow-lg animate-fade-up" style="animation-delay:0.2s">
                    <p class="text-sm text-gray-400">Order Aktif</p>
                    <h2 class="mt-2 text-4xl font-bold text-yellow-400">{{ $activeOrders ?? 0 }}</h2>
                </div>
                <div class="rounded-2xl bg-white/5 backdrop-blur border border-white/10 p-6 shadow-lg animate-fade-up" style="animation-delay:0.3s">
                    <p class="text-sm text-gray-400">Order Selesai</p>
                    <h2 class="mt-2 text-4xl font-bold text-green-400">{{ $completedOrders ?? 0 }}</h2>
                </div>
            </section>

            <!-- Actions -->
            <section class="rounded-3xl bg-slate-900/80 backdrop-blur border border-white/10 p-10 shadow-xl animate-fade-up" style="animation-delay:0.4s">
                <h3 class="text-2xl font-semibold text-white mb-6">Quick Actions</h3>
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('orders.create') }}"
                       class="flex items-center justify-center gap-2 px-8 py-4 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-semibold transition shadow-lg shadow-blue-600/30">
                        ➕ Buat Order Baru
                    </a>
                    <a href="{{ route('orders.index') }}"
                       class="flex items-center justify-center gap-2 px-8 py-4 rounded-xl bg-white/10 hover:bg-white/20 text-white font-semibold transition">
                        📦 Lihat Semua Order
                    </a>
                </div>
            </section>

            <!-- Footer Branding -->
            <footer class="pt-10 text-center text-gray-500 animate-fade-up" style="animation-delay:0.5s">
                <img src="{{ asset('images/boxbuddylogofix-removebg-preview.png') }}"
                     class="h-14 mx-auto mb-3 opacity-80"
                     alt="BoxBuddy">
                <p class="text-sm">© {{ date('Y') }} BoxBuddy. Built for students.</p>
            </footer>

        </div>
    </div>
</x-app-layout>