@extends('partials.dashboard.master')
@section('title') {{__("Edit"). ' - '. $promoCode->code}} @endsection
{{--@push('style')--}}
    <style>

        @media only screen and (min-width: 600px) {
            .custom-l{
                width: 97% !important
            }
            .custom-i{
                width: 97% !important
            }

        }
        @media only screen and (min-width: 768px) {
            /* For desktop: */
            .custom-l{
                width: 32% !important
            }
            .custom-i{
                width: 65% !important
            }

        }
    </style>
{{--@endpush--}}
@section('content')
    @component('components.dashboard.breadcrumb')
        @slot('breadcrumb_title')
            <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1"><a href="{{ route('dashboard.promoCode.index') }}" class="text-muted text-hover-primary">{{ __("Promo Codes") }}</a></h1><!-- end   :: Title -->
        @endslot
        <!-- begin :: Item -->
        <li class="breadcrumb-item text-muted">{{__('Edit promo code')}}</li><!-- end   :: Item -->
    @endcomponent

    <div class="card mb-5 mb-xl-10">
        <!-- begin :: Card body -->
        <div class="card-body">
            <!-- begin :: Form -->
            <form action="{{ route('dashboard.promoCode.update', $promoCode->id) }}" class="form" method="post"
                  id="submitted-form" data-redirection-url="{{ url('dashboard/promoCode') }}">
                @csrf
                @method('put')
                <!-- begin :: Card header -->
                <div class="card-header d-flex align-items-center mb-120">
                    <h3 class="fw-bolder text-dark">{{ __("Edit promo code") }}</h3>
                </div><!-- end   :: Card header -->

                <!-- begin :: Inputs wrapper -->
                <div class="inputs-wrapper" style="margin-top: 42px">
                @php($class = ['label' => 'fs-5 fw-bold col-lg-2 col-md-3 col-sm-12', 'input'=> ' col-lg-8 col-md-9 col-sm-12'])
                    <!-- begin :: Container -->
                    <div class="container mt-10 mb-10">

                        <input type="hidden" value="{{$promoCode->type->value}}" name="type">
                        <!-- begin :: Column type-->
                        <div class="row form-group align-items-center justify-content-md-center" id="">
                            <label class="{{$class['label']}}">{{ __("Type") }} <span class="text-danger">*</span></label>
                            <div class="{{$class['input']}}">
                                <select disabled class="{{'form-select '.$class['input']}}" id="type_inp" data-control="select2" data-placeholder="{{__('Select an option')}}" data-hide-search="false">
                                    <option value="{{$promoCode->type->value}}" selected="selected">{{ __($promoCode->type->getName())}}</option>
                                </select>
                                <p class="invalid-feedback" id="type"></p>
                            </div>
                        </div><!-- end :: Column type-->

                        <!-- begin :: Column marketer info-->
                        <div class="row form-group align-items-center justify-content-md-center mt-3 marketer_inputs" id="marketer_inputs">
                            <label class="{{$class['label']}}">{{ __("Marketer") }} <span class="text-danger">*</span></label>
                            @if($promoCode->marketer_id != null)
                                <div class="{{$class['input']}}">
                                    <select disabled class="{{'form-select '.$class['input']}}" id="marketer_id_inp" name="marketer_id" data-control="select2" data-placeholder="{{__('Select an option')}}">
                                        <option value="{{ $promoCode->marketer->id}}">{{ $promoCode->marketer->getInfo() }}</option>
                                    </select>
                                    <p class="invalid-feedback" id="marketer_id"></p>

                                </div>
                            @else
                                <div class="{{$class['input']}}">
                                    <select class="{{'form-select '.$class['input']}}" id="marketer_id_inp" name="marketer_id" data-control="select2" data-placeholder="{{__('Select an option')}}">
                                        <option></option>
                                        @foreach($marketers as $marketer)
                                            <option value="{{$marketer->id}}">{{ $marketer->getInfo() }}</option>
                                        @endforeach
                                    </select>
                                    <p class="invalid-feedback" id="marketer_id"></p>
                                </div>
                            @endif
                        </div><!-- end :: Column marketer info-->


                        <!-- begin :: Column Code-->
                        <div class="row form-group align-items-center justify-content-md-center mt-3">
                            <label class="{{$class['label']}}">{{ __("Code") }} <span class="text-danger">*</span></label>
                            <div class="{{$class['input']}}">
                                <input value="{{$promoCode->code}}" type="text" class="form-control" id="code_inp" required name="code" placeholder="{{ __("Code") }}"/>
                                <p class="invalid-feedback" id="code"></p>
                            </div>
                        </div><!-- end :: Column Code-->

                        <!-- begin :: Column type-->
                        <div class="row form-group align-items-center justify-content-md-center mt-3" id="subTypeOption">
                            <label class="{{$class['label']}}">{{ __("Promo Code On") }} <span class="text-danger">*</span></label>
                            <div class="{{$class['input']}}">
                                <select class="{{'form-select '.$class['input']}}" id="sub_type_inp" name="sub_type" data-control="select2" data-placeholder="{{__('Select an option')}}" data-hide-search="true">
                                    @foreach(\App\Enums\SubPromoCodeTypes::cases() as $case)
                                        <option value="{{$case->value}}">{{ __($case->getName())}}</option>
                                    @endforeach
                                </select>
                                <p class="invalid-feedback" id="sub_type_inp"></p>
                            </div>
                        </div><!-- end :: Column type-->

                        <!-- begin :: Column analysis info-->
                        <div class="row form-group align-items-center justify-content-md-center mt-3" id="analysis_inputs">
                            <label class="{{$class['label']}}">{{ __("Main Analyse") }} <span class="text-danger">*</span></label>
                            <div class="{{$class['input']}}">
                                <select class="{{'form-select '.$class['input']}}" id="main_analysis_id_inp" name="main_analysis_id" data-control="select2" data-placeholder="{{__('Select an option')}}">
                                    <option></option>
                                    @foreach($mainAnalysis as $analyse)
                                        <option value="{{$analyse->id}}">{{ $analyse->getInfo() }}</option>
                                    @endforeach
                                </select>
                                <p class="invalid-feedback" id="main_analysis_id"></p>
                            </div>
                        </div><!-- end :: Column marketer info-->

                        <!-- begin :: Column discount-->
                        <div class="row form-group align-items-center justify-content-md-center mt-3">
                            @php($promoCode->discount = $promoCode->sub_type == 0 ? $promoCode->percentage : $promoCode->fixed_value)
                            <label class="{{$class['label']}}">{{ __("Discount") }} <span class="text-danger">*</span></label>
                            <div class="{{$class['input']}}">
                                <div class="row">
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <select class="form-select" data-hide-search="true" id="discountType" name="discount_type">
                                            <option value="percentage"> {{__('Percentage')}}</option>
                                            <option value="fixed"> {{__('Fixed')}}</option>
                                        </select>
                                        <p class="invalid-feedback" id="discount_type"></p>
                                    </div>
                                    <div class="col-lg-8 col-md-6 col-sm-12">
                                        <input value="{{$discount}}" type="number" class="form-control p-3" id="discount_inp"  name="discount" min="1" max="100" @if($promoCode->type != \PromoCodeTypes::USER) required @endif placeholder="{{ __("Percentage").' %' }}"/>
                                        <p class="invalid-feedback" id="discount"></p>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end :: Column discount-->

                        <!-- begin :: Column Range-->
                        <div class="row form-group align-items-center justify-content-md-center mt-3">
                            <label class="{{$class['label']}}">{{ __("Range") }} <span class="text-danger">*</span></label>
                            <div class="{{$class['input']}}">
                                <input type="text" class="form-control" placeholder="Pick date rage" id="range_inp" required name="ranges"/>
                                <p class="invalid-feedback" id="range"></p>
                            </div>
                        </div><!-- end :: Column ranges-->
                    </div><!-- end   :: Container -->

                    <div class="card">
                        <div class="card-header d-flex align-items-center justify-content-center">
                            <h3 class="fw-bolder text-dark" style="letter-spacing: 5px">{{ __("Special Settings") }}</h3>
                        </div>
                        <div class="card-body">
                            <!-- begin :: Column User earning-->
                            <div class="row form-group align-items-center justify-content-md-center mt-3 mb-3 marketer_inputs" id="marketer_inputs">
                                <label class="{{$class['label']}}">{{ __("User earning") }} <span class="text-warning fs-sm-7">({{__('Optional')}})</span></label>
                                <div class="{{$class['input']}}">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <select class="form-select" data-hide-search="true" id="userEarningType" name="user_earning_type">
                                                <option value="percentage"> {{__('Percentage')}}</option>
                                                <option value="fixed"> {{__('Fixed')}}</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-8 col-md-6 col-sm-12">
                                            <input value="{{$promoCode->setting?->user_earning ??''}}" type="number" class="form-control p-3" id="user_earning_inp" min="1" max="100" placeholder="{{ __("Percentage").' %' }}"/>
                                            <p class="invalid-feedback" id="user_earning"></p>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end :: Column User earning-->

                            @if($promoCode->type == \PromoCodeTypes::AFFILIATE || $promoCode->type == \PromoCodeTypes::USER)
                                <!-- begin :: Column Affiliate earning-->
                                <div class="row form-group align-items-center justify-content-md-center  mb-3 marketer_inputs" id="marketer_inputs">
                                    <label class="{{$class['label']}}">{{ __("Affiliate earning") }} <span class="text-warning fs-sm-7">({{' '.__('Optional') . ' '}})</span></label>
                                    <div class="{{$class['input']}}">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-6 col-sm-12">
                                                <select class="form-select" data-hide-search="true" id="affiliateEarningType" name="affiliate_earning_type">
                                                    <option value="percentage"> {{__('Percentage')}}</option>
                                                    <option value="fixed"> {{__('Fixed')}}</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-8 col-md-6 col-sm-12">
                                                <input value="{{$promoCode->settings?->affiliate_earning}}" type="number" class="form-control p-3" id="affiliate_earning_inp" min="1" max="100" placeholder="{{ __("Percentage").' %' }}"/>
                                                <p class="invalid-feedback" id="affiliate_earning"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end :: Column Affiliate earning-->
                            @endif

                            <!-- Points -->
                            <div class="row align-items-center justify-content-md-center">
                                <!-- column points num -->
                                <div class="col-lg-5 col-md-6 col-sm-6">
                                    <div class="row align-items-center">
                                        <label class="fs-5 fw-bold mb-2 custom-l">{{ __("Number of points") }} </label>
                                        <input type="text" class="form-control custom-i" name="num_points" id="num_points_inp" value="{{$promoCode->setting?->num_points}}">
                                        <p class="invalid-feedback" id="num_points"></p>
                                    </div>
                                </div><!-- end column points num -->

                                <!-- column eq value -->
                                <div class="col-lg-5 col-md-6 col-sm-6">
                                    <div class="row align-items-center">
                                        <label class="fs-5 fw-bold mb-2 custom-l" >{{ __("Equal money") }} </label>
                                        <input type="text" class="form-control custom-i " name="eq_value" id="eq_value_inp" value="{{$promoCode->setting?->eq_value}}">
                                        <p class="invalid-feedback" id="eq_value"></p>
                                    </div>
                                </div><!-- end column eq value -->
                            </div><!-- End Points -->
                        </div>
                    </div>
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

                    <a class="btn btn-secondary" href="{{ route('dashboard.promoCode.index')}}"> {{__("Cancel")}} </a>
                </div><!-- end   :: Form footer -->
            </form><!-- end   :: Form -->
        </div><!-- end   :: Card body -->
    </div>
