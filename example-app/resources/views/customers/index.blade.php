<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Customers') }}
        </h2>
    </x-slot>

    <div class="mx-auto w-full md:w-2/3 py-10">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <table class="w-full my-10 table-auto">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Country</th>
                        <th>Telephone</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customers as $customer)
                        <tr>
                            <td class="text-center"><a href="{{ route('customers.show', $customer->id) }}">{{ $customer->id }}</a></td>
                            <td class="text-center">{{ $customer->first_name }} {{ $customer->last_name }}</td>
                            <td class="text-center">{{ $customer->email }}</td>
                            <td class="text-center">{{ $customer->country }}</td>
                            <td class="text-center">{{ $customer->telephone }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>