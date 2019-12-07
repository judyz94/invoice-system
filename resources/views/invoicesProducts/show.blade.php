@extends ('layouts.app')

@section('title')Product Details
@endsection
@section('content')
    <div class="row">
        <div class="col">
            <a class="btn btn-secondary" href="/products">Back to Products</a><br><br>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <br><h3><strong>Product #{{ $product->id}}</strong></h3><br>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h4>Invoice details</h4><br>
            <table class="table">
                @foreach($product->invoices as $invoice)
                    <tr>
                        <td>{{ $invoice->id }}</td>
                        <td>{{ $invoice->code }}</td>
                        <td>{{ $invoice->expedition_date }}</td>
                        <td>{{ $invoice->due_date }}</td>
                        <td>{{ $invoice->receipt_date }}</td>
                        <td>{{ $invoice->seller_id }}</td>
                        <td>{{ $invoice->sale_description }}</td>
                        <td>{{ $invoice->customer_id }}</td>
                        <td>{{ $invoice->total }}</td>
                        <td>{{ $invoice->vat }}</td>
                        <td>{{ $invoice->total_with_vat }}</td>
                        <td>{{ $invoice->status }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a class="btn btn-primary" href="/products/{{ $product->id }}/invoices/create">New invoice</a>
        </div>
    </div>
@endsection