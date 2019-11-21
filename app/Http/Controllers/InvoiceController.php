<?php

namespace App\Http\Controllers;
use App\Http\Requests\validateInvoice;
use App\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index()
    {
        return view('invoices.index', [
            'invoices' => Invoice::all() ]);
    }

    public function create()
    {
        return view('invoices.create');
    }

    public function store(validateInvoice $request)
    {
        $invoice = new Invoice();
        $invoice->expedition_date = $request->get('expedition_date');
        $invoice->due_date = $request->get('due_date');
        $invoice->receipt_date = $request->get('receipt_date');
        $invoice->sale_description = $request->get('sale_description');
        $invoice->status = $request->get('status');
        $invoice->save();
        return redirect('/invoices');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $invoice = Invoice::findOrFail($id);
        return view('invoices.edit', [
            'invoice' => $invoice ]);
    }

    public function update(validateInvoice $request, $id)
    {
        $invoice = Invoice::findOrFail($id);
        $invoice->expedition_date = $request->get('expedition_date');
        $invoice->due_date = $request->get('due_date');
        $invoice->receipt_date = $request->get('receipt_date');
        $invoice->sale_description = $request->get('sale_description');
        $invoice->status = $request->get('status');
        $invoice->save();
        return redirect('/invoices');
    }

    public function destroy($id)
    {
        $invoice = Invoice::findOrFail($id);
        $invoice->delete();
        return redirect('/invoices');

    }

    public function confirmDelete($id)
    {
        $invoice = Invoice::findOrFail($id);
        return view('invoices.confirmDelete', [
        'invoice' => $invoice ]);
    }
}
