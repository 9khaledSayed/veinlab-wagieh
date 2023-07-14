@extends('partials.dashboard.master')
@section('title') {{__("Edit"). ' - '. $mainAnalysis->general_name}} @endsection

@section('content')
    @component('components.dashboard.breadcrumb')
        @slot('breadcrumb_title')
            <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1"><a href="{{ route('dashboard.main-analysis.index') }}" class="text-muted text-hover-primary">{{ __("Main analysis") }}</a></h1><!-- end   :: Title -->
        @endslot
        <!-- begin :: Item -->
        <li class="breadcrumb-item text-muted">{{__('Edit main analysis information')}}</li><!-- end   :: Item -->
    @endcomponent

    <div class="card mb-5 mb-xl-10">
        <!-- begin :: Card body -->
        <div class="card-body">
            <!-- begin :: Form -->

            <form action="{{ route('dashboard.main-analysis.update',$mainAnalysis->id) }}" class="form" method="post" id="submitted-form"  data-redirection-url="{{ route('dashboard.main-analysis.index') }}">
            @csrf
            @method('PUT')
            <!-- begin :: Card header -->
                <div class="card-header d-flex align-items-center mb-120">
                    <h3 class="fw-bolder text-dark">{{ __("Edit main analysis information") }}</h3>
                </div><!-- end   :: Card header -->

                <!-- begin :: Inputs wrapper -->
                <div class="inputs-wrapper" style="margin-top: 42px">

                @include('dashboard.main-analysis.form')


                </div><!-- end   :: Inputs wrapper -->


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

        var subAnalysis = @json($mainAnalysis->subAnalysis);

        function addOldSubAnalysis(){
            setTimeout(() => {
                subAnalysis.forEach((analysis,analysisIndex) => {
                    if(analysisIndex > 0){
                        $(`a[data-repeater-create]`).click();
                    }
                    $(`input[name="sub_analysis[${analysisIndex}][id]"]`).val(analysis.id);
                    $(`input[name="sub_analysis[${analysisIndex}][name]"]`).val(analysis.name);
                    $(`input[name="sub_analysis[${analysisIndex}][unit]"]`).val(analysis.unit);
                    $(`input[name="sub_analysis[${analysisIndex}][classification]"]`).val(analysis.classification);
                    analysis.normal_ranges.forEach((normalRange,normalRangeIndex) =>{

                        if(normalRangeIndex > 0){
                            $(`input[name="sub_analysis[${analysisIndex}][name]"]`).parent().parent().parent().find(`button[data-repeater-create]`).click()
                        }
                        setTimeout(()=>{
                            $(`input[name="sub_analysis[${analysisIndex}][normal_range][${normalRangeIndex}][id]"]`).val(normalRange.id);
                            $(`input[name="sub_analysis[${analysisIndex}][normal_range][${normalRangeIndex}][from]"]`).val(normalRange.from);
                            $(`input[name="sub_analysis[${analysisIndex}][normal_range][${normalRangeIndex}][to]"]`).val(normalRange.to);
                            if (normalRange.type === 'string') {
                                $(`textarea[name="sub_analysis[${analysisIndex}][normal_range][${normalRangeIndex}][value]"]`).val(normalRange.value);
                            }
                            if(normalRange.type === 'color'){
                                $(`input[name="sub_analysis[${analysisIndex}][normal_range][${normalRangeIndex}][value]"]`).val(normalRange.value);
                            }

                            if(normalRange.type === 'select'){
                                $(`select[name="sub_analysis[${analysisIndex}][normal_range][${normalRangeIndex}][value]"] option[value="${normalRange.value}"]`).attr('selected',true);
                                $(`select[name="sub_analysis[${analysisIndex}][normal_range][${normalRangeIndex}][value]"]`).trigger('change');
                            }

                            $(`select[name="sub_analysis[${analysisIndex}][normal_range][${normalRangeIndex}][gender]"] option[value="${normalRange.gender}"]`).attr('selected',true);
                            $(`select[name="sub_analysis[${analysisIndex}][normal_range][${normalRangeIndex}][gender]"]`).trigger('change');

                            $(`select[name="sub_analysis[${analysisIndex}][normal_range][${normalRangeIndex}][type]"] option[value="${normalRange.type}"]`).attr('selected',true);
                            $(`select[name="sub_analysis[${analysisIndex}][normal_range][${normalRangeIndex}][type]"]`).trigger('change');
                        },100)
                    })
                });
            }, 100);
        }

        $(document).ready(function(){
            addOldSubAnalysis();
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
        });
    </script>
@endpush
