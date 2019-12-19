@extends ('layouts.base')

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
            <form action="{{ route('invoiceProduct.update', [$invoice, $product]) }}" method="POST" id="invoicesProducts-form">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="invoice_id">{{ __('Invoice code') }}</label>
                            <input class="form-control" id="invoice_id" name="invoice_id" readonly="readonly" value="{{ $invoice->code }}">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="product_id">{{ __('Product name') }}</label><br>
                            <input class="form-control" id="product_id" name="product_id" readonly="readonly" value="{{ $product->name }}">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="price">{{ __('Price') }}</label><br>
                            @foreach($invoice->products as $product)
                                <input type="text" class="form-control " id="price" name="price" placeholder="{{ __('Type a product price') }}" value="{{ old('price', $product->pivot->price) }}">
                            @endforeach
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                                <label for="quantity">{{ __('Quantity') }}</label><br>
                            @foreach($invoice->products as $product)
                                <input type="text" class="form-control" id="quantity" name="quantity" placeholder="{{ __('Type a quantity') }}" value="{{ old('quantity',  $product->pivot->quantity) }}">
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <a href="{{ route('invoices.show', $invoice) }}" class="btn btn-danger">
                        <i class="fas fa-arrow-left"></i> {{ __('Cancel') }}
                    </a>
                    <button type="submit" class="btn btn-secondary"><i class="fas fa-edit"></i> {{ __('Update') }} </button>
                </div>
            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
