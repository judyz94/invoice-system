@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">
                    <h1 class="card-title"><strong>{{ __('Welcome to Invoice System for PlaceToPay!') }}</strong></h1>
                </div>
                <div class="card-body text-center m-lg-5">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="card-columns">

                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title"><i class="fas fa-user-friends"></i> <strong>Users</strong></h5>
                                <p class="card-text">In this section, you can see the list of all the users with access
                                    to program, the personal information of each one, create new ones and delete the
                                    old ones.</p>
                                <a href="{{ route('users.index') }}" class="btn btn-primary">Go</a>
                            </div>
                        </div>

                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title"><i class="fas fa-users"></i> <strong>Customers</strong></h5>
                                <p class="card-text">In this section, you can see the list of all the customers, the
                                    detailed information of each one, create new ones, edit and delete the old ones.
                                    In addition, you will have access to the invoices belonging to each customer.</p>
                                <a href="{{ route('customers.index') }}" class="btn btn-primary">Go</a>
                            </div>
                        </div>

                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title"><i class="fas fa-users-cog"></i> <strong>Sellers</strong></h5>
                                <p class="card-text">In this section, you can see the list of all the sellers, the
                                    detailed information of each one, create new ones, edit and delete the old ones.
                                    In addition, you will have access to the invoices belonging to each seller.
                                </p>
                                <a href="{{ route('sellers.index') }}" class="btn btn-primary">Go</a>
                            </div>
                        </div>

                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title"><i class="fas fa-shopping-cart"></i> <strong>Products</strong></h5>
                                <p class="card-text">In this section, you can see the list of all the products with the
                                    unit prices, create new ones, edit and delete the old ones.</p>
                                <a href="{{ route('products.index') }}" class="btn btn-primary">Go</a>
                            </div>
                        </div>

                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title"><i class="fas fa-file-alt"></i> <strong>Invoices</strong></h5>
                                <p class="card-text">In this section, you can see the list of all the invoices with the
                                    detailed information of each one, create new ones, edit and delete the old ones.
                                    In addition, you can add details(products, quantity and prices) to the invoices.
                                    Too, you can import excel files with invoices.</p>
                                <a href="{{ route('invoices.index') }}" class="btn btn-primary">Go</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
