<?php

namespace App\Http\Controllers;

use App\Http\Requests\Customer\StoreRequest;
use App\Http\Requests\Customer\UpdateRequest;
use App\Customer;
use App\City;
use App\Product;
use Exception;

class CustomerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
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
     * @return \Illuminate\Http\RedirectResponse
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
        return redirect()->route('customers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Customer $customer
     * @param Product $product
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Customer $customer, Product $product)
    {
        $cities = City::all();
        return view('customers.show',  compact('cities', 'customer', 'product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Customer $customer
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
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
     * @return \Illuminate\Http\RedirectResponse
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
     * @return \Illuminate\Http\RedirectResponse
     * @throws Exception
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('customers.index');
    }
}

