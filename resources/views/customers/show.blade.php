@extends ('layouts.base')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-14">
                <div class="card shadow-sm">
                    <div class="card-header pb-0">
                        <h4 class="card-title"><strong>{{ __('Customer') }}
                                {{ $customer->name }}</strong></h4>
                    </div>

                    <!-- Customer detail information -->
                    <div class="card-body">
                    <dl class="row">
                        <dt class="col-md-3">{{ __('ID') }}</dt>
                        <dd class="col-md-3">{{ $customer->document }}</dd>

                        <dt class="col-md-3">{{ __('Name') }}</dt>
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

                        <!-- Details of the associated invoices -->
                        <div class="row">
                            <div class="col-md-12">
                                <br><h5><strong>{{ __('Associated invoices') }}</strong></h5>
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>{{ __('Code') }}</th>
                                        <th>{{ __('Expedition date') }}</th>
                                        <th>{{ __('Due date') }}</th>
                                        <th>{{ __('Receipt date') }}</th>
                                        <th>{{ __('Sale description') }}</th>
                                        <th>{{ __('Total') }}</th>
                                        <th>{{ __('Total with VAT') }}</th>
                                        <th>{{ __('Seller') }}</th>
                                        <th>{{ __('Customer') }}</th>
                                        <th>{{ __('Created by') }}</th>
                                        <th>{{ __('Status') }}</th>
                                        <th>{{ __('Actions') }}</th>
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
                                                <td>${{ number_format($invoice->total, 2) }}</td>
                                                <td>${{ number_format($invoice->total_with_vat, 2) }}</td>
                                                <td>{{ $invoice->seller->name }}</td>
                                                <td>{{ $invoice->customer->name }}</td>
                                                <td>{{ $invoice->user->name }}</td>
                                                <td><h5>
                                                        @if($invoice->status == 'New')<span class="badge badge-secondary">{{ __('New') }}</span>@endif
                                                        @if($invoice->status == 'Sent')<span class="badge badge-primary">{{ __('Sent') }}</span>@endif
                                                        @if($invoice->status == 'Overdue')<span class="badge badge-danger">{{ __('Overdue') }}</span>@endif
                                                        @if($invoice->status == 'Paid')<span class="badge badge-success">{{ __('Paid') }}</span>@endif
                                                        @if($invoice->status == 'Cancelled')<span class="badge badge-light">{{ __('Cancelled') }}</span>@endif
                                                    </h5></td>
                                                <td class="text-right">
                                                    <div class="btn-group btn-group-sm" role="group" aria-label="{{ __('Actions') }}">

                                                        <a href="{{ route('invoices.show', $invoice) }}" class="btn btn-link"
                                                           title="{{ __('Show Details') }}">
                                                            <i class="fas fa-eye" style="color:black"></i>
                                                        </a>
                                                        <a href="{{ route('invoices.edit', $invoice) }}" class="btn btn-link"
                                                           title="{{ __('Edit Invoice') }}">
                                                            <i class="fas fa-edit" style="color:black"></i>
                                                        </a>

                                                        <button type="button" class="btn btn-link text-danger"
                                                                data-route="{{ route('invoices.destroy', $invoice) }}"
                                                                data-toggle="modal" data-target="#confirmDeleteModal"
                                                                title="{{ __('Delete Invoice') }}">
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
@endsection

@push('modals')
    @include('partials.__confirm_delete_modal')
@endpush
@push('scripts')
    <script src="{{ asset(mix('js/delete-modal.js')) }}"></script>
@endpush

