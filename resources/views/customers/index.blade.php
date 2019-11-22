@extends ('layouts.base')

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
                @foreach($customers as $customer)
                    <tr>
                        <td><a href="customers/{{ $customer->id }}">{{ $customer->document }}</a></td>
                        <td>{{ $customer->name }}</td>
                        {{--<td>{{ $customer->email }}</td>
                        <td>{{ $customer->phone }}</td>
                        <td>{{ $customer->address }}</td>--}}
                        <td><a href="/customers/{{ $customer->id }}/edit">Edit</a></td>
                        <td><a href="/customers/{{ $customer->id }}/confirmDelete">Delete</a></td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection

