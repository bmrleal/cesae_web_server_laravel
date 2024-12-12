<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Orders') }}
        </h2>
    </x-slot>

    <div class="mx-auto w-full md:w-2/3 py-10">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <p><a href="{{ route('orders.create') }}" class="text-blue-700 hover:text-blue-500 text-xl font-bold py-2 px-4">New order</a></p>

            <table class="w-full my-10 table-auto">
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
                            <td class="text-center"><a href="{{ route('orders.show', $order->id) }}">{{ $order->id }}</a></td>
                            <td class="text-center">{{ $order->customer->first_name }} {{ $order->customer->last_name }}</td>
                            <td class="text-center">{{ $order->ordered_at }}</td>
                            <td class="text-center">{{ $order->amount }} €</td>
                            <td class="text-center">{{ $order->status }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>