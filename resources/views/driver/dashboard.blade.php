<x-app-layout>
    <div class="p-6 space-y-6">
        <div class="card-glass p-6">
            <h2 class="text-2xl font-bold">Driver Dashboard 👋</h2>
            <p class="text-slate-300">Welcome back, {{ Auth::user()->name }}</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Incoming Requests -->
            <a href="{{ route('driver.orders.requests') }}"
                class="bg-gray-800 rounded-xl p-6 text-white hover:bg-gray-700/50 transition cursor-pointer border border-gray-700">
                <p class="text-slate-400">Incoming Requests</p>
                <h2 class="text-3xl font-bold text-yellow-400">{{ $requestCount ?? 0 }}</h2>
                <p class="text-xs text-slate-500 mt-2">Tap to negotiate</p>
            </a>

            <!-- Available Jobs -->
            <a href="{{ route('driver.orders.available') }}"
                class="bg-gray-800 rounded-xl p-6 text-white hover:bg-gray-700/50 transition cursor-pointer border border-gray-700">
                <p class="text-slate-400">Available Jobs</p>
                <h2 class="text-3xl font-bold text-blue-400">{{ $availableCount ?? 0 }}</h2>
                <p class="text-xs text-slate-500 mt-2">Ready to take</p>
            </a>

            <!-- Active Jobs -->
            <div class="bg-gray-800 rounded-xl p-6 text-white border border-gray-700">
                <p class="text-slate-400">Active Deliveries</p>
                <h2 class="text-3xl font-bold text-green-400">{{ $activeCount ?? 0 }}</h2>
            </div>

            <div class="bg-gray-800 rounded-xl p-6 text-white border border-gray-700">
                <p class="text-slate-400">Completed</p>
                <h2 class="text-3xl font-bold">{{ $completedCount ?? 0 }}</h2>
            </div>
        </div>
    </div>
</x-app-layout>