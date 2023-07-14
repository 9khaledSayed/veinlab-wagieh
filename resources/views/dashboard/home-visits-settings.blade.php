@extends('partials.dashboard.master')
@section('title') {{ __("Home visit fees") }} @endsection

@section('content')

    <!--begin::Form-->
    <form action="{{ route('dashboard.settings.home-visits.store') }}" class="form" method="post" id="submitted-form" data-redirection-url="{{ route('dashboard.settings.home-visits') }}">
    @csrf

    <!-- Begin :: General Settings Card -->
    <input type="hidden" name="setting_type" value="general" id="setting-type-inp">

    <!-- Begin :: General Settings Card -->
    <div class="card card-flush setting-card" id="general-settings-card">
        <!--begin::Card header-->
        <div class="card-header pt-8">

            <div class="card-title">
                <h2>{{ __("Home visit fees") }}</h2>
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
                    <div class="col-md-12">

                        <label class="form-label">{{ __("Home visit fees") }}</label>
                        <input type="number" class="form-control" name="home_visit_fees" min="0" value="{{ settings()->get('home_visit_fees') ?? '0' }}" id="home_visit_fees_inp" placeholder="{{ __("Enter home visit fees") }}">
                        <p class="invalid-feedback" id="home_visit_fees" ></p>

                    </div>
                    <!-- End   :: Col -->

                </div>
                <!-- End   :: Input group -->



        </div>
        <!-- End   :: Card body -->

    </div>
    <!-- End   :: General Settings Card -->

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

