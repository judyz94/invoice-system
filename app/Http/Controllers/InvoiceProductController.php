<?php

namespace App\Http\Controllers;

use App\Product;
use App\Invoice;
use App\Http\Requests\InvoiceProduct\StoreRequest;
use App\Http\Requests\InvoiceProduct\UpdateRequest;
use Illuminate\Http\Response;

class InvoiceProductController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @param Invoice $invoice
     * @param Product $product
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Invoice $invoice)
    {
        $products = Product::all();

        return view('invoicesProducts.create', compact( 'products', 'invoice'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRequest $request
     * @param Invoice $invoice
     * @param Product $product
     * @return Response
     */
    public function store(/*StoreRequest $productRequest,*/ StoreRequest $request, Invoice $invoice, Product $product)
    {

        dd($request->all());
        //$invoice->products()->create($productRequest->validated());

        $invoice->products()->attach(request('product_id'), $request->validated());
        return redirect()->route('invoices.show', $invoice);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Invoice $invoice
     * @param Product $product
     * @return Response
     */

    public function edit(Invoice $invoice, Product $product)
    {
        $invoices = Invoice::all();
        $products = Product::all();
        return view('invoicesProducts.edit', compact( 'products', 'invoices'), [
            'invoice' => $invoice,
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param Invoice $invoice
     * @param Product $product
     * @return Response
     */
    public function update(UpdateRequest $request, Invoice $invoice, Product $product)
    {
        $invoice->products()->updateExistingPivot($product->id, $request->validated());
        return redirect()->route('invoices.show', $invoice, $product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @param Invoice $invoice
     * @return Response
     */
    public function destroy(Invoice $invoice, Product $product)
    {
        $invoice->products()->detach($product->id);
        return redirect()->route('invoices.show',  $invoice, $product);

    }
}

