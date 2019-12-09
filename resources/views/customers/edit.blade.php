@extends ('layouts.app')

@section('title')Edit Customers
@endsection
@section('content')
    <div class="row">
        <div class="col">
            <a class="btn btn-secondary" href="/customers">Back to Customers</a><br><br>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <br><h3><strong>Edit Customer ID {{ $customer->document }}</strong></h3><br>
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
                    <label for="document">ID:</label>
                    <input type="text" class="form-control" id="document" name="document" value="{{ old('document', $customer->document) }}">
                    <label for="email">Email:</label>
                    <input type="text" class="form-control" id="email" name="email" value="{{ old('email', $customer->email) }}">
                    <label for="phone">Phone:</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $customer->phone) }}">
                    <label for="city">City:</label>
                    <select class="form-control" id="city_id" name="city_id">
                        @foreach($cities as $city)
                            <option value="{{ $city->id }}">{{ old('name', $city->name) }}</option>
                        @endforeach
                    </select>
                    <label for="address">Address:</label>
                    <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $customer->address) }}">
                </div>
                <br>
                <button class="btn btn-primary" type="submit">Submit</button>
            </form>
        </div>
    </div>
@endsection

