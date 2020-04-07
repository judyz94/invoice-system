@extends ('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg">
                    <div class="card-header pb-0">
                        <h4 class="card-title"><strong>{{ __('Edit User') }} #{{ $user->id }}</strong></h4>
                    </div>

            <div class="card-body">
                <form action="{{ route('users.update', $user) }}" method="post" id="users-form">
                    @csrf
                    @method('put')
                    @include('users.__form')
                </form>
            </div>

            <div class="card-footer d-flex justify-content-between">
                <a href="{{ route('users.index') }}" class="btn buttonCancel">
                    <i class="fas fa-arrow-left"></i> {{ __('Cancel') }}
                </a>
                <button type="submit" class="btn buttonSave" form="users-form">
                    <i class="fas fa-edit"></i> {{ __('Update') }}
                </button>
            </div>

                </div>
            </div>
        </div>
    </div>
@endsection

