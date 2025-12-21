<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold">Manage Orders</h2>
    </x-slot>

    <div class="py-8 max-w-7xl mx-auto">

        <div class="bg-white rounded-xl shadow overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="p-4">User</th>
                        <th>Pickup</th>
                        <th>Destination</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($orders as $order)
                        <tr class="border-t">
                            <td class="p-4">{{ $order->user->name }}</td>
                            <td>{{ $order->pickup_address }}</td>
                            <td>{{ $order->destination_address }}</td>
                            <td>
                                <span class="px-3 py-1 rounded-full text-sm
                                    @if($order->status=='pending') bg-yellow-100 text-yellow-700
                                    @elseif($order->status=='in_progress') bg-blue-100 text-blue-700
                                    @else bg-green-100 text-green-700
                                    @endif">
                                    {{ ucfirst(str_replace('_',' ',$order->status)) }}
                                </span>
                            </td>

                            <td>
                                <form method="POST"
                                      action="{{ route('admin.orders.updateStatus', $order) }}">
                                    @csrf
                                    @method('PATCH')

                                    <select name="status"
                                            onchange="this.form.submit()"
                                            class="border rounded px-2 py-1">
                                        <option value="pending" @selected($order->status=='pending')>Pending</option>
                                        <option value="in_progress" @selected($order->status=='in_progress')>In Progress</option>
                                        <option value="completed" @selected($order->status=='completed')>Completed</option>
                                    </select>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>

    </div>
</x-app-layout>
