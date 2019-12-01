<?php

namespace App\Http\Controllers;
use Faker\ORM\Spot\Populator;
use Illuminate\Http\Request;
use App\Http\Requests\StoreInvoiceProductRequest;
use App\Product;
use App\Invoice;

class InvoiceProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('invoicesProducts.index', [
            'invoices' => Invoice::all(),
            'products' => Product::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Invoice $invoice)
    {
        $invoices = Invoice::all();
        $products = Product::all();
        return view('invoicesProducts.create', compact( 'products', 'invoices'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
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
     * @param  int  $id
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice, Product $product)
    {
        $invoices = Invoice::all();
        $products = Product::all();
        return view('invoicesProducts.edit', compact( 'products', 'invoices'), [
            'product' => $product,
            'invoice' => $invoice ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreInvoiceProductRequest $request, Invoice $invoice)
    {
        $invoice->products()->updateExistingPivot(request('product_id'), [
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
    public function destroy(Product $product, Invoice $invoice)
    {
        $product = Product::all();
        $invoice->products()->detach();
        return redirect()->route('invoices.show', $invoice);
    }

    public function confirmDelete($id)
    {
        $invoice = Invoice::all();
        $product = Product::findOrFail($id);
        return view('invoicesProducts.confirmDelete', [
            'invoice' => $invoice,
            'product' => $product ]);
    }
}
