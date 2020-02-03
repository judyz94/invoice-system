<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="name" class="required">{{ __('Full Name') }}</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="{{ __('Type a full name') }}"
                   value="{{ old('name', $customer->name) }}" required>
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="document" class="required">{{ __('ID') }}</label>
            <input type="number" class="form-control @error('document') is-invalid @enderror" id="document" name="document" placeholder="{{ __('Type a ID') }}"
                   value="{{ old('document', $customer->document) }}" required>
            @error('document')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="email" class="required">{{ __('Email') }}</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="{{ __('name@example.com') }}"
                   value="{{ old('email',  $customer->email) }}" required>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="phone">{{ __('Phone') }}</label>
            <input type="text" class="form-control" id="phone" name="phone" placeholder="{{ __('Type a phone') }}"
                   value="{{ old('phone', $customer->phone) }}">
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="city_id" class="required">{{ __('City') }}</label>
            <select class="custom-select @error('city_id') is-invalid @enderror" id="city_id" name="city_id" required>
                <option value="">{{ __('Select a city') }}</option>
                @foreach($cities as $city)
                    <option value="{{ $city->id }}"
                        {{ old('city_id', $customer->city_id) == $city->id ? 'selected' : ''}}>{{ $city->name }}
                    </option>
                @endforeach
            </select>
            @error('city_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="address">{{ __('Address') }}</label>
            <input type="text" class="form-control" id="address" name="address" placeholder="{{ __('Type a address') }}"
                   value="{{ old('address', $customer->address) }}">
        </div>
    </div>
</div>
