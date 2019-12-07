@extends ('layouts.app')

@section('title')Create Invoices
@endsection
@section('content')
    <div class="row">
        <div class="col">
            <br>
            <a class="btn btn-secondary" href="/invoices">Back to Invoices</a><br><br>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h1>New Invoice</h1>
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
            <form action="/invoices" method="POST">
                @csrf
                <div class="form-group">
                    <label for="product">Product:</label>
                    <select class="form-control" id="product_id" name="product_id">
                        @foreach($products as $product)
                            <option value="">Select product name</option>
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
                    </select>

                    <label for="price">Price:</label>
                    <input type="text" class="form-control" id="price" name="price" placeholder="Type a product price" value="{{ old('price') }}">
                    <label for="price">Quantity:</label>
                    <input type="text" class="form-control" id="quantity" name="quantity" placeholder="Type a product quantity" value="{{ old('quantity') }}">

                    <label for="expedition_date">Expedition date:</label>
                    <input type="text" class="form-control" id="expedition_date" name="expedition_date" placeholder="YYYY/MM/DD" value="{{ old('expedition_date') }}">
                    <label for="due_date">Due date:</label>
                    <input type="text" class="form-control" id="due_date" name="due_date" placeholder="YYYY/MM/DD" value="{{ old('due_date') }}">
                    <label for="receipt_date">Receipt date:</label>
                    <input type="text" class="form-control" id="receipt_date" name="receipt_date" placeholder="YYYY/MM/DD" value="{{ old('receipt_date') }}">
                    <label for="seller">Seller:</label>
                    <select class="form-control" id="seller_id" name="seller_id">
                        <option value="">Select seller document</option>
                        @foreach($sellers as $seller)
                            <option value="{{ $seller->id }}">{{ $seller->document }}</option>
                        @endforeach
                    </select>
                    <label for="sale_description">Sale description:</label>
                    <input type="text" class="form-control" id="sale_description" name="sale_description" placeholder="Type a sale description" value="{{ old('sale_description') }}">
                    <label for="customer">Customer:</label>
                    <select class="form-control" id="customer_id" name="customer_id">
                        <option value="">Select customer document</option>
                        @foreach($customers as $customer)
                            <option value="{{ $customer->id }}">{{ $customer->document }}</option>
                        @endforeach
                    </select>
                    <label for="status">Status:</label>
                    <select class="form-control" id="status" name="status">
                        <option value="">Select status</option>
                        <option value="sent" {{'status' == 'sent' ? 'selected' : '' }}>Sent</option>
                        <option value="rejected" {{'status'  == 'rejected' ? 'selected' : '' }}>Rejected</option>
                        <option value="overdue" {{ 'status'  == 'overdue' ? 'selected' : '' }}>Overdue</option>
                        <option value="paid" {{ 'status'  == 'paid' ? 'selected' : '' }}>Paid</option>
                        <option value="cancelled" {{ 'status'  == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                    </select>
                </div>
                <br>
                <button class="btn btn-primary" type="submit">Submit</button>
            </form>
        </div>
    </div>
@endsection
