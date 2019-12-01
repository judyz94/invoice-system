@extends ('layouts.app')

@section('title')Create Invoice Details
@endsection
@section('content')
    <div class="row">
        <div class="col">
            <a class="btn btn-secondary" href="/invoices">Back to Invoices</a><br><br>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <br><h3><strong>New Invoice Details</strong></h3><br>
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
            <form action="/invoicesProducts" method="POST">
                @csrf
                <div class="form-group">
                    <label for="invoice_id">Invoice code:</label>
                    <select class="form-control" id="invoice_id" name="invoice_id">
                        <option value="">Select a invoice code</option>
                        @foreach($invoices as $invoice)
                            <option value="{{ $invoice->id }}">{{ $invoice->code }}</option>
                        @endforeach
                    </select>
                    <label for="product_id">Product name:</label>
                    <select class="form-control" id="product_id" name="product_id">
                        <option value="">Select a product name</option>
                        @foreach($products as $product)
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                    <label for="price">Price:</label>
                    <input type="text" class="form-control" id="price" name="price" placeholder="Type a product price" value="{{ old('price') }}">
                    <label for="quantity">Quantity:</label>
                    <input type="text" class="form-control" id="quantity" name="quantity" placeholder="Type a quantity" value="{{ old('quantity') }}">
                </div>
                <br>
                <button class="btn btn-primary" type="submit">Submit</button>
            </form>
        </div>
    </div>
@endsection
