@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-lg box">
                <div class="card-header text-center shadow-sm">
                    <h1 class="card-title font-title"><strong>{{ __('Welcome to Invoice System for Pet Friends!') }}  <i class="fas fa-dog"></i> <i class="fas fa-cat"></i></strong></h1>
                </div>

                <div class="card-body text-center m-lg-5">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- Customer rol pay -->
                        <div class="row justify-content-center">
                        <div class="card box" style="width: 18rem;" >
                            <div class="card-body">
                                <h4 class="card-title"><strong>How to pay my invoice?</strong></h4>
                                <p class="card-text">
                                    <strong>1.</strong> The button at the end of the box will take you to a page where you can view the details of your invoice.
                                </p>
                                <p class="card-text">
                                    <strong>2.</strong> There you will find the "sale summary" button, click on it.
                                </p>
                                <p class="card-text">
                                    <strong>3.</strong> Then it will display a window with the "pay" button that will redirect you to our payment gateway, PlaceToPay!
                                </p>

                                <a href="{{ route('invoices.show', $invoice) }}" type="submit" class="btn buttonSave">
                                    <i class="fas fa-bil"></i> {{ __('Go to invoice details') }}
                                </a>
                            </div>
                        </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
