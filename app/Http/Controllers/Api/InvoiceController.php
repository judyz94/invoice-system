<?php

namespace App\Http\Controllers\Api;

use App\Actions\Invoices\StoreAction;
use App\Actions\Invoices\UpdateAction;
use App\Http\Requests\Invoice\StoreRequest;
use App\Http\Requests\Invoice\UpdateRequest;
use App\Invoice;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class InvoiceController extends Controller
{
    public $successStatus = 200;

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $invoice = Invoice::all();

        return response()->json([
            'success' => $invoice],
            $this-> successStatus);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRequest $request
     * @param Invoice $invoice
     * @param StoreAction $action
     * @return JsonResponse
     */
    public function store(StoreRequest $request, Invoice $invoice, StoreAction $action)
    {
        return response()->json([
            'message' => 'Invoice successfully created.',
            'success' => $action->execute($invoice, $request)],
            $this-> successStatus);
    }

    /**
     * Display the specified resource.
     *
     * @param Invoice $invoice
     * @return JsonResponse
     */
    public function show(Invoice $invoice)
    {
        return response()->json([
            'success' => $invoice],
            $this-> successStatus);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param Invoice $invoice
     * @param UpdateAction $action
     * @return JsonResponse
     */
    public function update(UpdateRequest $request, Invoice $invoice, UpdateAction $action)
    {
        return response()->json([
            'message' => 'Invoice successfully updated.',
            'success' => $action->execute($invoice, $request)],
            $this-> successStatus);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Invoice $invoice
     * @return JsonResponse
     * @throws \Exception
     */
    public function destroy(Invoice $invoice)
    {
        $invoice->delete();

        return response()->json([
            'message' => 'Invoice successfully deleted.'],
            $this-> successStatus);
    }
}