@endsection

@push('scripts')
    <script src="{{asset('dashboard-assets/plugins/global/plugins.bundle.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('#analysis_inputs').fadeOut()


            @if($promoCode->from != null && $promoCode->to != null)

                $("#range_inp").daterangepicker({
                    startDate: '{{$promoCode->from?->format('Y/m/d') ?? \Carbon\Carbon::now()->format('dd/mm/Y')}}',
                    endDate: '{{$promoCode->to?->format('Y/m/d') ?? \Carbon\Carbon::tomorrow()->format('dd/mm/Y')}}',
                    locale: {
                        format: "Y/MM/DD"
                    }
                })
            @else

            $("#range_inp").daterangepicker({


            })
            @endif

        })
        {{--function changeFormUrl(value){--}}
        {{--    $('#submitted-form').attr('action',"{{ url('dashboard/promoCode/store') }}").change();--}}
        {{--    $('#submitted-form').attr('data-redirection-url',"{{ url('dashboard/promoCode') }}").change();--}}
        {{--}--}}


        // let radios = $('#radioSelected input[type="radio"]')
        let typeOptions = $('#type_inp')
        let subTypeOptions = $('#sub_type_inp')
        let discountType = $('#discountType')
        let aEType = $('#affiliateEarningType')
        let uEType = $('#userEarningType')

        subTypeOptions.on('change', function ($value) {
            switch ($(this).val()) {
                case '0':
                    $('#analysis_inputs').fadeOut()
                    break
                case '1':
                    $('#analysis_inputs').fadeIn()

                    break
            }

        })
        typeOptions.on('change', function () {
            switch ($(this).val()) {
                case '0':
                    $('.marketer_inputs').fadeOut()
                    break
                case '1':
                    $('.marketer_inputs').fadeIn()

                    break
            }
        })

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

        discountType.on('change', function ($value) {
            console.log($(this).val())
            changeInputType.call(this, '#discount_inp');

        })

        aEType.on('change', function ($value) {
            console.log($(this).val())
            changeInputType.call(this, '#affiliate_earning_inp');


        })

        uEType.on('change', function ($value) {
            console.log($(this).val())
            changeInputType.call(this, '#user_earning_inp');


        })

        //   radios.eq(0).on('click', function () {
        //       changeFormUrl('general')
        //       $('#marketer_inputs').fadeOut()
        //       $('#analysis_inputs').fadeOut()
        //
        //       // select_analysis.val('0');
        //       // select_analysis.trigger('change');
        //   });
        //   radios.eq(1).on('click', function () {
        //       changeFormUrl('general')
        //       $('#marketer_inputs').fadeOut()
        //       $('#analysis_inputs').fadeIn()
        //   });
        // radios.eq(2).on('click', function () {
        //     changeFormUrl('marketer')
        //       $('#marketer_inputs').fadeIn()
        //       $('#analysis_inputs').fadeOut()
        //
        //   });

    </script>
@endpush
