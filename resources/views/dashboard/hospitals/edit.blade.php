@extends('partials.dashboard.master')
@section('title') {{ __('Edit'). ' - '. $hospital->name}} @endsection

@section('content')
    @component('components.dashboard.breadcrumb')
        @slot('breadcrumb_title')
            <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1"><a href="{{ route('dashboard.medical-centers.index') }}" class="text-muted text-hover-primary">{{ __("Hospitals") }}</a></h1><!-- end   :: Title -->
        @endslot
        <!-- begin :: Item -->
        <li class="breadcrumb-item text-muted">{{__('Update hospital information')}}</li><!-- end   :: Item -->
    @endcomponent


    <div class="card mb-5 mb-xl-10">
        <!-- begin :: Card body -->
        <div class="card-body">
            <!-- begin :: Form -->
            <form action="{{ route('dashboard.medical-centers.update',$hospital->id) }}" class="form" method="post" id="submitted-form" data-redirection-url="{{ route('dashboard.medical-centers.index') }}">
                @csrf
                @method('PUT')
                <!-- begin :: Card header -->
                <div class="card-header d-flex align-items-center mb-120">
                    <h3 class="fw-bolder text-dark">{{ __("Update hospital information") }}</h3>
                </div><!-- end   :: Card header -->

                <!-- begin :: Inputs wrapper -->
                <div class="inputs-wrapper" style="margin-top: 42px">
                @include('dashboard.hospitals.form')
                    <!-- begin :: Row -->
                    <div class="row mb-8">
                        <!-- begin :: Column -->
                        <div class="col-md-6 fv-row">
                            <label class="fs-5 fw-bold mb-2">{{ __("Password") }} <span class="text-danger">*</span></label>
                            <div class="form-floating">
                                <input type="password" class="form-control" id="password_inp" name="password" placeholder="example"/>
                                <label for="password_inp">{{ __("Enter the password") }}</label>
                            </div>
                            <p class="invalid-feedback" id="password" ></p>
                        </div><!-- end   :: Column -->

                        <!-- begin :: Column -->
                        <div class="col-md-6 fv-row">

                            <label class="fs-5 fw-bold mb-2">{{ __("Password confirmation") }} <span class="text-danger">*</span></label>
                            <div class="form-floating">
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="example"/>
                                <label for="password_confirmation_inp">{{ __("Enter the password confirmation") }}</label>
                            </div>
                            <p class="invalid-feedback" id="password_confirmation" ></p>
                        </div><!-- end   :: Column -->
                    </div><!-- end   :: Row -->

                    <!-- make table test-->
                    <!-- Editable table -->
                    <div class="card">
                        <h3 class="card-header text-center font-weight-bold text-uppercase py-4">
                            {{__('Custom analytics')}}
                        </h3>
                        <div class="card-body">
                            {{-- begin new select analysis --}}
                            <div class="kt_repeater_1">
                                <div class="form-group row kt_repeater_1">
                                    <div data-repeater-list="main_analysis" class="col-lg-12">
                                        <div data-repeater-item class="form-group row align-items-center">

                                            <div class="row" >
                                                <div class="col-md-6">
                                                    <label class="fs-5 fw-bold mb-2">{{ __("Analysis") }} <span class="text-danger">*</span></label>

                                                    <select class="form-select selectpicker" required name="id" data-control="select2" data-placeholder="{{__('Choose the analysis')}}">
                                                        <option></option>
                                                        @foreach($mainAnalyses as $data)
                                                            <option value="{{$data->id}}" >{{$data->general_name . " - " . $data->price . " SAR - " . $data->code}}</option>

                                                        @endforeach
                                                    </select>
                                                    <p class="invalid-feedback" id="main_analysis_0_id" ></p>
                                                </div>
                                                <div class="col-md-4 fv-row">
                                                    <label class="fs-5 fw-bold mb-2">{{ __("Price") }} <span class="text-danger">*</span></label>
                                                    <input type="number" required class="form-control" id="price_inp" name="price" placeholder="{{__('Enter the price')}}">
                                                    <p class="invalid-feedback" id="main_analysis_0_price" ></p>
                                                </div>
                                                <div class="col-md-2 fv-row align-self-end">
                                                    <a href="javascript:;" data-repeater-delete  class="btn btn-sm font-weight-bolder btn-light-danger mb-2" style="align-self: flex-end">
                                                        <i class="la la-trash-o"></i>{{__('Delete')}}
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    </div>
                                <div class="form-group row p-5">
                                    <div class="col-12">
                                        <a href="javascript:;" data-repeater-create class="btn btn-sm font-weight-bolder btn-light-primary w-100">
                                            <i class="la la-plus"></i>{{__('Add')}}
                                        </a>
                                    </div>
                                </div>
                            </div>
                            {{-- end new selected analysis --}}
                        </div>

                    </div>
                    <!-- Editable table -->



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

                    <a class="btn btn-secondary" href="{{ route('dashboard.medical-centers.index')}}"> {{__("Cancel")}} </a>
                </div><!-- end   :: Form footer -->
            </form><!-- end   :: Form -->
        </div><!-- end   :: Card body -->
    </div>
@endsection


@push('scripts')
    <script src="{{ asset('dashboard-assets/plugins/custom/formrepeater/formrepeater.bundle.js') }}"></script>

    <script>

        function addOldMainAnalysis(){
            let hospitalMainAnalysis = @json($hospitalMainAnalysis);
            setTimeout(() => {
                hospitalMainAnalysis.forEach((analysis,index) => {
                    $(`a[data-repeater-create]`).click();
                    setTimeout(() => {
                        console.log(`input[name="main_analysis[${index}][id]"] option[value="${analysis.id}"]`);
                        $(`input[name="main_analysis[${index}][price]"]`).val(analysis.price);
                        $(`select[name="main_analysis[${index}][id]"] option[value="${analysis.id}"]`).prop('selected',true)
                        $(`select[name="main_analysis[${index}][id]"]`).trigger('change')
                    }, 1000);
                });
            }, 2000);
            setTimeout(() => {
                $('a[data-repeater-delete]:last').click()
            }, 2000);

        }

        $(document).ready(function(){
            addValidationToArrayFormRepeater(`[id*="_id"]`);
            addValidationToArrayFormRepeater(`[id*="_price"]`);
            addOldMainAnalysis();
        })
        $(`a[data-repeater-create]`).on('click',function(){
            addValidationToArrayFormRepeater(`[id*="_id"]`);
            addValidationToArrayFormRepeater(`[id*="_price"]`);
        });
        $(`a[data-repeater-delete]`).on('click',function(){
            console.log('eee');
            addValidationToArrayFormRepeater(`[id*="_id"]`);
            addValidationToArrayFormRepeater(`[id*="_price"]`);
        });

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

    </script>
@endpush
