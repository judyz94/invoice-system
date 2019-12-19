<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="expedition_date">{{ __('Expedition date') }}</label>
            <input type="date" class="form-control" id="expedition_date" name="expedition_date" placeholder="{{ __('YYYY/MM/DD') }}" value="{{ old('expedition_date', now()->toDateString()) }}">
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="due_date">{{ __('Due date') }}</label>
            <input type="date" class="form-control" id="due_date" name="due_date" placeholder="{{ __('YYYY/MM/DD') }}" value="{{ old('due_date', now()->addDays(30)->toDateString()) }}">
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="receipt_date">{{ __('Receipt date') }}</label>
            <input type="date" class="form-control" id="receipt_date" name="receipt_date" placeholder="{{ __('YYYY/MM/DD') }}" value="{{ old('receipt_date', $invoice->receipt_date) }}">
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="seller_id">{{ __('Seller ID') }}</label>
            <select class="form-control" id="seller_id" name="seller_id">
                <option value="">{{ __('Select seller ID') }}</option>
                @foreach($sellers as $seller)
                    <option value="{{ $seller->id }}" {{ old('seller_id', $invoice->seller_id) == $seller->id ? 'selected' : ''}}>{{ $seller->document }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="customer_id">{{ __('Customer ID') }}</label>
            <select class="form-control" id="customer_id" name="customer_id">
                <option value="">{{ __('Select customer ID') }}</option>
                @foreach($customers as $customer)
                    <option value="{{ $customer->id }}" {{ old('customer_id', $invoice->customer_id) == $customer->id ? 'selected' : ''}}>{{ $customer->document }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="status">{{ __('Status') }}</label>
            <select class="form-control" id="status" name="status">
                <option value="">{{ __('Select status') }}</option>
                <option value="Sent" {{ $invoice->status == 'Sent' ? 'selected' : ''  }}>{{ __('Sent') }}</option>
                <option value="Rejected" {{ $invoice->status == 'Rejected' ? 'selected' : '' }}>{{ __('Rejected') }}</option>
                <option value="Overdue" {{ $invoice->status == 'Overdue' ? 'selected' : '' }}>{{ __('Overdue') }}</option>
                <option value="Paid" {{ $invoice->status == 'Paid' ? 'selected' : '' }}>{{ __('Paid') }}</option>
                <option value="Cancelled" {{ $invoice->status == 'Cancelled' ? 'selected' : '' }}>{{ __('Cancelled') }}</option>
            </select>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <label for="sale_description">{{ __('Sale description') }}</label>
            <textarea class="form-control" id="sale_description" name="sale_description" placeholder="{{ __('Type a sale description') }}">{{ old('sale_description', $invoice->sale_description) }}</textarea>
        </div>
    </div>
</div>
