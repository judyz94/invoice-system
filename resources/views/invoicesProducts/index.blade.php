@extends ('layouts.app')

@section('title')Invoice Details
@endsection
@section('content')
    <div class="row">
        <div class="col">
            <h1><strong>Invoice Details</strong></h1><br>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a class="btn btn-primary" href="/products/create">Create a new invoice details</a><br><br>
        </div>
    </div>
    <div class="row">
    <div class="col">
        <table class="table table-sm table-bordered">
            <thead>
            <tr>
                <th>Detail #</th>
                <th>Invoice #</th>
                <th>Product #</th>
                <th>Product name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Actions</th>
            </thead>
            <tbody>
            @foreach($invoice->products as $product)
                <tr>
                    <td>{{ $product->pivot->id }}</td>
                    <td>{{ $invoice->id }}</td>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->pivot->price }}</td>
                    <td>{{ $product->pivot->quantity }}</td>
                    <div class="btn-group">
                        <td>
                            <a class="btn btn-secondary btn-sm" href="/products/{{ $product->id }}/edit">Edit</a>
                            <a class="btn btn-secondary btn-sm" href="/products/{{ $product->id }}/confirmDelete">Delete</a>
                        </td>
                    </div>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
