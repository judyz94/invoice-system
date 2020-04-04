<div class="modal fade" tabindex="-1" role="dialog" id="overdueInvoice">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-exclamation-circle warning"></i>
                    {{ __('The invoice is overdue!') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>{{ __('Please contact your bank to generate a new payment rate.') }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn buttonBack" data-dismiss="modal">{{ __('Close') }}</button>
            </div>
        </div>
    </div>
</div>
