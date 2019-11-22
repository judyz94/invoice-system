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
        $customer->address = $request->get('address');
        $customer->save();
        return redirect('/customers');
    }

    public function show($id)
    {
        //
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
        $customer->address = $request->get('address');
        $customer->save();

        return redirect()->route('customers.index');
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect('/customers');
    }

    public function confirmDelete(Customer $customer)
    {
        return view('customers.confirmDelete', [
        'customer' => $customer]);
    }
}

