<?php

namespace App\Http\Controllers;
use App\Http\Requests\Invoice\StoreRequest;
use App\Http\Requests\Invoice\UpdateRequest;
use App\Customer;
use App\Invoice;
use App\Product;
use App\Seller;
use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class InvoiceController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @param Invoice $invoice
     * @param Product $product
     * @return Response
     */
    public function index(Invoice $invoice, Product $product)
    {
        $products = Product::all();
        $invoices = Invoice::all();
        return view('invoices.index', compact( 'products', 'invoices'), [
            'invoice' => $invoice,
            'product' => $product
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Invoice $invoice
     * @return Response
     */
    public function create(Invoice $invoice)
    {
        $customers = Customer::all();
        $sellers = Seller::all();
        $users = User::all();
        $invoice = new Invoice();
        return view('invoices.create', compact('sellers', 'customers', 'users', 'invoice'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreRequest  $request
     * @return Response
     */
    public function store(StoreRequest $request)
    {
        $invoice = new Invoice();
        $invoice->id = $request->input('id');
        $invoice->expedition_date = $request->input('expedition_date');
        $invoice->due_date = $request->input('due_date');
        $invoice->receipt_date = $request->input('receipt_date');
        $invoice->seller_id = $request->input('seller_id');
        $invoice->sale_description = $request->input('sale_description');
        $invoice->customer_id = $request->input('customer_id');
        $invoice->status = $request->input('status');
        $invoice->user_id = auth()->user()->id;

        $invoice->save();

        $invoice->update([
            'code' => 'A' . str_pad($invoice->id, 4, 0, STR_PAD_LEFT),
        ]);

        return redirect()->route('invoices.show', $invoice);
    }

    /**
     * Display the specified resource.
     *
     * @param Invoice $invoice
     * @param Product $product
     * @return Response
     */
    public function show(Invoice $invoice)
    {
        $customers = Customer::all();
        $sellers = Seller::all();
        $users = User::all();
        $products = Product::whereNotIn('id', $invoice->products->pluck('id')->values())->get();
        return view('invoices.show', compact( 'sellers', 'customers', 'users', 'invoice', 'products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Invoice $invoice
     * @return Response
     */
    public function edit(Invoice $invoice)
    {
        $customers = Customer::all();
        $sellers = Seller::all();
        $users = User::all();
        return view('invoices.edit', compact( 'sellers', 'customers', 'users', 'invoice'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param Invoice $invoice
     * @return Response
     */
    public function update(UpdateRequest $request, Invoice $invoice)
    {
        $invoice->expedition_date = $request->input('expedition_date');
        $invoice->due_date = $request->input('due_date');
        $invoice->receipt_date = $request->input('receipt_date');
        $invoice->seller_id = $request->input('seller_id');
        $invoice->sale_description = $request->input('sale_description');
        $invoice->vat = $request->input('vat');
        $invoice->customer_id = $request->input('customer_id');
        $invoice->status = $request->input('status');
        $invoice->user_id = $request->input('user_id');
        $request->validated();
        $invoice->save();
        return redirect()->route('invoices.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Invoice $invoice
     * @return Response
     * @throws Exception
     */
    public function destroy(Invoice $invoice)
    {
        $invoice->delete();
        return redirect()->route('invoices.index');

    }

    public function addProduct(Invoice $invoice, Request $request)
    {
        $price = $request->input('product_price');
        $quantity = $request->input('product_quantity');
        $totalPrice = $price * $quantity;
        $vat = $totalPrice * 0.19;

        $invoice->products()->attach($request->input('product_id'), [
            'price' => $price,
            'quantity' => $quantity,
        ]);

        $invoice->vat += $vat;
        $invoice->total += $totalPrice;
        $invoice->total_with_vat += $totalPrice + $vat;

        $invoice->save();

        return redirect()->route('invoices.show', $invoice);
    }
}
