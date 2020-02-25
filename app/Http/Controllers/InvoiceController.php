<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Invoice;
use App\Payment;
use App\Product;
use App\Seller;
use App\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\Invoice\StoreRequest;
use App\Http\Requests\Invoice\UpdateRequest;
use App\Http\Requests\InvoiceProduct\DetailRequest;
use App\Imports\InvoicesImport;
use Illuminate\View\View;
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
     * @return Factory|View
     */
    public function index(Request $request)
    {
        $filter = $request->input('filter');
        $search = $request->input('search');

        $invoices = Invoice::with(['customer', 'seller'])
            ->searchfor($filter, $search)
            ->paginate(6);

        $now = new \DateTime();
        $now = $now->format('Y-m-d H:i:s');

        return view('invoices.index', compact( 'invoices', 'filter', 'search', 'now'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Invoice $invoice
     * @return Factory|View
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
     * @return RedirectResponse
     */
    public function store(StoreRequest $request)
    {
        $invoice = new Invoice();

        $invoice->id = $request->input('id');
        $invoice->expedition_date = $request->input('expedition_date');
        $invoice->due_date = $request->input('due_date');
        //$invoice->receipt_date = $request->input('receipt_date');
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
     * @param Payment $payment
     * @return Factory|View
     */
    public function show(Invoice $invoice, Payment $payment)
    {
        $customers = Customer::all();
        $sellers = Seller::all();
        $users = User::all();

        $products = Product::whereNotIn('id', $invoice->products->pluck('id')->values())->get();

        return view('invoices.show', compact( 'sellers', 'customers', 'users', 'invoice', 'products', 'payment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Invoice $invoice
     * @return Factory|View
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
     * @return RedirectResponse
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
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Invoice $invoice)
    {
        $invoice->delete();

        return redirect()->route('invoices.index');
    }

    public function addProduct(Invoice $invoice, DetailRequest $request)
    {
        $price = $request->input('price');
        $quantity = $request->input('quantity');
        $total = $price * $quantity;
        $vat = $total * 0.19;

        $invoice->products()->attach($request->input('product_id'), [
            'price' => $price,
            'quantity' => $quantity,
        ]);

        $invoice->vat += $vat;
        $invoice->total += $total;
        $invoice->total_with_vat += $total + $vat;

        $invoice->save();

        return redirect()->route('invoices.show', $invoice);
    }

    public function import(Request $request)
    {
        $file = $request->file('file');

        Excel::import(new InvoicesImport, $file);

        return back()->with('message', 'Invoice import succesfully');
    }

    public function orderSummary()
    {
        $payment = Payment::all();
        $invoice = Invoice::all();
        $customers = Customer::all();
        $products = Product::all();

        return view('partials.__order_summary', compact(  'customers', 'invoice', 'products', 'payment'));
    }
}

