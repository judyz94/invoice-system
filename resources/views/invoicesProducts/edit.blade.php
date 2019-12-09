@extends ('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4 class="card-title"><strong>{{ __('Edit Detail of Invoice') }} #{{ $invoice->code }}</strong></h4>
                    </div>
                    <div class="card-body">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        {{ $error }}
                                    @endforeach
                                </ul>
                            </div>
                        @endif
            <form action="{{ route('invoiceProduct.update', [$invoice, $product]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="invoice_id">{{ __('Invoice code') }}</label>
                            <select class="form-control" id="invoice_id" name="invoice_id">
                                @foreach($invoices as $invoice)
                                    <option value="{{ $invoice->id }}" {{ old('invoice_id', $invoice->invoice_id) == $invoice->id ? 'selected' : ''}}>{{ $invoice->code }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-10">
                        <div class="form-group">
                            <div id="productList"></div>
                            <label for="product_id">{{ __('Product name') }}</label><br>
                            <select class="form-control" id="product_id" name="product_id">
                                @foreach($products as $product)
                                    <option value="{{ $product->id }}" {{ old('product_id', $product->product_id) == $product->id ? 'selected' : ''}}>{{ $product->name }}</option>
                                @endforeach
                            </select>
                            {{--<label for="name">Product name:</label><br>
                            <input type="text" class="form-control" id="name" name="name" autocomplete="off" placeholder="Type a product name">--}}
                            @foreach($invoice->products as $product)
                            <label for="price">{{ __('Price') }}</label><br>
                            <input type="text" class="form-control " id="price" name="price" placeholder="{{ __('Type a product price') }}" value="{{ old('price', $product->pivot->price) }}">
                            <label for="quantity">{{ __('Quantity') }}</label><br>
                            <input type="text" class="form-control" id="quantity" name="quantity" placeholder="{{ __('Type a quantity') }}" value="{{ old('quantity',  $product->pivot->quantity) }}">
                            @endforeach
                            <div class="input-group-btn"><br>
                                <button type="button" class="btn btn-success">+</button><br><br>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <a href="{{ route('invoices.index') }}" class="btn btn-danger">
                        <i class="fas fa-arrow-left"></i> {{ __('Cancel') }}
                    </a>
                    <button type="submit" class="btn btn-secondary"><i class="fas fa-edit"></i> {{ __('Update') }}</button>
                </div>
            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
