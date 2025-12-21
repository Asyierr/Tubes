<x-app-layout>
    <div class="max-w-xl mx-auto p-6 text-white">
        <h1 class="text-2xl font-bold mb-4">Buat Order BoxBuddy</h1>

        <form method="POST" action="{{ route('orders.store') }}" class="space-y-4">
            @csrf

            <input type="text" name="pickup_address"
                placeholder="Alamat Pickup"
                class="w-full p-2 rounded bg-gray-800"
                required>

            <input type="text" name="destination_address"
                placeholder="Alamat Tujuan"
                class="w-full p-2 rounded bg-gray-800"
                required>

            <input type="text" name="item_type"
                placeholder="Jenis Barang (contoh: lemari, kardus)"
                class="w-full p-2 rounded bg-gray-800"
                required>

            <input type="number" name="weight"
                placeholder="Berat Barang (kg, opsional)"
                class="w-full p-2 rounded bg-gray-800">

            <button
                class="w-full bg-blue-600 hover:bg-blue-700 py-2 rounded font-semibold">
                Simpan Order
            </button>
        </form>
    </div>
</x-app-layout>
