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
        return view('products.index', [
            'products' => Product::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        return view('products.create', compact( 'products'));
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
        $invoice->products()->attach(request('product_id'), $request->validated());
        return redirect('invoices.show', $invoice);
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
        return view('invoices.show', compact('products'),[
            'product' => $product ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit', [
            'product' => $product ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->id = $request->get('id');
        $product->invoice_id = $request->get('invoice_id');
        $product->product_id = $request->get('product_id');
        $product->price = $request->get('price');
        $product->quantity = $request->get('quantity');
        $product->save();
        return redirect('/products');
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
        return redirect('/products');
    }

    public function confirmDelete($id)
    {
        $product = Product::findOrFail($id);
        return view('products.confirmDelete', [
            'product' => $product ]);
    }
}
