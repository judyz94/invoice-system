@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-lg box">
                <div class="card-header text-center shadow-sm">
                    <h1 class="card-title"><strong> {{ Auth::user()->name }}  <i class="fas fa-cat"></i></strong></h1>
                    @if(Auth::user()->roles[0]->name != 'Suspended')
                        <h3 class="card-title font-title"><strong>{{ __('Welcome to Invoice System for Pet Friends!') }} </strong></h3>
                    @endif
                </div>

                <div class="card-body text-center m-lg-5">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(Auth::user()->roles[0]->name == 'Suspended')
                            <div class="row justify-content-center">
                                <div class="card box" style="width: 25rem;" >
                                    <div class="card-body">
                                        <h4 class="card-title"><strong>  <i class="fas fa-exclamation-circle warning"></i>
                                                 His role is suspended!</strong></h4>
                                        <p class="card-text text-color">
                                            <strong>
                                            Please contact the administrator to get permissions on the system.
                                            </strong>
                                        </p>
                                    </div>
                                </div>
                            </div>
                    @endif

                    @can('invoices.edit')
                        <div class="card-columns">
                            <div class="card box" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title"><i class="fas fa-users"></i> <strong>Customers</strong></h5>
                                    <p class="card-text text-color">In this section, you can see the list of all the customers, the
                                        detailed information of each one, create new ones, edit and delete the old ones.
                                        In addition, you will have access to the invoices belonging to each customer.</p>
                                    <a href="{{ route('customers.index') }}" class="btn btn-primary button">Go <i class="fas fa-paw"></i></a>
                                </div>
                            </div>

                            <div class="card box" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title"><i class="fas fa-users-cog"></i> <strong>Sellers</strong></h5>
                                    <p class="card-text text-color">In this section, you can see the list of all the sellers, the
                                        detailed information of each one, create new ones, edit and delete the old ones.
                                        In addition, you will have access to the invoices belonging to each seller.
                                    </p>
                                    <a href="{{ route('sellers.index') }}" class="btn btn-primary button">Go <i class="fas fa-paw"></i></a>
                                </div>
                            </div>

                            <div class="card box" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title"><i class="fas fa-box-open"></i> <strong>Products</strong></h5>
                                    <p class="card-text text-color">In this section, you can see the list of all the products with the
                                        unit prices, create new ones, edit and delete the old ones.</p>
                                    <a href="{{ route('products.index') }}" class="btn btn-primary button">Go <i class="fas fa-paw"></i></a>
                                </div>
                            </div>

                            <div class="card box" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title"><i class="fas fa-file-alt"></i> <strong>Invoices</strong></h5>
                                    <p class="card-text text-color">In this section, you can see the list of all the invoices with the
                                        detailed information of each one, create new ones, edit and delete the old ones.
                                        In addition, you can add details(products, quantity and prices) to the invoices.
                                        Too, you can import excel files with invoices.</p>
                                    <a href="{{ route('invoices.index') }}" class="btn btn-primary button">Go <i class="fas fa-paw"></i></a>
                                </div>
                            </div>
                        </div>
                    @endcan

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

