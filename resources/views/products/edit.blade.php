@extends ('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow-sm">
                    <div class="card-header pb-0">
                        <h4 class="card-title"><strong>{{ __('Edit Product') }} #{{ $product->id }}</strong></h4>
                    </div>

            <div class="card-body">
                <form action="{{ route('products.update', $product) }}" method="post" id="products-form">
                    @csrf
                    @method('put')
                    @include('products.__form')
                </form>
            </div>

            <div class="card-footer d-flex justify-content-between">
                <a href="{{ route('products.index') }}" class="btn btn-danger">
                    <i class="fas fa-arrow-left"></i> {{ __('Cancel') }}
                </a>
                <button type="submit" class="btn btn-success" form="products-form">
                    <i class="fas fa-edit"></i> {{ __('Update') }}
                </button>
            </div>

                </div>
            </div>
        </div>
    </div>
@endsection

