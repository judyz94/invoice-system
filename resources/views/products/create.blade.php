@extends ('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
            <div class="card shadow-sm">
                <div class="card-header pb-0">
                    <h4 class="card-title"><strong>{{ __('New Product') }}</strong></h4>
                </div>

        <div class="card-body">
            <form action="{{ route('products.store') }}" method="post" id="products-form">
                @csrf
                @include('products.__form')
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

