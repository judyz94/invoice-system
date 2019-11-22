@extends ('layouts.base')

@section('title')Customer
@endsection
@section('content')
    <div class="row">
        <div class="col">
            <br>
            <a class="btn btn-secondary" href="/invoices">Back to Customers</a><br><br>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h3>Customer {{ $invoice->name}}</h3><br>
        </div>
    </div>
    <div class="row">

    </div>
@endsection
