@extends('partials.dashboard.master')
@section('title') {{ __("Company information") }} @endsection

@section('content')
    <!--begin::Form-->
    <form action="{{ route('dashboard.settings.company-information.store') }}" class="form" method="post" id="submitted-form" data-redirection-url="{{ route('dashboard.settings.company-information') }}">
    @csrf
    <!-- Begin :: General Settings Card -->
        <input type="hidden" name="setting_type" value="general" id="setting-type-inp">

        <!-- Begin :: General Settings Card -->
        <div class="card card-flush setting-card" id="general-settings-card">
            <!--begin::Card header-->
            <div class="card-header pt-8">

                <div class="card-title">
                    <h2>{{ __("Company information") }}</h2>
                </div>

                <div class="card-title">
                    <!-- begin :: Submit btn -->
                    <button type="submit" class="btn btn-primary mx-4" id="submit-btn-general">
                        <span class="indicator-label">{{ __("Save") }}</span>
                        <!-- begin :: Indicator -->
                        <span class="indicator-progress">{{ __("Please wait ...") }}
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                        </span><!-- end   :: Indicator -->
                    </button><!-- end   :: Submit btn -->
                </div>
            </div><!--end::Card header-->

            <!-- Begin :: Card body -->
            <div class="card-body">
                <!-- Begin :: Input group -->
                <div class="fv-row row mb-15">
                    <!-- Begin :: Col -->
                    <div class="col-md-6">
                        <label class="form-label">{{ __("Name arabic") }}</label>
                        <input type="text" class="form-control gui-input" name="company_name_ar" value="{{ settings()->get('company_name_ar') ?? '' }}" id="company_name_ar_inp" placeholder="{{ __("Enter the name in arabic") }}">
                        <p class="invalid-feedback" id="candidate_lastname" ></p>
                    </div><!-- End   :: Col -->

                    <!-- Begin :: Col -->
                    <div class="col-md-6">
                        <label class="form-label">{{ __("Name english") }}</label>
                        <input type="text" class="form-control en-input" name="company_name_en" value="{{ settings()->get('company_name_en') ?? '' }}" id="company_name_en_inp" placeholder="{{ __("Enter the name in english") }}">
                        <p class="invalid-feedback" id="company_name_en" ></p>
                    </div><!-- End   :: Col -->
                </div><!-- End   :: Input group -->

                <!-- Begin :: Input group -->
                <div class="fv-row row mb-15">
                    <!-- Begin :: Col -->
                    <div class="col-md-6">
                        <label class="form-label">{{ __("Commercial number") }}</label>
                        <input type="text" class="form-control" name="commercial_number" value="{{ settings()->get('commercial_number') ?? '' }}" id="commercial_number_inp" placeholder="{{ __("Enter the commercial number") }}">
                        <p class="invalid-feedback" id="commercial_number" ></p>
                    </div><!-- End   :: Col -->

                    <!-- Begin :: Col -->
                    <div class="col-md-6">
                        <label class="form-label">{{ __("CEO") }}</label>
                        <input type="text" class="form-control" name="ceo" value="{{ settings()->get('ceo') ?? '' }}" id="ceo_inp" placeholder="{{ __("Enter the CEO") }}">
                        <p class="invalid-feedback" id="ceo" ></p>
                    </div><!-- End   :: Col -->
                </div><!-- End   :: Input group -->

                <!-- Begin :: Input group -->
                <div class="fv-row row mb-15">
                    <!-- Begin :: Col -->
                    <div class="col-md-6">
                        <label class="form-label">{{ __("HR Manager") }}</label>
                        <input type="text" class="form-control" name="hr_manager" value="{{ settings()->get('hr_manager') ?? '' }}" id="hr_manager_inp" placeholder="{{ __("Enter the HR manager") }}">
                        <p class="invalid-feedback" id="hr_manager" ></p>
                    </div><!-- End   :: Col -->
                </div><!-- End   :: Input group -->

                <!-- Begin :: Input group -->
                <div class="fv-row row mb-15">
                    <!-- Begin :: Col -->
                    <div class="col-md-6">
                        <h2>{{__('Address')}}</h2>
                    </div><!-- End   :: Col -->
                </div><!-- End   :: Input group -->

                <!-- Begin :: Input group -->
                <div class="fv-row row mb-15">

                    <!-- Begin :: Col -->
                    <div class="col-md-6">
                        <label class="form-label">{{ __("Country ( arabic )") }}</label>
                        <input type="text" class="form-control gui-input" name="country_ar" value="{{ settings()->get('country_ar') ?? '' }}" id="country_ar_inp" placeholder="{{ __("Enter the country in arabic") }}">
                        <p class="invalid-feedback" id="country_ar" ></p>
                    </div><!-- End   :: Col -->

                    <!-- Begin :: Col -->
                    <div class="col-md-6">
                        <label class="form-label">{{ __("Country ( english )") }}</label>
                        <input type="text" class="form-control en-input" name="country_en" value="{{ settings()->get('country_en') ?? '' }}" id="country_en_inp" placeholder="{{ __("Enter the country in english") }}">
                        <p class="invalid-feedback" id="country_en" ></p>
                    </div><!-- End   :: Col -->
                </div><!-- End   :: Input group -->

                <!-- Begin :: Input group -->
                <div class="fv-row row mb-15">

                    <!-- Begin :: Col -->
                    <div class="col-md-6">
                        <label class="form-label">{{ __("City ( arabic )") }}</label>
                        <input type="text" class="form-control gui-input" name="city_ar" value="{{ settings()->get('city_ar') ?? '' }}" id="city_ar_inp" placeholder="{{ __("Enter the city in arabic") }}">
                        <p class="invalid-feedback" id="city_ar" ></p>
                    </div><!-- End   :: Col -->

                    <!-- Begin :: Col -->
                    <div class="col-md-6">
                        <label class="form-label">{{ __("City ( english )") }}</label>
                        <input type="text" class="form-control en-input" name="city_en" value="{{ settings()->get('city_en') ?? '' }}" id="city_en_inp" placeholder="{{ __("Enter the city in english") }}">
                        <p class="invalid-feedback" id="city_en" ></p>
                    </div><!-- End   :: Col -->
                </div><!-- End   :: Input group -->

                <!-- Begin :: Input group -->
                <div class="fv-row row mb-15">

                    <!-- Begin :: Col -->
                    <div class="col-md-6">
                        <label class="form-label">{{ __("Address in arabic") }}</label>
                        <input type="text" class="form-control gui-input" name="address_ar" value="{{ settings()->get('address_ar') ?? '' }}" id="address_ar_inp" placeholder="{{ __("Enter the address in arabic") }}">
                        <p class="invalid-feedback" id="address_ar" ></p>
                    </div><!-- End   :: Col -->

                    <!-- Begin :: Col -->
                    <div class="col-md-6">
                        <label class="form-label">{{ __("Address in english") }}</label>
                        <input type="text" class="form-control en-input" name="address_en" value="{{ settings()->get('address_en') ?? '' }}" id="address_en_inp" placeholder="{{ __("Enter the address in english") }}">
                        <p class="invalid-feedback" id="address_en" ></p>
                    </div><!-- End   :: Col -->
                </div><!-- End   :: Input group -->

                <!-- Begin :: Input group -->
                <div class="fv-row row mb-15">
                    <!-- Begin :: Col -->
                    <div class="col-md-6">
                        <label class="form-label">{{ __("Postal code") }}</label>
                        <input type="text" class="form-control" name="postal_code" value="{{ settings()->get('postal_code') ?? '' }}" id="postal_code_inp" placeholder="{{ __("Enter the postal code") }}">
                        <p class="invalid-feedback" id="postal_code" ></p>
                    </div><!-- End   :: Col -->
                </div><!-- End   :: Input group -->

                 <!-- Begin :: Input group -->
                 <div class="fv-row row mb-15">
                    <!-- Begin :: Col -->
                    <div class="col-md-6">
                        <h2>{{__('Contact Us')}}</h2>
                    </div><!-- End   :: Col -->
                </div><!-- End   :: Input group -->

                <!-- Begin :: Input group -->
                <div class="fv-row row mb-15">
                    <!-- Begin :: Col -->
                    <div class="col-md-6">
                        <label class="form-label">{{ __("Phone") }}</label>
                        <input type="tel" class="form-control" name="phone" value="{{ settings()->get('phone') ?? '' }}" id="phone_inp" placeholder="{{ __("Enter the phone") }}">
                        <p class="invalid-feedback" id="phone" ></p>
                    </div><!-- End   :: Col -->

                    <!-- Begin :: Col -->
                    <div class="col-md-6">
                        <label class="form-label">{{ __("Email") }}</label>
                        <input type="email" class="form-control" name="email" value="{{ settings()->get('email') ?? '' }}" id="email_inp" placeholder="{{ __("Enter the email") }}">
                        <p class="invalid-feedback" id="email" ></p>
                    </div><!-- End   :: Col -->
                </div><!-- End   :: Input group -->


                <!-- begin :: Row -->
                <div class="row mb-20">
                    <!-- begin :: Column -->
                    <div class="col-md-3 fv-row d-flex justify-content-evenly">
                        <div class="d-flex flex-column">
                            <!-- begin :: Upload image component -->
                            <label class="text-center fw-bold mb-4">{{ __("Logo") }}</label>
                            <x-dashboard.upload-image-inp name="logo" :image="settings()->get('logo') ?? '' " directory="Settings" placeholder="default.jpg" type="editable" ></x-dashboard.upload-image-inp>
                            <p class="invalid-feedback" id="logo" ></p><!-- end   :: Upload image component -->
                        </div>
                    </div><!-- end   :: Column -->

                    <!-- begin :: Column -->
                    <div class="col-md-3 fv-row d-flex justify-content-evenly">

                        <div class="d-flex flex-column">
                            <!-- begin :: Upload image component -->
                            <label class="text-center fw-bold mb-4">{{ __("Company stamp") }}</label>
                            <x-dashboard.upload-image-inp name="company_stamp_image" :image=" settings()->get('company_stamp_image') ?? '' " directory="Settings" placeholder="default.jpg" type="editable" ></x-dashboard.upload-image-inp>
                            <p class="invalid-feedback" id="company_stamp_image" ></p><!-- end   :: Upload image component -->
                        </div>
                    </div><!-- end   :: Column -->

                    <!-- begin :: Column -->
                    <div class="col-md-3 fv-row d-flex justify-content-evenly">

                        <div class="d-flex flex-column">
                            <!-- begin :: Upload image component -->
                            <label class="text-center fw-bold mb-4">{{ __("CEO signature") }}</label>
                            <x-dashboard.upload-image-inp name="ceo_signature_image" :image="settings()->get('ceo_signature_image')??''" directory="Settings" placeholder="default.jpg" type="editable" ></x-dashboard.upload-image-inp>
                            <p class="invalid-feedback" id="ceo_signature_image" ></p><!-- end   :: Upload image component -->
                        </div>
                    </div><!-- end   :: Column -->

                    <!-- begin :: Column -->
                    <div class="col-md-3 fv-row d-flex justify-content-evenly">

                        <div class="d-flex flex-column">

                            <!-- begin :: Upload image component -->
                            <label class="text-center fw-bold mb-4">{{ __("Header") }}</label>
                            <x-dashboard.upload-image-inp name="header_image" :image=" settings()->get('header_image') ?? '' " directory="Settings" placeholder="default.jpg" type="editable" ></x-dashboard.upload-image-inp>
                            <p class="invalid-feedback" id="header_image" ></p><!-- end   :: Upload image component -->
                        </div>
                    </div><!-- end   :: Column -->

                    <!-- begin :: Column -->
                    <div class="col-md-3 fv-row d-flex justify-content-evenly" style="margin:20px auto">

                        <div class="d-flex flex-column">
                            <!-- begin :: Upload image component -->
                            <label class="text-center fw-bold mb-4">{{ __("Footer") }}</label>
                            <x-dashboard.upload-image-inp name="footer_image" :image=" settings()->get('footer_image') ?? '' " directory="Settings" placeholder="default.jpg" type="editable" ></x-dashboard.upload-image-inp>
                            <p class="invalid-feedback" id="footer_image" ></p><!-- end   :: Upload image component -->
                        </div>
                    </div><!-- end   :: Column -->
                </div><!-- end   :: Row -->
            </div><!-- End   :: Card body -->
        </div><!-- End   :: General Settings Card -->


        <!-- Begin :: Seo Settings Card -->
        <div class="card card-flush setting-card" style="display:none" id="seo-settings-card">
            <!--begin::Card header-->
            <div class="card-header pt-8">
                <div class="card-title">
                    <h2>Seo</h2>
                </div>
            </div><!--end::Card header-->

            <!-- Begin :: Card body -->
            <div class="card-body">

                <!-- Begin :: Input group -->
                <div class="fv-row row mb-15">

                    <!-- Begin :: Col -->
                    <div class="col-md-6">
                        <label class="form-label">{{ __("Meta tag description in arabic") }}</label>
                        <textarea class="form-control form-control form-control" name="meta_tag_description_ar" id="meta_tag_description_ar_inp" data-kt-autosize="true">{{ settings()->get('meta_tag_description_ar') ?? '' }}</textarea>
                        <p class="invalid-feedback" id="meta_tag_description_ar" ></p>
                    </div><!-- End   :: Col -->

                    <!-- Begin :: Col -->
                    <div class="col-md-6">
                        <label class="form-label">{{ __("Meta tag description in english") }}</label>
                        <textarea class="form-control form-control form-control" name="meta_tag_description_en" id="meta_tag_description_en_inp" data-kt-autosize="true">{{ settings()->get('meta_tag_description_en') ?? '' }}</textarea>
                        <p class="invalid-feedback" id="meta_tag_description_en" ></p>
                    </div><!-- End   :: Col -->
                </div><!-- End   :: Input group -->

                <!-- Begin :: Input group -->
                <div class="fv-row row mb-15">

                    <!-- Begin :: Col -->
                    <div class="col-md-6">
                        <label class="form-label">{{ __("Meta tag keywords in arabic") }}</label>
                        <input type="text" class="" id="meta_tag_keyword_ar_inp" name="meta_tag_keyword_ar" value="{{ settings()->get('meta_tag_keyword_ar') ?? '' }}" placeholder="{{ __("Enter the meta tag keywords in arabic") }}"/>
                        <p class="invalid-feedback" id="meta_tag_keyword_ar" ></p>
                    </div><!-- End   :: Col -->

                    <!-- Begin :: Col -->
                    <div class="col-md-6">
                        <label class="form-label">{{ __("Meta tag keywords in english") }}</label>
                        <input type="text" class="" id="meta_tag_keyword_en_inp" name="meta_tag_keyword_en" value="{{ settings()->get('meta_tag_keyword_en') ?? '' }}" placeholder="{{ __("Enter the meta tag keywords in english") }}"/>
                        <p class="invalid-feedback" id="meta_tag_keyword_en" ></p>
                    </div><!-- End   :: Col -->
                </div><!-- End   :: Input group -->
            </div><!-- End   :: Card body -->
        </div><!-- End   :: Seo Settings Card -->
    </form><!--end::Form-->

@endsection
@push('scripts')
    <script src="{{ asset('dashboard-assets/plugins/custom/formrepeater/formrepeater.bundle.js') }}"></script>
    <script src="{{ asset('js/dashboard/components/form_repeater.js') }}" ></script>
    <script src="{{ asset('dashboard-assets/plugins/custom/tinymce/tinymce.bundle.js') }}"></script>
@endpush
