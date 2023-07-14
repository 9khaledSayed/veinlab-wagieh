@extends('partials.dashboard.master')
@section('title') {{__("Edit"). ' - '. $subAnalysis->name}} @endsection

@section('content')
    @component('components.dashboard.breadcrumb')
        @slot('breadcrumb_title')
            <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1"><a href="{{ route('dashboard.sub-analysis.index') }}" class="text-muted text-hover-primary">{{ __("Sub analysis") }}</a></h1><!-- end   :: Title -->
        @endslot
        <!-- begin :: Item -->
        <li class="breadcrumb-item text-muted">{{__('Edit sub analysis information')}}</li><!-- end   :: Item -->
    @endcomponent

    <div class="card mb-5 mb-xl-10">
        <!-- begin :: Card body -->
        <div class="card-body">
            <!-- begin :: Form -->
            <form action="{{ route('dashboard.sub-analysis.update',$subAnalysis->id) }}" class="form" method="post" id="submitted-form" data-redirection-url="{{ route('dashboard.sub-analysis.index') }}">
                @csrf
                @method('PUT')
                <!-- begin :: Card header -->
                <div class="card-header d-flex align-items-center mb-120">
                    <h3 class="fw-bolder text-dark">{{ __("Edit sub analysis information") }}</h3>
                </div><!-- end   :: Card header -->

                @include('dashboard.sub-analysis.form')

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

                    <a class="btn btn-secondary" href="{{ route('dashboard.sub-analysis.index')}}"> {{__("Cancel")}} </a>
                </div><!-- end   :: Form footer -->
            </form><!-- end   :: Form -->
        </div><!-- end   :: Card body -->
    </div>
@endsection


@push('scripts')
    <script src="{{ asset('dashboard-assets/plugins/custom/formrepeater/formrepeater.bundle.js') }}"></script>

    <script>

        // Class definition
        $(function () {
            $('.kt_repeater_1').repeater({
                initEmpty: false,

                defaultValues: {
                    'text-input': 'foo'
                },

                show: function () {
                    $(this).slideDown();
                    $('.select2-container').remove();
                    $(".selectpicker").select2();

                },

                hide: function (deleteElement) {
                    $(this).slideUp(deleteElement);
                }
            });
        });
        $( document ).ready(function() {
            $('a[data-repeater-delete]:last').click()
        });
    </script>
@endpush
