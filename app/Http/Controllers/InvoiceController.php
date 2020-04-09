<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Invoice;
use App\Payment;
use App\Product;
use App\Seller;
use App\State;
use App\User;
use Carbon\Carbon;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\Invoice\StoreRequest;
use App\Http\Requests\Invoice\UpdateRequest;
use App\Http\Requests\InvoiceProduct\DetailRequest;
use App\Imports\InvoicesImport;
use Illuminate\Support\Facades\Cache;
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
        $this->middleware('can:invoices.index')->only(['index']);
        $this->middleware('can:invoices.create')->only(['create', 'store']);
        $this->middleware('can:invoices.edit')->only(['edit', 'update']);
        $this->middleware('can:invoices.show')->only(['show']);
        $this->middleware('can:invoices.destroy')->only(['destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @param Invoice $invoice
     * @return Factory|View
     */
    public function index(Request $request, Invoice $invoice)
    {
        $filter = $request->input('filter');
        $search = $request->input('search');

        $invoices = Invoice::with(['customer', 'seller'])
            ->searchfor($filter, $search)
            ->paginate(8);

        return view('invoices.index', compact( 'invoices', 'filter', 'search', 'invoice', 'invoices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Invoice $invoice
     * @return Factory|View
     */
    public function create(Invoice $invoice)
    {
        $states = State::all();
        $customers = Customer::all();
        $sellers = Seller::all();
        $users = User::all();

        $invoice = new Invoice();

        return view('invoices.create', compact('states', 'sellers', 'customers', 'users', 'invoice'));
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
        $invoice->state_id = $request->input('state_id');
        $invoice->user_id = auth()->user()->id;

        $invoice->save();

        $invoice->update([
            'code' => 'A' . str_pad($invoice->id, 4, 0, STR_PAD_LEFT),
        ]);

        return redirect()->route('invoices.show', $invoice)->with('info', 'Invoice successfully created.');
    }

    /**
     * Display the specified resource.
     *
     * @param Invoice $invoice
     * @param Product $product
     * @return Factory|View
     */
    public function show(Invoice $invoice, Product $product)
    {
        $states = State::all();
        $customers = Customer::all();
        $sellers = Seller::all();
        $users = User::all();
        $payment = Payment::all(); ///

        $detail = $invoice->products()->exists($product);

        $now = Carbon::now();

        $products = Product::whereNotIn('id', $invoice->products->pluck('id')->values())->get();

        Cache::forget('invoice_products');

        return view('invoices.show', compact( 'states', 'sellers', 'customers', 'users', 'invoice', 'products', 'detail', 'payment', 'now'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Invoice $invoice
     * @return Factory|View
     */
    public function edit(Invoice $invoice)
    {
        $states = State::all();
        $customers = Customer::all();
        $sellers = Seller::all();
        $users = User::all();

        return view('invoices.edit', compact( 'states', 'sellers', 'customers', 'users', 'invoice'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param Invoice $invoice
     * @return RedirectResponse
     * @throws Exception
     */
    public function update(UpdateRequest $request, Invoice $invoice)
    {
        $invoice->expedition_date = $request->input('expedition_date');
        $invoice->due_date = $request->input('due_date');
        $invoice->receipt_date = $request->input('receipt_date');
        $invoice->seller_id = $request->input('seller_id');
        $invoice->sale_description = $request->input('sale_description');
        $invoice->customer_id = $request->input('customer_id');
        $invoice->state_id = $request->input('state_id');

        $invoice->user_id = auth()->user()->id;

        $invoice->save();

        return redirect()->route('invoices.index')->with('info', 'Invoice successfully updated.');
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

        return redirect()->route('invoices.index')->with('info', 'Invoice successfully deleted.');
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

        return redirect()->route('invoices.show', $invoice)->with('info', 'Detail successfully created.');
    }

    public function import(Request $request)
    {
        $file = $request->file('file');

        Excel::import(new InvoicesImport, $file);

        return view('invoices.index', compact( 'file'))->with('info', 'Invoices successfully imported.');
    }

    public function orderSummary()
    {
        $invoice = Invoice::all();
        $customers = Customer::all();
        $products = Product::all();

        return view('partials.__order_summary', compact(  'customers', 'invoice', 'products'));
    }

    public function overdueInvoice()
    {
        $invoice = Invoice::all();

        return view('partials.__overdue_invoice', compact(  'invoice'));
    }

    public function invoiceProduct()
    {
        $invoice = Invoice::all();

        return view('partials.__invoice_product', compact(  'invoice'));
    }

    public function pendingPayment()
    {
        $invoice = Invoice::all();

        return view('partials.__pending_payment', compact(  'invoice'));
    }
}

