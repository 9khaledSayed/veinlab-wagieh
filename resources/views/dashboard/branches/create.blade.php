@extends('partials.dashboard.master')
@inject('branch','App\Models\Branch')
@section('title') {{__('Add new branch')}} @endsection
@section('content')
    @component('components.dashboard.breadcrumb')
        @slot('breadcrumb_title')
            <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1"><a href="{{ route('dashboard.branches.index') }}" class="text-muted text-hover-primary">{{ __("Branches") }}</a></h1><!-- end   :: Title -->
        @endslot
        <!-- begin :: Item -->
        <li class="breadcrumb-item text-muted">{{__('Add new branch')}}</li><!-- end   :: Item -->
    @endcomponent

    <div class="card mb-5 mb-xl-10">
        <!-- begin :: Card body -->
        <div class="card-body">
            <!-- begin :: Form -->
            <form action="{{ route('dashboard.branches.store') }}" class="form" method="post" id="submitted-form" data-redirection-url="{{ route('dashboard.branches.index') }}">
                @csrf
                <!-- begin :: Card header -->
                <div class="card-header d-flex align-items-center">
                    <h3 class="fw-bolder text-dark">{{ __("Add new branch") }}</h3>
                </div><!-- end   :: Card header -->

                <!-- begin :: Inputs wrapper -->
                <div class="inputs-wrapper">
                    @include('dashboard.branches.form')
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

                        <a class="btn btn-secondary" href="{{ route('dashboard.branches.index')}}"> {{__("Cancel")}} </a>
                    </div>
                </div><!-- end   :: Form footer -->
            </form><!-- end   :: Form -->
        </div><!-- end   :: Card body -->
    </div>
@endsection
