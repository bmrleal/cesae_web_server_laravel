 <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Order details') }}
        </h2>
    </x-slot>

    <div class="mx-auto w-full md:w-2/3 py-10">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <h1 class="text-3xl font-bold my-5">Order number: {{ $order->id }}</h1>

            <p class="text-xl my-5">Customer: <a href="{{ route('customers.show', $order->customer_id) }}">{{ $order->customer->first_name }} {{ $order->customer->last_name }}</a></p>

            <p class="text-xl my-5">Date / time: {{ $order->ordered_at }}</p>

            <p class="text-xl my-5">Item: {{ $order->item }}</p>

            <p class="text-xl my-5">Quantity: {{ $order->quantity }}</p>

            <p class="text-xl my-5">Amount: {{ $order->amount }} €</p>

            <p class="text-xl my-5">Status: {{ $order->status }}</p>


            <div class="flex items-center mt-10">
                <a href="{{ route('orders.edit', $order->id) }}" class="text-blue-700 hover:text-blue-500 text-xl font-bold py-2 px-4">Edit</a>

                <form id="delete-form" method="post" action="{{ route('orders.destroy', $order->id) }}">
                    @csrf
                    @method('DELETE')

                    <a href="#" onclick="document.getElementById('delete-form').submit()" class="text-blue-700 hover:text-blue-500 text-xl font-bold py-2 px-4">Delete</a>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>