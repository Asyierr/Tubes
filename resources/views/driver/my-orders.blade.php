<x-app-layout>
    <div class="max-w-4xl mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6 text-white">My Deliveries</h1>

        <div class="space-y-6">
            @forelse ($orders as $order)
                <div class="bg-gray-800 p-6 rounded-xl shadow-lg border border-gray-700">
                    <!-- Header -->
                    <div class="flex justify-between items-start border-b border-gray-700/50 pb-4 mb-4">
                        <div>
                            <div class="flex items-center space-x-3 mb-1">
                                <h2 class="text-xl font-bold text-white">Order #{{ $order->id }}</h2>
                                @if($order->status === 'accepted')
                                    <span
                                        class="px-2 py-1 bg-blue-500/20 text-blue-400 text-xs rounded font-bold uppercase">Ready
                                        to Pickup</span>
                                @elseif($order->status === 'in_progress')
                                    <span
                                        class="px-2 py-1 bg-yellow-500/20 text-yellow-400 text-xs rounded font-bold uppercase">In
                                        Delivery</span>
                                @elseif($order->status === 'completed')
                                    <span
                                        class="px-2 py-1 bg-green-500/20 text-green-400 text-xs rounded font-bold uppercase">Completed</span>
                                @endif
                            </div>
                            <p class="text-gray-400 text-sm">{{ $order->created_at->diffForHumans() }}</p>
                        </div>
                        <div class="text-right">
                            <p class="text-xl font-bold text-green-400">Rp {{ number_format($order->price, 0, ',', '.') }}
                            </p>

                            @if($order->payment_status === 'paid')
                                <span class="text-xs bg-green-900 text-green-300 px-2 py-0.5 rounded uppercase font-bold">Paid:
                                    {{ $order->payment_method }}</span>
                            @else
                                <span
                                    class="text-xs bg-red-900 text-red-300 px-2 py-0.5 rounded uppercase font-bold">Unpaid</span>
                            @endif
                        </div>
                    </div>

                    <!-- Details -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div class="space-y-4">
                            <div>
                                <p class="text-gray-500 text-sm mb-1">Pickup Information</p>
                                <p class="text-gray-200">{{ $order->pickup_address }}</p>
                            </div>
                            <div>
                                <p class="text-gray-500 text-sm mb-1">Customer</p>
                                <p class="text-gray-200">{{ $order->customer->name ?? 'Unknown' }}</p>
                            </div>
                        </div>
                        <div class="space-y-4">
                            <div>
                                <p class="text-gray-500 text-sm mb-1">Destination Information</p>
                                <p class="text-gray-200">{{ $order->destination_address }}</p>
                            </div>
                            <div>
                                <p class="text-gray-500 text-sm mb-1">Package Details</p>
                                <p class="text-gray-200">{{ $order->item_type }} ({{ $order->weight }} kg)</p>
                            </div>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="flex justify-end space-x-3 pt-4 border-t border-gray-700/50">
                        @if($order->status === 'accepted')
                            <form method="POST" action="{{ route('driver.orders.status', $order) }}">
                                @csrf
                                @method('PUT')
                                <button type="submit"
                                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg font-bold transition">
                                    Start Pickup
                                </button>
                            </form>
                        @elseif($order->status === 'in_progress')
                            <form method="POST" action="{{ route('driver.orders.status', $order) }}">
                                @csrf
                                @method('PUT')
                                <button type="submit"
                                    class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-lg font-bold transition">
                                    Complete Delivery
                                </button>
                            </form>
                        @else
                            <button disabled
                                class="bg-gray-700 text-gray-500 px-6 py-2 rounded-lg font-bold cursor-not-allowed">
                                Archived
                            </button>
                        @endif
                    </div>
                </div>
            @empty
                <div class="text-center py-12 bg-gray-800 rounded-xl border border-gray-700">
                    <p class="text-gray-400 text-lg">No active deliveries found.</p>
                </div>
            @endforelse
        </div>
    </div>
</x-app-layout>