<?php

namespace App\Http\Controllers;
use App\City;
use App\Http\Requests\Product\ProductRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Product;
use Exception;
use Illuminate\Http\Response;

class ProductController extends Controller
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
        $products = Product::all();
        return view('products.index',  compact( 'products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Product $product
     * @return Response
     */
    public function create(Product $product)
    {
        $product = new Product();
        return view('products.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProductRequest $request
     * @return Response
     */
    public function store(ProductRequest $request)
    {
        $product = new Product();
        $product->name = $request->input('name');
        $product->unit_price = $request->input('unit_price');

        $product->save();
        return redirect()->route('products.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Product $product
     * @return Response
     */
    public function edit(Product $product)
    {
        $cities = City::all();
        return view('products.edit',  compact('cities','product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param Product $product
     * @return Response
     */
    public function update(UpdateRequest $request, Product $product)
    {
        $product->name = $request->input('name');
        $product->unit_price = $request->input('unit_price');

        $product->save();
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @return Response
     * @throws Exception
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }
}
