@extends('partials.dashboard.master')
@inject('mainAnalysis','App\Models\MainAnalysis')
@section('title') {{__('Add new main analysis')}} @endsection

@section('content')
    @component('components.dashboard.breadcrumb')
        @slot('breadcrumb_title')
            <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1"><a href="{{ route('dashboard.main-analysis.index') }}" class="text-muted text-hover-primary">{{ __("Main analysis") }}</a></h1><!-- end   :: Title -->
        @endslot
        <!-- begin :: Item -->
        <li class="breadcrumb-item text-muted">{{__('Add new main analysis')}}</li><!-- end   :: Item -->
    @endcomponent

    <div class="card mb-5 mb-xl-10">
        <!-- begin :: Card body -->
        <div class="card-body">
            <!-- begin :: Form -->
            <form action="{{ route('dashboard.main-analysis.store') }}" class="form" method="post" id="submitted-form" data-redirection-url="{{ route('dashboard.main-analysis.index') }}">
            @csrf
            <!-- begin :: Card header -->
                <div class="card-header d-flex align-items-center mb-120">
                    <h3 class="fw-bolder text-dark">{{ __("Add new main analysis") }}</h3>
                </div><!-- end   :: Card header -->

                <!-- begin :: Inputs wrapper -->
                <div class="inputs-wrapper" style="margin-top: 42px">
                    @include('dashboard.main-analysis.form')
                </div>

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

                    <a class="btn btn-secondary" href="{{ route('dashboard.main-analysis.index')}}"> {{__("Cancel")}} </a>
                </div><!-- end   :: Form footer -->
            </form><!-- end   :: Form -->
        </div><!-- end   :: Card body -->
    </div>


@endsection


@push('scripts')
    <script src="{{ asset('dashboard-assets/plugins/custom/formrepeater/formrepeater.bundle.js') }}"></script>

    <script>
        $(document).on('change',`.normal-type-select`,function(){
            let selected = $(this).find('option:selected').val();
            let name = $(this).attr('name');
            let numbers = name.match(/\d+/g);
            console.log(numbers)
            if(selected == 'color'){
                $(this).parent().next('.row').find('.value_input_container').show();
                $(this).parent().next('.row').find('.value_select_container').hide();
                $(this).parent().next('.row').find('.value_textarea_container').hide();

                $(this).parent().next('.row').find('.value_input_container').find('.value_input').attr('name',`sub_analysis[${numbers[0]}][normal_range][${numbers[1]}][value]`);
                $(this).parent().next('.row').find('.value_select_container').find('.value_select').attr('name','');
                $(this).parent().next('.row').find('.value_textarea_container').find('.value_textarea').attr('name','');
            }
            if(selected == 'select'){
                $(this).parent().next('.row').find('.value_select_container').show();
                $(this).parent().next('.row').find('.value_input_container').hide();
                $(this).parent().next('.row').find('.value_textarea_container').hide();

                $(this).parent().next('.row').find('.value_select_container').find('.value_select').attr('name',`sub_analysis[${numbers[0]}][normal_range][${numbers[1]}][value]`);
                $(this).parent().next('.row').find('.value_input_container').find('.value_input').attr('name','');
                $(this).parent().next('.row').find('.value_textarea_container').find('.value_textarea').attr('name','');
            }
            if(selected == 'string'){
                $(this).parent().next('.row').find('.value_textarea_container').show();
                $(this).parent().next('.row').find('.value_select_container').hide();
                $(this).parent().next('.row').find('.value_input_container').hide();

                $(this).parent().next('.row').find('.value_textarea_container').find('.value_textarea').attr('name',`sub_analysis[${numbers[0]}][normal_range][${numbers[1]}][value]`);
                $(this).parent().next('.row').find('.value_input_container').find('.value_input').attr('name','');
                $(this).parent().next('.row').find('.value_select_container').find('.value_select').attr('name','');

            }

        });

        $("input[type='radio']").click(function(){

            var radioValue = $(this).val();

            if(radioValue === 'string'){

                nameAttr = $(this).attr('name')
                data_repeater = $(this).closest("[data-repeater-item]").index()
                console.log(data_repeater)
            } else if (radioValue === 'select'){

            } else if (radioValue === 'color'){

            }
        });

        $('.kt_docs_repeater_nested').repeater({
            repeaters: [{
                selector: '.inner-repeater',
                show: function () {
                    $(this).slideDown();
                },

                hide: function (deleteElement) {
                    $(this).slideUp(deleteElement);
                }
            }],

            show: function () {
                $(this).slideDown();
            },

            hide: function (deleteElement) {
                $(this).slideUp(deleteElement);
            }
        })

    </script>
@endpush
