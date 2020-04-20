<div class="modal fade" tabindex="-1" role="dialog" id="exportAll">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-file-download"></i>
                    {{ __('Export all invoices') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>{{ __('Choose the format to download.') }}</p>
            </div>
            <div class="modal-footer">
                    <a href="{{ route('XLS') }}" class="btn buttonSave">
                        <i class="fas fa-file-excel"></i> {{ __('XLS') }}
                    </a>
                    <a href="{{ route('CSV') }}" class="btn buttonBack">
                        <i class="fas fa-file-csv"></i> {{ __('CSV') }}
                    </a>
                    <a href="{{ route('TSV') }}" class="btn button">
                        <i class="fas fa-file-alt"></i> {{ __('TXT') }}
                    </a>
            </div>
        </div>
    </div>
</div>
