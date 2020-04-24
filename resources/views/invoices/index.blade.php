@extends ('layouts.app')

@section('content')
    <div class="container">
       <div class="row justify-content-center">

           @if(session('info'))
               <div class="container">
                   <div class="row">
                       <div class="col-md-12 col-md-offset-2">
                           <div class="alert alert-info">
                               {{ session('info') }}
                           </div>
                       </div>
                   </div>
               </div>
           @endif

               <div class="card shadow-lg">
                <div class="card-header d-flex justify-content-between">
                    @if(Auth::user()->role == 'Customer')
                        <h3 class="card-title mb-0"><strong>{{ Auth::user()->name }} {{ __('Invoices') }} </strong></h3>
                    @endif
                    <h3 class="card-title mb-0"><strong>{{ __('Invoices') }}  <i class="fas fa-paw"></i></strong></h3>

                        @can('invoices.edit')
                        <!-- Search form -->
                            <search-form action="{{ route('invoices.index') }}" method="GET"></search-form>
                        @endcan
                </div>

                   @can('invoices.edit')
                   <!-- Create new invoice -->
                   <nav class="navbar navbar-light bg-light">
                       <a href="{{ route('invoices.create') }}" class="btn button"><i class="fas fa-plus"></i>
                               {{ __('Create a new invoice') }}
                       </a>

                       <!-- Export invoice reports-->
                       <div class="justify-content-end">
                           <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                               <button type="submit" class="btn buttonBack"
                                       data-route="{{ route('exportAll') }}"
                                       data-toggle="modal"
                                       data-target="#exportAll">
                                   <i class="fas fa-file-download"></i>
                                   {{ __('Export all') }}
                               </button>
                               <button type="submit" class="btn buttonBack"
                                       data-route="{{ route('invoiceReport') }}"
                                       data-toggle="modal"
                                       data-target="#invoiceReport">
                                   <i class="fas fa-filter"></i>
                                   {{ __('Filters to export') }}
                               </button>

                               <div class="btn-group" role="group">
                                   <button id="btnGroupDrop1" type="button" class="btn buttonBack dropdown-toggle"
                                           data-toggle="dropdown"
                                           aria-haspopup="true"
                                           aria-expanded="false">
                                       <i class="fas fa-check"></i>
                                       {{ __('Select format') }}
                                   </button>
                                   <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                       <a class="dropdown-item" href="{{ route('downloadXLS', [$type, $sinceDate, $untilDate]) }}" class=" buttonSave">
                                           <i class="fas fa-file-excel"></i> {{ __('XLS') }}</a>
                                       <a class="dropdown-item" href="{{ route('downloadCSV', [$type, $sinceDate, $untilDate]) }}" class="button">
                                           <i class="fas fa-file-csv"></i> {{ __('CSV') }}</a>
                                       <a class="dropdown-item" href="{{ route('downloadTXT', [$type, $sinceDate, $untilDate]) }}" class="buttonBlue">
                                           <i class="fas fa-file-alt"></i> {{ __('TXT') }}
                                       </a>
                                   </div>
                               </div>

                               <button class="btn buttonBack" type="submit" onClick="window.history.back();">
                                   <i class="fas fa-redo-alt"></i>
                               </button>
                           </div>
                       </div>
                   </nav>
                   @endcan

                   <!-- Invoices list -->
                   <div class="table-responsive-xl">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>{{ __('Code') }}</th>
                            <th>{{ __('Expedition date') }}</th>
                            <th>{{ __('Due date') }}</th>
                            <th>{{ __('Description') }}</th>
                            <th>{{ __('Total with VAT') }}</th>
                            <th>{{ __('Seller') }}</th>
                            <th>{{ __('Customer') }}</th>
                            <th>{{ __('Created by') }}</th>
                            <th>{{ __('Status') }}</th>
                            @if(Auth::user()->roles[0]->name == 'Customer')
                            <th class="text-right">{{ __('Show details') }}</th>
                            @else
                                <th>{{ __('Actions') }}</th>
                            @endif
                        </tr>
                        </thead>

                        <tbody>
                        @forelse($invoices as $invoice)
                            <tr>
                                <td>{{ $invoice->code }}</td>
                                <td style="width:120px">{{ $invoice->expedition_date }}</td>
                                <td style="width:120px">{{ $invoice->due_date }}</td>
                                <td>{{ $invoice->sale_description }}</td>
                                <td style="width:150px">${{ number_format($invoice->total_with_vat, 2) }}</td>
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

                                        @can('invoices.edit')
                                        <a href="{{ route('invoices.edit', $invoice) }}" class="btn btn-link"
                                           title="{{ __('Edit Invoice') }}">
                                            <i class="fas fa-edit" style="color:black"></i>
                                        </a>
                                        @endcan
                                        @can('invoices.destroy')
                                        <button type="button" class="btn btn-link text-danger"
                                                data-route="{{ route('invoices.destroy', $invoice) }}"
                                                data-toggle="modal" data-target="#confirmDeleteModal"
                                                title="{{ __('Delete Invoice') }}">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                        @endcan
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

                   @can('invoices.edit')
                    <!-- Pagination -->
                    <ul class="pagination justify-content-center">
                        {{ $invoices->links() }}
                        {{--appends(['filter' => $filter, 'search' => $search])--}}
                    </ul>

                    <!-- Import form -->
                    <div class="card-footer justify-content-lg-start">
                        <form action="{{ route('invoices.import') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <h5><strong>Import Excel File</strong></h5>
                            <input type="file" name="file" class="form-control-file">
                            <br>
                            <button class="btn buttonSave"><i class="fas fa-file-excel"></i> {{ __('Import') }}</button>
                        </form>
                    </div>
                    @endcan
                </div>
            </div>
        </div>
    </div>
@endsection

@push('modals')
    @include('partials.__confirm_delete_modal')
    @include('partials.__invoice_report')
    @include('partials.__export_all')
@endpush
@push('scripts')
    <script src="{{ asset(mix('js/delete-modal.js')) }}"></script>
@endpush

