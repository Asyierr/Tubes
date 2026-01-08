<x-layouts.guest-full>
    <div class="min-h-screen flex items-center justify-center p-6
                bg-[radial-gradient(ellipse_at_top,_var(--tw-gradient-stops))]
                from-blue-900 via-slate-900 to-black">

        <div class="max-w-3xl w-full space-y-8">

            <div class="text-center">
                <h2 class="text-3xl font-bold text-white">Daftar di BoxBuddy 🚀</h2>
                <p class="text-slate-300 mt-2">
                    Pilih peranmu dan mulai pengalaman pengiriman yang mudah & aman.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <a href="{{ route('register.user') }}" class="bg-white/5 backdrop-blur-xl border border-white/10
                          rounded-2xl p-8 hover:scale-105 transition transform text-white">
                    <h3 class="text-xl font-semibold mb-2">🙋 User</h3>
                    <p class="text-slate-300">
                        Kirim barang, pindahan, dan kelola pesananmu dengan mudah.
                    </p>
                </a>

                <a href="{{ route('register.driver') }}" class="bg-white/5 backdrop-blur-xl border border-white/10
                          rounded-2xl p-8 hover:scale-105 transition transform text-white">
                    <h3 class="text-xl font-semibold mb-2">🚚 Driver</h3>
                    <p class="text-slate-300">
                        Ambil order, antar barang, dan dapatkan penghasilan.
                    </p>
                </a>

            </div>

        </div>

    </div>
</x-layouts.guest-full>