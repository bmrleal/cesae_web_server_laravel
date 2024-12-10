<h1>Name: {{ $customer->first_name }} {{ $customer->last_name }}</h1>

<p>Gender: {{ $customer->gender === 'M' ? 'Male' : 'Female' }}</p>

<p>Email: {{ $customer->email }}</p>

<p>Address: {{ $customer->address }}</p>

<p>Postal code: {{ $customer->postal_code }}</p>

<p>City: {{ $customer->city }}</p>

<p>Country: {{ $customer->country }}</p>

<p>Telephone: {{ $customer->telephone }}</p>

<p>Comments: {{ $customer->comments }}</p>

<p>Orders:</p>
<ul>
@foreach ($customer->orders as $order)
    <li><a href="{{ route('orders.show', $order->id) }}">{{ $order->id }}</a></li>
@endforeach
</ul>