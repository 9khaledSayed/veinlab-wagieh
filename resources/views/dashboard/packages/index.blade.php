@extends('partials.dashboard.master')
@push('styles')
    <link href="{{ asset('dashboard-assets/css/datatables' . ( isDarkMode() ?  '.dark' : '' ) .'.bundle.css') }}" rel="stylesheet" type="text/css"/>
@endpush
@section('title') {{ __("Packages list") }} @endsection

@section('content')
    @component('components.dashboard.breadcrumb')
        @slot('breadcrumb_title')
            <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">{{ __("Packages") }}</h1><!-- end   :: Title -->
        @endslot
        <!-- begin :: Item -->
        <li class="breadcrumb-item text-muted">{{__('Packages list')}}</li><!-- end   :: Item -->
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
                        <i class="fa fa-search fa-lg" ></i>
                    </span>
                    <input type="text" class="form-control form-control-solid w-250px ps-15 border-gray-300 border-1" id="general-search-inp" placeholder="{{ __("Search ...") }}">
                </div><!-- end   :: General Search -->

                <!--begin::Card toolbar-->
                <div class="card-toolbar">
                    <!--begin::Toolbar-->
                    <div class="d-flex justify-content-end">

                        @can('create_packages')
                        <!-- begin :: Add Button -->
                        <a href="{{ route('dashboard.packages.create') }}" class="btn btn-primary" data-bs-toggle="tooltip" title="">
                            <span class="svg-icon svg-icon-2">
                                <i class="fa fa-plus fa-lg"></i>
                            </span>
                            {{ __("Add new package") }}
                        </a><!-- end   :: Add Button -->
                        @endcan
                    </div>
                    <!--end::Toolbar-->
                    <!--begin::Group actions-->
                    <div class="d-flex justify-content-end align-items-center d-none" data-kt-subscription-table-toolbar="selected">
                        <div class="fw-bold me-5">
                            <span class="me-2" data-kt-subscription-table-select="selected_count"></span>Selected</div>
                        <button type="button" class="btn btn-danger" data-kt-subscription-table-select="delete_selected">Delete Selected</button>
                    </div>
                    <!--end::Group actions-->
                </div>
                <!--end::Card toolbar-->

            </div><!-- end   :: Filter -->


            <ul class="nav nav-tabs nav-line-tab justify-content-center py-4">
                <li class="nav-item">
                    <a class="nav-link active btn btn-light-info me-3" data-bs-toggle="tab" href="#packages_1">{{__('Packages')}}</a>
                </li>

                <li class="nav-item">
                    <a href="#packages_2" data-bs-toggle="tab" class="nav-link  btn btn-light-info me-3">{{__('seasonal package')}} </a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="packages_1">
                    <!-- begin :: Datatable -->
                    <table data-ordering="false" id="packages" class="table text-center table-row-dashed fs-6 gy-5">
                        <thead>
                        <tr class="text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                            <th>#</th>
                            <th>{{ __("Name") }}</th>
                            <th>{{ __("price") }}</th>
                            <th>{{ __("Status") }}</th>
                            <th>{{ __("Created date") }}</th>
                            <th class="min-w-100px">{{ __("actions") }}</th>
                        </tr>
                        </thead>

                        <tbody class="text-gray-600 fw-bold text-center">

                        </tbody>
                    </table><!-- end   :: Datatable -->

                </div>

                <div class="tab-pane fade" id="packages_2">
                    <!-- begin :: Datatable -->
                    <table data-ordering="false" id="seasonal_packages" class="table text-center table-row-dashed fs-6 gy-5">
                        <thead>
                        <tr class="text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                            <th>#</th>
                            <th>{{ __("Name") }}</th>
                            <th>{{ __("price") }}</th>
                            <th>{{ __("From Date") }}</th>
                            <th>{{ __("To Date") }}</th>
                            <th>{{ __("Status") }}</th>
                            <th>{{ __("Created date") }}</th>
                            <th class="min-w-100px">{{ __("actions") }}</th>
                        </tr>
                        </thead>

                        <tbody class="text-gray-600 fw-bold text-center">

                        </tbody>
                    </table><!-- end   :: Datatable -->

                </div>

            </div>
        </div><!-- end   :: Card Body -->
    </div><!-- end   :: Datatable card -->
@endsection
@push('scripts')
    <script src="{{ asset('js/dashboard/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('js/dashboard/datatables/packages.js') }}"></script>
    <script src="{{ asset('js/dashboard/datatables/seasonal-packages.js') }}"></script>
    <script>
        let currentUserId = {{ auth()->id() }};
    </script>
@endpush
