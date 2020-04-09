@extends ('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-14">
                <div class="card shadow-lg">
                    <div class="card-header pb-0">
                        <h4 class="card-title"><strong>{{ __('User') }}  {{ $user->name }}</strong></h4>
                    </div>

                    <!-- User detail information -->
                    <div class="card-body">
                        <dl class="row">
                            <dt class="col-md-3">{{ __('Name') }}</dt>
                            <dd class="col-md-3">{{ $user->name }}</dd>

                            <dt class="col-md-3">{{ __('Role') }}</dt>
                            <dd class="col-md-3"></dd>
                        </dl>

                        <!-- Details of the associated invoices -->
                        <div class="row">
                            <div class="col-md-12">
                                <br><h5><strong>{{ __('Associated invoices') }}</strong></h5>
                                <table class="table table-hover">
                                    <thead class="thead-dark">
                                    <tr>
                                        <th>{{ __('Code') }}</th>
                                        <th>{{ __('Expedition date') }}</th>
                                        <th>{{ __('Due date') }}</th>
                                        <th>{{ __('Sale description') }}</th>
                                        <th>{{ __('Total with VAT') }}</th>
                                        <th>{{ __('Seller') }}</th>
                                        <th>{{ __('Customer') }}</th>
                                        <th>{{ __('Status') }}</th>
                                        <th>{{ __('Actions') }}</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($user->invoices as $invoice)
                                        <tr>
                                            <td>{{ $invoice->code }}</td>
                                            <td>{{ $invoice->expedition_date }}</td>
                                            <td style="width:100px">{{ $invoice->due_date }}</td>
                                            <td>{{ $invoice->sale_description }}</td>
                                            <td>${{ number_format($invoice->total_with_vat, 2) }}</td>
                                            <td>{{ $invoice->seller->full_name }}</td>
                                            <td>{{ $invoice->customer->full_name }}</td>
                                            <td><h5>
                                                    @if($invoice->state_id == '1')<span class="badge blue">{{ __('New') }}</span>@endif
                                                    @if($invoice->state_id == '2')<span class="badge red">{{ __('Overdue') }}</span>@endif
                                                    @if($invoice->state_id == '3')<span class="badge green">{{ __('Paid') }}</span>@endif
                                                    @if($invoice->state_id == '4')<span class="badge orange">{{ __('Rejected') }}</span>@endif
                                                    @if($invoice->state_id == '5')<span class="badge purple">{{ __('Pending') }}</span>@endif
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
                                        <a href="{{ route('users.index') }}" class="btn buttonBack">
                                            <i class="fas fa-arrow-left"></i> {{ __('Back to Users') }}
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

