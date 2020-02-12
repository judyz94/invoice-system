@extends ('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4 class="card-title"><strong>{{ __('New Details for Invoice') }}
                                #{{ $invoice->code }}</strong></h4>
                    </div>

                    <div class="card-body">
                        <form id="form" action="{{ route('invoices.products.store', $invoice) }}" method="post"
                              id="invoicesProducts-form">
                            @csrf
                            <div class="row col-sm-10">

                                <div class="form-group col-md-4">
                                    <label for="">{{ __('Product name') }}</label><br>
                                    <select class="custom-select" id="product_id" name="product[1][id]">
                                        <option value="">{{ __('Select a product name') }}</option>
                                        @foreach($products as $product)
                                            <option value="{{ $product->id }}"
                                                {{ old('product_id')[0] == $product->id ? 'selected' : '' }}>{{ $product->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="">{{ __('Price') }}</label><br>
                                    <input type="number" class="form-control" id="price" name="product[1][price]"
                                           placeholder="{{ __('Type a product price') }}" value="{{ old('price')[0] }}">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="quantity">{{ __('Quantity') }}</label><br>
                                    <input type="number" class="form-control" id="quantity" name="product[1][quantity]"
                                           placeholder="{{ __('Type a quantity') }}" value="{{ old('quantity')[0] }}">
                                </div>


                                <div class="input-group-btn">
                                    <button type="button" id="add" class="btn btn-sm btn-success"><i
                                            class="fas fa-fw fa-plus"></i></button>
                                    <br><br>
                                </div>
                            </div>

                            <div class="card-footer d-flex justify-content-between">
                                <a href="{{ route('invoices.index') }}" class="btn btn-danger">
                                    <i class="fas fa-arrow-left"></i> {{ __('Cancel') }}
                                </a>
                                <button type="submit" class="btn btn-secondary"><i
                                        class="fas fa-save"></i> {{ __('Submit') }}
                                </button>
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

