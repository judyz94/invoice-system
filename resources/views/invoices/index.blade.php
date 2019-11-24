@extends ('layouts.base')

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
                @foreach($invoices as $invoice)
                    <tr>
                        <td><a href="/invoices/{{ $invoice->id }}">{{ $invoice->id }}</a></td>
                        <td><a href="/invoices/{{ $invoice->id }}/edit">Edit</a></td>
                        <td><a href="/invoices/{{ $invoice->id }}/confirmDelete">Delete</a></td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection

