@extends ('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header pb-0">
                    <h4 class="card-title"><strong>{{ __('New Invoice') }}</strong></h4>
                </div>

        <div class="card-body">
            <form action="{{ route('invoices.store') }}" method="post" id="invoices-form">
                @csrf
                @include('invoices.__form')
            </form>
        </div>

        <div class="card-footer d-flex justify-content-between">
            <a href="{{ route('invoices.index') }}" class="btn buttonCancel">
                <i class="fas fa-arrow-left"></i> {{ __('Cancel') }}
            </a>
            <button type="submit" class="btn buttonSave" form="invoices-form">
                <i class="fas fa-save"></i> {{ __('Submit') }}
            </button>
        </div>

    </div>
        </div>
    </div>
    </div>
@endsection

