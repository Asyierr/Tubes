<x-app-layout>
    <div class="max-w-2xl mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6 text-white">Incoming Shipments</h1>

        <div class="space-y-4">
            @forelse ($orders as $order)
                <div class="bg-gray-800 p-6 rounded-xl shadow-lg border border-gray-700">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <p class="text-sm text-gray-400">Order #{{ $order->id }}</p>
                            <h2 class="text-xl font-bold text-white mb-1">{{ $order->item_type }}</h2>
                            <p class="text-green-400 font-bold">Rp {{ number_format($order->price, 0, ',', '.') }}</p>
                        </div>
                        <span class="px-3 py-1 bg-yellow-500/20 text-yellow-500 rounded-full text-xs font-bold uppercase">
                            Negotiating
                        </span>
                    </div>

                    <div class="space-y-2 mb-6">
                        <div class="flex items-start space-x-2">
                            <span class="text-gray-500 text-sm w-20">Pickup</span>
                            <span class="text-gray-300">{{ $order->pickup_address }}</span>
                        </div>
                        <div class="flex items-start space-x-2">
                            <span class="text-gray-500 text-sm w-20">Dropoff</span>
                            <span class="text-gray-300">{{ $order->destination_address }}</span>
                        </div>
                    </div>

                    <a href="{{ route('driver.orders.negotiate', $order) }}"
                        class="block w-full bg-blue-600 hover:bg-blue-700 text-center py-2 rounded-lg text-white font-semibold transition">
                        Open Chat & Negotiate
                    </a>
                </div>
            @empty
                <div class="text-center py-10 bg-gray-800 rounded-xl border border-gray-700">
                    <p class="text-gray-400">No incoming shipment requests.</p>
                </div>
            @endforelse
        </div>
    </div>
</x-app-layout>