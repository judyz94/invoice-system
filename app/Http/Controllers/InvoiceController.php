<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Invoice;
use App\Product;
use App\Seller;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\Invoice\StoreRequest;
use App\Http\Requests\Invoice\UpdateRequest;
use App\Http\Requests\InvoiceProduct\DetailRequest;
use App\Imports\InvoicesImport;
use Maatwebsite\Excel\Facades\Excel;
use Exception;

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
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $type = $request->get('type');
        $search = $request->get('searchfor');

        $invoices = Invoice::searchfor($type, $search)->paginate(10);

        return view('invoices.index', compact( 'invoices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Invoice $invoice
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
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
     * @return \Illuminate\Http\RedirectResponse
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateRequest $request, Invoice $invoice)
    {
        $invoice->expedition_date = $request->input('expedition_date');
        $invoice->due_date = $request->input('due_date');
        $invoice->receipt_date = $request->input('receipt_date');
        $invoice->seller_id = $request->input('seller_id');
        $invoice->sale_description = $request->input('sale_description');
        $invoice->customer_id = $request->input('customer_id');
        $invoice->status = $request->input('status');
        $invoice->user_id = auth()->user()->id;

        $invoice->save();

        return redirect()->route('invoices.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Invoice $invoice
     * @return \Illuminate\Http\RedirectResponse
     * @throws Exception
     */
    public function destroy(Invoice $invoice)
    {
        $invoice->delete();

        return redirect()->route('invoices.index');
    }

    public function addProduct(Invoice $invoice, DetailRequest $request)
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

    public function updateProduct(Invoice $invoice, UpdateRequest $request)
    {
        $price = $request->input('product_price');
        $quantity = $request->input('product_quantity');
        $totalPrice = $price * $quantity;
        $vat = $totalPrice * 0.19;

        $invoice->products()->updateExistingPivot($request->input('product_id'), [
            'price' => $price,
            'quantity' => $quantity,
        ]);

        $invoice->vat += $vat;
        $invoice->total += $totalPrice;
        $invoice->total_with_vat += $totalPrice + $vat;

        $invoice->save();

        return redirect()->route('invoices.show', $invoice);
    }

    public function import(Request $request)
    {
        $file = $request->file('file');

        Excel::import(new InvoicesImport, $file );

        return back()->with('message', 'Invoice import succesfully');
    }
}

