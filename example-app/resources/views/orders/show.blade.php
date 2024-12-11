<h1>Order number: {{ $order->id }}</h1>

<p>Customer: <a href="{{ route('customers.show', $order->customer_id) }}">{{ $order->customer->first_name }} {{ $order->customer->last_name }}</a></p>

<p>Date / time: {{ $order->ordered_at }}</p>

<p>Item: {{ $order->item }}</p>

<p>Quantity: {{ $order->quantity }}</p>

<p>Amount: {{ $order->amount }} €</p>

<p>Status: {{ $order->status }}</p>


<a href="{{ route('orders.edit', $order->id) }}">Edit</a>

<form id="delete-form" method="post" action="{{ route('orders.destroy', $order->id) }}">
    @csrf
    @method('DELETE')

    <!-- <button type="submit">Delete</button> -->
    <a href="#" onclick="document.getElementById('delete-form').submit()">Delete</a>
</form>