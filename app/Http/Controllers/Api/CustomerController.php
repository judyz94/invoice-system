<?php

namespace App\Http\Controllers\Api;

use App\Actions\Customers\StoreAction;
use App\Actions\Customers\UpdateAction;
use App\Http\Requests\Customer\StoreRequest;
use App\Http\Requests\Customer\UpdateRequest;
use App\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;

class CustomerController extends Controller
{
    public $successStatus = 200;

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $customer = Customer::with(['city'])->get();

        return response()->json([
            'success' => $customer],
            $this-> successStatus);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRequest $request
     * @param Customer $customer
     * @param StoreAction $action
     * @return JsonResponse
     */
    public function store(StoreRequest $request, Customer $customer, StoreAction $action)
    {
        return response()->json([
            'message' => 'Customer successfully created.',
            'success' => $action->execute($customer, $request)],
            $this-> successStatus);
    }

    /**
     * Display the specified resource.
     *
     * @param Customer $customer
     * @return JsonResponse
     */
    public function show(Customer $customer)
    {
        return response()->json([
            'success' => $customer],
            $this-> successStatus);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param Customer $customer
     * @param UpdateAction $action
     * @return JsonResponse
     */
    public function update(UpdateRequest $request, Customer $customer, UpdateAction $action)
    {
        return response()->json([
            'message' => 'Customer successfully updated.',
            'success' => $action->execute($customer, $request)],
            $this-> successStatus);
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

        return response()->json([
            'message' => 'Customer successfully deleted.'],
            $this-> successStatus);
    }
}

