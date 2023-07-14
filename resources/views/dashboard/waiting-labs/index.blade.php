@extends('partials.dashboard.master')
@section('title') {{__('Waiting Labs')}} @endsection
@push('styles')
<link href="{{ asset('dashboard-assets/css/datatables' . ( isDarkMode() ?  '.dark' : '' ) .'.bundle.css') }}" rel="stylesheet" type="text/css" />

<link href="{{ asset('dashboard-assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />

@endpush
@section('content')

@component('components.dashboard.breadcrumb')
    @slot('breadcrumb_title')
        <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">{{ __('Waiting Labs') }}</h1><!-- end   :: Title -->
    @endslot
    <!-- begin :: Item -->
    <li class="breadcrumb-item text-muted">{{__('Waiting List')}}</li><!-- end   :: Item -->
@endcomponent

<!-- begin :: Datatable card -->
<div class="card mb-2">
    <!-- begin :: Card Body -->
    <div class="card-body fs-6 py-15 px-10 py-lg-15 px-lg-15 text-gray-700">
        <!-- begin :: Filter -->
        <div class="d-flex flex-stack flex-wrap mb-15">
            <!-- begin :: General Search -->
            <div class="d-flex align-items-center position-relative my-1 mb-2 mb-md-0">

                <span class="svg-icon svg-icon-1 position-absolute ms-6">
                    <i class="fa fa-search fa-lg"></i>
                </span>

                <input type="text" class="form-control form-control-solid w-250px ps-15 border-gray-300 border-1" id="general-search-inp" placeholder="{{ __("Search ...") }}">

                <!-- begin :: Archieve  -->
                <div class="d-flex align-items-center position-relative my-1 mb-2 mb-md-0">


                </div><!-- end   :: Archieve  -->
            </div><!-- end   :: General Search -->

            <!-- begin :: Toolbar -->
            <!-- begin :: Toolbar -->
            <div class="d-flex justify-content-end" data-kt-docs-table-toolbar="base">
                 @include('dashboard.waiting-labs.date_form')
            </div><!-- end   :: Toolbar -->
        </div><!-- end   :: Filter -->

        <!-- begin :: Datatable -->
        <table data-ordering="false" id="kt_datatable" class="table text-center table-row-dashed fs-6 gy-5">
            <thead>
                <tr class="text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                    <th>#</th>
                    <th>{{ __("Patient name") }}</th>
                    <th>{{ __("Main analysis") }}</th>
                    <th>{{ __("Barcode") }}</th>
                    <th>{{ __("Serial number") }}</th>
                    <th>{{ __("Status") }}</th>
                    <th>{{ __("Result") }}</th>
                    <th>{{ __("Created date") }}</th>
                    <th class="min-w-100px">{{ __("actions") }}</th>
                </tr>
            </thead>

            <tbody class="text-gray-600 fw-bold text-center">

            </tbody>
        </table><!-- end   :: Datatable -->
    </div><!-- end   :: Card Body -->
</div><!-- end   :: Datatable card -->

@endsection
@push('scripts')
<script src="{{ asset('js/dashboard/datatables/datatables.bundle.js') }}"></script>
<script src="{{ asset('js/dashboard/datatables/waiting-labs.js') }}"></script>
<script>
$("#kt_datepicker_1").flatpickr();

$("#kt_datepicker_2").flatpickr();

</script>

<script>
    let currentUserId = {{auth()->id() }};
</script>

@endpush
