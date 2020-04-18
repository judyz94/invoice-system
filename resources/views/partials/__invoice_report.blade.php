<div class="modal fade" tabindex="-1" role="dialog" id="invoiceReport">
    <div class="modal-dialog" role="document">
        <form class="form-group" method="GET">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><strong><i class="fas fa-filter"></i>  {{ __('Filter invoices to download') }} </strong></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                        <label for="name">{{ __('Filter by') }}</label>
                            <select name="filter" class="form-control mr-sm-2" id="filter">
                                <option value="">{{ __('All') }}</option>
                                <option value="code" {{ request()->input('filter') == 'code' ? 'selected' : '' }}>{{ __('Code') }}</option>
                                <option value="due_date" {{ request()->input('filter') == 'due_date' ? 'selected' : '' }}>{{ __('Due date') }}</option>
                                <option value="sale_description" {{ request()->input('filter') == 'sale_description' ? 'selected' : '' }}>{{ __('Sale description') }}</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                        <label for="name">{{ __('Search') }}</label>
                        <input name="search" id="search" value="{{ request()->input('search') }}" class="form-control mr-sm-2" type="search" placeholder="{{ __('Search...') }}">
                        </div>
                    </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="since_date">{{ __('Since this date') }}</label>
                                <input type="date" class="form-control mr-sm-2" id="since_date" name="since_date" value="{{ request()->input('since_date') }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="until_date">{{ __('Until this date') }}</label>
                                <input type="date" class="form-control mr-sm-2" id="until_date" name="until_date" value="{{ request()->input('until_date') }}">
                            </div>
                        </div>
                </div>
            </div>
                <div class="modal-footer text-center">
                    <a href="{{ route('downloadXLS') }}" class="btn buttonSave">
                        <i class="fas fa-file-excel"></i> {{ __('XLS') }}
                    </a>
                    <a href="{{ route('downloadCSV') }}" class="btn buttonBack">
                        <i class="fas fa-file-csv"></i> {{ __('CSV') }}
                    </a>
                    <a href="{{ route('downloadTSV') }}" class="btn button">
                        <i class="fas fa-file-alt"></i> {{ __('TXT') }}
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>
