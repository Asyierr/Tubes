<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            📦 Order Saya
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- Empty State --}}
            @if ($orders->isEmpty())
                <div class="bg-gray-800 rounded-2xl p-12 text-center shadow">
                    <h3 class="text-xl font-semibold text-white mb-2">
                        Belum Ada Order
                    </h3>
                    <p class="text-gray-400 mb-6">
                        Buat order pertama kamu dan biarkan BoxBuddy yang urus semuanya 🚚
                    </p>

                    <a href="{{ route('orders.create') }}"
                        class="inline-flex items-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-xl transition">
                        ➕ Buat Order
                    </a>
                </div>
            @endif

            {{-- Order Cards --}}
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
                @foreach ($orders as $order)
                    <div class="bg-gray-800 rounded-2xl p-6 shadow hover:shadow-xl transition border border-gray-700">

                        {{-- Header --}}
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-lg font-semibold text-white">
                                Order #{{ $order->id }}
                            </h3>

                            @if ($order->status === 'pending')
                                <span class="px-3 py-1 text-xs font-semibold rounded-full bg-yellow-500/20 text-yellow-400">
                                    Pending
                                </span>
                            @elseif ($order->status === 'in_progress')
                                <span class="px-3 py-1 text-xs font-semibold rounded-full bg-blue-500/20 text-blue-400">
                                    Diproses
                                </span>
                            @else
                                <span class="px-3 py-1 text-xs font-semibold rounded-full bg-green-500/20 text-green-400">
                                    Selesai
                                </span>
                            @endif
                        </div>

                        {{-- Content --}}
                        <div class="space-y-3 text-sm text-gray-300">
                            <div>
                                <p class="text-gray-400">Pickup</p>
                                <p class="text-white font-medium">
                                    {{ $order->pickup_address }}
                                </p>
                            </div>

                            <div>
                                <p class="text-gray-400">Tujuan</p>
                                <p class="text-white font-medium">
                                    {{ $order->destination_address }}
                                </p>
                            </div>

                            <div class="flex justify-between">
                                <div>
                                    <p class="text-gray-400">Barang</p>
                                    <p class="text-white font-medium">
                                        {{ ucfirst($order->item_type) }}
                                    </p>
                                </div>

                                <div class="text-right">
                                    <p class="text-gray-400">Berat</p>
                                    <p class="text-white font-medium">
                                        {{ $order->weight ?? '-' }} kg
                                    </p>
                                </div>
                            </div>
                        </div>

                        {{-- Actions --}}
                        <div class="mt-6 flex gap-3">
                            <a href="#"
                                class="flex-1 text-center px-4 py-2 rounded-lg bg-gray-700 hover:bg-gray-600 text-white transition">
                                Detail
                            </a>

                            @if ($order->status === 'pending')
                                <button
                                    class="flex-1 px-4 py-2 rounded-lg bg-red-600/20 hover:bg-red-600/30 text-red-400 transition">
                                    Batalkan
                                </button>
                            @endif
                        </div>

                    </div>
                @endforeach
            </div>

        </div>
    </div>
</x-app-layout>
