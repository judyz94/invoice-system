<?php

namespace App\Http\Controllers;

use App\Invoice;
use App\Payment;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Dnetix\Redirection\Exceptions\PlacetoPayException;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Dnetix\Redirection\PlacetoPay;
use Illuminate\View\View;

class PaymentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param Invoice $invoice
     * @param PlacetoPay $placetopay
     * @return RedirectResponse
     * @throws PlacetoPayException
     */
    public function store(Request $request, Invoice $invoice, PlacetoPay $placetopay)
    {
        $payment = Payment::create([
            'invoice_id' => $invoice->id,
            'amount' => $invoice->total_with_vat
        ]);

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
                    'city' => $invoice->customer->city->name,
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
            'expiration' => $invoice->due_date,
            'ipAddress' => $request->ip(),
            'userAgent' => $request->header('User-Agent'),
            'returnUrl' => route('payments.show', [$invoice, $payment]),
        ];
        $response = $placetopay->request($requestPayment);

        if ($response->isSuccessful()) {
            $payment->update([
                'invoice_id' => $invoice->id,
                'status' => $response->status()->status(),
                'message' => $response->status()->message(),
                'requestId' => $response->requestId(),
                'processUrl' => $response->processUrl(),
                'date' => $response->status()->date(),
            ]);
            return redirect($response->processUrl());
        } else {
            $response->status()->message();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Payment $payment
     * @param PlacetoPay $placetopay
     * @param Invoice $invoice
     * @return Factory|View
     */
    public function show(Invoice $invoice, Payment $payment, PlacetoPay $placetopay)
    {
        $response = $placetopay->query($payment->requestId);

        $payment->update([
            'status' => $response->status()->status(),
        ]);

        if ($payment->status == 'APPROVED') {
            $invoice->update([
                'state_id' => '3'
            ]);
            if (empty($invoice->receipt_date)) {
                $invoice->update([
                    'receipt_date' => $response->status()->date()
                ]);
            }
        }

        if ($payment->status == 'REJECTED') {
            $invoice->update([
                'state_id' => '4'
            ]);
        }

        if ($payment->status == 'PENDING') {
            $invoice->update([
                'state_id' => '5'
            ]);
        }

        return view('payments.show', compact('invoice', 'payment', 'response'));
        }

    /**
     * Display a listing of the resource.
     *
     * @param Invoice $invoice
     * @return Factory|View
     */
    public function payments(Invoice $invoice)
    {
        return view("payments.show", compact('invoice'));
    }

    public function downloadPDF(Invoice $invoice)
    {
        $payments = Payment::all();

        $data = [
            'title' => 'PaymentAttemptsPetFriends'
        ];

        $pdf = PDF::loadView('payments.payment_download', $data, compact('invoice', 'payments'));
        $pdf->setPaper('a4', 'landscape');

        return $pdf->download('PaymentAttemptsPetFriends.pdf');
    }
}

