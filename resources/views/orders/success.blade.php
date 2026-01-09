<x-app-layout>
    <div class="max-w-xl mx-auto p-6 flex flex-col items-center justify-center min-h-[60vh] text-center">

        <div
            class="w-20 h-20 bg-green-500 rounded-full flex items-center justify-center mb-6 shadow-lg shadow-green-500/50">
            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
            </svg>
        </div>

        <h1 class="text-4xl font-bold text-white mb-2">Shipment Confirmed!</h1>
        <p class="text-gray-400 text-lg mb-8">Your driver is on the way.</p>

        <div class="bg-gray-800 p-6 rounded-xl w-full border border-gray-700 mb-8">
            <h3 class="text-gray-400 text-sm uppercase tracking-wider mb-4">Shipment Details</h3>

            <div class="flex justify-between mb-2">
                <span class="text-gray-400">Driver</span>
                <span class="text-white font-semibold">{{ $order->driver->name ?? 'Assigned' }}</span>
            </div>

            <div class="flex justify-between mb-2">
                <span class="text-gray-400">Total Price</span>
                <span class="text-green-400 font-bold">Rp {{ number_format($order->price, 0, ',', '.') }}</span>
            </div>

            <div class="flex justify-between pt-4 border-t border-gray-700">
                <span class="text-gray-400">Payment Status</span>
                <span class="text-blue-400 font-semibold uppercase">{{ $order->payment_status }}
                    ({{ $order->payment_method }})</span>
            </div>
        </div>

        <a href="{{ route('dashboard') }}"
            class="bg-gray-700 hover:bg-gray-600 text-white px-8 py-3 rounded-lg font-semibold transition duration-200">
            Back to Dashboard
        </a>
    </div>
</x-app-layout>