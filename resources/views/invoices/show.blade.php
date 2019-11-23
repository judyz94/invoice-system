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
            <h3>Invoice no. {{ $invoice->code}}</h3><br>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h4>Invoice details</h4>
            <table class="table">
                @foreach($invoice->products as $product)
                    <tr>
                        <td>{{ $invoice->code }}</td>
                        <td>{{ $invoice->expedition_date }}</td>
                        <td>{{ $invoice->due_date }}</td>
                        <td>{{ $invoice->receipt_date }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->pivot->price }}</td>
                        <td>{{ $product->pivot->quantity }}</td>
                       <td>{{ $invoice->sale_description }}</td>
                       <td>{{ $invoice->total }}</td>
                       <td>{{ $invoice->vat }}</td>
                       <td>{{ $invoice->total_including_vat }}</td>
                       <td>{{ $invoice->status }}</td>

                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
