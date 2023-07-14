@extends('partials.dashboard.master')
@push('styles')
    <link href="{{asset('dashboard-assets/css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet" />
@endpush
@section('title') {{__("Edit"). ' - '. $patient->fullName}} @endsection
@section('content')
    @component('components.dashboard.breadcrumb')
        @slot('breadcrumb_title')
            <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1"><a href="{{ route('dashboard.patients.index') }}" class="text-muted text-hover-primary">{{ __("Patients") }}</a></h1><!-- end   :: Title -->
        @endslot
        <!-- begin :: Item -->
        <li class="breadcrumb-item text-muted">{{__('Edit info patient')}}</li><!-- end   :: Item -->
    @endcomponent

    <div class="card mb-5 mb-xl-10">
        <!-- begin :: Card body -->
        <div class="card-body">
            <!-- begin :: Form -->
            <form action="{{ route('dashboard.patients.update',$patient->id) }}" class="form" method="post" id="submitted-form" data-redirection-url="{{ route('dashboard.patients.index') }}">
                @csrf
                @method('PUT')
                <!-- begin :: Card header -->
                <div class="card-header d-flex align-items-center">
                    <h3 class="fw-bolder text-dark">{{ __("Edit info patient") }}</h3>
                </div><!-- end   :: Card header -->

                @include('dashboard.patients.form')
                <!-- begin :: Form footer -->
                <div class="form-footer">
                    <!-- begin :: Submit btn -->
                    <button type="submit" class="btn btn-primary" id="submit-btn">
                        <span class="indicator-label">{{ __("Save") }}</span>
                        <!-- begin :: Indicator -->
                        <span class="indicator-progress">{{ __("Please wait ...") }}
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                        </span><!-- end   :: Indicator -->
                    </button><!-- end   :: Submit btn -->

                    <a class="btn btn-secondary" href="{{ route('dashboard.patients.index')}}"> {{__("Cancel")}} </a>
                </div><!-- end   :: Form footer -->
            </form><!-- end   :: Form -->
        </div><!-- end   :: Card body -->
    </div>
@endsection
@push('scripts')

    <script src="{{asset('dashboard-assets/js/bootstrap-hijri-datepicker.min.js')}}"></script>
    <script type="text/javascript">
        $(function () {
            $("#hijri-date-input").hijriDatePicker();
        });
    </script>
@endpush
