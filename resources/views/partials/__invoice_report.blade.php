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
                        {{--
                        <div class="col-md-6">
                            <div class="form-group">
                            <select name="filter" class="form-control mr-sm-2" id="filter">
                                <option value="">{{ __('All') }}</option>
                                <option value="code" {{ request()->input('filter') == 'code' ? 'selected' : '' }}>{{ __('code') }}</option>
                                <option value="expedition_date" {{ request()->input('filter') == 'expedition_date' ? 'selected' : '' }}>{{ __('expedition_date') }}</option>
                                <option value="due_date" {{ request()->input('filter') == 'due_date' ? 'selected' : '' }}>{{ __('due_date') }}</option>
                                <option value="sale_description" {{ request()->input('filter') == 'sale_description' ? 'selected' : '' }}>{{ __('sale_description') }}</option>
                            </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                           <div class="form-group">
                               <input name="search" id="search" value="{{ request()->input('search') }}" class="form-control mr-sm-2" type="search" placeholder="{{ __('Search...') }}">
                           </div>
                        </div>-

                    <div class="col-md-6">
                        <div class="form-group">
                        <label for="filter">{{ __('Filter by status') }}</label>
                            <select name="filter" class="form-control mr-sm-2" id="filter">
                                <option value="">{{ __('None') }}</option>
                                <option value="state_id" {{ request()->input('filter') == 'state_id' ? 'selected' : '' }}>{{ __('Status') }}</option>
                            </select>
                        </div>
                    </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="state_id">{{ __('Select status') }}</label>
                                <select class="custom-select" id="state_id" name="state_id">
                                    <option value="">{{ __('All') }}</option>
                                    <option value="New">{{ __('New') }}</option>
                                    <option value="Paid">{{ __('Paid') }}</option>
                                    <option value="Overdue">{{ __('Overdue') }}</option>
                                    <option value="Rejected">{{ __('Rejected') }}</option>
                                    <option value="Pending">{{ __('Pending') }}</option>
                                </select>
                            </div>
                        </div>--}}

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
                        <button class="btn buttonSave my-2 my-sm-0" type="submit"><i class="fas fa-search"></i> {{ __('Filter') }}</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
