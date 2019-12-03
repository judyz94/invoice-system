<?php

namespace App\Http\Controllers;
use App\Http\Requests\InvoiceProduct\StoreRequest;
use App\Http\Requests\InvoiceProduct\UpdateRequest;
use App\Product;
use App\Invoice;

class InvoiceProductController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Invoice $invoice, Product $product)
    {
        $invoices = Invoice::all();
        $products = Product::all();
        return view('invoicesProducts.create', compact('products', 'invoices'), [
            'invoice' => $invoice,
            'product' => $product]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request, Invoice $invoice)
    {
        $invoice->products()->attach(request('product_id'), [
            'invoice_id' => request('invoice_id'),
            'price' => request('price'),
            'quantity' => request('quantity')],
            $request->validated());
        return redirect()->route('invoices.show', $invoice);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice, Product $product)
    {
        $invoices = Invoice::all();
        $products = Product::all();
        return view('invoicesProducts.edit', compact('products', 'invoices'), [
            'invoice' => $invoice,
            'product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Invoice $invoice, Product $product)
    {
        $invoice->products()->updateExistingPivot($product->id, $request->validated());
        return redirect()->route('invoices.show', $invoice);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, Invoice $invoice)
    {
        $invoice = Invoice::findOrFail($invoice->id);
        $invoice->products()->detach($product->id);
        return redirect()->route('invoices.show', $invoice);

    }

    public function confirmDelete(Product $product, Invoice $invoice)
    {
        $invoices = Invoice::all();
        $products = Product::all();
        return view('invoicesProducts.confirmDelete', compact('products', 'invoices'), [
            'invoice' => $invoice,
            'product' => $product]);
    }

}
