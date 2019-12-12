<?php

namespace App\Http\Controllers;
use App\Http\Requests\Seller\StoreRequest;
use App\Http\Requests\Seller\UpdateRequest;
use App\Seller;
use App\City;
use App\Product;
use Exception;
use Illuminate\Http\Response;


class SellerController extends Controller
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
     * @return Response
     */
    public function index()
    {
        $sellers = Seller::with(['city'])->paginate();
        return view('sellers.index',  compact('sellers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Seller $seller
     * @return Response
     */
    public function create(Seller $seller)
    {
        $cities = City::all();
        $seller = new Seller();
        return view('sellers.create', compact('cities', 'seller'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreRequest  $request
     * @return Response
     */
    public function store(StoreRequest $request)
    {
        $seller = new Seller();
        $seller->name = $request->input('name');
        $seller->document = $request->input('document');
        $seller->email = $request->input('email');
        $seller->phone = $request->input('phone');
        $seller->city_id = $request->input('city_id');
        $seller->address = $request->input('address');
        $request->validated();
        $seller->save();
        return redirect()->route('sellers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Seller $seller
     * @param Product $product
     * @return Response
     */
    public function show(Seller $seller, Product $product)
    {
        $cities = City::all();
        return view('sellers.show',  compact('cities', 'seller', 'product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Seller $seller
     * @return Response
     */
    public function edit(Seller $seller)
    {
        $cities = City::all();
        return view('sellers.edit',  compact('cities', 'seller'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param Seller $seller
     * @return Response
     */
    public function update(UpdateRequest $request, Seller $seller)
    {
        $seller->name = $request->input('name');
        $seller->document = $request->input('document');
        $seller->email = $request->input('email');
        $seller->phone = $request->input('phone');
        $seller->city_id = $request->input('city_id');
        $seller->address = $request->input('address');
        $request->validated();
        $seller->save();
        return redirect()->route('sellers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Seller $seller
     * @return Response
     * @throws Exception
     */
    public function destroy(Seller $seller)
    {
        $seller->delete();
        return redirect()->route('sellers.index');
    }
}
