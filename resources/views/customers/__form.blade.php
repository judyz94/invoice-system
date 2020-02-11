<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="name" class="required">{{ __('Name') }}</label>
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
            <label for="last_name" class="required">{{ __('Last Name') }}</label>
            <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name" placeholder="{{ __('Type a last name') }}"
                   value="{{ old('last_name', $customer->last_name) }}" required>
            @error('last_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="document_type" class="required">{{ __('ID Type') }}</label>
            <select class="custom-select @error('document_type') is-invalid @enderror" id="document_type" name="document_type" required>
                <option value="CC" {{ $customer->document_type == 'CC' ? 'selected' : ''  }}>{{ __('CC') }}</option>
                <option value="TI" {{ $customer->document_type == 'TI' ? 'selected' : ''  }}>{{ __('TI') }}</option>
                <option value="CE" {{ $customer->document_type == 'CE' ? 'selected' : '' }}>{{ __('CE') }}</option>
                <option value="RC" {{ $customer->document_type == 'RC' ? 'selected' : '' }}>{{ __('RC') }}</option>
                <option value="NIT" {{ $customer->document_type == 'NIT' ? 'selected' : '' }}>{{ __('NIT') }}</option>
                <option value="RUT" {{ $customer->document_type == 'RUT' ? 'selected' : '' }}>{{ __('RUT') }}</option>
            </select>
            @error('document_type')
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
