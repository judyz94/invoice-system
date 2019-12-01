@extends ('layouts.app')

@section('title')Products
@endsection
@section('content')
    <div class="row">
        <div class="col">
            <h1><strong>Product Details</strong></h1><br>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a class="btn btn-primary" href="/invoicesProducts/create">Create a new product details</a><br><br>
        </div>
    </div>
    <div class="row">
    <div class="col">
        <table class="table table-sm table-bordered">
            <thead>
            <tr>
                <th>Product #</th>
                <th>Product name</th>
                <th>Actions</th>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <div class="btn-group">
                        <td>
                            <a class="btn btn-secondary btn-sm" href="/invoicesProducts/{{ $product->id }}/edit">Edit</a>
                            <a class="btn btn-secondary btn-sm" href="/invoicesProducts/{{ $product->id }}/confirmDelete">Delete</a>
                        </td>
                    </div>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
