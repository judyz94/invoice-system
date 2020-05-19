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
    public $successStatus = 200;

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $product = Product::all();

        return response()->json([
            'success' => $product],
            $this-> successStatus);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProductRequest $request
     * @param Product $product
     * @param StoreAction $action
     * @return JsonResponse
     */
    public function store(ProductRequest $request, Product $product, StoreAction $action)
    {
        return response()->json([
            'message' => 'Product successfully created.',
            'success' => $action->execute($product, $request)],
            $this-> successStatus);
    }

    /**
     * Display the specified resource.
     *
     * @param Product $product
     * @return JsonResponse
     */
    public function show(Product $product)
    {
        return response()->json([
            'success' => $product],
            $this-> successStatus);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param Product $product
     * @param UpdateAction $action
     * @return JsonResponse
     */
    public function update(UpdateRequest $request, Product $product, UpdateAction $action)
    {
        return response()->json([
            'message' => 'Product successfully updated.',
            'success' => $action->execute($product, $request)],
            $this-> successStatus);
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

        return response()->json([
            'message' => 'Product successfully deleted.'],
            $this-> successStatus);
    }
}

