@extends ('layouts.app')

@section('content')
    <div class="container">
       <div class="row justify-content-center">
               <div class="card shadow-sm">
                <div class="card-header d-flex justify-content-between">
                    <h3 class="card-title mb-0"><strong>{{ __('Invoices') }}</strong></h3>
                </div>

                   <!-- Create new invoice -->
                   <nav class="navbar navbar-light bg-light">
                       <a href="{{ route('invoices.create') }}" class="btn btn-success"><i class="fas fa-plus"></i>
                               {{ __('Create a new invoice') }}
                       </a>

                       <!-- Search form -->
                       <search-form action="{{ route('invoices.index') }}" method="GET"></search-form>
                   </nav>

                   <!-- Invoices list -->
                   <div class="table-responsive-xl">
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
                        @forelse($invoices as $invoice)
                            <tr>
                                <td>{{ $invoice->code }}</td>
                                <td>{{ $invoice->expedition_date }}</td>
                                <td>{{ $invoice->due_date }}</td>
                                <td>{{ $invoice->receipt_date }}</td>
                                <td>{{ $invoice->sale_description }}</td>
                                <td>${{ number_format($invoice->total, 2) }}</td>
                                <td>${{ number_format($invoice->total_with_vat, 2) }}</td>
                                <td>{{ $invoice->seller->full_name }}</td>
                                <td>{{ $invoice->customer->full_name }}</td>
                                <td>{{ $invoice->user->name }}</td>
                                <td><h5>
                                    @if($invoice->state_id == '1')<span class="badge blue">{{ __('New') }}</span>@endif
                                    @if($invoice->state_id == '2')<span class="badge red">{{ __('Overdue') }}</span>@endif
                                    @if($invoice->state_id == '3')<span class="badge green">{{ __('Paid') }}</span>@endif
                                    @if($invoice->state_id == '4')<span class="badge orange">{{ __('Rejected') }}</span>@endif
                                    @if($invoice->state_id == '5')<span class="badge purple">{{ __('Pending') }}</span>@endif
                                 </h5></td>
                                <td class="text-right">

                                    <!-- CRUD buttons -->
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

                            <!-- Alert when there are no invoices -->
                            @empty
                                <tr>
                                    <p class="alert alert-secondary text-center">
                                        {{ __('No invoices were found') }}
                                    </p>
                                </tr>
                        @endforelse

                        </tbody>
                    </table>

                    <!-- Pagination -->
                    <ul class="pagination justify-content-center">
                        {{ $invoices->appends(['filter' => $filter, 'search' => $search])->links() }}
                    </ul>

                    <!-- Import form -->
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
@endsection

@push('modals')
    @include('partials.__confirm_delete_modal')
@endpush
@push('scripts')
    <script src="{{ asset(mix('js/delete-modal.js')) }}"></script>
@endpush

