<h1>New order</h1>

<form method="post" action="{{ route('orders.store') }}">
    @csrf

    <label for="customer">Customer</label>
    <select name="customer" id="customer" required>
        <option value=""></option>
        @foreach ($customers as $customer)
            <option value="{{ $customer->id }}">{{ $customer->first_name }} {{ $customer->last_name }}</option>
        @endforeach    
    </select>
    <br>

    <!-- <label for="customer_id">Customer Id</label>
    <input type="number" name="customer_id" id="customer_id" value="{{ old('customer_id') }}">
    <br> -->

    <label for="item">Item</label>
    <input type="number" name="item" id="item" required min="1" value="{{ old('item') }}">
    <br>

    <label for="quantity">Quantity</label>
    <input type="number" name="quantity" id="quantity" required min="1" value="{{ old('quantity') }}">
    <br>

    <label for="amount">Amount</label>
    <input type="number" name="amount" id="amount" required min="0.01" step="0.01" value="{{ old('amount') }}">
    <br>

    <button>Save</button>
</form>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif