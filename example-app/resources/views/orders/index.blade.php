<h1>Orders</h1>

<p><a href="{{ route('orders.create') }}">New order</a></p>

<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Customer</th>
            <th>Date / time</th>
            <th>Amount</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orders as $order)
            <tr>
                <td><a href="{{ route('orders.show', $order->id) }}">{{ $order->id }}</a></td>
                <td>{{ $order->customer->first_name }} {{ $order->customer->last_name }}</td>
                <td>{{ $order->ordered_at }}</td>
                <td>{{ $order->amount }}</td>
                <td>{{ $order->status }}</td>
            </tr>
        @endforeach
    </tbody>
</table>