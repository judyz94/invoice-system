<?php

namespace App\Http\Controllers;

use App\Invoice;
use App\Payment;
use Illuminate\Http\Request;
use Dnetix\Redirection\PlacetoPay;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Invoice $invoice)
    {
        return view("invoice.payment.create", compact('invoice'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Invoice $invoice, PlacetoPay $placetopay)
    {
        $payment = Payment::create([
            'invoice_id' => $invoice->id,
            'amount' => $invoice->total_with_vat
        ]);
        if ($invoice->status == "Paid") {
            return redirect()->route('invoices.show', $invoice)->withErrors("La factura ya está pagada");
        }
        $requestPayment = [
            'buyer' => [
                'name' => $invoice->customer->name,
                'surname' => $invoice->customer->last_name,
                'email' => $invoice->customer->email,
                'documentType' => $invoice->customer->document_type,
                'document' => $invoice->customer->document,
                'mobile' => $invoice->customer->phone,
                'address' => [
                    'street' => $invoice->customer->address,
                ]
            ],
            'payment' => [
                'reference' => $invoice->code,
                'description' => $invoice->sale_description,
                'amount' => [
                    'currency' => 'COP',
                    'total' => $invoice->total_with_vat,
                ],
            ],
            'expiration' => date('c', strtotime('+2 days')),
            'ipAddress' => $request->ip(),
            'userAgent' => $request->header('User-Agent'),
            'returnUrl' => 'https://dnetix.co/p2p/client', //route('payments.update', $payment->id),
        ];

        $response = $placetopay->request($requestPayment);
        if ($response->isSuccessful()) {
            // STORE THE $response->requestId() and $response->processUrl() on your DB associated with the payment order
            $payment = Payment::where('id', $payment->id)->first();
            $payment->status = $response->status()->status();
            $payment->requestId = $response->requestId();
            $payment->processUrl = $response->processUrl();
            $payment->update();
            // Redirect the client to the processUrl or display it on the JS extension
            return redirect($response->processUrl());
        } else {
            // There was some error so check the message and log it
            $response->status()->message();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        return view("payments.show", compact('invoice'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Dnetix\Redirection\PlacetoPay $placetopay
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Payment $payment, PlacetoPay $placetopay)
    {
        $response = $placetopay->query($payment->requestId);
        $payment = Payment::where('id', $payment->id)->first();
        $payment->status = $response->status()->status();
        $payment->update();
        $invoice = Invoice::where('id', $payment->invoice_id)->first();
        if ($response->isSuccessful()) {
            $invoice->status = $response->status()->status();
            if ($response->status()->isApproved()) {
                $date = date("Y-m-d H:i:s", strtotime($response->status()->date()));
                if ($invoice->receipt_date == null) {
                    $invoice->receipt_date = $date;
                }
                $invoice->payment_date = $date;
                $payment->payment_date = $date;
                $payment->update();
            }
            $invoice->update();
        } else {
            $invoice->status = $response->status()->status();
            $invoice->receipt_date = null;
            $invoice->update();
        }
        return redirect()->route('payments.show', $invoice->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
