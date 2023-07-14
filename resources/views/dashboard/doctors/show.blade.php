@extends('partials.dashboard.master')
@section('title') {{__("Show") . ' - '. $doctor->name}} @endsection

@section('content')
    @component('components.dashboard.breadcrumb')
        @slot('breadcrumb_title')
            <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1"><a href="{{ route('dashboard.doctors.index') }}" class="text-muted text-hover-primary">{{ __("Doctors") }}</a></h1><!-- end   :: Title -->
        @endslot
        <!-- begin :: Item -->
        <li class="breadcrumb-item text-muted">{{__('view doctors information')}}</li><!-- end   :: Item -->
    @endcomponent

    <div class="card mb-5 mb-xl-10">
        <!-- begin :: Card body -->
        <div class="card-body">
            <!-- begin :: Form -->
            <div>
                <!-- begin :: Card header -->
                <div class="card-header d-flex align-items-center">
                    <h3 class="fw-bolder text-dark">{{ __('view doctors information') }}</h3>
                </div><!-- end   :: Card header -->

                <!-- begin :: Inputs wrapper -->
                <div class="inputs-wrapper" style="margin-top: 42px">
                    <!-- begin :: Row -->
                    <div class="row mb-8">
                        <!-- begin :: Column -->
                        <div class="col-md-6 fv-row">
                            <label class="fs-5 fw-bold mb-2" for="name_inp">{{ __("name") }} <span class="text-danger">*</span></label>
                            <div >
                                <input disabled type="text" class="form-control" id="name_inp" name="name" value="{{$doctor->name}}"/>
                            </div>
                        </div><!-- end   :: Column -->

                        <!-- begin :: Column -->
                        <div class="col-md-6 fv-row">

                            <label class="fs-5 fw-bold mb-2" for="phone_inp">{{ __("phone") }}<span class="text-danger">*</span></label>
                            <div >
                                <input disabled type="tel" class="form-control" id="phone_inp" name="phone" value="{{$doctor->phone}}" />
                            </div>
                        </div><!-- end   :: Column -->
                    </div><!-- end   :: Row -->

                    <!-- begin :: Row -->
                    <div class="row mb-8">

                        <!-- begin :: Column -->
                        <div class="col-md-6 fv-row">

                            <label class="fs-5 fw-bold mb-2" for="email_inp">{{ __("email") }} <span class="text-danger">*</span></label>
                            <div >
                                <input disabled type="email" class="form-control" id="email_inp" name="email" value="{{$doctor->email}}" />
                            </div>
                        </div><!-- end   :: Column -->

                        <!-- begin :: Column -->
                        <div class="col-md-6 fv-row">
                            <label class="fs-5 fw-bold mb-2" for="percentage_inp">{{ __("percentage") }} <span class="text-danger">*</span></label>
                            <div>
                                <input disabled type="number" class="form-control" id="percentage_inp" name="percentage" value="{{$doctor->percentage}}" />
                            </div>
                        </div><!-- end   :: Column -->
                    </div><!-- end   :: Row -->
                </div><!-- end   :: Inputs wrapper -->

                <!-- begin :: Form footer -->
                <div class="form-footer">

                    <!-- begin :: Submit btn -->
                    <button type="button" class="btn btn-primary" id="back-btn" onclick="window.location.href = '{{ route('dashboard.doctors.index') }}'">
                        <span class="indicator-label">{{ __("Back") }}</span>

                        <!-- begin :: Indicator -->
                        <span class="indicator-progress">{{ __("Please wait ...") }}
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                        </span><!-- end   :: Indicator -->
                    </button><!-- end   :: Submit btn -->
                </div><!-- end   :: Form footer -->
            </div><!-- end   :: Form -->
        </div><!-- end   :: Card body -->
    </div>
@endsection
