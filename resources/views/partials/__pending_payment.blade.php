<div class="modal fade" tabindex="-1" role="dialog" id="pendingPayment">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-exclamation-circle warning"></i>
                    {{ __('The invoice has a pending payment!') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>{{ __('Please click the redirect button to return to the site and complete the payment.') }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn buttonBack" data-dismiss="modal">{{ __('Close') }}</button>
                <button type="button" class="btn buttonSave">{{ __('Return to transaction') }}</button>
            </div>
        </div>
    </div>
</div>
