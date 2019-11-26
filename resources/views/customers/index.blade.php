@extends ('layouts.app')

@section('title')Customers
@endsection
@section('content')
    <div class="row">
        <div class="col">
            <h1>Customers</h1><br>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a class="btn btn-primary" href="/customers/create">Create a new customer</a><br><br>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table">
            <thead>
            <tr>
                <th>Document</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>City</th>
                <th>Address</th>
            </tr>
            </thead>
                <tbody>
                @foreach($customers as $customer)
                    <tr>
                        <td><a href="customers/{{ $customer->id }}">{{ $customer->document }}</a></td>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>{{ $customer->phone }}</td>
                        <td>{{ $customer->city_id }}</td>
                        <td>{{ $customer->address }}</td>
                        <td><a href="/customers/{{ $customer->id }}/edit">Edit</a></td>
                        <td><a href="/customers/{{ $customer->id }}/confirmDelete">Delete</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

