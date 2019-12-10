@extends ('layouts.app')

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
