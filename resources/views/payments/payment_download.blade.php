<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title class="font-title">{{ ('Pet Friends S.A.') }}</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
    <div class="card-header d-flex">
        <h1 class="card-title text-center"><strong>{{ __('Pet Friends S.A.') }}</strong></h1>
    </div>

    <div class="card-header d-flex">
        <h4 class="card-title"><strong>{{ __('Invoice payments attempts #') }}{{ $invoice->code }}</strong></h4>
    </div>

    <!-- Details of the invoice -->
    <div class="table-responsive-xl">
        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
            <tr>
                <th style="width:120px">{{ __('Transaction #') }}</th>
                <th>{{ __('Invoice code') }}</th>
                <th>{{ __('Payment attempt date') }}</th>
                <th>{{ __('Status') }}</th>
                <th>{{ __('Message') }}</th>
                <th>{{ __('Amount') }}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($invoice->payments as $payment)
                <tr>
                    <td>{{ $payment->requestId }}</td>
                    <td>{{ $payment->invoice->code }}</td>
                    <td>{{ $payment->date }}</td>
                    <td>{{ $payment->status}}</td>
                    <td>{{ $payment->message}}</td>
                    <td>${{number_format($payment->amount, 2 )}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>
