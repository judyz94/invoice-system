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
                    <h3 class="card-title mb-0"><strong>{{ Auth::user()->name }} {{ __('Invoices') }} </strong></h3>
                </div>

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
                            <th class="text-right">{{ __('Show details') }}</th>
                        </tr>
                        </thead>

                        <tbody>
                        @forelse($invoices as $invoice)
                            <tr>
                                <td>{{ $invoice->code }}</td>
                                <td style="width:120px">{{ $invoice->expedition_date }}</td>
                                <td style="width:100px">{{ $invoice->due_date }}</td>
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

                                    <!-- Show details -->
                                    <div class="btn-group btn-group-sm" role="group" aria-label="{{ __('Show details') }}">
                                        <a href="{{ route('invoices.show', $invoice) }}" class="btn btn-link"
                                           title="{{ __('Show Details') }}">
                                            <i class="fas fa-eye" style="color:black"></i>
                                        </a>
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

                </div>
            </div>
        </div>
    </div>
@endsection

