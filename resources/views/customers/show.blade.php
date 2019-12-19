@extends ('layouts.base')

@section('content')
    <div class="container">
        <div class="col-md-12">
            <div class="row justify-content-center">
                <div class="card">
                    <div class="card-header pb-0">
                        <h3 class="card-title"><strong>{{ __('Customer ID') }}  {{ $customer->document }}</strong></h3>
                    </div>

                    <div class="card-body">
                    <dl class="row">
                        <dt class="col-md-3">{{ __('ID') }}</dt>
                        <dd class="col-md-3">{{ $customer->document }}</dd>

                        <dt class="col-md-3">{{ __('Full Name') }}</dt>
                        <dd class="col-md-3">{{ $customer->name }}</dd>

                        <dt class="col-md-3">{{ __('Email') }}</dt>
                        <dd class="col-md-3">{{ $customer->email }}</dd>

                        <dt class="col-md-3">{{ __('Phone') }}</dt>
                        <dd class="col-md-3">{{ $customer->phone }}</dd>

                        <dt class="col-md-3">{{ __('City') }}</dt>
                        <dd class="col-md-3">{{ $customer->city->name }}</dd>

                        <dt class="col-md-3">{{ __('Address') }}</dt>
                        <dd class="col-md-3">{{ $customer->address }}</dd>
                    </dl>

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
                                            <th style="width:100px">{{ __('Actions') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($customer->invoices as $invoice)
                                            <tr>
                                                <td>{{ $invoice->code }}</td>
                                                <td>{{ $invoice->expedition_date }}</td>
                                                <td>{{ $invoice->due_date }}</td>
                                                <td>{{ $invoice->receipt_date }}</td>
                                                <td>{{ $invoice->sale_description }}</td>
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
                                        <a href="{{ route('customers.index') }}" class="btn btn-secondary">
                                            <i class="fas fa-arrow-left"></i> {{ __('Back to Customers') }}
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
