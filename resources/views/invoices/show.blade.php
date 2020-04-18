@extends ('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

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
                    <div class="card-header d-flex ">
                        <h4 class="card-title justify-content-center"><strong>{{ __('Details Invoice') }} {{ $invoice->code }}</strong></h4>
                    </div>

                    <!-- Button to return -->
                    <div class="card-header d-flex justify-content-start">
                        <a href="{{ route('invoices.index') }}" class="btn buttonBack">
                            <i class="fas fa-arrow-left"></i> {{ __('Back to Invoices') }}
                        </a>

                    <!-- Button PDF export -->
                    <a href="{{ route('downloadPDF', $invoice) }}" class="btn buttonCancel">
                        <i class="fas fa-file-pdf"></i> {{ __('Download PDF') }}
                    </a>
                    </div>

                    <!-- Invoice detail information -->
                    <div class="card-body">
                        <dl class="row">
                            <dt class="col-md-3">{{ __('Code') }}</dt>
                            <dd class="col-md-3">{{ $invoice->code }}</dd>

                            <dt class="col-md-3">{{ __('Expedition date') }}</dt>
                            <dd class="col-md-3">{{ $invoice->expedition_date }}</dd>

                            <dt class="col-md-3">{{ __('Due date') }}</dt>
                            <dd class="col-md-3">{{ $invoice->due_date }}</dd>

                            @isset($invoice->receipt_date)
                            <dt class="col-md-3">{{ __('Receipt date') }}</dt>
                            <dd class="col-md-3">{{ $invoice->receipt_date }}</dd>
                            @endisset

                            <dt class="col-md-3">{{ __('Total') }}</dt>
                            <dd class="col-md-3">${{ number_format($invoice->total, 2) }}</dd>

                            <dt class="col-md-3">{{ __('Total with VAT') }}</dt>
                            <dd class="col-md-3">${{ number_format($invoice->total_with_vat, 2) }}</dd>

                            <dt class="col-md-3">{{ __('Seller') }}</dt>
                            <dd class="col-md-3">{{ $invoice->seller->full_name }}</dd>

                            @can('invoices.edit')
                            <dt class="col-md-3">{{ __('Seller ID') }}</dt>
                            <dd class="col-md-3">{{ $invoice->seller->document }}</dd>
                            @endcan

                            <dt class="col-md-3">{{ __('Customer') }}</dt>
                            <dd class="col-md-3">{{ $invoice->customer->full_name }}</dd>

                            @can('invoices.edit')
                            <dt class="col-md-3">{{ __('Customer ID') }}</dt>
                            <dd class="col-md-3">{{ $invoice->customer->document }}</dd>
                            @endcan

                            <dt class="col-md-3">{{ __('Status') }}</dt>
                            <dd class="col-md-3">{{ $invoice->state->name }}</dd>

                            <dt class="col-md-3">{{ __('Created by') }}</dt>
                            <dd class="col-md-3">{{ $invoice->user->name }}</dd>
                        </dl>

                        <!-- Details of the invoice -->
                        <div class="table-responsive-lg">
                            <table class="table table-hover">
                                <thead class="thead-dark">
                                <tr>
                                    <th>{{ __('Product #') }}</th>
                                    <th>{{ __('Product Name') }}</th>
                                    <th>{{ __('Unit Price') }}</th>
                                    <th>{{ __('Quantity') }}</th>
                                    <th>{{ __('Total Products') }}</th>
                                    @can('invoiceProduct.destroy')
                                    <th>{{ __('Actions') }}</th>
                                    @endcan
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($invoice->products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>${{ number_format($product->pivot->price) }}</td>
                                        <td>{{ $product->pivot->quantity }}</td>
                                        <td>${{ number_format($acum = $product->pivot->price * $product->pivot->quantity) }}</td>
                                        @can('invoiceProduct.destroy')
                                        <td>
                                            <div class="btn-group btn-group-sm" role="group" aria-label="{{ __('Actions') }}">
                                                <a href="{{ route('invoiceProduct.edit', [$invoice, $product]) }}" class="btn btn-link"
                                                   title="{{ __('Edit Detail') }}">
                                                    <i class="fas fa-edit" style="color:black"></i>
                                                </a>
                                                <button type="button" class="btn btn-link text-danger"
                                                        data-route="{{ route('invoiceProduct.destroy', [$invoice, $product]) }}"
                                                        data-toggle="modal"
                                                        data-target="#confirmDeleteModal"
                                                        title="{{ __('Delete Detail') }}">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                        @endcan
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Button of Order Summary to pay invoice and exceptions when paid or do not have products-->
                    <div class="card-footer d-flex justify-content-end">
                        @if($invoice->state_id == '1' or '4')
                            @if(empty($detail))
                                <button type="submit" class="btn buttonSave"
                                        data-route="{{ route('invoiceProduct') }}"
                                        data-toggle="modal"
                                        data-target="#invoiceProduct"><i class="fas fa-money-bill"></i> {{ __('Pay') }}
                                </button>
                            @elseif($invoice->state_id == '2' or $invoice->due_date < $now)
                                <button type="submit" class="btn buttonSave"
                                        data-route="{{ route('overdueInvoice') }}"
                                        data-toggle="modal"
                                        data-target="#overdueInvoice"><i class="fas fa-money-bill"></i> {{ __('Pay') }}
                                </button>
                            @elseif($invoice->state_id == '5')
                                <button type="submit" class="btn buttonSave"
                                        data-route="{{ route('pendingPayment') }}"
                                        data-toggle="modal"
                                        data-target="#pendingPayment"><i class="fas fa-money-bill"></i> {{ __('Pay') }}
                                </button>
                            @elseif($invoice->state_id != '2')
                                @if($invoice->state_id != '3')
                                    @if($invoice->due_date > $now)
                                        <button class="btn buttonSave" type="submit"
                                                data-route="{{ route('orderSummary') }}"
                                                data-toggle="modal"
                                                data-target="#orderSummary"><i class="fas fa-shopping-cart"></i> {{ __('Order summary') }}
                                        </button>
                                    @endif
                                @endif
                            @endif
                        @endif

                        <!-- Button to show payment attempts -->
                        <a href="{{ route('payments', $invoice) }}" class="btn buttonBack">
                            <i class="fas fa-file-invoice-dollar"></i> {{ __('Payment attempts') }}
                        </a>
                    </div>

                    @can('invoices.products.store')
                    <!-- Form added invoice details -->
                        <div class="card-header d-flex justify-content-between">
                            <h4><strong><i class="fas fa-cart-plus"></i>  {{ __('Add a new product to this invoice') }}</strong></h4>
                        </div>
                        <form action="{{ route('invoices.products.store', $invoice) }}" method="post">
                            @csrf
                            <div class="card-body">
                             @include('invoicesProducts.__form')
                                <button class="btn buttonSave btn-block col-md-1" type="submit"><i class="fas fa-plus"></i> {{ __('Add') }}</button>
                            </div>
                        </form>
                    @endcan
                    <br>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('modals')
    @include('partials.__confirm_delete_modal')
    @include('partials.__order_summary')
    @include('partials.__overdue_invoice')
    @include('partials.__invoice_product')
    @include('partials.__pending_payment')
@endpush

@push('scripts')
    <script src="{{ asset(mix('js/delete-modal.js')) }}"></script>
@endpush

