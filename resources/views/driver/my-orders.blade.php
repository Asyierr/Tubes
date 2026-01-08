<x-app-layout>
    <div class="py-8 max-w-7xl mx-auto px-4">

        <h1 class="text-2xl font-bold text-white mb-6">🚚 My Orders</h1>

        <div class="flex gap-4 mb-8">
            <a href="{{ route('driver.dashboard') }}"
               class="px-4 py-2 rounded-lg bg-gray-700 text-white hover:bg-gray-600">
                Dashboard
            </a>

            <a href="{{ route('driver.orders.available') }}"
               class="px-4 py-2 rounded-lg bg-blue-600 text-white hover:bg-blue-500">
                Available Orders
            </a>

            <a href="{{ route('driver.orders.my') }}"
               class="px-4 py-2 rounded-lg bg-green-600 text-white">
                My Orders
            </a>
        </div>

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

                        <p class="text-sm mt-2">
                            Status:
                            @if($order->status === 'in_progress')
                                <span class="text-blue-600 font-semibold">Dalam Perjalanan</span>
                            @elseif($order->status === 'waiting_payment')
                                <span class="text-yellow-600 font-semibold">Menunggu Pembayaran</span>
                            @elseif($order->status === 'completed')
                                <span class="text-green-600 font-semibold">Order Selesai</span>
                            @else
                                <span class="text-gray-500">{{ $order->status }}</span>
                            @endif
                        </p>
                    </div>

                    {{-- AKSI DRIVER --}}
                    @if($order->status === 'in_progress')
                        <form method="POST"
                              action="{{ route('driver.orders.status', $order) }}">
                            @csrf
                            @method('PUT')

                            <input type="hidden" name="status" value="waiting_payment">

                            <button
                                class="bg-green-600 hover:bg-green-500 text-white px-6 py-2 rounded-lg font-semibold">
                                Selesaikan Order
                            </button>
                        </form>

                    @elseif($order->status === 'waiting_payment')
                        <span class="text-yellow-600 font-semibold text-sm">
                            Menunggu User Membayar
                        </span>

                    @elseif($order->status === 'completed')
                        <span class="text-green-600 font-semibold text-sm">
                            ✔ Order Telah Dibayar
                        </span>
                    @endif
                </div>
            @empty
                <div class="bg-white rounded-xl p-6 text-center text-gray-500">
                    Tidak ada order
                </div>
            @endforelse
        </div>

    </div>
</x-app-layout>
