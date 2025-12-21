<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-white">
            Admin Dashboard
        </h2>
    </x-slot>

    {{-- ROOT WRAPPER --}}
    <div class="py-10 bg-slate-900 min-h-screen text-gray-100">

        {{-- STATS --}}
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-10">
                @php
                    $cards = [
                        ['Total Orders', $totalOrders, 'from-blue-500 to-blue-700'],
                        ['Pending', $pending, 'from-yellow-400 to-yellow-600'],
                        ['In Progress', $inProgress, 'from-purple-500 to-purple-700'],
                        ['Completed', $completed, 'from-green-500 to-green-700'],
                    ];
                @endphp

                @foreach ($cards as $card)
                    <div class="rounded-2xl p-6 bg-gradient-to-br {{ $card[2] }}
                                shadow-xl transform transition hover:-translate-y-1 hover:shadow-2xl
                                animate-fade-up">
                        <p class="text-sm text-white/80">
                            {{ $card[0] }}
                        </p>
                        <h3 class="text-4xl font-extrabold text-white mt-2">
                            {{ $card[1] }}
                        </h3>
                    </div>
                @endforeach
            </div>

            {{-- ORDERS --}}
            <div class="bg-slate-800 rounded-2xl shadow-xl p-6 animate-fade-up">
                <div class="mb-6">
                    <h3 class="text-xl font-bold text-white">
                        Manage Orders
                    </h3>
                    <p class="text-sm text-gray-400">
                        Kelola status order mahasiswa secara real-time
                    </p>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="border-b border-slate-700 text-gray-300">
                                <th class="py-3 text-left">User</th>
                                <th class="py-3 text-left">Pickup</th>
                                <th class="py-3 text-left">Destination</th>
                                <th class="py-3 text-left">Status</th>
                                <th class="py-3 text-left">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($orders as $order)
                                <tr class="border-b border-slate-700 hover:bg-slate-700/50 transition">
                                    <td class="py-3 font-medium text-white">
                                        {{ $order->user->name ?? '-' }}
                                    </td>
                                    <td class="py-3 text-gray-300">
                                        {{ $order->pickup_address }}
                                    </td>
                                    <td class="py-3 text-gray-300">
                                        {{ $order->destination_address }}
                                    </td>
                                    <td class="py-3">
                                        <span class="px-3 py-1 rounded-full text-xs font-semibold
                                            @if($order->status === 'pending') bg-yellow-500/20 text-yellow-400
                                            @elseif($order->status === 'in_progress') bg-purple-500/20 text-purple-400
                                            @else bg-green-500/20 text-green-400
                                            @endif">
                                            {{ ucfirst($order->status) }}
                                        </span>
                                    </td>
                                    <td class="py-3 flex gap-3">
                                        <form method="POST" action="{{ route('admin.orders.update', $order->id) }}">
                                            @csrf
                                            @method('PUT')
                                            <select name="status"
                                                onchange="this.form.submit()"
                                                class="bg-slate-700 text-white text-xs rounded-md border border-slate-600">
                                                <option value="pending">Pending</option>
                                                <option value="in_progress">In Progress</option>
                                                <option value="completed">Completed</option>
                                            </select>
                                        </form>

                                        <form method="POST" action="{{ route('admin.orders.destroy', $order->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="text-red-400 hover:text-red-300 text-xs">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-10 text-gray-400">
                                        No orders found
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
