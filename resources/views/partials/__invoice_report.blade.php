<div class="modal fade-lg" tabindex="-1" role="dialog" id="invoiceReport">
    <div class="modal-dialog modal-lg" role="document">
        <form class="form-group" action="{{ route('invoices.filter') }}" method="GET">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><strong><i class="fas fa-filter"></i>  {{ __('Filter invoices to download') }} </strong></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="type">{{ __('Filter by date') }}</label>
                                    <select name="type" class="form-control mr-sm-2" id="type">
                                        <option disabled selected>{{ __('Select a date type') }}</option>
                                        <option value="expedition_date">{{ __('Expedition date') }}</option>
                                        <option value="due_date">{{ __('Due date') }}</option>
                                        <option value="receipt_date">{{ __('Receipt date') }}</option>
                                    </select>
                                </div>
                            </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="since_date" data-success="right">{{ __('Since this date') }}</label>
                                        <input type="date" class="form-control mr-sm-2" id="since_date" name="since_date" data-date-format="YYYY-MM-DD" value="{{ request()->input('since_date') }}">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="until_date" data-success="right">{{ __('Until this date') }}</label>
                                        <input type="date" class="form-control mr-sm-2" id="until_date" name="until_date" data-date-format="YYYY-MM-DD" value="{{ request()->input('until_date') }}">
                                    </div>
                                </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button class="btn buttonSave my-2 my-sm-0" type="submit"><i class="fas fa-filter"></i> {{ __('Filter') }}</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
