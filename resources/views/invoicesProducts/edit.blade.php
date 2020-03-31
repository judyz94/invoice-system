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
                            <form id="form" action="{{ route('invoiceProduct.update', compact('invoice', 'product')) }}" method="post">
                            @csrf
                            @method('put')

                            <div class="row col-sm-10">
                                <div class="form-group col-md-4">
                                    <label for="">{{ __('Product name') }}</label>
                                    <input type="text" class="form-control" id="product_id" name="product_id" readonly="readonly"
                                           value="{{ $product->name }}">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="price">{{ __('Price') }}</label>
                                    <input type="number" class="form-control" id="price" name="price"
                                               value="{{ old('price', $product->pivot->price) }}">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="quantity">{{ __('Quantity') }}</label>
                                        <input type="number" class="form-control" id="quantity" name="quantity"
                                               value="{{ old('quantity', $product->pivot->quantity) }}">
                                </div>
                            </div>

                            <div class="card-footer d-flex justify-content-between">
                                <a href="{{ route('invoices.show', $invoice) }}" class="btn buttonCancel">
                                    <i class="fas fa-arrow-left"></i> {{ __('Cancel') }}
                                </a>
                                <button type="submit" class="btn buttonSave">
                                    <i class="fas fa-edit"></i> {{ __('Update') }}
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
