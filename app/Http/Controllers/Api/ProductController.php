<?php

namespace App\Http\Controllers\Api;

use App\Actions\Products\StoreAction;
use App\Actions\Products\UpdateAction;
use App\Http\Requests\Product\ProductRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Product;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Product[]|Collection
     */
    public function index()
    {
        return Product::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProductRequest $request
     * @param Product $product
     * @param StoreAction $action
     * @return Response
     */
    public function store(ProductRequest $request, Product $product, StoreAction $action)
    {
        return $action->execute($product, $request);
    }

    /**
     * Display the specified resource.
     *
     * @param Product $product
     * @return Product
     */
    public function show(Product $product)
    {
        return $product;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param Product $product
     * @param UpdateAction $action
     * @return Response
     */
    public function update(UpdateRequest $request, Product $product, UpdateAction $action)
    {
        return $action->execute($product, $request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @return JsonResponse
     * @throws \Exception
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return response()->json(__('The product has been removed'));
    }
}

