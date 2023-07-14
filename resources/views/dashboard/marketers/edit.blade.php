@extends('partials.dashboard.master')
@section('title') {{__("Edit"). ' - '. $marketer->name}} @endsection
@section('content')
    @component('components.dashboard.breadcrumb')
        @slot('breadcrumb_title')
            <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1"><a href="{{ route('dashboard.marketers.index') }}" class="text-muted text-hover-primary">{{ __("Marketers") }}</a></h1><!-- end   :: Title -->
        @endslot
        <!-- begin :: Item -->
        <li class="breadcrumb-item text-muted">{{__('Edit marketer info')}}</li><!-- end   :: Item -->
    @endcomponent

    <div class="card mb-5 mb-xl-10">
        <!-- begin :: Card body -->
        <div class="card-body">
            <!-- begin :: Form -->
            <form action="{{ route('dashboard.marketers.update', $marketer->id) }}" class="form" method="post" id="submitted-form" data-redirection-url="{{ route('dashboard.marketers.index') }}">
                @csrf
                @method('put')
                <!-- begin :: Card header -->
                <div class="card-header d-flex align-items-center mb-120">
                    <h3 class="fw-bolder text-dark">{{ __("Edit marketer info") }}</h3>
                </div><!-- end   :: Card header -->

                <!-- begin :: Inputs wrapper -->
                <div class="inputs-wrapper" style="margin-top: 42px">
                    <!-- begin :: Row -->
                    <div class="row mb-8">
                        <!-- begin :: Column -->
                        <div class="col-md-6 fv-row">
                            <label class="fs-5 fw-bold mb-2">{{ __("Name") }} <span class="text-danger">*</span></label>
                            <div class="form-floating">
                                <input value="{{$marketer->name}}"  type="text" required class="form-control" id="name_inp"  name="name"  placeholder="example"/>
                                <label for="name_inp">{{ __("Enter the name") }}</label>
                            </div>
                            <p class="invalid-feedback" id="name" ></p>
                        </div><!-- end   :: Column -->

                        <!-- begin :: Column -->
                        <div class="col-md-6 fv-row">
                            <label class="fs-5 fw-bold mb-2">{{ __("Phone") }}<span class="text-danger">*</span></label>
                            <div class="form-floating">
                                <input value="{{$marketer->phone}}"  type="tel" required class="form-control" id="phone_inp"  name="phone"  placeholder="example"/>
                                <label for="phone_inp">{{ __("Enter the phone") }}</label>
                            </div>
                            <p class="invalid-feedback" id="phone" ></p>
                        </div><!-- end   :: Column -->
                    </div><!-- end   :: Row -->

                    <!-- begin :: Row -->
                    <div class="row mb-8">
                        <!-- begin :: Column -->
                        <div class="col-md-6 fv-row">

                            <label class="fs-5 fw-bold mb-2">{{ __("Email") }} <span class="text-danger">*</span></label>
                            <div class="form-floating">
                                <input value="{{$marketer->email}}"  type="email" required class="form-control" id="email_inp"  name="email"  placeholder="example"/>
                                <label for="email_inp">{{ __("Enter the email") }}</label>
                            </div>
                            <p class="invalid-feedback" id="email" ></p>
                        </div><!-- end   :: Column -->
                    </div><!-- end   :: Row -->

                    <!-- begin :: Row -->
                    <div class="row mb-8">
                        <!-- begin :: Column -->
                        <div class="col-md-6 fv-row">
                            <label class="fs-5 fw-bold mb-2">{{ __("Country") }} <span class="text-danger">*</span></label>
                            <div class="form-floating">
                                <input value="{{$marketer->country}}"  type="text" required class="form-control" id="country_inp"  name="country"  placeholder="example"/>
                                <label for="country_inp">{{ __("Enter the ") .  strtolower(__("Country")) }}</label>
                            </div>
                            <p class="invalid-feedback" id="country" ></p>
                        </div><!-- end   :: Column -->

                        <!-- begin :: Column -->
                        <div class="col-md-6 fv-row">
                            <label class="fs-5 fw-bold mb-2">{{ __("City") }} <span class="text-danger">*</span></label>
                            <div class="form-floating">
                                <input value="{{$marketer->city}}"  type="text" required class="form-control" id="city_inp"  name="city"  placeholder="example"/>
                                <label for="city_inp">{{ __("Enter the ") .  strtolower(__("City")) }}</label>
                            </div>
                            <p class="invalid-feedback" id="city" ></p>
                        </div><!-- end   :: Column -->
                    </div><!-- end   :: Row -->

                    <!-- make table test-->
                    <!-- Editable table -->
                    <div class="card">
                        <h4 class="card-header text-center font-weight-bold text-uppercase py-4">
                            {{__('Bank Details')}}<span class="text-warning fs-sm-7">{{ __('Optional') }}</span>
                        </h4>
                        <div class="card-body">
                            <!-- begin :: Row -->
                            <div class="row mb-8">
                                <!-- begin :: Column -->
                                <div class="col-md-6 fv-row">
                                    <label class="fs-5 fw-bold mb-2">{{ __("Bank account title") }} </label>
                                    <div class="form-floating">
                                        <input value="{{$marketer->bank_account_title}}"  type="text" class="form-control" id="bank_account_title_inp"  name="bank_account_title"  placeholder="example"/>
                                        <label for="country_inp">{{ __("Enter the ") .  strtolower(__("Bank account title")) }}</label>
                                    </div>
                                    <p class="invalid-feedback" id="bank_account_title" ></p>
                                </div><!-- end   :: Column -->

                                <!-- begin :: Column -->
                                <div class="col-md-6 fv-row">
                                    <label class="fs-5 fw-bold mb-2">{{ __("Bank name") }} </label>
                                    <div class="form-floating">
                                        <input value="{{$marketer->bank_name}}"  type="text"  class="form-control" id="bank_name_inp"  name="bank_name"  placeholder="example"/>
                                        <label for="bank_name_inp">{{ __("Enter the ") .  strtolower(__("Bank name")) }}</label>
                                    </div>
                                    <p class="invalid-feedback" id="bank_name" ></p>
                                </div><!-- end   :: Column -->
                            </div><!-- end   :: Row -->


                            <!-- begin :: Row -->
                            <div class="row mb-8">
                                <!-- begin :: Column -->
                                <div class="col-md-6 fv-row">
                                    <label class="fs-5 fw-bold mb-2">{{ __("SWIFT code") }} </label>
                                    <div class="form-floating">
                                        <input value="{{$marketer->swift_code}}"  type="number" class="form-control" id="swift_code_inp"  name="swift_code"  placeholder="example"/>
                                        <label for="swift_code_inp">{{ __("Enter the ") .  strtolower(__("SWIFT code")) }}</label>
                                    </div>
                                    <p class="invalid-feedback" id="swift_code" ></p>
                                </div><!-- end   :: Column -->

                                <!-- begin :: Column -->
                                <div class="col-md-6 fv-row">
                                    <label class="fs-5 fw-bold mb-2">{{ __("Bank account NO") }} </label>
                                    <div class="form-floating">
                                        <input value="{{$marketer->bank_account_no}}"  type="number"  class="form-control" id="bank_account_no_inp"  name="bank_account_no"  placeholder="example"/>
                                        <label for="bank_account_no_inp">{{ __("Enter the ") .  strtolower(__("Bank account NO")) }}</label>
                                    </div>
                                    <p class="invalid-feedback" id="bank_account_no" ></p>
                                </div><!-- end   :: Column -->
                            </div><!-- end   :: Row -->

                            <!-- begin :: Row -->
                            <div class="row mb-8">
                                <!-- begin :: Column -->
                                <div class="col-md-6 fv-row">

                                    <label class="fs-5 fw-bold mb-2">{{ __("IBAN ") }} </label>
                                    <div class="form-floating">
                                        <input value="{{$marketer->iban}}"  type="text" class="form-control" id="iban_inp"  name="iban"  placeholder="example"/>
                                        <label for="iban_inp">{{ __("Enter the ") .  strtolower(__("IBAN ")) }}</label>
                                    </div>
                                    <p class="invalid-feedback" id="iban" ></p>
                                </div><!-- end   :: Column -->

                                <!-- begin :: Column -->
                                <div class="col-md-6 fv-row">

                                    <label class="fs-5 fw-bold mb-2">{{ __("Bank branch code") }} </label>
                                    <div class="form-floating">
                                        <input value="{{$marketer->bank_branch_code}}"  type="text"  class="form-control" id="bank_branch_code_inp"  name="bank_branch_code"  placeholder="example"/>
                                        <label for="bank_branch_code_inp">{{ __("Enter the ") .  strtolower(__("Bank branch code")) }}</label>
                                    </div>
                                    <p class="invalid-feedback" id="bank_branch_code" ></p>
                                </div><!-- end   :: Column -->
                            </div><!-- end   :: Row -->
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
                    <a class="btn btn-secondary" href="{{ route('dashboard.marketers.index')}}"> {{__("Cancel")}} </a>
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
    </script>
@endpush
