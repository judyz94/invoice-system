@extends ('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4 class="card-title"><strong>{{ __('Edit Product') }} #{{ $product->id }}</strong></h4>
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
            <form action="{{ route('products.update', $product) }}" method="POST" id="products-form">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="name">{{ __('Name') }}</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="{{ __('Type a product name') }}" value="{{ old('name', $product->name) }}">
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
                    <i class="fas fa-edit"></i> {{ __('Update') }}
                </button>
            </div>
                </div>

@endsection
