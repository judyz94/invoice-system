@extends ('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title"><strong>{{ __('Payments attempts of Invoice #') }} {{ $invoice->code }}</strong></h4>
                </div>

                <!-- Details of the payments attempts -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                        <thead class="thead-dark">
                        <tr>
                            <th>{{ __('Transaction #') }}</th>
                            <th>{{ __('Invoice code') }}</th>
                            <th>{{ __('Payment attempt date') }}</th>
                            <th>{{ __('Status') }}</th>
                            <th>{{ __('Amount') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($invoice->payments as $payment)
                            <tr>
                                <td>{{ $payment->requestId }}</td>
                                <td>{{ $payment->invoice->code }}</td>
                                <td>{{ $payment->created_at }}</td>
                                <td>{{ $payment->status}}</td>
                                <td>${{number_format($payment->amount, 2 )}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <div class="card-footer d-flex justify-content-between">
                        <a href="{{ route('invoices.show', $invoice) }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> {{ __('Back to Invoice Details') }}
                        </a></div>
                </div>
                </div>
            </div>
        </div>
        </div>
    </div>
@endsection

