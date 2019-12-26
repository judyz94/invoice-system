@extends ('layouts.base')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4 class="card-title"><strong>{{ __('Edit Customer ID') }}
                                {{ $customer->document }}</strong></h4>
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
                            <form action="{{ route('customers.update', $customer) }}" method="post" id="customers-form">
                                @csrf
                                @method('put')
                                @include('customers.__form')
                            </form>
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <a href="{{ route('customers.index') }}" class="btn btn-danger">
                            <i class="fas fa-arrow-left"></i> {{ __('Cancel') }}
                        </a>
                        <button type="submit" class="btn btn-success" form="customers-form">
                            <i class="fas fa-save"></i> {{ __('Submit') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

