@extends ('layouts.app')

@section('content')
    <div class="container">
       <div class="row justify-content-center">
           <div class="col-xl-14">
               <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3 class="card-title mb-0"><strong>{{ __('Invoices') }}</strong></h3>
                </div>
                   <nav class="navbar navbar-light bg-light">
                       <a href="{{ route('invoices.create') }}" class="btn btn-success"><i class="fas fa-plus"></i>
                               {{ __('Create a new invoice') }}
                       </a>

                       <form class="form-inline">
                           <select name="type" class="form-control mr-sm-2" id="select">
                               <option value="">Search for</option>
                               <option value="code">Code</option>
                               <option value="expedition_date">Expedition date</option>
                               <option value="due_date">Due date</option>
                               <option value="receipt_date">Receipt date</option>
                               <option value="sale_description">Sale description</option>
                               <option value="vat">VAT</option>
                               <option value="status">Status</option>
                           </select>

                           <input name="searchfor" class="form-control mr-sm-2" type="search" aria-label="Search">
                           <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                       </form>
                   </nav>
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
                            <th style="width:100px">{{ __('Seller') }}</th>
                            <th style="width:100px">{{ __('Customer') }}</th>
                            <th style="width:100px">{{ __('Created by') }}</th>
                            <th style="width:50px">{{ __('Status') }}</th>
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
                                <td>{{ $invoice->seller->name }}</td>
                                <td>{{ $invoice->customer->name }}</td>
                                <td>{{ $invoice->user->name }}</td>
                                <td><h5>
                                    @if($invoice->status == 'New')<span class="badge badge-secondary">New</span>@endif
                                    @if($invoice->status == 'Sent')<span class="badge badge-primary">Sent</span>@endif
                                    @if($invoice->status == 'Rejected')<span class="badge badge-warning">Rejected</span>@endif
                                    @if($invoice->status == 'Overdue')<span class="badge badge-danger">Overdue</span>@endif
                                    @if($invoice->status == 'Paid')<span class="badge badge-success">Paid</span>@endif
                                    @if($invoice->status == 'Cancelled')<span class="badge badge-light">Cancelled</span>@endif
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
                    <ul class="pagination justify-content-center">
                    {{ $invoices->links() }}
                    </ul>
                    <div class="card-footer justify-content-lg-start">
                        <form action="{{ route('invoices.import') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <h5><strong>Import Excel File</strong></h5>
                            <input type="file" name="file" class="form-control-file">
                            <br>
                            <button class="btn btn-success"><i class="fas fa-file-excel"></i> {{ __('Import') }}</button>
                        </form>
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

