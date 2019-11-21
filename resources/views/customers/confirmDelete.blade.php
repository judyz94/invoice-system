@extends ('layouts.base')

@section('title')Delete Customers
@endsection
@section('content')
    <div class="row">
        <div class="col">
            <br>
            <a class="btn btn-secondary" href="/customers">Back to Customers</a><br><br>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h3>Delete Customer {{ $customer->id }}</h3><br>
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

