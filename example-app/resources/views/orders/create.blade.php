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
                    <x-input-label for="customer">Customer</x-input-label>
                    <select name="customer" id="customer" required class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                        <option value=""></option>
                        @foreach ($customers as $customer)
                            <option value="{{ $customer->id }}">{{ $customer->first_name }} {{ $customer->last_name }}</option>
                        @endforeach    
                    </select>
                </div>

                <div class="my-5">
                    <x-input-label for="item">Item</x-input-label>
                    <x-text-input type="number" name="item" id="item"  min="1" value="{{ old('item') }}">Item</x-text-input>
                </div>

                <div class="my-5">
                    <x-input-label for="quantity">Quantity</x-input-label>
                    <x-text-input type="number" name="quantity" id="quantity" required min="1" value="{{ old('quantity') }}"></x-text-input>
                </div>

                <div class="my-5">
                    <x-input-label for="amount">Amount</x-input-label>
                    <x-text-input type="number" name="amount" id="amount" required min="0.01" step="0.01" value="{{ old('amount') }}"></x-text-input>
                </div>

                <div class="flex items-center justify-between">
                    <button class="text-blue-700 hover:text-blue-500 text-xl font-bold py-2 px-4">Save</button>
                </div>
            </form>

            @if ($errors->any())
                <div class="my-10">
                    <x-input-error :messages="$errors->all()"></x-input-error>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>