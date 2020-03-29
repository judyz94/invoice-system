@extends ('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-10">
            <div class="card shadow-sm">
                <div class="card-header d-flex justify-content-between">
                    <h3 class="card-title mb-0"><strong>{{ __('Sellers') }}</strong></h3>
                </div>

                <!-- Create new seller -->
                <nav class="navbar navbar-light bg-light">
                    <a href="{{ route('sellers.create') }}" class="btn btn-success"><i class="fas fa-plus"></i>
                        {{ __('Create a new seller') }}</a>

                    <!-- Search form -->
                    <form class="form-inline" method="GET">
                        <select name="type" class="form-control mr-sm-2" id="type">
                            <option value="">{{ __('All') }}</option>
                            <option value="document" {{ request()->input('type') == 'document' ? 'selected' : '' }}>{{ __('ID') }}</option>
                            <option value="name" {{ request()->input('type') == 'name' ? 'selected' : '' }}>{{ __('Name') }}</option>
                            <option value="last_name" {{ request()->input('type') == 'last_name' ? 'selected' : '' }}>{{ __('Last Name') }}</option>
                            <option value="email" {{ request()->input('type') == 'email' ? 'selected' : '' }}>{{ __('Email') }}</option>
                        </select>

                        <input name="search" id="search" value="{{ request()->input('search') }}" class="form-control mr-sm-2" type="search" placeholder="{{ __('Search...') }}">

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
                            <th>{{ __('Type') }}</th>
                            <th>{{ __('Full Name') }}</th>
                            <th>{{ __('Email') }}</th>
                            <th>{{ __('Phone') }}</th>
                            <th>{{ __('City') }}</th>
                            <th>{{ __('Address') }}</th>
                            <th>{{ __('Actions') }}</th>
                        </tr>
                        </thead>

                        <tbody>
                        @forelse($sellers as $seller)
                            <tr>
                                <td>{{ $seller->document }}</td>
                                <td>{{ $seller->document_type }}</td>
                                <td>{{ $seller->full_name }}</td>
                                <td>{{ $seller->email }}</td>
                                <td>{{ $seller->phone }}</td>
                                <td>{{ $seller->city->name }}</td>
                                <td>{{ $seller->address }}</td>
                                <td class="text-right">

                                    <!-- CRUD buttons -->
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

                        <!-- Alert when there are no invoices -->
                        @empty
                            <tr>
                                <p class="alert alert-secondary text-center">
                                    {{ __('No sellers were found') }}
                                </p>
                            </tr>
                        @endforelse

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

