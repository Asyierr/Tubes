<x-app-layout>
    @php
        $hasActiveOrder = \App\Models\Order::where('driver_id', auth()->id())
            ->where('status', 'in_progress')
            ->exists();
    @endphp

    <div class="py-8 max-w-7xl mx-auto px-4">

        <h1 class="text-2xl font-bold text-white mb-6">🚗 Available Orders</h1>

        <!-- Navigation -->
        <div class="flex gap-4 mb-8">
            <a href="{{ route('driver.dashboard') }}"
               class="px-4 py-2 rounded-lg bg-gray-700 text-white hover:bg-gray-600">
                Dashboard
            </a>

            <a href="{{ route('driver.orders.available') }}"
               class="px-4 py-2 rounded-lg bg-blue-600 text-white">
                Available Orders
            </a>

            <a href="{{ route('driver.orders.my') }}"
               class="px-4 py-2 rounded-lg bg-green-600 text-white hover:bg-green-500">
                My Orders
            </a>
        </div>

        <!-- Alert -->
        @if(session('error'))
            <div class="mb-4 p-3 bg-red-600 text-white rounded-lg">
                {{ session('error') }}
            </div>
        @endif

        @if(session('success'))
            <div class="mb-4 p-3 bg-green-600 text-white rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <!-- Orders List -->
        <div class="space-y-4">
            @forelse($orders as $order)
                <div class="bg-white rounded-xl p-6 shadow flex justify-between items-center">
                    <div class="space-y-1">
                        <p class="font-semibold text-gray-800">
                            📍 {{ $order->pickup_address }}
                        </p>
                        <p class="text-gray-500">
                            ➜ {{ $order->destination_address }}
                        </p>

                        <p class="text-sm text-gray-400">
                            📦 {{ $order->item_type ?? '-' }}
                            | ⚖ {{ $order->weight ?? '-' }}
                        </p>
                    </div>

                    <form method="POST" action="{{ route('driver.orders.take', $order) }}">
                        @csrf
                        @method('PUT')
                        <button
                            class="px-6 py-2 rounded-lg font-semibold text-white
                            {{ $hasActiveOrder ? 'bg-gray-400 cursor-not-allowed' : 'bg-blue-600 hover:bg-blue-500' }}"
                            {{ $hasActiveOrder ? 'disabled' : '' }}>
                            Take Order
                        </button>
                    </form>
                </div>
            @empty
                <div class="bg-white rounded-xl p-6 text-center text-gray-500">
                    Tidak ada order tersedia saat ini 🚫
                </div>
            @endforelse
        </div>

    </div>
</x-app-layout>
