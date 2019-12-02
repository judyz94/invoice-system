@extends ('layouts.app')

@section('title')Delete Invoice Detail
@endsection
@section('content')
    <div class="row">
        <div class="col">
            <a class="btn btn-secondary" href="/invoices/{{ $invoice->id }}">Back to Invoice Details</a><br><br>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <br><h3><strong>Delete Detail of Invoice #{{ $invoice->code }}</strong></h3><br>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <form action="/invoices/{{ $invoice->id }}/products/{{ $product->id }}" method="POST">
                @csrf
                @method('delete')
                <button class="btn btn-primary" type="submit">Delete</button>
            </form>
        </div>
    </div>
@endsection
