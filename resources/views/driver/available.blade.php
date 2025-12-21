<x-app-layout>
<div class="py-8 max-w-7xl mx-auto">
<h1 class="text-2xl font-bold text-white mb-6">Available Orders</h1>
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
<div class="bg-white rounded-xl p-6 shadow flex justify-between items-center">
<div>
<p class="font-semibold text-gray-800">{{ $order->pickup_address }}</p>
<p class="text-gray-500">→ {{ $order->destination_address }}</p>
</div>
<form method="POST" action="{{ route('driver.orders.take',$order) }}">
@csrf @method('PUT')
<button class="bg-blue-600 text-white px-5 py-2 rounded-lg">Take</button>
</form>
</div>
@endforeach
</div>
</div>
</x-app-layout>