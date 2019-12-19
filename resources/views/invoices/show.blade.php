@extends ('layouts.base')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3 class="card-title"><strong>{{ __('Details Invoice') }} #{{ $invoice->code }}</strong></h3>
                </div>
                    <div class="table-responsive-lg">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>{{ __('Product #') }}</th>
                                <th>{{ __('Product Name') }}</th>
                                <th>{{ __('Price') }}</th>
                                <th>{{ __('Quantity') }}</th>
                                <th>{{ __('Total') }}</th>
                                <th>{{ __('Actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($invoice->products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>${{ number_format($product->pivot->price) }}</td>
                                    <td>{{ $product->pivot->quantity }}</td>
                                    <td>${{ number_format($invoice->total = $product->pivot->price * $product->pivot->quantity) }}</td>
                                    <td>
                                        <div class="btn-group btn-group-sm" role="group" aria-label="{{ __('Actions') }}">
                                            <a href="{{ route('invoiceProduct.edit', [$invoice, $product]) }}" class="btn btn-link" title="{{ __('Edit Detail') }}">
                                                <i class="fas fa-edit" style="color:black"></i>
                                            </a>
                                            <button type="button" class="btn btn-link text-danger" data-route="{{ route('invoiceProduct.destroy', [$invoice, $product]) }}" data-toggle="modal" data-target="#confirmDeleteModal" title="{{ __('Delete Detail') }}">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="card-body">
                            <div class="card-title">Add a new product to this invoice</div>
                            <form action="{{ route('invoices.products.store', $invoice) }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="product_id">Product</label>
                                        <select class="custom-select" name="product_id" id="product_id" required>
                                            <option value="">Please select a product</option>
                                            @foreach($products as $product)
                                                <option value="{{$product->id}}" {{ old('product_id') == $product->id ? 'selected' : ''}}>{{$product->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="product_price">Price</label>
                                        <input class="form-control" type="number" id="product_price" value="{{ old('product_price') }}" placeholder="100" name="product_price" required>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="product_quantity">QTY</label>
                                        <input class="form-control" type="number" id="product_quantity" value="{{ old('product_quantity') }}" placeholder="1" name="product_quantity" required>
                                    </div>
                                </div>
                                <button class="btn btn-success btn-block col-md-1" type="submit">Add</button>
                            </form>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <a href="{{ route('invoices.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> {{ __('Back to Invoice Details') }}
                            </a>
                            <a href="{{ route('invoiceProduct.create', [$invoice, $product]) }}" class="btn btn-success">
                                <i class="fas fa-plus"></i>  {{ __('Add New Detail') }}
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('modals')
    @include('partials.__confirm_delete_modal')
@endpush
@push('scripts')
    <script src="{{ asset(mix('js/delete-modal.js')) }}"></script>
@endpush
