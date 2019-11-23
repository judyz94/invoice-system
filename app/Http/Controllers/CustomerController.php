<?php

namespace App\Http\Controllers;
use App\Customer;
use App\Http\Requests\Customer\StoreRequest;
use App\Http\Requests\Customer\UpdateRequest;

class CustomerController extends Controller
{
    public function index()
    {
        return view('customers.index', [
            'customers' => Customer::all() ]);
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(StoreRequest $request)
    {
        $customer = new Customer();
        $customer->name = $request->get('name');
        $customer->document = $request->get('document');
        $customer->email = $request->get('email');
        $customer->phone = $request->get('phone');
        $customer->city_id = $customer->id;
        $customer->address = $request->get('address');
        $customer->save();
        return redirect('/customers');
    }

    public function show(Customer $customer)
    {
        return view('customers.show', [
            'customer' => $customer ]);
    }

    public function edit(Customer $customer)
    {
        return view('customers.edit', [
            'customer' => $customer]);
    }

    public function update(UpdateRequest $request, Customer $customer)
    {
        $customer->name = $request->get('name');
        $customer->document = $request->get('document');
        $customer->email = $request->get('email');
        $customer->phone = $request->get('phone');
        $customer->city_id = $customer->id;
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

    public function confirmDelete($id)
    {
        $customer = Customer::findOrFail($id);
        return view('customers.confirmDelete', [
        'customer' => $customer]);
    }
}

