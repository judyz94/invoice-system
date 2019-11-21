<?php

namespace App\Http\Controllers;
use App\Customer;
use App\Http\Requests\validateCustomer;
use Illuminate\Http\Request;


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

    public function store(validateCustomer $request)
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

    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('customers.edit', [
            'customer' => $customer]);
    }

    public function update(validateCustomer $request, $id)
    {
        $customer = Customer::findOrFail($id);
        $customer->name = $request->get('name');
        $customer->document = $request->get('document');
        $customer->email = $request->get('email');
        $customer->phone = $request->get('phone');
        $customer->address = $request->get('address');
        $customer->save();
        return redirect('/customers');
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

