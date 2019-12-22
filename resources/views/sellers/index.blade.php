@extends ('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3 class="card-title mb-0"><strong>{{ __('Sellers') }}</strong></h3>
                    <a href="{{ route('sellers.create') }}" class="btn btn-success"><i class="fas fa-plus"></i>
                        {{ __('Create a new seller') }}</a>
                </div>
                <div class="table-responsive-xl">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>City</th>
                            <th>Address</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sellers as $seller)
                            <tr>
                                <td>{{ $seller->document }}</td>
                                <td>{{ $seller->name }}</td>
                                <td>{{ $seller->email }}</td>
                                <td>{{ $seller->phone }}</td>
                                <td>{{ $seller->city->name }}</td>
                                <td>{{ $seller->address }}</td>
                                <td class="text-right">
                                    <div class="btn-group btn-group-sm" role="group" aria-label="{{ __('Actions') }}">
                                        <a href="{{ route('sellers.show', $seller) }}" class="btn btn-link"
                                           title="{{ __('Show Details') }}">
                                            <i class="fas fa-eye" style="color:black"></i>
                                        </a>
                                        <a href="{{ route('sellers.edit', $seller) }}" class="btn btn-link"
                                           title="{{ __('Edit Seller') }}">
                                            <i class="fas fa-edit" style="color:black"></i>
                                        </a>
                                        <button type="button" class="btn btn-link text-danger"
                                                data-route="{{ route('sellers.destroy', $seller) }}"
                                                data-toggle="modal"
                                                data-target="#confirmDeleteModal"
                                                title="{{ __('Delete seller') }}">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
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

