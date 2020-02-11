<div class="modal fade" tabindex="-1" role="dialog" id="orderSummary">
    <div class="modal-dialog" role="document">
        <form action="{{ route('invoices.payments.attemp', $invoice) }}" method="post">
            @csrf
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><strong>{{ __('Order Summary') }}</strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <dl>
                    <dt class="col-auto">{{ __('Customer') }}</dt>
                    <dd class="col-auto">
                        {{ $invoice->customer->name }}
                        {{ $invoice->customer->last_name }}
                    </dd>

                    <dt class="col-auto">{{ __('Customer ID') }}</dt>
                    <dd class="col-auto">
                        {{ $invoice->customer->document }}
                    </dd>
                </dl>

                <dl>
                    <dt class="col-md-8">{{ __('Products') }}</dt>
                    <dd class="col-md-5">
                        @foreach($invoice->products as $product)
                            <td>{{ $product->name }}
                                <span class="badge badge-primary badge-pill">{{ $product->pivot->quantity }}</span></td>
                        @endforeach
                    </dd>

                    <dt class="col-md-5">{{ __('Unit Price') }}</dt>
                    <dd class="col-md-3">
                        @foreach($invoice->products as $product)
                            <td>${{ number_format($product->pivot->price, 2) }}</td>
                        @endforeach
                    </dd>

                    <dt class="col-md-5">{{ __('Total') }}</dt>
                    <dd class="col-md-5">
                        <td>${{ number_format($invoice->total, 2) }}</td>
                    </dd>

                    <dt class="col-md-8">{{ __('Total with VAT') }}</dt>
                    <dd class="col-md-8">
                        <td>${{ number_format($invoice->total_with_vat, 2) }}</td>
                    </dd>

                </dl>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"  data-route="{{ route('invoices.show', $invoice) }}" data-dismiss="modal">{{ __('Close') }}</button>
                <button type="submit" class="btn btn-success">{{ __('Pay') }}</button>
            </div>
        </div>
        </form>
    </div>
</div>
