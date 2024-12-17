<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $first_name = $request->input('first_name');
        $last_name = $request->input('last_name');
        $country = $request->input('country');

        $customers = Customer::when($first_name, function ($query, $first_name) {
            return $query->where('first_name', 'like', "%$first_name%");
        })
        ->when($last_name, function ($query, $last_name) {
            return $query->where('last_name', 'like', "%$last_name%");
        })
        ->when($country, function ($query, $country) {
            return $query->where('country', 'like', "%$country%");
        })
        ->paginate(20)
        ->withQueryString();

        return view('customers.index', ['customers' => $customers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        return view('customers.show', [ 'customer' => Customer::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
