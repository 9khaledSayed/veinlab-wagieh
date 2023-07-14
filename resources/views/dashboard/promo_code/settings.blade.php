@extends('partials.dashboard.master')
@section('title') {{__("Promo Codes")  . ' - ' .__('Settings')}} @endsection
@section('content')
    @component('components.dashboard.breadcrumb')
        @slot('breadcrumb_title')
            <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1"><a href="{{ route('dashboard.promoCode.index') }}" class="text-muted text-hover-primary">{{ __("Promo Codes") }}</a></h1><!-- end   :: Title -->
        @endslot
        <!-- begin :: Item -->
        <li class="breadcrumb-item text-muted">{{__('Settings')}}</li><!-- end   :: Item -->
    @endcomponent

    <div class="card mb-5 mb-xl-10">
        <!-- begin :: Card header -->
        <div class="card-header d-flex align-items-center mb-120">
            <h3 class="fw-bolder text-dark">{{ __("Settings") }}</h3>
            <a class="btn btn-warning" href="{{ route('dashboard.index')}}"> {{__("Cancel")}} </a>
        </div>
        <!-- end   :: Card header -->
        <!-- begin :: Card body -->
        <div class="card-body px-lg-10 px-5">

            @php($class = ['label' => 'fs-5 fw-bold col-lg-2  col-md-2 col-sm-12', 'input'=> ' col-lg-10 col-md-10 col-sm-12'])

            @foreach($dataCollect as $key => $data)
                @php($type = array_keys($data)[0])
                <div class="card shadow-sm mx-sm-0 my-5">
                    <div class="card-header collapsible cursor-pointer rotate" data-bs-toggle="collapse"
                         data-bs-target="#{{'kt_docs_card_collapsible'.$key}}">
                        <h3 class="card-title">{{__($type)}}</h3>
                        <div class="card-toolbar rotate-180">
                            <span class="svg-icon svg-icon-1">...</span>
                        </div>
                    </div>
                    <div id="{{'kt_docs_card_collapsible'.$key}}" class="collapse show">
                        <form action="{{ url('dashboard/affiliate/settings/'.$data[$type]['promo_type']->value) }}"
                              class="form" method="post"
                              data-with-key="{{$key}}" data-trailing="{{$key}}"
                              id="{{ 'submitted-form'}}" data-redirection-url="{{ url('dashboard/promoCode') }}">
                            @csrf
                            <div class="card-body">
                                <!-- begin :: Form -->


                                <!-- begin :: Inputs wrapper -->
                                <div class="inputs-wrapper" style="margin-top: 42px">


                                    <div class=" mt-10 mb-10">

                                        <!-- begin :: Column user earning-->
                                        <div class="row form-group align-items-center justify-content-md-center mt-3">

                                            <label class="{{$class['label']}}">{{ __('User earning')}} </label>
                                            <div class="{{$class['input']}}">
                                                <div class="row">
                                                    <div class="col-lg-4  col-md-5 col-sm-12">
                                                        <select class="form-select" data-hide-search="true"
                                                                data-value="{{$data[$type]['User earning']['user_earning_type']}}"
                                                                id="user_earning_type{{$key}}" name="user_earning_type">
                                                            <option value="percentage"
                                                                    @if($data[$type]['User earning']['user_earning_type'] == 'percentage') selected @endif> {{__('Percentage')}}</option>
                                                            <option value="fixed"
                                                                    @if($data[$type]['User earning']['user_earning_type'] == 'fixed') selected @endif> {{__('Fixed')}}</option>
                                                        </select>
                                                        <p class="invalid-feedback" id="user_earning_type"></p>

                                                    </div>
                                                    <div class="col-lg-8  col-md-7 col-sm-12">
                                                        <input type="number"
                                                               class="form-control p-3 {{'form-control'.$key}}"
                                                               id="user_earning_inp{{$key}}" required
                                                               name="user_earning" min="1" max="100"
                                                               value="{{$data[$type]['User earning']['user_earning']}}"
                                                               placeholder="{{ __("Percentage").' %' }}"/>
                                                        <p class="invalid-feedback" id="user_earning"></p>

                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                        <!-- end :: Column discount-->

                                    </div>

                                    @if(array_key_exists('Affiliate earning', $data[$type]))
                                        <div class=" mt-10 mb-10">

                                            <!-- begin :: Column user earning-->
                                            <div
                                                class="row form-group align-items-center justify-content-md-center mt-3">

                                                <label class="{{$class['label']}}">{{ __('Affiliate earning')}} </label>
                                                <div class="{{$class['input']}}">
                                                    <div class="row">
                                                        <div class="col-lg-4  col-md-5 col-sm-12">
                                                            <select class="form-select" data-hide-search="true"
                                                                    id="affiliate_earning_type{{$key}}"
                                                                    value="{{$data[$type]['Affiliate earning']['affiliate_earning_type']}}"
                                                                    name="affiliate_earning_type">
                                                                <option value="percentage"
                                                                        @if($data[$type]['Affiliate earning']['affiliate_earning_type'] == 'percentage') selected @endif> {{__('Percentage')}}</option>
                                                                <option value="fixed"
                                                                        @if($data[$type]['Affiliate earning']['affiliate_earning_type'] == 'fixed') selected @endif> {{__('Fixed')}}</option>
                                                            </select>
                                                            <p class="invalid-feedback" id="affiliate_earning_type"></p>

                                                        </div>
                                                        <div class="col-lg-8  col-md-7 col-sm-12">
                                                            <input type="number" class="form-control p-3"
                                                                   id="affiliate_earning_inp{{$key}}" required
                                                                   name="affiliate_earning" min="1" max="100"
                                                                   value="{{$data[$type]['Affiliate earning']['affiliate_earning']}}"
                                                                   placeholder="{{ __("Percentage").' %' }}"/>
                                                            <p class="invalid-feedback" id="user_earning"></p>

                                                        </div>

                                                    </div>
                                                </div>

                                            </div>
                                            <!-- end :: Column discount-->

                                        </div>
                                    @endif


                                    <!-- begin :: Row -->
                                    <div class="row mb-8">


                                        <!-- begin :: Column -->
                                        <div class="col-md-6 fv-row">

                                            <label class="fs-5 fw-bold mb-2">{{ __("Number of points") }} <span
                                                    class="text-danger">*</span></label>
                                            <div class="form-floating">
                                                <input type="number" required class="form-control form-control{{$key}}" id="num_points_inp"
                                                       name="num_points" placeholder="example" value="{{$data[$type]['num_points']}}"/>
                                                <label for="num_points_inp">{{ __("Enter the "). __("Number of points") }}</label>
                                            </div>
                                            <p class="invalid-feedback" id="num_points"></p>

                                        </div>
                                        <!-- end   :: Column -->

                                        <!-- begin :: Column -->
                                        <div class="col-md-6 fv-row">

                                            <label class="fs-5 fw-bold mb-2">{{ __("Equal money") }} <span
                                                    class="text-danger">*</span></label>
                                            <div class="form-floating">
                                                <input type="text" required class="form-control form-control{{$key}}"
                                                       id="eq_value_inp{{$key}}" name="eq_value" value="{{$data[$type]['eq_value']}}"
                                                       placeholder="example"/>
                                                <label for="eq_value_inp{{$key}}">{{ __("Enter the "). __("Equal money") }}</label>

                                            </div>
                                            <p class="invalid-feedback" id="eq_value{{$key}}"></p>

                                        </div>
                                        <!-- end   :: Column -->


                                    </div>
                                    <!-- end   :: Row -->

                                </div>
                                <!-- end   :: Inputs wrapper -->


                                <!-- end   :: Form -->
                            </div>
                            <div class="card-footer">
                                <!-- begin :: Submit btn -->
                                <button type="submit" class="btn btn-primary" id="submit-btn">

                                    <span class="indicator-label">{{ __("Save") }}</span>

                                    <!-- begin :: Indicator -->
                                    <span class="indicator-progress">{{ __("Please wait ...") }}
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                        </span>
                                    <!-- end   :: Indicator -->

                                </button>
                                <!-- end   :: Submit btn -->
                            </div>
                        </form>
                    </div>
                </div>

            @endforeach
        </div>
        <!-- end   :: Card body -->
    </div>

