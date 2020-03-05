@extends ('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow-sm">
                    <div class="card-header d-flex justify-content-between">
                        <h3 class="card-title mb-0"><strong>{{ __('Products') }}</strong></h3>
                    </div>

                    <nav class="navbar navbar-light bg-light">
                        <a href="{{ route('products.create') }}" class="btn btn-success"><i class="fas fa-plus"></i>
                            {{ __('Create a new product') }}</a>

                        <!-- Search form -->
                        <form class="form-inline" method="GET">
                            <select name="type" class="form-control mr-sm-2" id="select">
                                <option value="">{{ __('All') }}</option>
                                <option value="name" {{ request()->input('type') == 'name' ? 'selected' : '' }}>{{ __('Name') }}</option>
                                <option value="unit_price" {{ request()->input('type') == 'unit_price' ? 'selected' : '' }}>{{ __('Unit Price') }}</option>
                            </select>

                            <input name="search" id="search" value="{{ request()->input('search') }}" class="form-control mr-sm-2" type="search" placeholder="{{ __('Search...') }}">

                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fas fa-search"></i> {{ __('Search') }}</button>
                            <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit" onClick="window.history.back();">
                                <i class="fas fa-redo-alt"></i> {{ __('Refresh') }}</button>
                        </form>
                    </nav>

                    <!-- Products list -->
                    <div class="table-responsive-lg">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>{{ __('Code') }}</th>
                            <th>{{ __('Name') }}</th>
                            <th>{{ __('Unit Price') }}</th>
                            <th class="text-right">{{ __('Actions') }}</th>
                        </tr>
                        </thead>

                        <tbody>
                        @forelse($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>${{ number_format($product->unit_price) }}</td>
                                <td class="text-right">
                                    <div class="btn-group btn-group-sm" role="group" aria-label="{{ __('Actions') }}">
                                        <a href="{{ route('products.edit', $product) }}" class="btn btn-link"
                                           title="{{ __('Edit Product') }}">
                                            <i class="fas fa-edit" style="color:black"></i>
                                        </a>
                                        <button type="button" class="btn btn-link text-danger"
                                                data-route="{{ route('products.destroy', $product) }}"
                                                data-toggle="modal"
                                                data-target="#confirmDeleteModal"
                                                title="{{ __('Delete Product') }}">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <p class="alert alert-secondary text-center">
                                    {{ __('No products were found') }}
                                </p>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>

                        <!-- Pagination -->
                        <ul class="pagination justify-content-center">
                            {{ $products->links() }}
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

