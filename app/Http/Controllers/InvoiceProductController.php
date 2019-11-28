<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreInvoiceProductRequest;
use App\Product;
use App\Invoice;
use Illuminate\Http\Request;

class InvoiceProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('invoices.index', [
            'invoices' => Invoice::all(),
            'products' => Product::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Invoice $invoice
     * @return \Illuminate\Http\Response
     */
    public function create(Invoice $invoice)
    {
        $invoices = Invoice::all();
        $products = Product::all();
        return view('invoicesProducts.create', compact( 'products', 'invoices'), [
            'invoice' => $invoice ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreInvoiceProductRequest $request
     * @param Invoice $invoice
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInvoiceProductRequest $request, Invoice $invoice)
    {
        $invoice->products()->attach(request('product_id'), [
            'invoice_id' => request('invoice_id'),
            'price' => request('price'),
            'quantity' => request('quantity')],
        $request->validated());
        return redirect()->route('invoices.show', $invoice);
    }

    /**
     * Display the specified resource.
     *
     * @param Product $product
     * @return \Illuminate\Http\Response
     */

    public function show(Product $product)
    {
        $products = Product::all();
        return view('invoices.show', compact('products'), [
            'product' => $product ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Invoice $invoice
     * @param Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice, Product $product)
    {
        $invoices = Invoice::all();
        $products = Product::all();
        return view('invoicesProducts.edit', compact( 'products', 'invoices'), [
            'product' => $product,
            'invoice' => $invoice]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StoreInvoiceProductRequest $request
     * @param Invoice $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(StoreInvoiceProductRequest $request, Invoice $invoice)
    {
        $invoice->products()->attach(request('product_id'), [
            'invoice_id' => request('invoice_id'),
            'price' => request('price'),
            'quantity' => request('quantity')],
            $request->validated());
        return redirect()->route('invoices.show', $invoice);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect('/invoicesProducts');
    }

    public function confirmDelete($id)
    {
        $product = Product::findOrFail($id);
        return view('invoicesProducts.confirmDelete', [
            'product' => $product ]);
    }
}
