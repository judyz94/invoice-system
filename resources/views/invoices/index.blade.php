@extends ('layouts.app')

@section('content')
    <div class="container">
       <div class="row justify-content-center">
           <div class="col-xl-14">
               <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3 class="card-title mb-0"><strong>{{ __('Invoices') }}</strong></h3>
                    <a href="{{ route('invoices.create') }}" class="btn btn-success"><i class="fas fa-plus"></i>  {{ __('Create a new invoice') }}</a>
                </div>
                <div class="table-responsive-xl">
                    <table class="table table-hover" style="width:100%">
                        <thead>
                        <tr>
                            <th style="width:50px">{{ __('Code') }}</th>
                            <th style="width:200px">{{ __('Expedition date') }}</th>
                            <th style="width:200px">{{ __('Due date') }}</th>
                            <th style="width:200px">{{ __('Receipt date') }}</th>
                            <th style="width:100px">{{ __('Sale description') }}</th>
                            <th style="width:120px">{{ __('Total') }}</th>
                            <th style="width:120px">{{ __('Total with VAT') }}</th>
                            <th style="width:100px">{{ __('Seller ID') }}</th>
                            <th style="width:100px">{{ __('Customer ID') }}</th>
                            <th style="width:50px">{{ __('Status') }}</th>
                            <th style="width:100px">{{ __('Created by') }}</th>
                            <th style="width:100px">{{ __('Actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($invoices as $invoice)
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
                                <td>{{ $invoice->status }}</td>
                                <td>{{ $invoice->user->name }}</td>
                                <td class="text-right">
                                    <div class="btn-group btn-group-sm" role="group" aria-label="{{ __('Actions') }}">
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
