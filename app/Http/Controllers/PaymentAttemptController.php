<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class PaymentAttemptController extends Controller
{
    public function configuration()
    {
        $placetopay = new Dnetix\Redirection\PlacetoPay([
            'login' => '6dd490faf9cb87a9862245da41170ff2',
            'tranKey' => '024h1IlD',
            'url' => 'https://test.placetopay.com/reditection/',
        ]);
    }


}
