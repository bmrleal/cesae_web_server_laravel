<h1>Order number: {{ $order->id }}</h1>

<p>Customer: <a href="{{ route('customers.show', $order->customer_id) }}">{{ $order->customer->first_name }} {{ $order->customer->last_name }}</a></p>

<p>Date / time: {{ $order->ordered_at }}</p>

<p>Item: {{ $order->item }}</p>

<p>Quantity: {{ $order->quantity }}</p>

<p>Amount: {{ $order->amount }} €</p>

<p>Status: {{ $order->status }}</p>