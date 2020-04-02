<?php

namespace App\Http\Controllers\Api;

use App\Actions\Invoices\StoreAction;
use App\Actions\Invoices\UpdateAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Invoice\StoreRequest;
use App\Http\Requests\Invoice\UpdateRequest;
use App\Invoice;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Response;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Invoice[]|Collection
     */
    public function index()
    {
        return Invoice::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRequest $request
     * @param Invoice $invoice
     * @param StoreAction $action
     * @return Response
     */
    public function store(StoreRequest $request, Invoice $invoice, StoreAction $action)
    {
        return $action->execute($invoice, $request);
    }

    /**
     * Display the specified resource.
     *
     * @param Invoice $invoice
     * @return Invoice
     */
    public function show(Invoice $invoice)
    {
        return $invoice;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param Invoice $invoice
     * @param UpdateAction $action
     * @return Response
     */
    public function update(UpdateRequest $request, Invoice $invoice, UpdateAction $action)
    {
        return $action->execute($invoice, $request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Invoice $invoice
     * @return void
     * @throws \Exception
     */
    public function destroy(Invoice $invoice)
    {
        $invoice->delete();
    }
}

