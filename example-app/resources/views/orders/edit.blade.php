<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit order') }}
        </h2>
    </x-slot>

    <div class="mx-auto w-full md:w-2/3 py-10">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <form method="post" action="{{ route('orders.update', $order->id) }}">
                @csrf
                @method('PATCH')

                <h1 class="text-3xl font-bold my-5">Order number: {{ $order->id }}</h1>

                <p class="text-xl my-5"><b>Customer:</b> {{ $order->customer->first_name }} {{ $order->customer->last_name }}</p>
                
                <p class="text-xl my-5"><b>Item:</b> {{ $order->item }}</p>
                
                <p class="text-xl my-5"><b>Quantity:</b> {{ $order->quantity }}</p>
                
                <p class="text-xl my-5"><b>Amount:</b> {{ $order->amount }}</p>

                <div class="my-5">
                    <label for="status" class="block text-gray-700 text-xl font-bold mb-2">Status</label>
                    <select name="status" id="status" required>
                        <option value="unpaid" {{ $order->status == 'unpaid' ? 'selected' : '' }}>Unpaid</option>
                        <option value="paid" {{ $order->status == 'paid' ? 'selected' : '' }}>Paid</option>
                        <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Processing</option>
                        <option value="delivering" {{ $order->status == 'delivering' ? 'selected' : '' }}>Delivering</option>
                        <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Delivered</option>
                    </select>
                </div>

                <button class="text-blue-700 hover:text-blue-500 text-xl font-bold py-2 px-4">Save</button>
            </form>

            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
</x-app-layout>