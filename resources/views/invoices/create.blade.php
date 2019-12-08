@extends ('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
            <div class="card">
                <div class="card-header pb-0">
                    <h4 class="card-title"><strong>New Invoice</strong></h4>
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
                <form action="/invoices" method="POST" id="invoices-form">
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="code">Code</label>
                                <input type="text" class="form-control" id="code" name="code" placeholder="Type a code with format 'A0001'" value="{{ old('code') }}">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="expedition_date">Expedition date</label>
                                <input type="text" class="form-control" id="expedition_date" name="expedition_date" placeholder="YYYY/MM/DD" value="{{ old('expedition_date') }}">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="due_date">Due date</label>
                                <input type="text" class="form-control" id="due_date" name="due_date" placeholder="YYYY/MM/DD" value="{{ old('due_date') }}">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="receipt_date">Receipt date</label>
                                <input type="text" class="form-control" id="receipt_date" name="receipt_date" placeholder="YYYY/MM/DD" value="{{ old('receipt_date') }}">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="seller">Seller</label>
                                <select class="form-control" id="seller_id" name="seller_id">
                                    <option value="">Select seller ID</option>
                                    @foreach($sellers as $seller)
                                        <option value="{{ $seller->id }}">{{ $seller->document }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="sale_description">Sale description</label>
                                <input type="text" class="form-control" id="sale_description" name="sale_description" placeholder="Type a sale description" value="{{ old('sale_description') }}">
                            </div>
                        </div>

                        <input type="hidden" class="form-control" id="total" name="total" placeholder="Type the total value" value="{{ old('total') }}">

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="vat">VAT</label>
                                <input type="text" class="form-control" id="vat" name="vat" placeholder="Type the vat value" value="{{ old('vat') }}">
                            </div>
                        </div>

                        <input type="hidden" class="form-control" id="total_with_vat" name="total_with_vat"  value="{{ old('total_with_vat') }}">

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="customer">Customer</label>
                                <select class="form-control" id="customer_id" name="customer_id">
                                    <option value="">Select customer ID</option>
                                    @foreach($customers as $customer)
                                        <option value="{{ $customer->id }}">{{ $customer->document }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" id="status" name="status">
                                    <option value="">Select status</option>
                                    <option value="sent" {{'status' == 'sent' ? 'selected' : '' }}>Sent</option>
                                    <option value="rejected" {{'status'  == 'rejected' ? 'selected' : '' }}>Rejected</option>
                                    <option value="overdue" {{ 'status'  == 'overdue' ? 'selected' : '' }}>Overdue</option>
                                    <option value="paid" {{ 'status'  == 'paid' ? 'selected' : '' }}>Paid</option>
                                    <option value="cancelled" {{ 'status'  == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="user_id">User</label>
                                <select class="form-control" id="user_id" name="user_id">
                                    <option value="">Select user name</option>
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
            <a href="/invoices" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Back to Invoices
            </a>
            <button type="submit" class="btn btn-success" form="invoices-form">
                <i class="fas fa-save"></i> Submit
            </button>
        </div>
    </div>
        </div>
    </div>
@endsection

