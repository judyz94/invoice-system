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
    <label for="document" class="required col-md-4 col-form-label text-md-right">{{ __('Document') }}</label>
    <div class="col-md-6">
        <input id="document" type="text" class="form-control @error('document') is-invalid @enderror" name="document" value="{{ old('document', $user->document) }}" required>
        @error('document')
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
    <label class="required col-md-4 col-form-label text-md-right">{{ __('Select roles') }}</label>
    <div class="col-md-6">
        <ul class="list-unstyled">
        @foreach($roles as $role)
            <li>
                <div class="pretty p-icon p-jelly p-round p-bigger">
                    <input type="checkbox" name="roles[]" value="{{ old('$roles', $role->id) }}"
                        @isset($user->id)
                           @if($user->roles->contains($role->id)) checked="checked"@endif
                        @endisset >
                    <div class="state p-info">
                        <i class="icon material-icons fa fa-check"></i>
                        <label> {{ $role->name }} </label>
                    </div>
                </div>
            </li>
        @endforeach
        </ul>
    </div>
</div>
