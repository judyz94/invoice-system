@extends ('layouts.app')

@section('content')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">

                    @if(session('info'))
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 col-md-offset-2">
                                    <div class="alert alert-info">
                                        {{ session('info') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="card shadow-lg">
                        <div class="card-header d-flex justify-content-between">
                            <h3 class="card-title mb-0"><strong>{{ __('Exported Reports') }}  <i class="fas fa-paw"></i></strong></h3>
                        </div>

                        <!-- Notifications list -->
                        <div class="table-responsive-lg">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>{{ __('File') }}</th>
                                    <th style="width:150px">{{ __('Export date') }}</th>
                                    <th>{{ __('Type date') }}</th>
                                    <th style="width:220px">{{ __('Since date / Until date') }}</th>
                                    <th>{{ __('Actions') }}</th>
                                </tr>
                                </thead>

                                <tbody>
                                @forelse ($user->notifications as $notification)
                                    <tr>
                                        <td>{{ $notification->data['name'] }}</td>
                                        <td style="width:150px">{{ $notification->created_at }}</td>
                                        <td>
                                            @if($notification->data['type'] == 'expedition_date'){{ __('Expedition date') }}
                                                @elseif($notification->data['type'] == 'due_date'){{ __('Due date') }}
                                                @else
                                                {{ __('Receipt date') }}
                                            @endif
                                        </td>
                                        <td style="width:220px">{{ $notification->data['sinceDate'] . ' / ' . $notification->data['untilDate'] }}</td>

                                        <td>
                                        <div class="btn-group btn-group-sm" role="group" aria-label="{{ __('Actions') }}">
                                            <a href="{{ $notification->data['url'] }}" class="btn btn-link"
                                               title="{{ __('Download Report') }}">
                                                <i class="fas fa-download" style="color:forestgreen"></i>
                                            </a>
                                            {{--<a href="{{ route('report.download', $notification) }}" class="btn btn-link"
                                               title="{{ __('Download Report') }}">
                                                <i class="fas fa-download" style="color:forestgreen"></i>
                                            </a>--}}
                                            <button type="button" class="btn btn-link text-danger"
                                                    data-route="{{ route('reports.destroy', $notification) }}"
                                                    data-toggle="modal" data-target="#confirmDeleteModal"
                                                    title="{{ __('Delete Report') }}">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                        </td>
                                    </tr>
                                    <!-- Alert when there are no exports -->
                                @empty
                                    <tr>
                                        <p class="alert alert-secondary text-center">
                                            {{ __('No exports were found') }}
                                        </p>
                                    </tr>
                                @endforelse
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


