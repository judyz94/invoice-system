@extends ('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4 class="card-title"><strong>{{ __('Seller ID') }}  {{ $seller->document }}</strong></h4>
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
                        <div class="row">
                            <div class="col-md-12">
                                <h5>Associated invoices</h5>
                                <div class="table-responsive-xl">
                                    <table class="table table-hover" style="width:100%">
                                        <thead>
                                        <tr>
                                            <th style="width:50px">{{ __('Code') }}</th>
                                            <th style="width:120px">{{ __('Expedition date') }}</th>
                                            <th style="width:120px">{{ __('Due date') }}</th>
                                            <th style="width:120px">{{ __('Receipt date') }}</th>
                                            <th style="width:100px">{{ __('Sale description') }}</th>
                                            <th style="width:120px">{{ __('Total with VAT') }}</th>
                                            <th style="width:100px">{{ __('Seller ID') }}</th>
                                            <th style="width:100px">{{ __('Customer ID') }}</th>
                                            <th style="width:50px">{{ __('Status') }}</th>
                                            <th style="width:100px">{{ __('Created by') }}</th>
                                            <th style="width:100px" >{{ __('Actions') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($seller->invoices as $invoice)
                                            <tr>
                                                <td>{{ $invoice->code }}</td>
                                                <td>{{ $invoice->expedition_date }}</td>
                                                <td>{{ $invoice->due_date }}</td>
                                                <td>{{ $invoice->receipt_date }}</td>
                                                <td>{{ $invoice->sale_description }}</td>
                                                <td>{{ $invoice->total }}</td>
                                                <td>{{ $invoice->total_with_vat }}</td>
                                                <td>{{ $invoice->seller->document }}</td>
                                                <td>{{ $invoice->customer->document }}</td>
                                                <td>{{ $invoice->status }}</td>
                                                <td>{{ $invoice->user->name }}</td>
                                                <td class="text-right">
                                                    <div class="btn-group btn-group-sm" role="group" aria-label="{{ __('Actions') }}">
                                                        <a href="{{ route('invoiceProduct.create', [$invoice, $product]) }}" class="btn btn-link" title="{{ __('Add Details') }}">
                                                            <i class="fas fa-plus" style="color:limegreen"></i>
                                                        </a>
                                                        <a href="{{ route('invoices.show', $invoice) }}" class="btn btn-link" title="{{ __('Show Details') }}">
                                                            <i class="fas fa-eye" style="color:black"></i>
                                                        </a>
                                                        <a href="{{ route('invoices.edit', $invoice) }}" class="btn btn-link" title="{{ __('Edit Invoice') }}">
                                                            <i class="fas fa-edit" style="color:black"></i>
                                                        </a>
                                                        <button type="button" class="btn btn-link text-danger" data-route="{{ route('invoices.destroy', $invoice) }}" data-toggle="modal" data-target="#confirmDeleteModal" title="{{ __('Delete Invoice') }}">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <div class="card-footer d-flex justify-content-between">
                                        <a href="{{ route('sellers.index') }}" class="btn btn-secondary">
                                            <i class="fas fa-arrow-left"></i> {{ __('Back to Sellers') }}
                                        </a>
                                        <a href="{{ route('invoices.create') }}" class="btn btn-success">
                                            <i class="fas fa-plus"></i>  {{ __('Associate New Invoice') }}
                                        </a>
                                    </div>
                                </div>
                            </div>
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
