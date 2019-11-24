@extends ('layouts.base')

@section('title')Invoice
@endsection
@section('content')
    <div class="row">
        <div class="col">
            <br>
            <a class="btn btn-secondary" href="/invoices">Back to Invoices</a><br><br>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h3>Invoice no. {{ $invoice->id}}</h3><br>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h4>Invoice details</h4>
            <table class="table">
                @foreach($invoice->products as $product)
                    <tr>
                        <td>{{ $product->product_id }}</td>
                        <td>{{ $product->pivot->price }}</td>
                        <td>{{ $product->pivot->quantity }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
