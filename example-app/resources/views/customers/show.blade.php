<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Order details') }}
        </h2>
    </x-slot>

    <div class="mx-auto w-full md:w-2/3 py-10">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <h1 class="text-3xl font-bold my-5">Name: {{ $customer->first_name }} {{ $customer->last_name }}</h1>

            <p class="text-xl my-5">Gender: {{ $customer->gender === 'M' ? 'Male' : 'Female' }}</p>

            <p class="text-xl my-5">Email: {{ $customer->email }}</p>

            <p class="text-xl my-5">Address: {{ $customer->address }}</p>

            <p class="text-xl my-5">Postal code: {{ $customer->postal_code }}</p>

            <p class="text-xl my-5">City: {{ $customer->city }}</p>

            <p class="text-xl my-5">Country: {{ $customer->country }}</p>

            <p class="text-xl my-5">Telephone: {{ $customer->telephone }}</p>

            <p class="text-xl my-5">Comments: {{ $customer->comments }}</p>

            <p class="text-xl my-5">Orders:</p>
            <ul class="ml-20">
                @foreach ($customer->orders as $order)
                    <li><a href="{{ route('orders.show', $order->id) }}">{{ $order->id }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
</x-app-layout>