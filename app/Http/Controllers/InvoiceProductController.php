<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreInvoiceProductRequest;
use App\Product;
use App\Invoice;
use Illuminate\Support\Facades\DB;


class InvoiceProductController extends Controller
{
    public function index()
    {
        return view('invoices.index', [
            'invoices' => Invoice::all(),
            'products' => Product::all()
        ]);
    }

    public function create(Invoice $invoice, Product $product)
    {
        $invoices = Invoice::all();
        $products = Product::all();
        return view('invoicesProducts.create', compact( 'products', 'invoices'), [
            'invoice' => $invoice ]);
    }

    public function store(StoreInvoiceProductRequest $request, Invoice $invoice)
    {
        $invoice->products()->attach(request('product_id'), [
            'invoice_id' => request('invoice_id'),
            'price' => request('price'),
            'quantity' => request('quantity')],
        $request->validated());
        return redirect()->route('invoices.show', $invoice);
    }


    public function show(Product $product)
    {
        $products = Product::all();
        return view('invoices.show', compact('products'), [
            'product' => $product ]);
    }


    public function edit(Invoice $invoice, Product $product)
    {
        $invoices = Invoice::all();
        $products = Product::all();
        return view('invoicesProducts.edit', compact( 'products', 'invoices'), [
            'product' => $product ]);
    }

    public function update($request, Invoice $invoice, Product $product)
    {
        $product->id = $request->get('id');
        $product->invoice_id = $request->get('invoice_id');
        $product->product_id = $request->get('product_id');
        $product->price = $request->get('price');
        $product->quantity = $request->get('quantity');
        $product->save();
        return redirect('/invoicesProducts');
    }

    public function destroy(Product $product, Invoice $invoice)
    {
        $product = Product::findOrFail($invoice->id);
        $product->delete();
        return redirect()->route('invoices.show', $invoice);
    }

    public function confirmDelete(Product $product, Invoice $invoice)
    {
        $invoices = Invoice::all();
        $products = Product::all();
        return view('invoicesProducts.confirmDelete', [
            'product' => $product ]);
    }
}
