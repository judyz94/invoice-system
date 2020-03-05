<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="expedition_date" class="required">{{ __('Expedition date') }}</label>
            <input type="date" class="form-control @error('expedition_date') is-invalid @enderror" id="expedition_date" name="expedition_date"
                   value="{{ old('expedition_date', now()->toDateString()) }}">
            @error('expedition_date')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="due_date" class="required">{{ __('Due date') }}</label>
            <input type="date" class="form-control @error('due_date') is-invalid @enderror" id="due_date" name="due_date"
                   value="{{ old('due_date', now()->addDays(30)->toDateString()) }}" required>
            @error('due_date')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    {{--<div class="col-md-4">
        <div class="form-group">
            <label for="receipt_date">{{ __('Receipt date') }}</label>
            <input type="date" class="form-control @error('receipt_date') is-invalid @enderror" id="receipt_date" name="receipt_date"
                   value="{{ old('receipt_date', $invoice->receipt_date) }}">
            @error('receipt_date')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>--}}

    <div class="col-md-4">
        <div class="form-group">
            <label for="seller_id" class="required">{{ __('Seller') }}</label>
            <select class="custom-select @error('seller_id') is-invalid @enderror" id="seller_id" name="seller_id" required>
                <option value="">{{ __('Select seller') }}</option>
                @foreach($sellers as $seller)
                    <option value="{{ $seller->id }}"
                        {{ old('seller_id', $invoice->seller_id) == $seller->id ? 'selected' : ''}}>{{ $seller->full_name }}
                    </option>
                @endforeach
            </select>
            @error('seller_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="customer_id" class="required">{{ __('Customer') }}</label>
            <select class="custom-select @error('customer_id') is-invalid @enderror" id="customer_id" name="customer_id" required>
                <option value="">{{ __('Select customer') }}</option>
                @foreach($customers as $customer)
                    <option value="{{ $customer->id }}"
                        {{ old('customer_id', $invoice->customer_id) == $customer->id ? 'selected' : ''}}>{{ $customer->full_name }}
                    </option>
                @endforeach
            </select>
            @error('customer_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    {{--}}<div class="col-md-4">
        <div class="form-group">
            <label for="state_id" class="required">{{ __('Status') }}</label>
            <select class="custom-select @error('state_id') is-invalid @enderror" id="state_id" name="state_id" required>
                @foreach($states as $state)
                    <option value="{{ $state->id }}"
                        {{ old('state_id', $invoice->state_id) == $state->id ? 'selected' : ''}}>{{ $state->name }}
                    </option>
                @endforeach
            </select>
            @error('state_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>--}}

    <div class="col-md-12">
        <div class="form-group">
            <label for="sale_description" class="required">{{ __('Sale description') }}</label>
            <textarea class="form-control @error('sale_description') is-invalid @enderror" id="sale_description" name="sale_description"
                      placeholder="{{ __('Type a sale description') }}" required>{{ old('sale_description', $invoice->sale_description) }}
            </textarea>
            @error('sale_description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
</div>