@endsection

@push('scripts')
    <script src="assets/plugins/global/plugins.bundle.js"></script>
    <script>


        $("#range_inp").daterangepicker();


        let discountType0 = $('#user_earning_type0')
        let discountType1 = $('#user_earning_type1')
        let discountType2 = $('#user_earning_type2')
        let aEType1 = $('#affiliate_earning_type1')
        let aEType2 = $('#affiliate_earning_type2')


        function changeInputType(inputId) {
            let input = $(inputId);

            switch ($(this).val()) {
                case 'percentage':
                    input.attr('placeholder', '{{ __('Percentage'). ' % ' }}')

                    break
                case 'fixed':
                    input.attr('min', 1)
                    input.attr('max', 5000)
                    input.attr('placeholder', '{{ __('Value') }}')

                    break
            }
        }

        function changeInputFromType(input, typeSelect) {
            switch (typeSelect.val()) {
                case 'percentage':
                    input.attr('placeholder', '{{ __('Percentage'). ' % ' }}')

                    break
                case 'fixed':
                    input.attr('min', 1)
                    input.attr('max', 5000)
                    input.attr('placeholder', '{{ __('Value') }}')

                    break
            }
        }

        $(document).ready(function () {
            for (let i = 0; i < 3; i++) {
                // changeInputType.call(this, '#user_earning_inp'+i);
                let input = $('#user_earning_inp' + i);

                changeInputFromType(input, $('#user_earning_type' + i));

                if (i > 0) {
                    let input = $('#affiliate_earning_inp' + i);

                    let affiliateType = $('#affililate_earning_type' + i);
                    changeInputFromType(input, affiliateType);
                }

            }


        })

        discountType0.on('change', function ($value) {
            console.log($(this).val())
            changeInputType.call(this, '#user_earning_inp0');

        })
        discountType1.on('change', function ($value) {
            console.log($(this).val())
            changeInputType.call(this, '#user_earning_inp1');

        })
        discountType2.on('change', function ($value) {
            console.log($(this).val())
            changeInputType.call(this, '#user_earning_inp2');

        })

        aEType1.on('change', function ($value) {
            console.log($(this).val())
            changeInputType.call(this, '#affiliate_earning_inp1');


        })

        aEType2.on('change', function ($value) {
            console.log($(this).val())
            changeInputType.call(this, '#affiliate_earning_inp2');


        })


    </script>
@endpush
