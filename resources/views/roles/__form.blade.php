<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="name" class="required">{{ __('Name') }}</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="{{ __('Type a name') }}"
                   value="{{ old('name', $role->name) }}" required>
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="slug" class="required">{{ __('Slug') }}</label>
            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" placeholder="{{ __('Type a slug') }}"
                   value="{{ old('slug', $role->slug) }}" required>
            @error('slug')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="description">{{ __('Description') }}</label>
            <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description" placeholder="{{ __('Type a description') }}"
                   value="{{ old('description', $role->description) }}">
            @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="special">{{ __('Special role') }}</label>
            <select class="custom-select" id="special" name="special">
                <option value="">{{ __('Select a special role') }}</option>
                <option value="all-access" {{ $role->special == 'all-access' ? 'selected' : ''  }}>{{ __('all-access') }}</option>
                <option value="no-access" {{ $role->special == 'no-access' ? 'selected' : ''  }}>{{ __('no-access') }}</option>
            </select>
        </div>
    </div>
</div>
