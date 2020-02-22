@extends ('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card shadow-sm">
                    <div class="card-header d-flex justify-content-between">
                        {{--}}<form action="{{ route('payments.show', $invoice) }}"  method="get"></form>--}}
                        <h4 class="card-title"><strong>{{ __('Payments attempts') }}</strong></h4>
                    </div>

                        <!-- Details of the payment attemp -->
                    <div class="card-body">
                        <dl class="row">
                            <dt class="col-md-3">{{ __('Invoice Code') }}</dt>
                            <dd class="col-md-3">{{ $invoice->code }}</dd>

                            <dt class="col-md-3">{{ __('Status') }}</dt>
                            <dd class="col-md-3">{{ $payment->status }}</dd>

                            <dt class="col-md-3">{{ __('Payment Attempt date') }}</dt>
                            <dd class="col-md-3">{{ $payment->created_at }}</dd>

                            {{--}}<dt class="col-md-3">{{ __('Transaction #') }}</dt>
                            <dd class="col-md-3">{{ $paymentAttempt->requestID }}</dd>

                            <dt class="col-md-3">{{ __('Message') }}</dt>
                            <dd class="col-md-3">{{ $paymentAttempt->status->message }}</dd>

                            <dt class="col-md-3">{{ __('Currency') }}</dt>
                            <dd class="col-md-3">{{ $paymentAttempt->amount->currency }}</dd>

                            <dt class="col-md-3">{{ __('Amount') }}</dt>
                            <dd class="col-md-3">{{ $paymentAttempt->amount }}</dd>--}}
                        </dl>

                    <div class="card-footer d-flex justify-content-between">
                        <a href="{{ route('invoices.show', $invoice) }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> {{ __('Back to Invoices Details') }}
                        </a>
                    </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

