<x-app-layout>
    <div class="p-6 space-y-6">
        <div class="card-glass p-6">
            <h2 class="text-2xl font-bold">Selamat datang, {{ Auth::user()->name }} 👋</h2>
            <p class="text-slate-300">
                Semua pengiriman dan pindahan barangmu sekarang bisa kamu kelola dengan rapi, aman, dan tanpa ribet!
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="lg:col-span-2 card-glass p-6">
                <h4 class="text-lg font-semibold mb-4">📦 Pengiriman Aktif</h4>

                <div class="flex justify-between mb-2">
                    <span>Di.Di.tu Boarding House → Telkom University</span>
                    <span class="text-yellow-400 font-semibold">Dalam Perjalanan</span>
                </div>

                <div class="w-full bg-white/10 h-2 rounded-full overflow-hidden mb-3">
                    <div class="bg-blue-500 h-2 rounded-full" style="width: 60%"></div>
                </div>

                <div class="flex justify-between text-slate-300 text-sm">
                    <span>Driver: Andi (Mahasiswa)</span>
                    <span>ETA: 20 menit</span>
                </div>
            </div>

            <div class="space-y-4">
                <div class="stat-card">
                    <p class="text-slate-400">Total Order</p>
                    <h2 class="text-3xl font-bold">0</h2>
                </div>
                <div class="stat-card">
                    <p class="text-slate-400">Aktif</p>
                    <h2 class="text-3xl font-bold text-yellow-400">0</h2>
                </div>
                <div class="stat-card">
                    <p class="text-slate-400">Selesai</p>
                    <h2 class="text-3xl font-bold text-green-400">0</h2>
                </div>
            </div>
        </div>

        <div class="card-glass p-6">
            <h4 class="text-lg font-semibold mb-4">⚡ Quick Actions</h4>
            <div class="flex flex-wrap gap-4">
                <a href="{{ route('orders.create') }}" class="action-btn bg-blue-600 hover:bg-blue-700">
                    ➕ Buat Order Baru
                </a>
                <a href="{{ route('orders.index') }}" class="action-btn bg-white/10 hover:bg-white/20">
                    📦 Lihat Semua Order
                </a>
            </div>
        </div>

    </div>
</x-app-layout>