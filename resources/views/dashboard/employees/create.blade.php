@extends('partials.dashboard.master')
@inject('employee','App\Models\Employee')
@section('title') {{__("add new employee")}} @endsection

@section('content')
    @component('components.dashboard.breadcrumb')
        @slot('breadcrumb_title')
            <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1"><a href="{{ route('dashboard.employees.index') }}" class="text-muted text-hover-primary">{{ __("Employees") }}</a></h1><!-- end   :: Title -->
        @endslot
        <!-- begin :: Item -->
        <li class="breadcrumb-item text-muted">{{__('add new employee')}}</li><!-- end   :: Item -->
    @endcomponent

    <div class="card mb-5 mb-xl-10">
        <!-- begin :: Card body -->
        <div class="card-body">
            <!-- begin :: Form -->
            <form action="{{ route('dashboard.employees.store') }}" class="form" method="post" id="my-form" data-redirection-url="{{ route('dashboard.employees.index') }}" autocomplete="off">
                @csrf
                <!-- begin :: Card header -->
                <div class="card-header d-flex align-items-center">
                    <h3 class="fw-bolder text-dark">{{ __("add new employee") }}</h3>
                </div><!-- end   :: Card header -->
                    <!-- begin :: Inputs wrapper -->
                    <div class="inputs-wrapper">
                        @include('dashboard.employees.form')

                        <!-- begin :: Row -->
                        <div class="row mb-8">

                            <!-- begin :: Column -->
                            <div class="col-md-6 fv-row">

                                <label class="fs-5 fw-bold mb-2">{{ __("Password") }}</label>
                                <div class="form-floating">
                                    <input type="password" class="form-control" id="password_inp" name="password" autocomplete="off" />
                                    <label for="password_inp">{{ __("Enter the password") }}</label>
                                </div>
                                <p class="invalid-feedback" id="password" ></p>
                            </div><!-- end   :: Column -->

                            <!-- begin :: Column -->


                            <div class="col-md-6 fv-row">

                                <label class="fs-5 fw-bold mb-2">{{ __("Password confirmation") }}</label>
                                <div class="form-floating">
                                    <input type="password" class="form-control" id="password_confirmation_inp" name="password_confirmation" autocomplete="off" />
                                    <label for="password_confirmation_inp">{{ __("Enter the password confirmation") }}</label>
                                </div>
                                <p class="invalid-feedback" id="password_confirmation" ></p>
                            </div><!-- end   :: Column -->
                        </div><!-- end   :: Row -->
                    </div><!-- end   :: Inputs wrapper -->

                <!-- begin :: Form footer -->
                <div class="form-footer">

                <!-- <button id="submit-bt2">
                    dfsf
                </button> -->
                    <!-- begin :: Submit btn -->
                    <button type="submit" class="btn btn-primary" id="submit-btn" onClick="reload">
                        <span class="indicator-label">{{ __("Save") }}</span>
                        <!-- begin :: Indicator -->
                        <span class="indicator-progress">{{ __("Please wait ...") }}
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                        </span><!-- end   :: Indicator -->
                    </button><!-- end   :: Submit btn -->

                    <a class="btn btn-secondary" href="{{ route('dashboard.employees.index')}}"> {{__("Cancel")}} </a>
                </div><!-- end   :: Form footer -->
            </form><!-- end   :: Form -->
        </div><!-- end   :: Card body -->
    </div>

@endsection
