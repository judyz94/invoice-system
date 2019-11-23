@extends ('layouts.base')

@section('title')Edit Customers
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
            <h3>Edit Customer {{ $customer->id }}</h3><br>
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
            <form action="{{ route('customers.update', $customer) }}" method="POST">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="name">Full name:</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $customer->name) }}">
                    <label for="document">Document:</label>
                    <input type="text" class="form-control" id="document" name="document" value="{{ old('document', $customer->document) }}">
                    <label for="email">Email:</label>
                    <input type="text" class="form-control" id="email" name="email" value="{{ old('email', $customer->email) }}">
                    <label for="phone">Phone:</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $customer->phone) }}">
                    <label for="city">City:</label>
                    <input type="text" class="form-control" id="city" name="city" value="{{ old('city', $customer->city) }}">
                    <label for="address">Address:</label>
                    <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $customer->address) }}">
                </div>
                <br>
                <button class="btn btn-primary" type="submit">Submit</button>
            </form>
        </div>
    </div>
@endsection

