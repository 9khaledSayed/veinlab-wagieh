@extends('partials.dashboard.master')
@section('title') {{ __("General") }} @endsection

@section('content')

    <!--begin::Form-->
    <form action="{{ route('dashboard.settings.store') }}" class="form" method="post" id="submitted-form" data-redirection-url="{{ route('dashboard.settings.index') }}">
    @csrf

    <!-- Begin :: General Settings Card -->
    <input type="hidden" name="setting_type" value="general" id="setting-type-inp">

    <!-- Begin :: General Settings Card -->
    <div class="card card-flush setting-card" id="general-settings-card">
        <!--begin::Card header-->
        <div class="card-header pt-8">

            <div class="card-title">
                <h2>{{ __("General") }}</h2>
            </div>

            <div class="card-title">

                <!-- begin :: Submit btn -->
                <button type="submit" class="btn btn-primary mx-4" id="submit-btn-general">

                    <span class="indicator-label">{{ __("Save") }}</span>

                    <!-- begin :: Indicator -->
                    <span class="indicator-progress">{{ __("Please wait ...") }}
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                        </span>
                    <!-- end   :: Indicator -->

                </button>
                <!-- end   :: Submit btn -->

            </div>
        </div>
        <!--end::Card header-->

        <!-- Begin :: Card body -->
        <div class="card-body">

                <!-- Begin :: Input group -->
                <div class="fv-row row mb-15">

                    <!-- Begin :: Col -->
                    <div class="col-md-6">

                        <label class="form-label">{{ __("Working hours") }}</label>
                        <input type="number" class="form-control" name="working_hours" value="{{ settings()->get('working_hours') ?? '' }}" id="working_hours_inp" placeholder="{{ __("Enter the working hours") }}">
                        <p class="invalid-feedback" id="working_hours" ></p>

                    </div>
                    <!-- End   :: Col -->

                    <!-- Begin :: Col -->
                    <div class="col-md-6">

                        <label class="form-label">{{ __("Grace period for delay") }}</label>
                        <input type="number" class="form-control" name="grace_period_for_delay" value="{{ settings()->get('grace_period_for_delay') ?? '' }}" id="grace_period_for_delay_inp" placeholder="{{ __("Enter the grace period for delay") }}">
                        <p class="invalid-feedback" id="grace_period_for_delay" ></p>

                    </div>
                    <!-- End   :: Col -->

                </div>
                <!-- End   :: Input group -->

                <!-- Begin :: Input group -->
                <div class="fv-row row mb-15">

                    <!-- Begin :: Col -->
                    <div class="col-md-6">

                        <label class="form-label">{{ __("Salary issuance date") }}</label>
                        <input type="number" class="form-control" name="salary_issuance_date" value="{{ settings()->get('salary_issuance_date') ?? '' }}" id="salary_issuance_date_inp" placeholder="{{ __("Enter the salary issuance date") }}">
                        <p class="invalid-feedback" id="salary_issuance_date" ></p>

                    </div>
                    <!-- End   :: Col -->

                </div>
                <!-- End   :: Input group -->


                <!-- Begin :: Input group -->
                {{-- <div class="fv-row row mb-15">

                    <!-- Begin :: Col -->
                    <div class="col-md-6">

                        <label class="form-label">{{ __("logo") }}</label>
                        <br>
                        <input type="file" class="d-none" accept="image/*" name="logo" id="logo-uploader">
                        <button class="btn btn-secondary w-100 image-upload-inp" type="button" > <i class="bi bi-upload fs-8" ></i> {{ settings()->get('logo') ?:  __("no file is selected")   }} </button>
                        <p class="invalid-feedback" id="logo" ></p>


                    </div>
                    <!-- End   :: Col -->

                    <!-- Begin :: Col -->
                    <div class="col-md-6">

                        <label class="form-label">{{ __("favicon") }}</label>
                        <br>
                        <input type="file" class="d-none" accept="image/*" name="favicon" id="favicon-uploader">
                        <button class="btn btn-secondary w-100 image-upload-inp" type="button" > <i class="bi bi-upload fs-8" ></i> {{ settings()->get('favicon') ?:  __("no file is selected")   }} </button>
                        <p class="invalid-feedback" id="favicon" ></p>

                    </div>
                    <!-- End   :: Col -->

                </div> --}}
                <!-- End   :: Input group -->

        </div>
        <!-- End   :: Card body -->

    </div>
    <!-- End   :: General Settings Card -->


    <!-- Begin :: Seo Settings Card -->
    <div class="card card-flush setting-card" style="display:none" id="seo-settings-card">
        <!--begin::Card header-->
        <div class="card-header pt-8">

            <div class="card-title">
                <h2>Seo</h2>
            </div>

            <div class="card-title">

                <!-- begin :: Submit btn -->
                <button type="submit" class="btn btn-primary mx-4" id="submit-btn-seo">

                    <span class="indicator-label">{{ __("Save") }}</span>

                    <!-- begin :: Indicator -->
                    <span class="indicator-progress">{{ __("Please wait ...") }}
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                    </span>
                    <!-- end   :: Indicator -->

                </button>
                <!-- end   :: Submit btn -->

            </div>

        </div>
        <!--end::Card header-->

        <!-- Begin :: Card body -->
        <div class="card-body">

                <!-- Begin :: Input group -->
                <div class="fv-row row mb-15">

                    <!-- Begin :: Col -->
                    <div class="col-md-6">

                        <label class="form-label">{{ __("Meta tag description in arabic") }}</label>
                        <textarea class="form-control form-control form-control" name="meta_tag_description_ar" id="meta_tag_description_ar_inp" data-kt-autosize="true">{{ settings()->get('meta_tag_description_ar') ?? '' }}</textarea>
                        <p class="invalid-feedback" id="meta_tag_description_ar" ></p>

                    </div>
                    <!-- End   :: Col -->

                    <!-- Begin :: Col -->
                    <div class="col-md-6">

                        <label class="form-label">{{ __("Meta tag description in english") }}</label>
                        <textarea class="form-control form-control form-control" name="meta_tag_description_en" id="meta_tag_description_en_inp" data-kt-autosize="true">{{ settings()->get('meta_tag_description_en') ?? '' }}</textarea>
                        <p class="invalid-feedback" id="meta_tag_description_en" ></p>

                    </div>
                    <!-- End   :: Col -->

                </div>
                <!-- End   :: Input group -->

                <!-- Begin :: Input group -->
                <div class="fv-row row mb-15">

                    <!-- Begin :: Col -->
                    <div class="col-md-6">

                        <label class="form-label">{{ __("Meta tag keywords in arabic") }}</label>
                        <input type="text" class="" id="meta_tag_keyword_ar_inp" name="meta_tag_keyword_ar" value="{{ settings()->get('meta_tag_keyword_ar') ?? '' }}" placeholder="{{ __("Enter the meta tag keywords in arabic") }}"/>
                        <p class="invalid-feedback" id="meta_tag_keyword_ar" ></p>

                    </div>
                    <!-- End   :: Col -->

                    <!-- Begin :: Col -->
                    <div class="col-md-6">

                        <label class="form-label">{{ __("Meta tag keywords in english") }}</label>
                        <input type="text" class="" id="meta_tag_keyword_en_inp" name="meta_tag_keyword_en" value="{{ settings()->get('meta_tag_keyword_en') ?? '' }}" placeholder="{{ __("Enter the meta tag keywords in english") }}"/>
                        <p class="invalid-feedback" id="meta_tag_keyword_en" ></p>

                    </div>
                    <!-- End   :: Col -->

                </div>
                <!-- End   :: Input group -->

        </div>
        <!-- End   :: Card body -->

    </div>
    <!-- End   :: Seo Settings Card -->


    </form>
    <!--end::Form-->

