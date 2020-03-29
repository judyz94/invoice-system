@extends ('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-10">
                <div class="card shadow-sm">
                    <div class="card-header d-flex justify-content-between">
                        <h3 class="card-title mb-0"><strong>{{ __('Customers') }}</strong></h3>
                    </div>

                    <!-- Create new customer -->
                    <nav class="navbar navbar-light bg-light">
                        <a href="{{ route('customers.create') }}"
                           class="btn btn-success">
                            <i class="fas fa-plus"></i> {{ __('Create a new customer') }}
                        </a>

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

                    <!-- Customers list -->
                    <div class="table-responsive-xl">
                        <table class="table table-hover" style="width:100%">
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
                            @forelse($customers as $customer)
                                <tr>
                                    <td>{{ $customer->document }}</td>
                                    <td>{{ $customer->document_type }}</td>
                                    <td>{{ $customer->full_name }}</td>
                                    <td>{{ $customer->email }}</td>
                                    <td>{{ $customer->phone }}</td>
                                    <td>{{ $customer->city->name }}</td>
                                    <td>{{ $customer->address }}</td>
                                    <td class="text-right">
                                        <div class="btn-group btn-group-sm" role="group" aria-label="{{ __('Actions') }}">

                                            <!-- CRUD buttons -->
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

                            <!-- Alert when there are no invoices -->
                            @empty
                                <tr>
                                    <p class="alert alert-secondary text-center">
                                        {{ __('No customers were found') }}
                                    </p>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>

                        <!-- Pagination -->
                        <ul class="pagination justify-content-center">
                            {{ $customers->appends(['type' => $type, 'search' => $search])->links() }}
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

