<x-app-layout>
    <div class="max-w-xl mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6 text-white text-center">Choose a Driver</h1>

        <div class="space-y-4">
            @forelse ($drivers as $driver)
                <div class="bg-gray-800 p-6 rounded-xl shadow-lg border border-gray-700 flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                        <div
                            class="w-12 h-12 bg-gray-600 rounded-full flex items-center justify-center text-xl font-bold text-white">
                            {{ substr($driver->name, 0, 1) }}
                        </div>
                        <div>
                            <h2 class="text-lg font-semibold text-white">{{ $driver->name }}</h2>
                            <p class="text-gray-400 text-sm">Rating: 4.8/5.0</p>
                        </div>
                    </div>

                    <form method="POST" action="{{ route('orders.setDriver', ['order' => $order, 'driver' => $driver]) }}">
                        @csrf
                        <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg font-semibold transition duration-200">
                            Select
                        </button>
                    </form>
                </div>
            @empty
                <div class="text-center py-10">
                    <p class="text-gray-400">No available drivers found at the moment.</p>
                </div>
            @endforelse
        </div>
    </div>
</x-app-layout>