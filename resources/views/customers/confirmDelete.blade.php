@extends ('layouts.app')

@section('title')Delete Customers
@endsection
@section('content')
    <div class="row">
        <div class="col">
            <a class="btn btn-secondary" href="/customers">Back to Customers</a><br><br>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <br><h3><strong>Delete Customer ID {{ $customer->document }}</strong></h3><br>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <form action="/customers/{{ $customer->id }}" method="POST">
                @csrf
                @method('delete')
                <button class="btn btn-primary" type="submit">Delete</button>
            </form>
        </div>
    </div>
@endsection

