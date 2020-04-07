@extends ('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10">
                <div class="card shadow-lg">
                    <div class="card-header d-flex justify-content-between">
                        <h3 class="card-title mb-0"><strong>{{ __('Roles') }}  <i class="fas fa-paw"></i></strong></h3>
                    </div>

                    <!-- Create new role -->
                    <nav class="navbar navbar-light bg-light">
                        <a href="{{ route('roles.create') }}"
                           class="btn button">
                            <i class="fas fa-plus"></i> {{ __('Create a new role') }}
                        </a>
                    </nav>

                    <!-- Roles list -->
                    <div class="table-responsive-xl">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>{{ __('ID') }}</th>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Slug') }}</th>
                                <th>{{ __('Description') }}</th>
                                <th class="text-right">{{ __('Actions') }}</th>
                            </tr>
                            </thead>

                            <tbody>
                            @forelse($roles as $role)
                                <tr>
                                    <td>{{ $role->id }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>{{ $role->slug }}</td>
                                    <td>{{ $role->description }}</td>
                                    <td class="text-right">

                                            <!-- CRUD buttons -->
                                        <div class="btn-group btn-group-sm" role="group" aria-label="{{ __('Actions') }}">
                                            <a href="{{ route('roles.edit', $role) }}"
                                               class="btn btn-link" title="{{ __('Edit Role') }}">
                                                <i class="fas fa-edit" style="color:black"></i>
                                            </a>

                                            <button type="button" class="btn btn-link text-danger"
                                                    data-route="{{ route('roles.destroy', $role) }}"
                                                    data-toggle="modal" data-target="#confirmDeleteModal"
                                                    title="{{ __('Delete Role') }}">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>

                            <!-- Alert when there are no roles -->
                            @empty
                                <tr>
                                    <p class="alert alert-secondary text-center">
                                        {{ __('No roles were found') }}
                                    </p>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>

                        <!-- Pagination -->
                        <ul class="pagination justify-content-center">
                            {{ $roles->links() }}
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

