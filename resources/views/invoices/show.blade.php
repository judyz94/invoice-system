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
            <br><h3><strong>Invoice #{{ $invoice->code}}</strong></h3><br>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h4>Details</h4>
            <table class="table">
                <thead>
                <tr>
                    <th>Detail #</th>
                    <th>Product name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Seller</th>
                    <th>Customer</th>
                    <th>Total</th>
                    <th>VAT</th>
                    <th>Total including VAT</th>
                    <th>Status</th>
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
                        <td><a class="btn btn-primary" href="/invoices/{{ $invoice->id }}/invoicesProducts/edit">Edit Details</a></td>
                        <td>{{ $invoice->total_including_vat }}</td>
                        <td>{{ $invoice->status }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
