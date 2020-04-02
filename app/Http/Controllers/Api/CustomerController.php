<?php

namespace App\Http\Controllers\Api;

use App\Actions\Customers\StoreAction;
use App\Actions\Customers\UpdateAction;
use App\Customer;
use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\StoreRequest;
use App\Http\Requests\Customer\UpdateRequest;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Customer[]|Collection
     */
    public function index()
    {
        return Customer::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRequest $request
     * @param Customer $customer
     * @param StoreAction $action
     * @return void
     */
    public function store(StoreRequest $request, Customer $customer, StoreAction $action)
    {
        return $action->execute($customer, $request);
    }

    /**
     * Display the specified resource.
     *
     * @param Customer $customer
     * @return Customer
     */
    public function show(Customer $customer)
    {
        return $customer;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param Customer $customer
     * @param UpdateAction $action
     * @return void
     */
    public function update(UpdateRequest $request, Customer $customer, UpdateAction $action)
    {
        return $action->execute($customer, $request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Customer $customer
     * @return JsonResponse
     * @throws \Exception
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();

        return response()->json(__('The client has been removed'));
    }
}

