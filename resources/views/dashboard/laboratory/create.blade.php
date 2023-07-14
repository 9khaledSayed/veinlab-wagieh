@extends('partials.dashboard.master')
@inject('laboratories','App\Models\Laboratory')
@section('title') {{__("add new laboratory")}} @endsection

@section('content')
    @component('components.dashboard.breadcrumb')
        @slot('breadcrumb_title')
            <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1"><a href="{{ route('dashboard.laboratories.index') }}" class="text-muted text-hover-primary">{{ __("laboratories") }}</a></h1><!-- end   :: Title -->
        @endslot
        <!-- begin :: Item -->
        <li class="breadcrumb-item text-muted">{{__('add new laboratory')}}</li><!-- end   :: Item -->
    @endcomponent

    <div class="card mb-5 mb-xl-10">
        <!-- begin :: Card body -->
        <div class="card-body">
            <!-- begin :: Form -->
            <form action="{{ route('dashboard.laboratories.store') }}" class="form" method="post" id="submitted-form" data-redirection-url="{{ route('dashboard.laboratories.index') }}">
            @csrf
            <!-- begin :: Card header -->
                <div class="card-header d-flex align-items-center">
                    <h3 class="fw-bolder text-dark">{{ __("add new laboratory") }}</h3>
                </div><!-- end   :: Card header -->

                <!-- begin :: Inputs wrapper -->
                <div class="inputs-wrapper">
                    @include('dashboard.laboratory.form')

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
                                                <div class="col-4">
                                                    <label class="fs-5 fw-bold mb-2">{{ __("Analysis") }} <span class="text-danger">*</span></label>

                                                    <select class="form-select selectpicker" required name="id" data-control="select2" data-placeholder="{{__('Choose the analysis')}}">
                                                        <option></option>
                                                        @foreach($mainAnalyses as $data)
                                                            <option value="{{$data->id}}" >{{$data->general_name . " - " . $data->price . " SAR - " . $data->code}}</option>
                                                        @endforeach
                                                    </select>
                                                    <p class="invalid-feedback" id="main_analysis_0_id" ></p>
                                                </div>
                                                <div class="col-3 fv-row">
                                                    <label class="fs-5 fw-bold mb-2" for="selling_price_inp">{{ __("selling price") }} <span class="text-danger">*</span></label>
                                                    <input type="number" required class="form-control" id="selling_price_inp" name="selling_price" placeholder="{{__('Enter the selling price')}}">
                                                    <p class="invalid-feedback" id="main_analysis_0_selling_price" ></p>
                                                </div>

                                                <div class="col-3 fv-row">
                                                    <label class="fs-5 fw-bold mb-2" for="cost_price_inp">{{ __("cost price") }} <span class="text-danger">*</span></label>
                                                    <input type="number" dir="rlt" required class="form-control" id="cost_price_inp" name="cost_price" placeholder="{{__('Enter the cost price')}}">
                                                    <p class="invalid-feedback" id="main_analysis_0_cost_price" ></p>
                                                </div>
                                                <div class="col-md-2 fv-row align-self-end">
                                                    <a href="javascript:void(0);" data-repeater-delete  class="btn btn-sm font-weight-bolder btn-light-danger mb-2" style="align-self: flex-end">
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

                    <a class="btn btn-secondary" href="{{ route('dashboard.laboratories.index')}}"> {{__("Cancel")}} </a>
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
