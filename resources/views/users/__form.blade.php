<div class="form-group row">
    <label for="name" class=" required col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
    <div class="col-md-6">
        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $user->name) }}" required>
        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="email" class="required col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>
    <div class="col-md-6">
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email) }}" required>
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="roles" class="required col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>
    <div class="col-md-6">
    <select class="custom-select" name="roles" id="roles" required>
        <option value="">{{ __('Select a role') }}</option>
        @foreach($roles as $role)
            <option value="{{$role->id}}"
                {{ old('roles', $role->id) == $role->id ? 'selected' : ''}}>{{$role->name}}
            </option>
        @endforeach
    </select>
    </div>

    {{--<select class="mdb-select colorful-select dropdown-primary md-form" multiple searchable="Search here..">
        <option value="" disabled selected>{{ __('Select a role') }}</option>
        @foreach($roles as $role)
            <option value="{{$role->id}}"
                {{ old('name') == $role->id ? 'selected' : ''}}>{{$role->name}}
            </option>
        @endforeach
    </select>--}}

    {{--<div class="col-md-6">
        <input id="email" type="email" class="form-control @error('name') is-invalid @enderror" name="role" value="{{ old('name', $role->name) }}" required>

        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>--}}
</div>



