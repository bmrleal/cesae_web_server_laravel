<h1>Edit order</h1>

<form method="post" action="{{ route('orders.update', $order->id) }}">
    @csrf
    @method('PATCH')

    <p><b>Id:</b> {{ $order->id }}</p>
    <p><b>Customer:</b> {{ $order->customer->first_name }} {{ $order->customer->last_name }}</p>
    <p><b>Item:</b> {{ $order->item }}</p>
    <p><b>Quantity:</b> {{ $order->quantity }}</p>
    <p><b>Amount:</b> {{ $order->amount }}</p>

    <label for="status">Status</label>
    <select name="status" id="status" required>
        <option value="unpaid" {{ $order->status == 'unpaid' ? 'selected' : '' }}>Unpaid</option>
        <option value="paid" {{ $order->status == 'paid' ? 'selected' : '' }}>Paid</option>
        <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Processing</option>
        <option value="delivering" {{ $order->status == 'delivering' ? 'selected' : '' }}>Delivering</option>
        <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Delivered</option>
    </select>
    <br>

    <button>Save</button>
</form>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif