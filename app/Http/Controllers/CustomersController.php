<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\Customers;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreCustomersRequest;
use App\Http\Requests\UpdateCustomersRequest;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Store $store)
    {
        $customer = Customers::where('store_id', $store->id)->paginate();
        return response()->json($customer, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomersRequest $request, Store $store) 
    {
        $customer = Customers::createForStore($request->validated(), $store->id);
        return response()->json($customer, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Store $store, Customers $customer)
    {
        Gate::authorize('access', [$customer, $store]);
        return response()->json($customer, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Store $store, UpdateCustomersRequest $request, Customers $customer)
    {
        Gate::authorize('access', [$customer, $store]);
        $customer->update($request->validated());
        return response()->json($customer, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Store $store, Customers $customer)
    {
        Gate::authorize('access', [$customer, $store]);
        $customer->delete();
        return response()->json(['message' => 'Customer successfully deleted.'], 200);
    }
}
