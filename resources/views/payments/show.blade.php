@extends ('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
            <div class="card shadow-lg">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title"><strong>{{ __('Invoice payments attempts') }} {{ $invoice->code }}</strong></h4>
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
                            <th>{{ __('Message') }}</th>
                            <th>{{ __('Amount') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($invoice->payments as $payment)
                            <tr>
                                <td>{{ $payment->requestId }}</td>
                                <td>{{ $payment->invoice->code }}</td>
                                <td>{{ $payment->date }}</td>
                                <td>{{ $payment->status}}</td>
                                <td>{{ $payment->message}}</td>
                                <td>${{number_format($payment->amount, 2 )}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <!-- Button to return -->
                    <div class="card-footer d-flex justify-content-between">
                        <a href="{{ route('invoices.show', $invoice) }}" class="btn buttonBack">
                            <i class="fas fa-arrow-left"></i> {{ __('Back to Invoice Details') }}
                        </a>

                        <a href="{{ route('downloadPDF.payment', $invoice) }}" class="btn buttonCancel">
                            <i class="fas fa-file-pdf"></i> {{ __('Download PDF') }}
                        </a>
                    </div>
                </div>
                </div>
            </div>
        </div>
        </div>
    </div>
@endsection

