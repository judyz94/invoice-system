@extends ('layouts.base')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
            <div class="card">
                <div class="card-header pb-0">
                    <h4 class="card-title"><strong>{{ __('New Product') }}</strong></h4>
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
                <form action="{{ route('products.store') }}" method="POST" id="products-form">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">{{ __('Name') }}</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="{{ __('Type a product name') }}" value="{{ old('name') }}">
                            </div>
                        </div>
                    </div>
                </form>
        </div>
        <div class="card-footer d-flex justify-content-between">
            <a href="{{ route('products.index') }}" class="btn btn-danger">
                <i class="fas fa-arrow-left"></i> {{ __('Cancel') }}
            </a>
            <button type="submit" class="btn btn-success" form="products-form">
                <i class="fas fa-save"></i> {{ __('Submit') }}
            </button>
        </div>
    </div>
        </div>
    </div>
    </div>
@endsection

