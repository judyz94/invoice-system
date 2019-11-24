@extends ('layouts.base')

@section('title')Create Products
@endsection
@section('content')
    <div class="row">
        <div class="col">
            <br>
            <a class="btn btn-secondary" href="/products">Back to Products</a><br><br>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h1>New Product</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            {{ $error }}<br>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="/products" method="POST">
                @csrf
                <div class="form-group">
                    <select class="form-control" id="product_id" name="product_id">
                        @foreach($products as $product)
                            <option value="">Select a product name</option>
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                    <label for="price">Price:</label>
                    <input type="text" class="form-control" id="price" name="price" placeholder="Type a price" value="{{ old('price') }}">
                    <label for="quantity">Quantity:</label>
                    <input type="text" class="form-control" id="quantity" name="quantity" placeholder="Type a quantity" value="{{ old('quantity') }}">
                </div>
                <br>
                <button class="btn btn-primary" type="submit">Submit</button>
            </form>
        </div>
    </div>
@endsection
