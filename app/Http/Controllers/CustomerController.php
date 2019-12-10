<?php

namespace App\Http\Controllers;
use App\Http\Requests\Customer\StoreRequest;
use App\Http\Requests\Customer\UpdateRequest;
use App\Customer;
use App\City;
use App\Product;

class CustomerController extends Controller
{
    public function index()
    {
        $cities = City::all();
        return view('customers.index',  compact('cities'), [
            'customers' => Customer::all(),
        ]);
    }

    public function create(Customer $customer)
    {
        $cities = City::all();
        return view('customers.create', compact('cities'), [
            'customer' => $customer,
        ]);
    }

    public function store(StoreRequest $request)
    {
        $customer = new Customer();
        $customer->name = $request->get('name');
        $customer->document = $request->get('document');
        $customer->email = $request->get('email');
        $customer->phone = $request->get('phone');
        $customer->city_id = $request->get('city_id');
        $customer->address = $request->get('address');
        $customer->save();
        return redirect('/customers');
    }

    public function show(Customer $customer, Product $product)
    {
        $cities = City::all();
        return view('customers.show',  compact('cities'), [
            'customer' => $customer,
            'product' => $product
        ]);
    }

    public function edit(Customer $customer)
    {
        $cities = City::all();
        return view('customers.edit',  compact('cities'), [
            'customer' => $customer ]);
    }

    public function update(UpdateRequest $request, Customer $customer)
    {
        $customer->name = $request->get('name');
        $customer->document = $request->get('document');
        $customer->email = $request->get('email');
        $customer->phone = $request->get('phone');
        $customer->city_id = $request->get('city_id');
        $customer->address = $request->get('address');
        $customer->save();

        return redirect()->route('customers.index');
    }

    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();
        return redirect('/customers');
    }

}

