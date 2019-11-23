@extends ('layouts.base')

@section('title')Create Customers
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
            <h1>New Customer</h1>
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
            <form action="/customers" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Full name:</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Type a full name" value="{{ old('name') }}">
                    <label for="document">Document:</label>
                    <input type="text" class="form-control" id="document" name="document" placeholder="Type a document" value="{{ old('document') }}">
                    <label for="email">Email:</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="name@example.com" value="{{ old('email') }}">
                    <label for="phone">Phone:</label>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Type a phone" value="{{ old('phone') }}">
                    <label for="city_id">City:</label>
                    <input type="text" class="form-control" id="city" name="city" placeholder="Type a city" value="{{ old('city') }}">
                    <label for="address">Address:</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Type a address" value="{{ old('address') }}">
                </div>
                <br>
                <button class="btn btn-primary" type="submit">Submit</button>
            </form>
        </div>
    </div>
@endsection
