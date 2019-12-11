<?php

namespace App\Http\Controllers;
use App\Http\Requests\Seller\StoreRequest;
use App\Http\Requests\Seller\UpdateRequest;
use App\Seller;
use App\City;
use App\Product;


class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::all();
        return view('sellers.index',  compact('cities'), [
            'sellers' => Seller::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Seller $seller
     * @return \Illuminate\Http\Response
     */
    public function create(Seller $seller)
    {
        $cities = City::all();
        return view('sellers.create', compact('cities'), [
            'seller' => $seller,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $seller = new Seller();
        $seller->name = $request->get('name');
        $seller->document = $request->get('document');
        $seller->email = $request->get('email');
        $seller->phone = $request->get('phone');
        $seller->city_id = $request->get('city_id');
        $seller->address = $request->get('address');
        $seller->save();
        return redirect('/sellers');
    }

    /**
     * Display the specified resource.
     *
     * @param Seller $seller
     * @param Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Seller $seller, Product $product)
    {
        $cities = City::all();
        return view('sellers.show',  compact('cities'), [
            'seller' => $seller,
            'product' => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Seller $seller
     * @return \Illuminate\Http\Response
     */
    public function edit(Seller $seller)
    {
        $cities = City::all();
        return view('sellers.edit',  compact('cities'), [
            'seller' => $seller ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Seller $seller)
    {
        $seller->name = $request->get('name');
        $seller->document = $request->get('document');
        $seller->email = $request->get('email');
        $seller->phone = $request->get('phone');
        $seller->city_id = $request->get('city_id');
        $seller->address = $request->get('address');
        $seller->save();

        return redirect()->route('sellers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $seller = Seller::findOrFail($id);
        $seller->delete();
        return redirect('/sellers');
    }
}
