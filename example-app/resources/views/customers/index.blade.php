<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Customers') }}
        </h2>
    </x-slot>

    <div class="mx-auto w-full md:w-2/3 py-10">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="my-5 w-full text-right ">
                <form method="get" action="">
                    <div class="mx-1 grid grid-cols-1 md:grid-cols-3">
                        <div class="mx-1">
                            <x-input-label for="first_name" class="inline">First name</x-input-label>
                            <x-text-input name="first_name" id="first_name" value="{{ Request::get('first_name') }}"></x-text-input>
                        </div>

                        <div class="mx-1">
                            <x-input-label for="last_name" class="inline">Last name</x-input-label>
                            <x-text-input name="last_name" id="last_name" value="{{ Request::get('last_name') }}"></x-text-input>
                        </div>

                        <div class="mx-1">
                            <x-input-label for="country" class="inline">Country</x-input-label>
                            <x-text-input name="country" id="country" value="{{ Request::get('country') }}"></x-text-input>
                        </div>
                    </div>
                    <button type="submit" class="text-blue-700 hover:text-blue-500 text-xl font-bold py-2 px-4">Search</button>
                </form>
            </div>

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
    
            <div class="container my-10">
                {{ $customers->links() }}
            </div>
        </div>
    </div>
</x-app-layout>