@extends ('layouts.base')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4 class="card-title"><strong>{{ __('Edit User') }}  {{ $user->name }}</strong></h4>
                    </div>
                    <div class="card-body">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        {{ $error }}
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                            <form action="{{ route('users.update', $user) }}" method="post" id="users-form">
                                @csrf
                                @method('put')
                                @include('users.__form')
                            </form>
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <a href="{{ route('users.index') }}" class="btn btn-danger">
                            <i class="fas fa-arrow-left"></i> {{ __('Cancel') }}
                        </a>
                        <button type="submit" class="btn btn-success" form="users-form">
                            <i class="fas fa-save"></i> {{ __('Submit') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

