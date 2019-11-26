@extends ('layouts.base')

@section('title')Products
@endsection
@section('content')
    <div class="row">
        <div class="col">
            <h1>Products</h1><br>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a class="btn btn-primary" href="/products/create">Create a new product</a><br><br>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table">
                @foreach($products as $product)
                    <tr>
                        <td><a href="/products/{{ $product->id }}">{{ $product->id }}</a></td>
                            <td>{{ $product->name }}</td>
                        <td><a href="/products/{{ $product->id }}/edit">Edit</a></td>
                        <td><a href="/products/{{ $product->id }}/confirmDelete">Delete</a></td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
