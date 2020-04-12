@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-lg box">
                <div class="card-header text-center shadow-sm">
                    <h1 class="card-title"><strong> {{ Auth::user()->name }}  <i class="fas fa-cat"></i></strong></h1>
                    <h3 class="card-title font-title"><strong>{{ __('Welcome to Invoice System for Pet Friends!') }} </strong></h3>
                </div>

                <div class="card-body text-center m-lg-5">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @can('invoices.edit')
                        <div class="card-columns">
                            <div class="card box" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title"><i class="fas fa-users"></i> <strong>Customers</strong></h5>
                                    <p class="card-text">In this section, you can see the list of all the customers, the
                                        detailed information of each one, create new ones, edit and delete the old ones.
                                        In addition, you will have access to the invoices belonging to each customer.</p>
                                    <a href="{{ route('customers.index') }}" class="btn btn-primary button">Go <i class="fas fa-paw"></i></a>
                                </div>
                            </div>

                            <div class="card box" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title"><i class="fas fa-users-cog"></i> <strong>Sellers</strong></h5>
                                    <p class="card-text">In this section, you can see the list of all the sellers, the
                                        detailed information of each one, create new ones, edit and delete the old ones.
                                        In addition, you will have access to the invoices belonging to each seller.
                                    </p>
                                    <a href="{{ route('sellers.index') }}" class="btn btn-primary button">Go <i class="fas fa-paw"></i></a>
                                </div>
                            </div>

                            <div class="card box" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title"><i class="fas fa-box-open"></i> <strong>Products</strong></h5>
                                    <p class="card-text">In this section, you can see the list of all the products with the
                                        unit prices, create new ones, edit and delete the old ones.</p>
                                    <a href="{{ route('products.index') }}" class="btn btn-primary button">Go <i class="fas fa-paw"></i></a>
                                </div>
                            </div>

                            <div class="card box" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title"><i class="fas fa-file-alt"></i> <strong>Invoices</strong></h5>
                                    <p class="card-text">In this section, you can see the list of all the invoices with the
                                        detailed information of each one, create new ones, edit and delete the old ones.
                                        In addition, you can add details(products, quantity and prices) to the invoices.
                                        Too, you can import excel files with invoices.</p>
                                    <a href="{{ route('invoices.index') }}" class="btn btn-primary button">Go <i class="fas fa-paw"></i></a>
                                </div>
                            </div>
                        </div>
                    @endcan

                        @can('invoices.index.customer')
                        <!-- Customer rol pay -->
                            <div class="row justify-content-center">
                                <div class="card box" style="width: 18rem;" >
                                    <div class="card-body">
                                        @can('invoices.destroy')
                                            <div class="card-header text-center shadow-sm">
                                                <h1 class="card-title font-title"><strong>{{ __('FOR CUSTOMERS') }}</strong></h1>
                                            </div>
                                        @endcan
                                        <h4 class="card-title"><strong>How to pay my invoice?</strong></h4>
                                        <p class="card-text">
                                            <strong>1.</strong> The button at the end of the box will take you to a page where you can view your invoices.
                                        </p>
                                        <p class="card-text">
                                            <strong>2.</strong> There, you click the eye-shaped button (Show details), to see the details of your invoice.
                                        </p>
                                        <p class="card-text">
                                            <strong>3.</strong> There you will find the "sale summary" button, click on it.
                                        </p>
                                        <p class="card-text">
                                            <strong>4.</strong> Then it will display a window with the "pay" button that will redirect you to our payment gateway, PlaceToPay!
                                        </p>

                                        <a href="{{ route('invoices.index.customer') }}" type="submit" class="btn buttonSave">
                                            <i class="fas fa-bil"></i> {{ __('Go to my invoices') }}
                                        </a>
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

