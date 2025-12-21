<x-app-layout>
<div class="py-8 max-w-7xl mx-auto">
<h1 class="text-2xl font-bold text-white mb-6">My Orders</h1>

<div class="flex gap-4 mb-8">
    <a href="{{ route('driver.dashboard') }}"
       class="px-4 py-2 rounded-lg bg-gray-700 text-white hover:bg-gray-600">
        Dashboard
    </a>

    <a href="{{ route('driver.orders.available') }}"
       class="px-4 py-2 rounded-lg bg-blue-600 text-white hover:bg-blue-500">
        Available Orders
    </a>

    <a href="{{ route('driver.orders.my') }}"
       class="px-4 py-2 rounded-lg bg-green-600 text-white hover:bg-green-500">
        My Orders
    </a>
</div>


<div class="space-y-4">
@foreach($orders as $order)
<div class="bg-white rounded-xl p-6 shadow">
<p class="font-semibold text-gray-800">{{ $order->pickup_address }}</p>
<p class="text-gray-500 mb-4">→ {{ $order->destination_address }}</p>


<form method="POST" action="{{ route('driver.orders.status',$order) }}">
@csrf @method('PUT')
<select name="status" onchange="this.form.submit()"
class="border rounded px-3 py-2">
<option value="in_progress">In Progress</option>
<option value="completed">Completed</option>
</select>
</form>
</div>
@endforeach
</div>
</div>
</x-app-layout>