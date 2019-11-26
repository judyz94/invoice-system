@extends ('layouts.app')

@section('title')Invoices
@endsection
@section('content')
    <div class="row">
        <div class="col">
            <h1>Invoices</h1><br>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a class="btn btn-primary" href="/invoices/create">Create a new invoice</a><br><br>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Expedition date</th>
                    <th>Due date</th>
                    <th>Receipt date</th>
                    <th>Seller</th>
                    <th>Sale description</th>
                    <th>Customer</th>
                    <th>Total</th>
                    <th>VAT</th>
                    <th>Total including VAT</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                @foreach($invoices as $invoice)
                    <tr>
                        <td><a href="/invoices/{{ $invoice->id }}">{{ $invoice->id }}</a></td>
                        <td>{{ $invoice->expedition_date }}</td>
                        <td>{{ $invoice->due_date }}</td>
                        <td>{{ $invoice->receipt_date }}</td>
                        <td>{{ $invoice->seller_id }}</td>
                        <td>{{ $invoice->sale_description }}</td>
                        <td>{{ $invoice->customer_id }}</td>
                        <td>{{ $invoice->total }}</td>
                        <td>{{ $invoice->vat }}</td>
                        <td>{{ $invoice->total_including_vat }}</td>
                        <td>{{ $invoice->status }}</td>
                        <td><a href="/invoices/{{ $invoice->id }}/invoicesProducts/create">Add Details</a></td>
                        <td><a href="/invoices/{{ $invoice->id }}/edit">Edit</a></td>
                        <td><a href="/invoices/{{ $invoice->id }}/confirmDelete">Delete</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