@endsection
@push('scripts')
    <script src="{{ asset('dashboard-assets/plugins/custom/formrepeater/formrepeater.bundle.js') }}"></script>
    <script src="{{ asset('js/dashboard/components/form_repeater.js') }}" ></script>
    <script src="{{ asset('dashboard-assets/plugins/custom/tinymce/tinymce.bundle.js') }}"></script>
    <script>

        let changeSettingView = (tab) => {

            $('.setting-card').hide();
            $('.setting-label').removeClass('active');

            $( "#" + tab + '-settings-card').show()
            $( "#" + tab + '-settings-label').addClass('active')

            $( "#setting-type-inp").val(tab);
        };

        $(document).ready( () => {

            initTinyMc( true );

            $('.image-upload-inp').click( function () {

                $(this).prev().trigger('click');

            });

            $('[id*=-uploader]').change(function () {

                let fileName = $(this)[0].files[0].name;

                $(this).next().html(`<i class="bi bi-upload fs-8" ></i> ${ fileName } `);

            });

            new Tagify( document.getElementById('meta_tag_keyword_ar_inp') , { originalInputValueFormat: valuesArr => valuesArr.map(item => item.value).join(',') });
            new Tagify( document.getElementById('meta_tag_keyword_en_inp') , { originalInputValueFormat: valuesArr => valuesArr.map(item => item.value).join(',') });


        });

    </script>
@endpush

