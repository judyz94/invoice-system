@extends ('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-10">
            <div class="card shadow-sm">
                <div class="card-header d-flex justify-content-between">
                    <h3 class="card-title mb-0"><strong>{{ __('Sellers') }}</strong></h3>
                </div>

                <nav class="navbar navbar-light bg-light">
                    <a href="{{ route('sellers.create') }}" class="btn btn-success"><i class="fas fa-plus"></i>
                        {{ __('Create a new seller') }}</a>

                    <!-- Search form -->
                    <form class="form-inline">
                        <select name="type" class="form-control mr-sm-2" id="select">
                            <option value="">{{ __('Filter by') }}</option>
                            <option value="document">{{ __('ID') }}</option>
                            <option value="name">{{ __('Name') }}</option>
                            <option value="email">{{ __('Email') }}</option>
                        </select>

                        <input name="searchfor" class="form-control mr-sm-2" type="search" placeholder="{{ __('Search...') }}">

                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fas fa-search"></i> {{ __('Search') }}</button>
                        <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit" onClick="window.history.back();">
                            <i class="fas fa-redo-alt"></i> {{ __('Refresh') }}</button>
                    </form>
                </nav>

                <!-- Sellers list -->
                <div class="table-responsive-xl">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>{{ __('ID') }}</th>
                            <th>{{ __('Name') }}</th>
                            <th>{{ __('Email') }}</th>
                            <th>{{ __('Phone') }}</th>
                            <th>{{ __('City') }}</th>
                            <th>{{ __('Address') }}</th>
                            <th>{{ __('Actions') }}</th>
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

                    <!-- Pagination -->
                    <ul class="pagination justify-content-center">
                        {{ $sellers->links() }}
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

