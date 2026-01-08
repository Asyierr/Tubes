<x-app-layout>
    <div class="p-6 space-y-6">

        <div class="card-glass p-6">
            <h2 class="text-xl font-bold mb-4">📦 Semua Order</h2>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-slate-200">
                    <thead class="text-slate-400 border-b border-white/10">
                        <tr>
                            <th class="py-3">#</th>
                            <th>Asal</th>
                            <th>Tujuan</th>
                            <th>Status</th>
                            <th>Pembayaran</th>
                            <th>Harga Akhir</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($orders as $order)
                            <tr class="border-b border-white/10">
                                <td class="py-3">{{ $loop->iteration }}</td>
                                <td>{{ $order->pickup_address }}</td>
                                <td>{{ $order->destination_address }}</td>

                                <td>
                                    @if ($order->status === 'pending')
                                        <span class="text-yellow-400">Pending</span>
                                    @elseif ($order->status === 'in_progress')
                                        <span class="text-blue-400">Dalam Perjalanan</span>
                                    @elseif ($order->status === 'waiting_payment')
                                        <span class="text-orange-400">Menunggu Pembayaran</span>
                                    @elseif ($order->status === 'completed')
                                        <span class="text-green-400">Selesai</span>
                                    @else
                                        <span class="text-slate-400">{{ $order->status }}</span>
                                    @endif
                                </td>

                                <td>
                                    @if ($order->payment_status === 'paid')
                                        <span class="text-green-400">Paid</span>
                                    @else
                                        <span class="text-red-400">Unpaid</span>
                                    @endif
                                </td>

                                <td>
                                    @if ($order->final_price)
                                        Rp {{ number_format($order->final_price, 0, ',', '.') }}
                                    @else
                                        -
                                    @endif
                                </td>

                                <td>{{ $order->created_at->format('d M Y') }}</td>

                                <td>
                                    @if ($order->status === 'waiting_payment' && $order->payment_status === 'unpaid')
                                        <form action="{{ route('orders.pay', $order) }}" method="POST">
                                            @csrf
                                            <button
                                                class="px-3 py-1 bg-green-600 hover:bg-green-700 rounded text-sm font-semibold">
                                                Bayar
                                            </button>
                                        </form>
                                    @else
                                        <span class="text-slate-400 text-sm">-</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="py-6 text-center text-slate-400">
                                    Belum ada order
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>

    </div>
</x-app-layout>
