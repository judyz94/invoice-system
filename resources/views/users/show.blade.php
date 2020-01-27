@extends ('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-14">
                <div class="card shadow-sm">
                    <div class="card-header pb-0">
                        <h4 class="card-title"><strong>{{ __('User') }}  {{ $user->name }}</strong></h4>
                    </div>

                    <div class="card-body">
                        <dl class="row">
                            <dt class="col-md-3">{{ __('Name') }}</dt>
                            <dd class="col-md-3">{{ $user->name }}</dd>

                            <dt class="col-md-3">{{ __('Role') }}</dt>
                            <dd class="col-md-3">{{ $user->role }}</dd>

                            <dt class="col-md-3">{{ __('Email') }}</dt>
                            <dd class="col-md-3">{{ $user->email }}</dd>
                        </dl>

                        <div class="row">
                            <div class="col-md-12">
                                <br><h5><strong>{{ __('Associated invoices') }}</strong></h5>
                                <div class="table-responsive-xl">
                                    <table class="table table-hover" style="width:100%">
                                        <thead>
                                        <tr>
                                            <th style="width:50px">{{ __('Code') }}</th>
                                            <th style="width:120px">{{ __('Expedition date') }}</th>
                                            <th style="width:120px">{{ __('Due date') }}</th>
                                            <th style="width:120px">{{ __('Receipt date') }}</th>
                                            <th style="width:100px">{{ __('Sale description') }}</th>
                                            <th style="width:120px">{{ __('Total') }}</th>
                                            <th style="width:120px">{{ __('Total with VAT') }}</th>
                                            <th style="width:100px">{{ __('Seller ID') }}</th>
                                            <th style="width:100px">{{ __('Customer ID') }}</th>
                                            <th style="width:100px">{{ __('Created by') }}</th>
                                            <th style="width:50px">{{ __('Status') }}</th>
                                            <th style="width:100px" >{{ __('Actions') }}</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        @foreach($user->invoices as $invoice)
                                            <tr>
                                                <td>{{ $invoice->code }}</td>
                                                <td>{{ $invoice->expedition_date }}</td>
                                                <td>{{ $invoice->due_date }}</td>
                                                <td>{{ $invoice->receipt_date }}</td>
                                                <td>{{ $invoice->sale_description }}</td>
                                                <td>${{ number_format($invoice->total, 2) }}</td>
                                                <td>${{ number_format($invoice->total_with_vat, 2) }}</td>
                                                <td>{{ $invoice->seller->document }}</td>
                                                <td>{{ $invoice->customer->document }}</td>
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
                                                                data-toggle="modal"
                                                                data-target="#confirmDeleteModal"
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
                                        <a href="{{ route('users.index') }}" class="btn btn-secondary">
                                            <i class="fas fa-arrow-left"></i> {{ __('Back to Users') }}
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

