<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="name">{{ __('Name') }}</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="{{ __('Type a product name') }}" value="{{ old('name', $product->name) }}">
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label for="unit_price">{{ __('Unit Price') }}</label>
            <input type="text" class="form-control" id="unit_price" name="unit_price" placeholder="{{ __('Type a unit price') }}" value="{{ old('unit_price', $product->unit_price) }}">
        </div>
    </div>
</div>
