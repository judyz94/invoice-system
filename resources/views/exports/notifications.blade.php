@extends ('layouts.app')

@section('content')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">

                    <div class="card shadow-lg">
                        <div class="card-header d-flex justify-content-between">
                            <h3 class="card-title mb-0"><strong>{{ __('Exports Notifications') }}  <i class="fas fa-bell"></i></strong></h3>
                        </div>
                        <div class="card-header d-flex justify-content-between"></div>

                        <!-- Notifications list -->
                        <div class="table-responsive-lg">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>{{ __('File') }}</th>
                                    <th>{{ __('Export date') }}</th>
                                    <th>{{ __('Type date') }}</th>
                                    <th style="width:220px">{{ __('Since date / Until date') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse ($user->notifications as $notification)
                                    <tr>
                                        <td>{{ $notification->data['url'] }}</td>
                                        <td>{{ $notification->created_at }}</td>
                                        <td>
                                            @if($notification->data['type'] == 'expedition_date'){{ __('Expedition date') }}
                                                @elseif($notification->data['type'] == 'due_date'){{ __('Due date') }}
                                                @else
                                                {{ __('Receipt date') }}
                                            @endif
                                        </td>
                                        <td style="width:220px">{{ $notification->data['sinceDate'] . ' / ' . $notification->data['untilDate'] }}</td>
                                    </tr>
                                    <!-- Alert when there are no notifications -->
                                @empty
                                    <tr>
                                        <p class="alert alert-secondary text-center">
                                            {{ __('No notifications were found') }}
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


