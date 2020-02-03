<div class="row">
    <div class="col-md-3">
        <div class="form-group required">
            <label for="name">{{ __('Full Name') }}</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="{{ __('Type a full name') }}"
                   value="{{ old('name', $seller->name) }}" required>
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group required">
            <label for="document">{{ __('ID') }}</label>
            <input type="number" class="form-control @error('document') is-invalid @enderror" id="document" name="document" placeholder="{{ __('Type a ID') }}"
                   value="{{ old('document', $seller->document) }}" required>
            @error('document')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group required">
            <label for="email">{{ __('Email') }}</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="{{ __('name@example.com') }}"
                   value="{{ old('email',  $seller->email) }}" required>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label for="phone">{{ __('Phone') }}</label>
            <input type="text" class="form-control" id="phone" name="phone" placeholder="{{ __('Type a phone') }}"
                   value="{{ old('phone', $seller->phone) }}">
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group required">
            <label for="city_id">{{ __('City') }}</label>
            <select class="custom-select @error('city_id') is-invalid @enderror" id="city_id" name="city_id" required>
                <option value="">{{ __('Select a city') }}</option>
                @foreach($cities as $city)
                    <option value="{{ $city->id }}"
                        {{ old('city_id', $seller->city_id) == $city->id ? 'selected' : ''}}>{{ $city->name }}
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

    <div class="col-md-3">
        <div class="form-group">
            <label for="address">{{ __('Address') }}</label>
            <input type="text" class="form-control" id="address" name="address" placeholder="{{ __('Type a address') }}"
                   value="{{ old('address', $seller->address) }}">
        </div>
    </div>
</div>
