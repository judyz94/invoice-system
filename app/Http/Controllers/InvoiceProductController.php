<?php

namespace App\Http\Controllers;

use App\Product;
use App\Invoice;



class InvoiceProductController extends Controller
{
    public function create(Invoice $invoice, Product $product)
    {
        $invoices = Invoice::all();
        $products = Product::all();
        return view('invoicesProducts.create', compact( 'products', 'invoices'), [
            'invoice' => $invoice,
            'product' => $product
        ]);
    }

    public function store(/*ProductRequest $productRequest,*/ StoreRequest $request, Invoice $invoice)
    {
        //$invoice->products()->create($productRequest->validated());
        $invoice->products()->attach(request('product_id'), $request->validated());
        return redirect()->route('invoices.show', $invoice);
    }

    public function fetch(ProductRequest $productRequest)
    {
        if($productRequest->get('query')->validated())
        {
            $query = $productRequest->get('query')->validated();
            $data = DB::table('products')
                ->where('name', 'LIKE', "%{$query}%")
                ->get();
            $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
            foreach($data as $row)
            {
                $output .= '<li><a href="#">'.$row->name.'</a></li>';
            }
            $output .= '</ul>';
            echo $output;
        }
    }

    public function edit(Invoice $invoice, Product $product)
    {
        $invoices = Invoice::all();
        $products = Product::all();
        return view('invoicesProducts.edit', compact( 'products', 'invoices'), [
            'invoice' => $invoice,
            'product' => $product
        ]);
    }

    public function update(UpdateRequest $request, Invoice $invoice, Product $product)
    {
        $invoice->products()->updateExistingPivot($product->id, $request->validated());
        return redirect()->route('invoices.show', $invoice);
    }

    public function destroy(Product $product, Invoice $invoice)
    {
        $invoice = Invoice::findOrFail($invoice->id);
        $invoice->products()->detach($product->id);
        return redirect()->route('invoices.show', $invoice);
    }

}
