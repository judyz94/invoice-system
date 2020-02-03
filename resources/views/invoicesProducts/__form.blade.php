<div class="row">
    <div class="form-group col-md-4">
        <label for="product_id">{{ __('Product Name') }}</label>
        <select class="custom-select @error('product_id') is-invalid @enderror" name="product_id" id="product_id" required>
            <option value="">{{ __('Select a product name') }}</option>
            @foreach($products as $product)
                <option value="{{$product->id}}"
                    {{ old('product_id') == $product->id ? 'selected' : ''}}>{{$product->name}}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group-required col-md-4">
        <label for="price">{{ __('Price') }}</label>
        <input class="form-control @error('price') is-invalid @enderror" type="number" id="price"
               value="{{ old('price') }}"
               placeholder="{{ __('Type a product price') }}" name="price" required>
    </div>

    <div class="form-group col-md-4">
        <label for="quantity">{{ __('Quantity') }}</label>
        <input class="form-control @error('quantity') is-invalid @enderror" type="number" id="quantity"
               value="{{ old('quantity') }}"
               placeholder="{{ __('Type a quantity') }}" name="quantity" required>
    </div>
</div>
