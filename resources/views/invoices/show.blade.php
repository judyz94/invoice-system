@extends ('layouts.app')

@section('title')Invoice
@endsection
@section('content')
    <div class="row">
        <div class="col">
            <a class="btn btn-secondary" href="/invoices">Back to Invoices</a><br><br>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <br><h3>Invoice # {{ $invoice->code}}</h3><br>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h4>Invoice details</h4>
            <table class="table">
                <thead>
                <tr>
                    <th>Product #</th>
                    <th>Product name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Seller</th>
                    <th>Customer</th>
                    <th>Total</th>
                    <th>VAT</th>
                    <th>Created by</th>
                </tr>
                </thead>
                <tbody>
                @foreach($invoice->products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->pivot->price }}</td>
                        <td>{{ $product->pivot->quantity }}</td>
                        <td>{{ $invoice->seller_id }}</td>
                        <td>{{ $invoice->customer_id }}</td>
                        <td>{{ $invoice->total }}</td>
                        <td>{{ $invoice->vat }}</td>
                        <td>{{ $invoice->user_id }}</td>
                        <td><a class="btn btn-primary btn-sm" href="/invoicesProducts/{{ $invoice->id }}/edit">Edit Details</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
