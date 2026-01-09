<x-app-layout>
    <div class="max-w-2xl mx-auto p-6 flex flex-col h-[calc(100vh-80px)]">

        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-white">Negotiation</h1>
            <div class="text-right">
                <p class="text-gray-400 text-sm">Current Price</p>
                <p class="text-2xl font-bold text-green-400">Rp {{ number_format($order->price, 0, ',', '.') }}</p>
            </div>
        </div>

        <!-- Chat Area -->
        <div class="flex-1 bg-gray-800 rounded-xl shadow-lg border border-gray-700 p-4 overflow-y-auto mb-4 space-y-4"
            id="chat-container">
            @foreach ($order->messages as $message)
                <div class="flex {{ $message->sender_id === auth()->id() ? 'justify-end' : 'justify-start' }}">
                    <div
                        class="max-w-[70%] {{ $message->sender_id === auth()->id() ? 'bg-blue-600 text-white' : 'bg-gray-700 text-gray-200' }} rounded-lg p-3">
                        @if ($message->type === 'proposal')
                            <p class="font-bold mb-1">Proposed Price: Rp
                                {{ number_format($message->proposed_price, 0, ',', '.') }}</p>
                        @endif
                        @if ($message->content)
                            <p>{{ $message->content }}</p>
                        @endif
                        <p class="text-xs opacity-70 mt-1 text-right">{{ $message->created_at->format('H:i') }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Negotiation Controls -->
        <div class="bg-gray-800 p-4 rounded-xl border border-gray-700">

            <!-- Quick Offer Buttons -->
            <div class="flex space-x-2 mb-4 overflow-x-auto pb-2">
                @foreach([1000, 2000, 5000] as $amount)
                    <form method="POST" action="{{ route('orders.messages.store', $order) }}" class="flex-shrink-0">
                        @csrf
                        <input type="hidden" name="type" value="proposal">
                        <input type="hidden" name="proposed_price" value="{{ $order->price + $amount }}">
                        <input type="hidden" name="content" value="I offer +{{ number_format($amount) }}">
                        <button type="submit"
                            class="bg-gray-700 hover:bg-gray-600 border border-gray-500 text-white px-4 py-2 rounded-full text-sm font-semibold transition">
                            +{{ number_format($amount) }}
                        </button>
                    </form>
                @endforeach

                <!-- Confirm Button (Only for Customer) -->
                @if(auth()->user()->role !== 'driver')
                    <form method="POST" action="{{ route('orders.confirm', $order) }}" class="ml-auto">
                        @csrf
                        <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-full text-sm font-bold transition shadow-lg shadow-green-900/50">
                            Confirm Shipment
                        </button>
                    </form>
                @else
                    <div class="ml-auto flex items-center space-x-2">
                        <span class="text-gray-400 text-sm italic">Waiting for customer confirmation...</span>
                    </div>
                @endif
            </div>

            <!-- Message Input -->
            <form method="POST" action="{{ route('orders.messages.store', $order) }}" class="flex space-x-2">
                @csrf
                <input type="hidden" name="type" value="text">
                <input type="text" name="content" placeholder="Type a message to negotiate..."
                    class="flex-1 bg-gray-900 text-white border border-gray-600 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 outline-none"
                    required>
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-semibold">
                    Send
                </button>
            </form>
        </div>
    </div>

    <script>
        // Scroll to bottom on load
        const chatContainer = document.getElementById('chat-container');
        chatContainer.scrollTop = chatContainer.scrollHeight;
    </script>
</x-app-layout>