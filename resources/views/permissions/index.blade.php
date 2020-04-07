@extends ('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10">
                <div class="card shadow-sm">
                    <div class="card-header d-flex justify-content-between">
                        <h3 class="card-title mb-0"><strong>{{ __('Permissions') }}  <i class="fas fa-paw"></i></strong></h3>
                    </div>

                    <!-- Create new permission -->
                    <nav class="navbar navbar-light bg-light">
                        <a href="{{ route('permissions.create') }}"
                           class="btn button">
                            <i class="fas fa-plus"></i> {{ __('Create a new permission') }}
                        </a>
                    </nav>

                    <!-- Permissions list -->
                    <div class="table-responsive-xl">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>{{ __('ID') }}</th>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Slug') }}</th>
                                <th>{{ __('Description') }}</th>
                                <th>{{ __('Actions') }}</th>
                            </tr>
                            </thead>

                            <tbody>
                            @forelse($permissions as $permission)
                                <tr>
                                    <td>{{ $permission->id }}</td>
                                    <td>{{ $permission->name }}</td>
                                    <td>{{ $permission->slug }}</td>
                                    <td>{{ $permission->description }}</td>
                                    <td class="text-right">

                                            <!-- CRUD buttons -->
                                        <div class="btn-group btn-group-sm" role="group" aria-label="{{ __('Actions') }}">
                                            <a href="{{ route('permissions.edit', $permission) }}"
                                               class="btn btn-link" title="{{ __('Edit Permission') }}">
                                                <i class="fas fa-edit" style="color:black"></i>
                                            </a>

                                            <button type="button" class="btn btn-link text-danger"
                                                    data-route="{{ route('permissions.destroy', $permission) }}"
                                                    data-toggle="modal" data-target="#confirmDeleteModal"
                                                    title="{{ __('Delete Permission') }}">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            <!-- Alert when there are no permissions -->
                            @empty
                                <tr>
                                    <p class="alert alert-secondary text-center">
                                        {{ __('No permissions were found') }}
                                    </p>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>

                        <!-- Pagination -->
                        <ul class="pagination justify-content-center">
                            {{ $permissions->links() }}
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

