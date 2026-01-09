<x-app-layout>
    <div class="max-w-xl mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6 text-white text-center">Shipment Summary</h1>

        <div class="bg-gray-800 p-8 rounded-xl shadow-lg border border-gray-700 text-white space-y-6">

            <div class="border-b border-gray-700 pb-4">
                <p class="text-gray-400 text-sm">Pickup</p>
                <p class="text-lg font-semibold">{{ $order->pickup_address }}</p>
            </div>

            <div class="border-b border-gray-700 pb-4">
                <p class="text-gray-400 text-sm">Destination</p>
                <p class="text-lg font-semibold">{{ $order->destination_address }}</p>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <p class="text-gray-400 text-sm">Item Type</p>
                    <p class="text-lg font-semibold">{{ $order->item_type }}</p>
                </div>
                <div>
                    <p class="text-gray-400 text-sm">Weight</p>
                    <p class="text-lg font-semibold">{{ $order->weight }} kg</p>
                </div>
            </div>

            <div class="bg-gray-700 p-4 rounded-lg">
                <p class="text-gray-400 text-sm">Estimated Price</p>
                <p class="text-3xl font-bold text-green-400">Rp {{ number_format($order->price, 0, ',', '.') }}</p>
            </div>

            <a href="{{ route('orders.drivers', $order) }}"
                class="block w-full bg-blue-600 hover:bg-blue-700 text-center py-3 rounded-lg font-bold text-lg transition duration-200">
                Choose Driver
            </a>
        </div>
    </div>
</x-app-layout>