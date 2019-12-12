@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">
                    <h1 class="card-title"><strong>{{ __('Welcome to Invoice System for PlaceToPay!') }}</strong></h1>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <div class="links text-center">
                            <p><h5>Please choose the option from the following menu:</h5></p><br>
                            <ul>
                                <h3><a href="{{ route('customers.index') }}" class="text-info">Customers</a></h3><br>
                                <h3><a href="{{ route('sellers.index') }}" class="text-info">Sellers</a></h3><br>
                                <h3><a href="{{ route('products.index') }}" class="text-info">Products</a></h3><br>
                                <h3><a href="{{ route('invoices.index') }}" class="text-info">Invoices</a></h3><br>
                            </ul>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
