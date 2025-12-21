<x-app-layout>
<div class="py-8 max-w-7xl mx-auto">
<h1 class="text-3xl font-bold text-white mb-8">Driver Dashboard</h1>
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


<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
<div class="bg-blue-600 rounded-xl p-6 text-white">
<p class="opacity-80">Available Orders</p>
<h2 class="text-3xl font-bold">{{ $availableCount }}</h2>
</div>
<div class="bg-yellow-500 rounded-xl p-6 text-white">
<p class="opacity-80">In Progress</p>
<h2 class="text-3xl font-bold">{{ $activeCount }}</h2>
</div>
<div class="bg-green-600 rounded-xl p-6 text-white">
<p class="opacity-80">Completed</p>
<h2 class="text-3xl font-bold">{{ $completedCount }}</h2>
</div>
</div>
</div>
</x-app-layout>