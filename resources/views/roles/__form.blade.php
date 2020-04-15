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
                <option value="all-access" {{ $role->special == 'all-access' ? 'selected' : ''  }}>{{ __('Total permission') }}</option>
                <option value="no-access" {{ $role->special == 'no-access' ? 'selected' : ''  }}>{{ __('No permission') }}</option>
            </select>
        </div>
    </div>

    <div class="col-md-12 text-center">
        <div class="form-group">
            <label for="permissions"><strong>{{ __('Permissions') }} <em>({{ 'Select the permissions' }})</em></strong></label>
            <ul class="list-unstyled column" id="permissions">
                @foreach($permissions as $permission)
                    <div class="pretty p-icon p-jelly p-round p-bigger">
                        <input type="checkbox" name="permissions[]" value="{{ old('$permissions', $permission->id) }}"
                               @isset($role->id)
                               @if($role->permissions->contains($permission->id)) checked="checked"
                            @endif
                            @endisset >
                        <div class="state p-info">
                            <i class="icon material-icons fa fa-check"></i>
                            <label> {{ $permission->name }} </label>
                        </div>
                    </div>
                @endforeach
            </ul>
        </div>
    </div>
</div>
