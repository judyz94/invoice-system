@extends ('layouts.app')

@section('title')Customers
@endsection
@section('content')
    <div class="row">
        <div class="col">
            <h1><strong>Customers</strong></h1><br>
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
                <th>Customer #</th>
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
                        <td>{{ $customer->id }}</td>
                        <td><a href="customers/{{ $customer->id }}">{{ $customer->document }}</a></td>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>{{ $customer->phone }}</td>
                        <td>{{ $customer->city_id }}</td>
                        <td>{{ $customer->address }}</td>
                        <div class="btn-group">
                            <td>
                                <a class="btn btn-secondary  btn-sm" href="/customers/{{ $customer->id }}/edit">Edit</a>
                                <a class="btn btn-secondary  btn-sm" href="/customers/{{ $customer->id }}/confirmDelete">Delete</a>
                                <a class="btn btn-primary btn-sm" href="/customers/{{ $customer->id }}/invoices/create">Associate new invoice</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

