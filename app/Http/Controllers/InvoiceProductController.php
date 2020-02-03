<?php

namespace App\Http\Controllers;

use App\Product;
use App\Invoice;
use App\Http\Requests\InvoiceProduct\DetailRequest;
use App\Http\Requests\InvoiceProduct\UpdateRequest;

class InvoiceProductController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     * @param Invoice $invoice
     * @param Product $product
     * @return \Illuminate\Http\Response
     */

    public function edit(Invoice $invoice, Product $product)
    {
        return response()->view('invoicesProducts.edit', [
            'invoice' => $invoice,
            'product' => $product,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param Invoice $invoice
     * @param Product $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Invoice $invoice, Product $product, UpdateRequest $request)
    {
        $invoice->products()->updateExistingPivot($product->id, $request->validated());

        return redirect()->route('invoiceProduct.update', $invoice);
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

