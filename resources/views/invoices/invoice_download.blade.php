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
        <h4 class="card-title"><strong>{{ __('Invoice') }} {{ $invoice->code }}</strong></h4>
    </div>

    <ul>
        <li>{{ __('Code: ') }} {{ $invoice->code }}</li>
        <li>{{ __('Expedition date: ') }} {{ $invoice->expedition_date }}</li>
        <li>{{ __('Due date: ') }} {{ $invoice->due_date }}</li>
        @isset($invoice->receipt_date)
            <li>{{ __('Receipt date: ') }} {{ $invoice->receipt_date }}</li>
        @endisset
        <li>{{ __('Total: ') }} ${{ number_format($invoice->total, 2) }}</li>
        <li>{{ __('Total with VAT: ') }} ${{ number_format($invoice->total_with_vat, 2) }}</li>
        <li>{{ __('Seller: ') }} {{ $invoice->seller->full_name }}</li>
        <li>{{ __('Customer: ') }} {{ $invoice->customer->full_name }}</li>
        <li>{{ __('Status: ') }} {{ $invoice->state->name }}</li>
        <li>{{ __('Created by: ') }} {{ $invoice->user->name }}</li>
    </ul>
    <br>

    <!-- Details of the invoice -->
    <div class="table-responsive-xl">
        <table class="table table-hover">
            <thead class="thead-dark">
            <tr>
                <th>{{ __('Product #') }}</th>
                <th>{{ __('Product Name') }}</th>
                <th>{{ __('Unit Price') }}</th>
                <th>{{ __('Quantity') }}</th>
                <th>{{ __('Total Products') }}</th>
            </tr>
            </thead>

            <tbody>
            @foreach($invoice->products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>${{ number_format($product->pivot->price) }}</td>
                    <td>{{ $product->pivot->quantity }}</td>
                    <td>${{ number_format($acum = $product->pivot->price * $product->pivot->quantity) }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>
