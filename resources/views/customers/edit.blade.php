@extends ('layouts.base')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4 class="card-title"><strong>{{ __('Edit Customer ID') }}  {{ $customer->document }}</strong></h4>
                    </div>
                    <div class="card-body">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        {{ $error }}
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                            <form action="{{ route('customers.update', $customer) }}" method="POST" id="customers-form">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="name">Full name</label>
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Type a full name" value="{{ old('name', $customer->name) }}">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="document">ID</label>
                                            <input type="text" class="form-control" id="document" name="document" placeholder="Type a ID" value="{{ old('document', $customer->document) }}">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="text" class="form-control" id="email" name="email" placeholder="name@example.com" value="{{ old('email',  $customer->email) }}">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="phone">Phone</label>
                                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Type a phone" value="{{ old('phone', $customer->phone) }}">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="city_id">City</label>
                                            <select class="form-control" id="city_id" name="city_id">
                                                @foreach($cities as $city)
                                                    <option value="{{ $city->id }}" {{ old('city_id', $customer->city_id) == $customer->id ? 'selected' : ''}}>{{ $city->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="address">Address:</label>
                                            <input type="text" class="form-control" id="address" name="address" placeholder="Type a address" value="{{ old('address', $customer->address) }}">
                                        </div>
                                    </div>
                                </div>
                            </form>
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <a href="{{ route('customers.index') }}" class="btn btn-danger">
                            <i class="fas fa-arrow-left"></i> {{ __('Cancel') }}
                        </a>
                        <button type="submit" class="btn btn-success" form="customers-form">
                            <i class="fas fa-save"></i> {{ __('Submit') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

