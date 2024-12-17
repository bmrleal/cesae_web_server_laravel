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
    public function index(Request $request)
    {
        // Versão alternativa para obtenção da lista de orders.
        // if ($request->filled('status')) {
        //     $status = $request->input('status');

        //     return view('orders.index', ['orders' => Order::where('status', $status)->paginate(20)->withQueryString()]);
        // }
        // else {
        //     return view('orders.index', ['orders' => Order::paginate(20)]);
        // }

        // Obtenção do valor do critério de pesquisa por "status".
        $status = $request->input('status');

        /*
        Obtenção da lista de orders, usando cláusula condicional para adicionar "where clause" caso o critério de pesquisa por "status" esteja preenchido.
        No final, paginam-se os resultados (20 a 20) e indica-se que a "query string" (nomeadamente com os critérios de pesquisa) deve ser mantida durante a paginação.
        */
        $orders = Order::when($status, function ($query, $status) {
                return $query->where('status', $status);
            })
            ->paginate()
            ->withQueryString();

        // Retorno na view "orders.index", injectando a lista de orders como parâmetro.
        return view('orders.index', ['orders' => $orders]);
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
        // Regras de validação para os campos do formulário.
        $request->validate([
            'customer' => 'required|integer',
            'item' => 'required|min:1|integer',
            'quantity' => 'required|integer|min:1',
            'amount' => 'required|decimal:0,2|min:0.01'
        ]);

        // Criação de novo objecto Order e atribuição de valores às suas propriedades com base no que vem do formulário.
        $order = new Order;

        $order->customer_id = $request->customer;
        $order->item = $request->item;
        $order->quantity = $request->quantity;
        $order->amount = $request->amount;
        $order->ordered_at = now();
        $order->status = "unpaid";
        
        // Gravação da nova order na base de dados.
        $order->save();

        // Após gravação, redirecciona-se para a view "orders.index".
        return redirect()->route('orders.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        // Obtenção (a partir da bd) da order com id = $id e retorno da view "orders.show" com a order como parâmetro da mesma.
        return view('orders.show', ['order' => Order::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        // Obtenção (a partir da bd) da order com id = $id e retorno da view "orders.edit" com a order como parâmetro da mesma.
        return view('orders.edit', ['order' => Order::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        // dd($request);

        // Regras de validação para os campos do formulário.
        $request->validate([
            'status' => ['required', Rule::in(['unpaid', 'paid', 'processing', 'delivering', 'delivered'])],
        ]);

        // Obtenção (a partir da base de dados da order com id = $id).
        $order = Order::find($id);

        // Actualização da coluna "status".
        $order->status = $request->status;
        
        // Gravação da order na base de dados, já com o "status" alterado.
        $order->save();

        // Após gravação, redirecciona-se para a view "orders.index".
        return redirect()->route('orders.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        // Eliminação da order, directamente a partir do seu id.
        Order::destroy($id);

        // Após eliminação, redirecciona-se para a view "orders.index".
        return redirect()->route('orders.index');
    }
}