<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Order;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('orders.index', ['orders' => Order::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Lista de customers (apenas precisamos de id, first_name e last_name) para popular as opções do select no formulário.
        $customers = Customer::select('id', 'first_name', 'last_name')->get();

        return view('orders.create', ['customers' => $customers]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer' => 'required|integer',
            'item' => 'required|min:1|integer',
            'quantity' => 'required|integer|min:1',
            'amount' => 'required|decimal:0,2|min:0.01'
        ]);

        $order = new Order;

        $order->customer_id = $request->customer;
        $order->item = $request->item;
        $order->quantity = $request->quantity;
        $order->amount = $request->amount;
        $order->ordered_at = now();
        $order->status = "unpaid";
        
        $order->save();

        return redirect()->route('orders.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        return view('orders.show', ['order' => Order::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        return view('orders.edit', ['order' => Order::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        // dd($request);

        $request->validate([
            'status' => ['required', Rule::in(['unpaid', 'paid', 'processing', 'delivering', 'delivered'])],
        ]);

        $order = Order::find($id);

        $order->status = $request->status;
        
        $order->save();

        return redirect()->route('orders.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        Order::destroy($id);

        return redirect()->route('orders.index');
    }
}