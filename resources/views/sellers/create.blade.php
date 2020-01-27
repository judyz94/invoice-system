@extends ('layouts.base')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow-sm">
                    <div class="card-header pb-0">
                        <h4 class="card-title"><strong>{{ __('New seller') }}</strong></h4>
                    </div>

                    <div class="card-body">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <p>{{ __('Correct the following errors:') }}</p>
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                            <form action="{{ route('sellers.store') }}" method="post" id="sellers-form">
                                @csrf
                                @include('sellers.__form')
                            </form>
                    </div>

                    <div class="card-footer d-flex justify-content-between">
                        <a href="{{ route('sellers.index') }}" class="btn btn-danger">
                            <i class="fas fa-arrow-left"></i> {{ __('Cancel') }}
                        </a>
                        <button type="submit" class="btn btn-success" form="sellers-form">
                            <i class="fas fa-save"></i> {{ __('Submit') }}
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

