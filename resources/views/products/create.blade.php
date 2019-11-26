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
                    <label for="price">Name:</label>
                    <input type="text" class="form-control" id="product" name="product" placeholder="Type a product name" value="{{ old('product') }}">
                </div>
                <br>
                <button class="btn btn-primary" type="submit">Submit</button>
            </form>
        </div>
    </div>
@endsection
