@extends('partials.dashboard.master')
@inject('hospital','App\Models\Hospital')

@section('title') {{ __('Add new Hospital')}} @endsection

@section('content')
    @component('components.dashboard.breadcrumb')
        @slot('breadcrumb_title')
            <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1"><a href="{{ route('dashboard.medical-centers.index') }}" class="text-muted text-hover-primary">{{ __("Hospitals") }}</a></h1><!-- end   :: Title -->
        @endslot
        <!-- begin :: Item -->
        <li class="breadcrumb-item text-muted">{{__('add new Hospital')}}</li><!-- end   :: Item -->
    @endcomponent

    <div class="card mb-5 mb-xl-10">
        <!-- begin :: Card body -->
        <div class="card-body">
            <!-- begin :: Form -->
            <form action="{{ route('dashboard.medical-centers.store') }}" class="form" method="post" id="submitted-form" data-redirection-url="{{ route('dashboard.medical-centers.index') }}">
                @csrf
                <!-- begin :: Card header -->
                <div class="card-header d-flex align-items-center mb-120">
                    <h3 class="fw-bolder text-dark">{{ __("Add new Hospital") }}</h3>
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
                                <input type="password" required class="form-control" id="password_inp" name="password" placeholder="example"/>
                                <label for="password_inp">{{ __("Enter the password") }}</label>
                            </div>
                            <p class="invalid-feedback" id="password" ></p>
                        </div><!-- end   :: Column -->

                        <!-- begin :: Column -->
                        <div class="col-md-6 fv-row">
                            <label class="fs-5 fw-bold mb-2" for="password_confirmation">{{ __("Password confirmation") }} <span class="text-danger">*</span></label>
                            <div class="form-floating">
                                <input type="password" required class="form-control" id="password_confirmation" name="password_confirmation" placeholder="example"/>
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
                        </div>

                    </div>
                    <!-- Editable table -->

{{--                    <div id="addMainAnalysis">--}}
{{--                        <div class="row">--}}
{{--                            <div v-text="message"></div>--}}
{{--                            <div class="kt-heading kt-heading--md">{{__('التحاليل المخصصة')}}</div>--}}
{{--                        </div>--}}
{{--                        <div class="row" v-for="analysisValue in mainAnalysis">--}}
{{--                            <div class="col-md-8">--}}
{{--                                <label class="fs-5 fw-bold mb-2">{{ __("التحليل") }} <span class="text-danger">*</span></label>--}}

{{--                                <select class="form-select" data-control="select2" data-placeholder="Select an option">--}}
{{--                                    <option></option>--}}
{{--                                    @foreach($mainAnalyses as $data)--}}
{{--                                        <option value="{{$data->id}}" v-if="analysisValue.id === {{$data->id}}" selected>{{$data->general_name . " - " . $data->price . " SAR - " . $data->code}}</option>--}}
{{--                                        <option value="{{$data->id}}" v-else="analysisValue.id === '{{$data->id}}'" >{{$data->general_name . " - " . $data->price . " SAR - " . $data->code}}</option>--}}

{{--                                    @endforeach--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                            <div class="col-md-4 fv-row">--}}
{{--                                <label class="fs-5 fw-bold mb-2">{{ __("price") }} <span class="text-danger">*</span></label>--}}
{{--                                    <input type="number" class="form-control" id="percentage_inp" name="percentage" placeholder="example" v-bind="analysisValue.price">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div  class="btn btn-secondary hover-scale" ><span class="material-symbols-outlined"></span> add</div>--}}

{{--                    </div>--}}
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

        $(`a[data-repeater-create]`).on('click',function(){
            addValidationToArrayFormRepeater(`[id*="_id"]`);
            addValidationToArrayFormRepeater(`[id*="_price"]`);
        });
        $(`a[data-repeater-delete]`).on('click',function(){
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
