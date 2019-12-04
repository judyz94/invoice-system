@extends ('layouts.app')

@section('title')Create Invoice Details
@endsection
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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
                <div class="form-group">
                    <div class="col-sm-9">
                        <div class="input-group">
                            <label for="product_id">Product name:</label><br>
                            <select class="form-control" id="product_id" name="product_id[]">
                                <option value="">Select a product name</option>
                                @foreach($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                @endforeach
                            </select>
                            <label for="price">Price:</label><br>
                            <input type="text" class="form-control" id="price" name="price[]" placeholder="Type a product price" value="{{ old('price') }}">
                            <label for="quantity">Quantity:</label><br>
                            <input type="text" class="form-control" id="quantity" name="quantity[]" placeholder="Type a quantity" value="{{ old('quantity') }}">
                            <div class="input-group-btn">
                            <button type="button" class="btn btn-success">+</button><br><br>
                            </div>
                        </div>
                    </div>
                </div>
                <br><br><br>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
  <script type="text/javascript">
    $(document).ready(function(){
        var addButton = $('.btn-success');
        var wrapper = $('.col-sm-9');
        var fieldHTML = '<div class="input-group">' +
            '<label for="product_id">Product name:</label><select type="text" name="product_id[]" class="form-control"><option value="">Select a product name</option></select><span class="input-group-btn"></span>' +
            '<label for="price">Price:</label><input type="text" name="price[]" class="form-control"  placeholder="Type a product price"><span class="input-group-btn"></span>' +
            '<label for="quantity">Quantity:</label><input type="text" name="quantity[]" class="form-control" placeholder="Type a quantity"><div class="input-group-btn"><button type="button" id="btn-erase" class="btn btn-success">-</button></div></div><br>';
        $(addButton).click(function(){
            $(wrapper).append(fieldHTML);
        });
        $(wrapper).on('click', '#btn-erase', function(e){
            e.preventDefault();
            $(this).parent().parent().remove();
        });
    });
  </script>
@endsection
