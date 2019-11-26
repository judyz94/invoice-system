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
            <br><h3>Invoice # {{ $invoice->id}}</h3><br>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h4>Invoice details</h4>
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Product name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                </tr>
                </thead>
                <tbody>
                @foreach($invoice->products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->pivot->price }}</td>
                        <td>{{ $product->pivot->quantity }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a class="btn btn-primary" href="/invoices/{{ $invoice->id }}/products/edit">Edit Product Details</a>
        </div>
    </div>
@endsection
