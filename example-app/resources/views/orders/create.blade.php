<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('New order') }}
        </h2>
    </x-slot>

    <div class="mx-auto w-full md:w-2/3 py-10">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <form method="post" action="{{ route('orders.store') }}">
                @csrf

                <div class="my-5">
                    <label for="customer" class="block text-gray-700 text-xl font-bold mb-2">Customer</label>
                    <select name="customer" id="customer" required>
                        <option value=""></option>
                        @foreach ($customers as $customer)
                            <option value="{{ $customer->id }}">{{ $customer->first_name }} {{ $customer->last_name }}</option>
                        @endforeach    
                    </select>
                </div>

                <div class="my-5">
                    <label for="item" class="block text-gray-700 text-xl font-bold mb-2">Item</label>
                    <input type="number" name="item" id="item" required min="1" value="{{ old('item') }}">
                </div>

                <div class="my-5">
                    <label for="quantity" class="block text-gray-700 text-xl font-bold mb-2">Quantity</label>
                    <input type="number" name="quantity" id="quantity" required min="1" value="{{ old('quantity') }}">
                </div>

                <div class="my-5">
                    <label for="amount" class="block text-gray-700 text-xl font-bold mb-2">Amount</label>
                    <input type="number" name="amount" id="amount" required min="0.01" step="0.01" value="{{ old('amount') }}">
                </div>

                <div class="flex items-center justify-between">
                    <button class="text-blue-700 hover:text-blue-500 text-xl font-bold py-2 px-4">Save</button>
                </div>
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