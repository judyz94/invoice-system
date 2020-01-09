@extends ('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-10">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h3 class="card-title mb-0"><strong>{{ __('Customers') }}</strong></h3>
                    </div>

                    <nav class="navbar navbar-light bg-light">
                        <a href="{{ route('customers.create') }}" class="btn btn-success">
                            <i class="fas fa-plus"></i> {{ __('Create a new customer') }}
                        </a>

                        <form class="form-inline">
                            <select name="type" class="form-control mr-sm-2" id="select">
                                <option value="">Search for</option>
                                <option value="document">ID</option>
                                <option value="name">Name</option>
                                <option value="email">Email</option>
                            </select>

                            <input name="searchfor" class="form-control mr-sm-2" type="search" aria-label="Search">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                        </form>
                    </nav>

                    <div class="table-responsive-xl">
                        <table class="table table-hover" style="width:100%">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>City</th>
                                <th>Address</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($customers as $customer)
                                <tr>
                                    <td>{{ $customer->document }}</td>
                                    <td>{{ $customer->name }}</td>
                                    <td>{{ $customer->email }}</td>
                                    <td>{{ $customer->phone }}</td>
                                    <td>{{ $customer->city->name }}</td>
                                    <td>{{ $customer->address }}</td>
                                    <td class="text-right">
                                        <div class="btn-group btn-group-sm" role="group" aria-label="{{ __('Actions') }}">
                                            <a href="{{ route('customers.show', $customer) }}"
                                               class="btn btn-link" title="{{ __('Show Details') }}">
                                                <i class="fas fa-eye" style="color:black"></i>
                                            </a>
                                            <a href="{{ route('customers.edit', $customer) }}"
                                               class="btn btn-link" title="{{ __('Edit Customer') }}">
                                                <i class="fas fa-edit" style="color:black"></i>
                                            </a>
                                            <button type="button" class="btn btn-link text-danger"
                                                    data-route="{{ route('customers.destroy', $customer) }}"
                                                    data-toggle="modal" data-target="#confirmDeleteModal"
                                                    title="{{ __('Delete Customer') }}">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <ul class="pagination justify-content-center">
                            {{ $customers->links() }}
                        </ul>
                    </div>
                </div>
        </div>
    </div>
    </div>
@endsection
@push('modals')
    @include('partials.__confirm_delete_modal')
@endpush
@push('scripts')
    <script src="{{ asset(mix('js/delete-modal.js')) }}"></script>
@endpush

