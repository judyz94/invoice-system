@extends ('layouts.app')

@section('title')Edit Invoices
@endsection
@section('content')
    <div class="row">
        <div class="col">
            <br>
            <a class="btn btn-secondary" href="/invoices">Back to Invoices</a><br><br>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h3>Edit Invoice # {{ $invoice->code }}</h3><br>
        </div>
    </div>
    <div class="row">
        <div class="col">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            {{ $error }}<br>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="/invoices/{{ $invoice->id }}" method="POST">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="code">Code:</label>
                    <input type="text" class="form-control" id="code" name="code" value="{{ old('code', $invoice->code) }}">
                    <label for="expedition_date">Expedition date:</label>
                    <input type="text" class="form-control" id="expedition_date" name="expedition_date" value="{{ old('expedition_date', $invoice->expedition_date) }}">
                    <label for="due_date">Due date:</label>
                    <input type="text" class="form-control" id="due_date" name="due_date" value="{{ old('due_date', $invoice->due_date) }}">
                    <label for="receipt_date">Receipt date:</label>
                    <input type="text" class="form-control" id="receipt_date" name="receipt_date" value="{{ old('receipt_date', $invoice->receipt_date) }}">
                    <label for="seller">Seller:</label>
                    <select class="form-control" id="seller_id" name="seller_id">
                        @foreach($sellers as $seller)
                            <option value="{{ $seller->id }}">{{ old('document', $seller->document) }}</option>
                        @endforeach
                    </select>
                    <label for="sale_description">Sale description:</label>
                    <input type="text" class="form-control" id="sale_description" name="sale_description" value="{{ old('sale_description', $invoice->sale_description) }}">
                    <label for="customer">Customer:</label>
                    <select class="form-control" id="customer_id" name="customer_id">
                        @foreach($customers as $customer)
                            <option value="{{ $customer->id }}">{{ old('document', $customer->document) }}</option>
                        @endforeach
                    </select>
                    <label for="status">Status:</label>
                    <select class="form-control" id="status" name="status">
                    <option value="sent" {{ $invoice->status == 'sent' ? 'selected' : '' }}>Sent</option>
                    <option value="rejected" {{ $invoice->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                    <option value="overdue" {{ $invoice->status == 'overdue' ? 'selected' : '' }}>Overdue</option>
                    <option value="paid" {{ $invoice->status == 'paid' ? 'selected' : '' }}>Paid</option>
                    <option value="cancelled" {{ $invoice->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                    </select>
                    <label for="user">User:</label>
                    <select class="form-control" id="user_id" name="user_id">
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ old('name', $user->name) }}</option>
                        @endforeach
                    </select>
                </div>
                <br>
                <button class="btn btn-primary" type="submit">Submit</button>
            </form>
        </div>
    </div>
@endsection
