<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="name" class="required">{{ __('Name') }}</label>
            <input type="text" class="form-control" id="name" name="name"
                   placeholder="{{ __('Type a product name') }}"
                   value="{{ old('name', $product->name) }}" required>
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="unit_price" class="required">{{ __('Unit Price') }}</label>
            <input type="text" class="form-control" id="unit_price" name="unit_price"
                   placeholder="{{ __('Type a unit price') }}"
                   value="{{ old('unit_price', $product->unit_price) }}" required>
            @error('unit_price')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
</div>
