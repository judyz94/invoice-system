@extends ('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow-lg">
                    <div class="card-header pb-0">
                        <h4 class="card-title"><strong>{{ __('Edit Role') }} {{ $role->name }}  <i class="fas fa-user-tag"></i></strong></h4>
                    </div>

                    <div class="card-body">
                      <form action="{{ route('roles.update', $role) }}" method="post" id="roles-form">
                          @csrf
                          @method('put')
                          @include('roles.__form')
                      </form>
                    </div>

                    <div class="card-footer d-flex justify-content-between">
                        <a href="{{ route('roles.index') }}" class="btn buttonCancel">
                            <i class="fas fa-arrow-left"></i> {{ __('Cancel') }}
                        </a>
                        <button type="submit" class="btn buttonSave" form="roles-form">
                            <i class="fas fa-save"></i> {{ __('Update') }}
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

