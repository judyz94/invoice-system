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
                                    <th>{{ __('Created') }}</th>
                                    <th>{{ __('Filter: Since date') }}</th>
                                    <th>{{ __('Filter: Until date') }}</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach ($user->notifications as $notification)
                                    <tr>
                                        <td>{{ $notification->data['file'] }}</td>
                                        <td>{{ $notification->created_at }}</td>
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
