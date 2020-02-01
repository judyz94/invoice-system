<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="name">{{ __('Full Name') }}</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="{{ __('Type a full name') }}"
                   value="{{ old('name', $customer->name) }}" required>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="document">{{ __('ID') }}</label>
            <input type="text" class="form-control @error('document') is-invalid @enderror" id="document" name="document" placeholder="{{ __('Type a ID') }}"
                   value="{{ old('document', $customer->document) }}" required>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="email">{{ __('Email') }}</label>
            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="{{ __('name@example.com') }}"
                   value="{{ old('email',  $customer->email) }}" required>
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
            <label for="city_id">{{ __('City') }}</label>
            <select class="custom-select @error('city_id') is-invalid @enderror" id="city_id" name="city_id" required>
                <option value="">{{ __('Select a city') }}</option>
                @foreach($cities as $city)
                    <option value="{{ $city->id }}"
                        {{ old('city_id', $customer->city_id) == $city->id ? 'selected' : ''}}>{{ $city->name }}
                    </option>
                @endforeach
            </select>
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
