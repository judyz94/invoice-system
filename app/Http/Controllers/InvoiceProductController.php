<?php

namespace App\Http\Controllers;

use App\Product;
use App\Invoice;
use App\Http\Requests\InvoiceProduct\UpdateRequest;

class InvoiceProductController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     * @param Invoice $invoice
     * @param $product
     * @return \Illuminate\Http\Response
     */

    public function edit(Invoice $invoice, $product)
    {
        $product = $invoice->products()->findOrFail($product);

        return response()->view('invoicesProducts.edit', compact('invoice', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param Invoice $invoice
     * @param Product $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Invoice $invoice, $product, UpdateRequest $request)
    {
        $product = $invoice->products()->findOrFail($product);

        $invoice->products()->updateExistingPivot($product->id, $request->validated());

        return redirect()->route('invoices.show', $invoice);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @param Invoice $invoice
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Invoice $invoice, Product $product)
    {
        $invoice->products()->detach($product->id);

        return redirect()->route('invoices.show',  $invoice);

    }
}

