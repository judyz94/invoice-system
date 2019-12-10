<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label for="code">{{ __('Code') }}</label>
            <input type="text" class="form-control" id="code" name="code" placeholder="{{ __('Format code - A0001') }}" value="{{ old('code', $invoice->code) }}">
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label for="expedition_date">{{ __('Expedition date') }}</label>
            <input type="text" class="form-control" id="expedition_date" name="expedition_date" placeholder="{{ __('YYYY/MM/DD') }}" value="{{ old('expedition_date', $invoice->expedition_date) }}">
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label for="due_date">{{ __('Due date') }}</label>
            <input type="text" class="form-control" id="due_date" name="due_date" placeholder="{{ __('YYYY/MM/DD') }}" value="{{ old('due_date', $invoice->due_date) }}">
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label for="receipt_date">{{ __('Receipt date') }}</label>
            <input type="text" class="form-control" id="receipt_date" name="receipt_date" placeholder="{{ __('YYYY/MM/DD') }}" value="{{ old('receipt_date', $invoice->receipt_date) }}">
        </div>
    </div>

    <div class="col-md-3">
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

    <div class="col-md-3">
        <div class="form-group">
            <label for="sale_description">{{ __('Sale description') }}</label>
            <input type="text" class="form-control" id="sale_description" name="sale_description" placeholder="{{ __('Type a sale description') }}" value="{{ old('sale_description', $invoice->sale_description) }}">
        </div>
    </div>

    <input type="hidden" class="form-control" id="total" name="total" value="{{ old('total') }}">

    <div class="col-md-3">
        <div class="form-group">
            <label for="vat">{{ __('VAT') }}</label>
            <input type="text" class="form-control" id="vat" name="vat" placeholder="{{ __('Type the vat value') }}" value="{{ old('vat', $invoice->vat) }}">
        </div>
    </div>

    <input type="hidden" class="form-control" id="total_with_vat" name="total_with_vat"  value="{{ old('total_with_vat') }}">

    <div class="col-md-3">
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

    <div class="col-md-3">
        <div class="form-group">
            <label for="status">{{ __('Status') }}</label>
            <select class="form-control" id="status" name="status">
                <option value="">{{ __('Select status') }}</option>
                <option value="sent" {{ $invoice->status == 'sent' ? 'selected' : ''  }}>{{ __('Sent') }}</option>
                <option value="rejected" {{ $invoice->status == 'rejected' ? 'selected' : '' }}>{{ __('Rejected') }}</option>
                <option value="overdue" {{ $invoice->status == 'overdue' ? 'selected' : '' }}>{{ __('Overdue') }}</option>
                <option value="paid" {{ $invoice->status == 'paid' ? 'selected' : '' }}>{{ __('Paid') }}</option>
                <option value="cancelled" {{ $invoice->status == 'cancelled' ? 'selected' : '' }}>{{ __('Cancelled') }}</option>
            </select>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label for="user_id">{{ __('User') }}</label>
            <select class="form-control" id="user_id" name="user_id">
                <option value="">{{ __('Select user name') }}</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ old('user_id', $invoice->user_id) == $user->id ? 'selected' : ''}}>{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
