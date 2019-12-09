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
            <h4>Invoice details</h4>
            <table class="table table-sm table-bordered">
                <thead>
                <tr>
                    <th>Product #</th>
                    <th>Product name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($invoice->products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>${{ number_format($product->pivot->price, 2) }}</td>
                        <td>{{ $product->pivot->quantity }}</td>
                        <td>${{ number_format($invoice->total = $product->pivot->price * $product->pivot->quantity) }}</td>
                        <div class="btn-group">
                            <td>
                                <a class="btn btn-secondary btn-sm" href="/invoices/{{ $invoice->id }}/products/{{ $product->id }}/edit ">Edit Detail</a>
                                <a class="btn btn-secondary btn-sm" href="/invoices/{{ $invoice->id }}/products/{{ $product->id }}/confirmDelete">Delete Detail</a>
                            </td>
                        </div>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
