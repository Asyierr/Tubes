@if($order->status === 'waiting_payment' && $order->payment_status === 'unpaid')
<form method="POST" action="{{ route('orders.pay', $order) }}">
    @csrf
    <button class="bg-blue-600 text-white px-6 py-2 rounded-lg">
        Bayar Sekarang
    </button>
</form>
@endif
