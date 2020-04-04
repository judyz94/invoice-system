<?php

namespace App\Http\Controllers\Api;

use App\Actions\InvoiceProducts\StoreAction;
use App\Actions\InvoiceProducts\UpdateAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\InvoiceProduct\DetailRequest;
use App\Http\Requests\InvoiceProduct\UpdateRequest;
use App\Invoice;
use App\Product;
use Illuminate\Http\JsonResponse;

class InvoiceProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Invoice $invoice
     * @return Invoice[]|
     */
    public function index(Invoice $invoice)
    {
       return $invoice->products()->all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param DetailRequest $request
     * @param Invoice $invoice
     * @param StoreAction $action
     * @return void
     */
    public function store(DetailRequest $request, Invoice $invoice, StoreAction $action)
    {
        //return $action->execute($invoice, $request);

        $price = $request->input('price');
        $quantity = $request->input('quantity');
        $invoice->products()->attach($request->input('product_id'), [
            'price' => $price,
            'quantity' => $quantity,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param Invoice $invoice
     * @param Product $product
     * @param UpdateAction $action
     * @return void
     */
    public function update(UpdateRequest $request, Invoice $invoice, Product $product, UpdateAction $action)
    {
        //return $action->execute($invoice, $request);

        $product = $invoice->products()->findOrFail($product);
        $invoice->products()->updateExistingPivot($product->id, $request->validated());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Invoice $invoice
     * @param Product $product
     * @return JsonResponse
     */
    public function destroy(Invoice $invoice, Product $product)
    {
        //$invoice->delete();

        $invoice->products()->detach($product->id);

        return response()->json(__('The invoice detail has been removed'));
    }
}

