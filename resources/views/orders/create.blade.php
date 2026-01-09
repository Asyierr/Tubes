<x-app-layout>
    <div class="max-w-xl mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6 text-white text-center">Start Shipment</h1>

        <div class="bg-gray-800 p-8 rounded-xl shadow-lg border border-gray-700">
            <form method="POST" action="{{ route('orders.store') }}" class="space-y-6">
                @csrf

                <div>
                    <label class="block text-gray-400 mb-2">Pickup Address</label>
                    <input type="text" name="pickup_address" placeholder="Enter pickup address"
                        class="w-full p-3 rounded-lg bg-gray-700 text-white border border-gray-600 focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                        required>
                </div>

                <div>
                    <label class="block text-gray-400 mb-2">Destination Address</label>
                    <input type="text" name="destination_address" placeholder="Enter destination address"
                        class="w-full p-3 rounded-lg bg-gray-700 text-white border border-gray-600 focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                        required>
                </div>

                <div>
                    <label class="block text-gray-400 mb-2">Item Type</label>
                    <input type="text" name="item_type" placeholder="E.g. Electronics, Furniture"
                        class="w-full p-3 rounded-lg bg-gray-700 text-white border border-gray-600 focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                        required>
                </div>

                <div>
                    <label class="block text-gray-400 mb-2">Weight (kg)</label>
                    <input type="number" name="weight" min="1" step="1" placeholder="0"
                        class="w-full p-3 rounded-lg bg-gray-700 text-white border border-gray-600 focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                </div>

                <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-lg font-bold text-lg transition duration-200">
                    Estimate Price
                </button>
            </form>
        </div>
    </div>
</x-app-layout>