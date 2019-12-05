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
            <br><h3><strong>New Details for Invoice #{{ $invoice->code }}</strong></h3><br>
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
            <form id="form" action="/invoices/{{ $invoice->id }}/products/" method="POST">
                @csrf
                <div class="form-group">
                    <label for="invoice_id">Invoice code:</label>
                    <select class="form-control" id="invoice_id" name="invoice_id">
                        <option value="">Select a invoice code</option>
                        @foreach($invoices as $invoice)
                            <option value="{{ $invoice->id }}">{{ $invoice->code }}</option>
                        @endforeach
                    </select>
                </div>
                    <div class="col-sm-10">
                        <div class="input-group">
                            {{--}}<label for="product_id">Product #:</label><br>
                            <input type="text" class="form-control" id="product_id" name="product_id" placeholder="Type a product number" value="{{ old('product_id') }}">--}}
                            <label for="name">Product name:</label><br>
                            <input type="text" class="form-control" id="name" name="name" autocomplete="off" placeholder="Type a product name">
                            <div id="productList"></div>
                            {{ csrf_field() }}
                            <label for="price">Price:</label><br>
                            <input type="text" class="form-control" id="price" name="price" placeholder="Type a product price" value="{{ old('price') }}">
                            <label for="quantity">Quantity:</label><br>
                            <input type="text" class="form-control" id="quantity" name="quantity" placeholder="Type a quantity" value="{{ old('quantity') }}">
                            <div class="input-group-btn">
                            <button type="button" class="btn btn-success">+</button><br><br>
                            </div>
                        </div>
                    </div>
                <br>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

    {{--<script src="{{ asset('js/autocomplete.js') }}"></script>
    <script src="{{ asset('js/dinamicform.js') }}"></script>--}}

@endsection
