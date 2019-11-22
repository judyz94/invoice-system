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
    </div>
@endsection
