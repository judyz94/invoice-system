<div class="modal fade" tabindex="-1" role="dialog" id="invoiceReport">
    <div class="modal-dialog" role="document">
        <form class="form-group" method="GET">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><strong>{{ __('Parameters for reporting invoices') }}</strong></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-md-10">
                        <div class="form-group">
                        <select name="filter" class="form-control mr-sm-2" id="filter">
                            <option value="">{{ __('All') }}</option>
                            <option value="code" {{ request()->input('filter') == 'code' ? 'selected' : '' }}>{{ __('Code') }}</option>
                            <option value="expedition_date" {{ request()->input('filter') == 'expedition_date' ? 'selected' : '' }}>{{ __('Expedition date') }}</option>
                            <option value="due_date" {{ request()->input('filter') == 'due_date' ? 'selected' : '' }}>{{ __('Due date') }}</option>
                            <option value="sale_description" {{ request()->input('filter') == 'sale_description' ? 'selected' : '' }}>{{ __('Sale description') }}</option>
                        </select>
                        </div>
                    </div>

                    <div class="col-md-10">
                        <div class="form-group">
                        <input name="search" id="search" value="{{ request()->input('search') }}" class="form-control mr-sm-2" type="search" placeholder="{{ __('Search...') }}">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fas fa-search"></i> {{ __('Find invoices') }}</button>
                </div>
            </div>
        </form>
    </div>
</div>
