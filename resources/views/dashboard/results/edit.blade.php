@extends('partials.dashboard.master')
@section('title')  {{ __("Edit Result") }} @endsection

@push('styles')
    <style>
        table {
            width: 100%;
        }

        th {
            background-color: #dddddd;
            font-size: 1.3rem;
        }

        td {
            text-align: right;
            border-bottom: 1px solid black;
        }

        td,
        th {
            padding: 10px;
            text-align: center
        }

        .normal-range div p {
            line-height: 20px !important;
        }
    </style>
@endpush
@section('content')
    @component('components.dashboard.breadcrumb')
        @slot('breadcrumb_title')
            <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">{{ __("Waiting List") }}</h1><!-- end   :: Title -->
        @endslot
        <!-- begin :: Item -->
        <li class="breadcrumb-item text-muted">{{__('Waiting List')}}</li><!-- end   :: Item -->
    @endcomponent


    <form class="form-group" action="{{route('dashboard.results.update', $waitingLab->id)}}" id="submitted-form" data-redirection-url="{{url(url()->previous())}}" class="form" method="post">
        @csrf
        @method('put')

        @include('dashboard.results.form')

        <div class="kt-portlet__foot" style="text-align: center">
            <div class="kt-form__actions">
                <div class="row">
                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-primary">{{__('Edit')}}</button>
                        <a href="{{route('dashboard.waiting-labs.index')}}" class="btn btn-secondary">{{__('back')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!--end::Section-->
@endsection
@push('scripts')
    <script src="{{ asset('dashboard-assets/plugins/custom/formrepeater/formrepeater.bundle.js') }}"></script>
    <script src="{{ asset('dashboard-assets/plugins/custom/ckeditor/check-editor.js') }}"></script>
    <script>
        ClassicEditor.create(document.querySelector('#kt_docs_ckeditor_classic'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });


        var growth = document.getElementById('growth_status');

        if (growth.value == 'growth') {
            document.getElementById("cultivationDiv").style.display = "block";
        }

        growth.addEventListener("change", function () {

            if (this.value === 'growth') {
                document.getElementById("cultivationDiv").style.display = "block";
            } else {
                document.getElementById("cultivationDiv").style.display = "none";
            }

        });


        $('#kt_docs_repeater_basic').repeater({
            initEmpty: false,

            defaultValues: {
                'text-input': 'foo'
            },

            show: function () {
                $(this).slideDown();
            },

            hide: function (deleteElement) {
                $(this).slideUp(deleteElement);
            }
        });


        $('#kt_docs_repeater_basic_2').repeater({
            initEmpty: false,

            defaultValues: {
                'text-input': 'foo'
            },

            show: function () {
                $(this).slideDown();
            },

            hide: function (deleteElement) {
                $(this).slideUp(deleteElement);
            }
        });


        $('#kt_docs_repeater_basic_3').repeater({
            initEmpty: false,

            defaultValues: {
                'text-input': 'foo'
            },

            show: function () {
                $(this).slideDown();
            },

            hide: function (deleteElement) {
                $(this).slideUp(deleteElement);
            }
        });
    </script>

@endpush
