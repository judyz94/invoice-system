@extends ('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4 class="card-title"><strong>{{ __('New Details for Invoice') }} #{{ $invoice->code }}</strong></h4>
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
                            <form id="form" action="{{ route('invoiceProduct.store', [$invoice, $product]) }}" method="POST" id="invoicesProducts-form">
                                @csrf
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="invoice_id">{{ __('Invoice code') }}</label>
                                            <select class="form-control" id="invoice_id" name="invoice_id">
                                                <option value="">Select a invoice code</option>
                                                @foreach($invoices as $invoice)
                                                    <option value="{{ $invoice->id }}">{{ $invoice->code }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-10 product-line">
                                        <div class="input-group">
                                            <div id="productList"></div>
                                            <label for="product_id">{{ __('Product name') }}</label><br>
                                            <select class="form-control" id="product_id" name="product_id">
                                                <option value="">Select a product name</option>
                                                @foreach($products as $product)
                                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                                @endforeach
                                            </select>
                                            {{--<label for="name">Product name:</label><br>
                                            <input type="text" class="form-control" id="name" name="name" autocomplete="off" placeholder="Type a product name">--}}
                                            <label for="price">{{ __('Price') }}</label><br>
                                            <input type="text" class="form-control " id="price" name="price" placeholder="{{ __('Type a product price') }}" value="{{ old('price') }}">
                                            <label for="quantity">{{ __('Quantity') }}</label><br>
                                            <input type="text" class="form-control" id="quantity" name="quantity" placeholder="{{ __('Type a quantity') }}" value="{{ old('quantity') }}">
                                            <div class="input-group-btn">
                                                <button type="button" id="add" class="btn btn-success">+</button><br><br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-between">
                                    <a href="{{ route('invoices.index') }}" class="btn btn-danger">
                                        <i class="fas fa-arrow-left"></i> {{ __('Cancel') }}
                                    </a>
                                <button type="submit" class="btn btn-secondary"><i class="fas fa-save"></i> {{ __('Submit') }}</button>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('js/autocomplete.js') }}"></script>
    <script src="{{ asset('js/dinamicform.js') }}"></script>
@endpush
