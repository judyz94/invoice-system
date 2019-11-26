@extends ('layouts.app')

@section('title')Delete Invoices
@endsection
@section('content')
    <div class="row">
        <div class="col">
            <a class="btn btn-secondary" href="/invoices">Back to Invoices</a><br><br>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <br><h3>Delete Invoice {{ $invoice->id }}</h3><br>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <form action="/invoices/{{ $invoice->id }}" method="POST">
                @csrf
                @method('delete')
                <button class="btn btn-primary" type="submit">Delete</button>
            </form>
        </div>
    </div>
@endsection

