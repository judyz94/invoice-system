<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="expedition_date">{{ __('Expedition date') }}</label>
            <input type="date" class="form-control @error('expedition_date') is-invalid @enderror" id="expedition_date" name="expedition_date"
                   value="{{ old('expedition_date', now()->toDateString()) }}" required>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="due_date">{{ __('Due date') }}</label>
            <input type="date" class="form-control @error('due_date') is-invalid @enderror" id="due_date" name="due_date"
                   value="{{ old('due_date', now()->addDays(30)->toDateString()) }}" required>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="receipt_date">{{ __('Receipt date') }}</label>
            <input type="date" class="form-control @error('receipt_date') is-invalid @enderror" id="receipt_date" name="receipt_date"
                   value="{{ old('receipt_date', $invoice->receipt_date) }}" required>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="seller_id">{{ __('Seller') }}</label>
            <select class="custom-select @error('seller_id') is-invalid @enderror" id="seller_id" name="seller_id" required>
                <option value="">{{ __('Select seller') }}</option>
                @foreach($sellers as $seller)
                    <option value="{{ $seller->id }}"
                        {{ old('seller_id', $invoice->seller_id) == $seller->id ? 'selected' : ''}}>{{ $seller->name }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="customer_id">{{ __('Customer') }}</label>
            <select class="custom-select @error('customer_id') is-invalid @enderror" id="customer_id" name="customer_id" required>
                <option value="">{{ __('Select customer') }}</option>
                @foreach($customers as $customer)
                    <option value="{{ $customer->id }}"
                        {{ old('customer_id', $invoice->customer_id) == $customer->id ? 'selected' : ''}}>{{ $customer->name }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="status">{{ __('Status') }}</label>
            <select class="custom-select @error('status') is-invalid @enderror" id="status" name="status" required>
                <option value="New" {{ $invoice->status == 'New' ? 'selected' : ''  }}>{{ __('New') }}</option>
                <option value="Sent" {{ $invoice->status == 'Sent' ? 'selected' : ''  }}>{{ __('Sent') }}</option>
                <option value="Overdue" {{ $invoice->status == 'Overdue' ? 'selected' : '' }}>{{ __('Overdue') }}</option>
                <option value="Paid" {{ $invoice->status == 'Paid' ? 'selected' : '' }}>{{ __('Paid') }}</option>
                <option value="Cancelled" {{ $invoice->status == 'Cancelled' ? 'selected' : '' }}>{{ __('Cancelled') }}</option>
            </select>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <label for="sale_description">{{ __('Sale description') }}</label>
            <textarea class="form-control @error('sale_description') is-invalid @enderror" id="sale_description" name="sale_description"
                      placeholder="{{ __('Type a sale description') }}" required>{{ old('sale_description', $invoice->sale_description) }}
            </textarea>
        </div>
    </div>
</div>
