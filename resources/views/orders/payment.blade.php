<x-app-layout>
    <div class="max-w-xl mx-auto p-6">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-white mb-2">Payment</h1>
            <p class="text-gray-400">Complete your payment to start the shipment</p>
        </div>

        <div class="bg-gray-800 p-8 rounded-xl shadow-lg border border-gray-700">

            <!-- Order Summary -->
            <div class="text-center mb-8 pb-8 border-b border-gray-700">
                <p class="text-gray-400 text-sm uppercase tracking-wider mb-2">Total Amount</p>
                <p class="text-4xl font-bold text-green-400">Rp {{ number_format($order->price, 0, ',', '.') }}</p>
            </div>

            <form method="POST" action="{{ route('orders.pay', $order) }}" id="payment-form">
                @csrf
                <p class="text-white font-semibold mb-4">Choose Payment Method</p>

                <!-- Payment Options -->
                <div class="space-y-4 mb-8">

                    <!-- QRIS -->
                    <label class="block relative cursor-pointer group">
                        <input type="radio" name="payment_method" value="qris" class="peer sr-only" checked>
                        <div
                            class="p-4 rounded-lg bg-gray-700 border-2 border-transparent peer-checked:border-blue-500 peer-checked:bg-gray-700/80 transition flex items-center justify-between">
                            <div class="flex items-center space-x-3">
                                <span class="text-2xl">📱</span>
                                <span class="font-semibold text-white">QRIS</span>
                            </div>
                            <div class="bg-white px-2 py-1 rounded">
                                <span class="text-xs font-bold text-gray-900">QR CODE</span>
                            </div>
                        </div>
                    </label>

                    <!-- Bank Transfer -->
                    <label class="block relative cursor-pointer group">
                        <input type="radio" name="payment_method" value="bank_transfer" class="peer sr-only">
                        <div
                            class="p-4 rounded-lg bg-gray-700 border-2 border-transparent peer-checked:border-blue-500 peer-checked:bg-gray-700/80 transition flex items-center justify-between">
                            <div class="flex items-center space-x-3">
                                <span class="text-2xl">🏦</span>
                                <span class="font-semibold text-white">Bank Transfer</span>
                            </div>
                            <span class="text-sm text-gray-400">BCA / Mandiri</span>
                        </div>
                    </label>

                    <!-- Direct / Cash -->
                    <label class="block relative cursor-pointer group">
                        <input type="radio" name="payment_method" value="direct" class="peer sr-only">
                        <div
                            class="p-4 rounded-lg bg-gray-700 border-2 border-transparent peer-checked:border-blue-500 peer-checked:bg-gray-700/80 transition flex items-center justify-between">
                            <div class="flex items-center space-x-3">
                                <span class="text-2xl">💵</span>
                                <span class="font-semibold text-white">Cash / Direct</span>
                            </div>
                            <span class="text-sm text-gray-400">Pay to Driver</span>
                        </div>
                    </label>

                </div>

                <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-lg font-bold text-lg transition duration-200">
                    Pay Now
                </button>
            </form>
        </div>
    </div>
</x-app-layout>