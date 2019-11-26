@extends ('layouts.app')

@section('title')Create Product Details
@endsection
@section('content')
    <div class="row">
        <div class="col">
            <a class="btn btn-secondary" href="/products">Back to Invoices</a><br><br>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <br><h1>New Product Details</h1>
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
