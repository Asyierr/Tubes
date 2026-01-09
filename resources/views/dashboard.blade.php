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
                <h4 class="text-lg font-semibold mb-4">📦 Active Shipment</h4>

                @if(isset($activeOrder) && $activeOrder)
                    <div class="flex justify-between mb-2">
                        <span class="text-sm truncate max-w-[50%]">{{ $activeOrder->pickup_address }} →
                            {{ $activeOrder->destination_address }}</span>
                        @if($activeOrder->status === 'accepted')
                            <span class="text-blue-400 font-semibold text-sm">Driver Assigned</span>
                        @elseif($activeOrder->status === 'in_progress')
                            <span class="text-yellow-400 font-semibold text-sm">In Transit</span>
                        @endif
                    </div>

                    <div class="w-full bg-white/10 h-2 rounded-full overflow-hidden mb-3">
                        <div class="bg-blue-500 h-2 rounded-full transition-all duration-500"
                            style="width: {{ $activeOrder->status === 'in_progress' ? '75%' : '30%' }}"></div>
                    </div>

                    <div class="flex justify-between text-slate-300 text-sm">
                        <span>Driver: {{ $activeOrder->driver->name ?? 'Assigned' }}</span>
                        <span>{{ $activeOrder->status === 'in_progress' ? 'Arriving soon' : 'Waiting for pickup' }}</span>
                    </div>
                @else
                    <div class="text-center py-6 text-slate-500">
                        <p>No active shipments to track.</p>
                        <a href="{{ route('orders.create') }}"
                            class="text-blue-400 hover:text-blue-300 text-sm mt-2 inline-block">Start a new shipment</a>
                    </div>
                @endif
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
                    ➕ Start Shipment
                </a>
                <a href="{{ route('orders.index') }}" class="action-btn bg-white/10 hover:bg-white/20">
                    📦 Lihat Semua Order
                </a>
            </div>
        </div>

    </div>
</x-app-layout>