@extends ('layouts.app')

@section('content')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">

                    <div class="card shadow-lg">
                        <div class="card-header d-flex justify-content-between">
                            <h3 class="card-title mb-0"><strong>{{ __('Exports Notifications') }}  <i class="fas fa-paw"></i></strong></h3>
                        </div>

                        <!-- Notifications list -->
                        <div class="table-responsive-lg">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>{{ __('Notification') }}</th>
                                    <th>{{ __('Since date') }}</th>
                                    <th>{{ __('Until date') }}</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach ($user->notifications as $notification)
                                    <tr>
                                        <td>{{ $notification->type }}</td>
                                        <td>{{ $notification->data['since_date'] }}</td>
                                        <td>{{ $notification->data['until_date'] }}</td>
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
