<?php

namespace App\Http\Controllers;

use App\City;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Requests\Product\ProductRequest;
use App\Http\Requests\Product\UpdateRequest;
use Exception;
use Illuminate\Support\Facades\Cache;

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
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $type = $request->input('type');
        $search = $request->input('search');

        $products = Product::searchfor($type, $search)->paginate(4);

        return view('products.index', compact( 'products', 'type', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Product $product
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ProductRequest $request)
    {
        $product = new Product();
        $product->name = $request->input('name');
        $product->unit_price = $request->input('unit_price');

        $product->save();

        Cache::forget('products');

        return redirect()->route('products.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Product $product
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateRequest $request, Product $product)
    {
        $product->name = $request->input('name');
        $product->unit_price = $request->input('unit_price');

        $product->save();

        Cache::forget('products');

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @return \Illuminate\Http\RedirectResponse
     * @throws Exception
     */
    public function destroy(Product $product)
    {
        $product->delete();

        Cache::forget('products');

        return redirect()->route('products.index');
    }
}

