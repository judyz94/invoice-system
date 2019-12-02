@extends ('layouts.app')

@section('title')Invoices
@endsection
@section('content')
    <div class="row">
        <div class="col">
            <h1><strong>Invoices</strong></h1><br>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a class="btn btn-primary" href="/invoices/create">Create a new invoice</a><br><br>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table table-sm table-bordered">
                <thead>
                <tr>
                    <th>Code</th>
                    <th>Expedition date</th>
                    <th>Due date</th>
                    <th>Receipt date</th>
                    <th>Sale description</th>
                    <th>Total</th>
                    <th>Total VAT</th>
                    <th>Seller</th>
                    <th>Customer</th>
                    <th>Status</th>
                    <th>Created by</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($invoices as $invoice)
                    <tr>
                        <td><a href="/invoices/{{ $invoice->id }}">{{ $invoice->code }}</a></td>
                        <td>{{ $invoice->expedition_date }}</td>
                        <td>{{ $invoice->due_date }}</td>
                        <td>{{ $invoice->receipt_date }}</td>
                        <td>{{ $invoice->sale_description }}</td>
                        <td>{{ $invoice->total }}</td>
                        <td>{{ $invoice->total_with_vat }}</td>
                        <td>{{ $invoice->seller->document }}</td>
                        <td>{{ $invoice->customer->document }}</td>
                        <td>{{ $invoice->status }}</td>
                        <td>{{ $invoice->user->name }}</td>
                        <div class="btn-group">
                            <td>
                            <a class="btn btn-primary btn-sm" href="/invoices/{{ $invoice->id }}/products/create">Add Details</a>
                            <a class="btn btn-secondary btn-sm" href="/invoices/{{ $invoice->id }}/edit">Edit</a>
                            <a class="btn btn-secondary btn-sm" href="/invoices/{{ $invoice->id }}/confirmDelete">Delete</a>
                            </td>
                        </div>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

