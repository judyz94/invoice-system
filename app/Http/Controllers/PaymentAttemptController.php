<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class PaymentAttemptController extends Controller
{
    public function index()
    {
        $placetopay = new Dnetix\Redirection\PlacetoPay([
            'login' => '6dd490faf9cb87a9862245da41170ff2',
            'tranKey' => '024h1IlD',
            'url' => 'https://test.placetopay.com/reditection/',
        ]);

    }

    public function store()
    {
        $reference = $invoice->id;
        $request = [
        'payment' => [
        'reference' => $invoice->id,
        'description' => 'Testing payment',
        'amount' => [
            'currency' => 'USD',
            'total' => 120,
        ],
    ],
    'expiration' => date('c', strtotime('+2 days')),
    'returnUrl' => 'http://example.com/response?reference=' . $reference,
    'ipAddress' => '127.0.0.1',
    'userAgent' => 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36',
        ];
$response = $placetopay->request($request);
if ($response->isSuccessful()) {
    // STORE THE $response->requestId() and $response->processUrl() on your DB associated with the payment order
    // Redirect the client to the processUrl or display it on the JS extension
    header('Location: ' . $response->processUrl());
} else {
    // There was some error so check the message and log it
    $response->status()->message();
}
    }


}
