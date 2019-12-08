@extends ('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
            <div class="card">
                <div class="card-header pb-0">
                    <h4 class="card-title"><strong>{{ __('New Invoice') }}</strong></h4>
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
                <form action="{{ route('invoices.create') }}" method="POST" id="invoices-form">
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="code">{{ __('Code') }}</label>
                                <input type="text" class="form-control" id="code" name="code" placeholder="{{ __('Format code - A0001') }}" value="{{ old('code') }}">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="expedition_date">{{ __('Expedition date') }}</label>
                                <input type="text" class="form-control" id="expedition_date" name="expedition_date" placeholder="{{ __('YYYY/MM/DD') }}" value="{{ old('expedition_date') }}">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="due_date">{{ __('Due date') }}</label>
                                <input type="text" class="form-control" id="due_date" name="due_date" placeholder="{{ __('YYYY/MM/DD') }}" value="{{ old('due_date') }}">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="receipt_date">{{ __('Receipt date') }}</label>
                                <input type="text" class="form-control" id="receipt_date" name="receipt_date" placeholder="{{ __('YYYY/MM/DD') }}" value="{{ old('receipt_date') }}">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="seller">{{ __('Seller ID') }}</label>
                                <select class="form-control" id="seller_id" name="seller_id">
                                    <option value="">{{ __('Select seller ID') }}</option>
                                    @foreach($sellers as $seller)
                                        <option value="{{ $seller->id }}">{{ $seller->document }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="sale_description">{{ __('Sale description') }}</label>
                                <input type="text" class="form-control" id="sale_description" name="sale_description" placeholder="{{ __('Type a sale description') }}" value="{{ old('sale_description') }}">
                            </div>
                        </div>

                        <input type="hidden" class="form-control" id="total" name="total" value="{{ old('total') }}">

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="vat">{{ __('VAT') }}</label>
                                <input type="text" class="form-control" id="vat" name="vat" placeholder="{{ __('Type the vat value') }}" value="{{ old('vat') }}">
                            </div>
                        </div>

                        <input type="hidden" class="form-control" id="total_with_vat" name="total_with_vat"  value="{{ old('total_with_vat') }}">

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="customer">{{ __('Customer ID') }}</label>
                                <select class="form-control" id="customer_id" name="customer_id">
                                    <option value="">{{ __('Select customer ID') }}</option>
                                    @foreach($customers as $customer)
                                        <option value="{{ $customer->id }}">{{ $customer->document }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="status">{{ __('Status') }}</label>
                                <select class="form-control" id="status" name="status">
                                    <option value="">{{ __('Select status') }}</option>
                                    <option value="sent" {{'status' == 'sent' ? 'selected' : '' }}>{{ __('Sent') }}</option>
                                    <option value="rejected" {{'status'  == 'rejected' ? 'selected' : '' }}>{{ __('Rejected') }}</option>
                                    <option value="overdue" {{ 'status'  == 'overdue' ? 'selected' : '' }}>{{ __('Overdue') }}</option>
                                    <option value="paid" {{ 'status'  == 'paid' ? 'selected' : '' }}>{{ __('Paid') }}</option>
                                    <option value="cancelled" {{ 'status'  == 'cancelled' ? 'selected' : '' }}>{{ __('Cancelled') }}</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="user_id">{{ __('User') }}</label>
                                <select class="form-control" id="user_id" name="user_id">
                                    <option value="">{{ __('Select user name') }}</option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
        </div>
        <div class="card-footer d-flex justify-content-between">
            <a href="{{ route('invoices.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> {{ __('Back to Invoices') }}
            </a>
            <button type="submit" class="btn btn-success" form="invoices-form">
                <i class="fas fa-save"></i> {{ __('Submit') }}
            </button>
        </div>
    </div>
        </div>
    </div>
    </div>
@endsection

