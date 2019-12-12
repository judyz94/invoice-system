<?php

namespace App\Http\Controllers;
use App\Http\Requests\Customer\StoreRequest;
use App\Http\Requests\Customer\UpdateRequest;
use App\Customer;
use App\City;
use App\Product;
use Exception;
use Illuminate\Http\Response;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $customers = Customer::with(['city'])->paginate();
        return view('customers.index',  compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Customer $customer
     * @return Response
     */
    public function create(Customer $customer)
    {
        $cities = City::all();
        $customer = new Customer();
        return view('customers.create', compact('cities', 'customer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreRequest  $request
     * @return Response
     */
    public function store(StoreRequest $request)
    {
        $customer = new Customer();
        $customer->name = $request->input('name');
        $customer->document = $request->input('document');
        $customer->email = $request->input('email');
        $customer->phone = $request->input('phone');
        $customer->city_id = $request->input('city_id');
        $customer->address = $request->input('address');
        $customer->save();
        $request->validated();
        return redirect()->route('customers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Customer $customer
     * @param Product $product
     * @return Response
     */
    public function show(Customer $customer, Product $product)
    {
        $cities = City::all();
        return view('customers.show',  compact('cities'), [
            'customer' => $customer,
            'product' => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Customer $customer
     * @return Response
     */
    public function edit(Customer $customer)
    {
        $cities = City::all();
        return view('customers.edit',  compact('cities', 'customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param Customer $customer
     * @return Response
     */
    public function update(UpdateRequest $request, Customer $customer)
    {
        $customer->name = $request->input('name');
        $customer->document = $request->input('document');
        $customer->email = $request->input('email');
        $customer->phone = $request->input('phone');
        $customer->city_id = $request->input('city_id');
        $customer->address = $request->input('address');
        $customer->save();
        return redirect()->route('customers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Customer $customer
     * @return Response
     * @throws Exception
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('customers.index');
    }
}

