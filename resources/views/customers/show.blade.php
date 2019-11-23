@extends ('layouts.base')

@section('title')Customer
@endsection
@section('content')
    <div class="row">
        <div class="col">
            <br>
            <a class="btn btn-secondary" href="/customers">Back to Customers</a><br><br>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h3>Customer {{ $customer->name}}</h3><br>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h4>Register</h4>
            <table class="table">
                @foreach($customer->invoices as $invoice)
                    <tr>
                        <td>{{ $invoice->code }}</td>
                        <td>{{ $invoice->expedition_date }}</td>
                        <td>{{ $invoice->due_date }}</td>
                        <td>{{ $invoice->receipt_date }}</td>
                        <td>{{ $invoice->sale_description }}</td>
                        <td>{{ $invoice->status }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
