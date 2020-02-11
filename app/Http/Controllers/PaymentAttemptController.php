<?php

namespace App\Http\Controllers;

use App\Invoice;
use App\PaymentAttempt;
use Dnetix\Redirection\Exceptions\PlacetoPayException;
use Dnetix\Redirection\PlacetoPay;
use Illuminate\Http\Request;


class PaymentAttemptController extends Controller
{
    public function store(Invoice $invoice, Request $request, PlacetoPay $placetopay)
    {
        //$paymentAttempt = PaymentAttempt::create();

        $reference = $invoice->id;
        $request = [
            'buyer' => [
                'name' => $invoice->customer->name,
                'surname' => $invoice->customer->last_name,
                'documentType' => $invoice->customer->document_type,
                'document' => $invoice->customer->document,
                'email' => $invoice->customer->email,
                'mobile' => $invoice->customer->phone,
            ],
            'payment' => [
                'reference' => $invoice->id,
                'description' => $invoice->sale_description,
                'amount' => [
                    'currency' => 'COP',
                    'total' => $invoice->total,
                ],
            ],
            'expiration' => date('c', strtotime('+2 days')),
            'returnUrl' => 'https://www.google.com',
            'ipAddress' => $request->ip(),
            'userAgent' => $request->header('user-agent'),
        ];

        $response = $placetopay->request($request);

        if ($response->isSuccessful()) {
            // STORE THE $response->requestId() and $response->processUrl() on your DB associated with the payment order
            // Redirect the client to the processUrl or display it on the JS extension
            /*$paymentAttempt->update([
                'invoice_id' => $invoice->id,
                'requestId' => $response->requestId(),
                'processUrl' => $response->processUrl(),
                'status' => $response->status(),
            ]);*/
           return redirect()->away($response->processUrl());
        } else {
            // There was some error so check the message and log it
            return $response->status()->message();
        }
    }

    /*public function information(Invoice $invoice, Request $request, PlacetoPay $placetoPay)
    {
        $response = $placetopay->query('THE_REQUEST_ID_TO_QUERY');

        if ($response->isSuccessful()) {
            // In order to use the functions please refer to the Dnetix\Redirection\Message\RedirectInformation class

            if ($response->status()->isApproved()) {
                // The payment has been approved
            }
        } else {
            // There was some error with the connection so check the message
            print_r($response->status()->message() . "\n");
        }
    }*/

}
