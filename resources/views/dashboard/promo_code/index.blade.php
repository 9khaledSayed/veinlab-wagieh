{{--<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>--}}
@extends('partials.dashboard.master')
@section('title') {{__('Promo code list')}} @endsection
@push('styles')
    <link href="{{ asset('dashboard-assets/css/datatables' . ( isDarkMode() ?  '.dark' : '' ) .'.bundle.css') }}" rel="stylesheet" type="text/css"/>
@endpush
@section('content')
    @component('components.dashboard.breadcrumb')
        @slot('breadcrumb_title')
            <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">{{ __("Promo Codes") }}</h1><!-- end   :: Title -->
        @endslot
        <!-- begin :: Item -->
        <li class="breadcrumb-item text-muted">{{__('Promo code list')}}</li><!-- end   :: Item -->
    @endcomponent

    <!-- begin :: Datatable card -->
    <div class="card mb-2" id="tableData">
        @php($class = ['label' => 'fs-5 fw-bold col-lg-2 col-md-3 col-sm-12', 'input'=> ' col-lg-8 col-md-9 col-sm-12'])

        <!-- begin :: Card Body -->
        <div class="card-body fs-6 py-15 px-10 py-lg-15 px-lg-15 text-gray-700">

            <!-- begin :: row type-->
            <div class="row form-group align-items-center justify-content-md-center mb-3" id="">
                <label class="{{$class['label']}}">{{ __("Type") }} </label>
                <div class="{{$class['input']}}">
                    <select class="{{'form-select '.$class['input']}}" id="type_inp" name="type" required data-control="select2" data-placeholder="{{__('Select an option')}}" data-hide-search="false">
                        @foreach(\App\Enums\PromoCodeTypes::cases() as $case)
                            <option value="{{$case->value}}">{{ __($case->getName())}}</option>
                        @endforeach
                    </select>
                    <p class="invalid-feedback" id="type"></p>
                </div>
            <!-- begin :: row type-->

            </div>
            <!-- begin :: Filter -->
            <div class="d-flex flex-stack flex-wrap mb-15">

                <!-- begin :: General Search -->
                <div class="d-flex align-items-center position-relative my-1 mb-2 mb-md-0">
                    <span class="svg-icon svg-icon-1 position-absolute ms-6">
                           <i class="fa fa-search fa-lg"></i>
                    </span>
                    <input type="text" class="form-control form-control-solid w-250px ps-15 border-gray-300 border-1" id="general-search-inp" placeholder="{{ __("Search ...") }}">
                </div><!-- end   :: General Search -->

                <!-- begin :: Toolbar -->
                <div class="d-flex justify-content-end" data-kt-docs-table-toolbar="base">
                    @can('create_marketers')
                        <!-- begin :: Add Button -->
                    <a href="{{ url('dashboard/promoCode/create') }}" class="btn btn-primary" data-bs-toggle="tooltip" title="" id="createUrl">

                        <span class="svg-icon svg-icon-2">
                            <i class="fa fa-plus fa-lg"></i>
                        </span>

                        {{ __("Add new Promo Code") }}
                    </a><!-- end   :: Add Button -->
                    @endcan

                </div><!-- end   :: Toolbar -->
            </div><!-- end   :: Filter -->

            <!-- begin :: Datatable -->
            <table data-ordering="false" id="kt_datatable" class="table text-center table-row-dashed fs-6 gy-5">

                <thead>
                <tr class="text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                    <th>#</th>
                    <th class="min-w-100px" >{{ __("Marketer name") }}</th>
                    <th class="min-w-100px" >{{ __("User name") }}</th>
                    <th class="min-w-100px">{{ __("Code") }}</th>
                    <th class="min-w-100px">{{ __("From") }}</th>
                    <th class="min-w-100px">{{ __("To") }}</th>
                    <th class="min-w-100px">{{ __("Status") }}</th>
                    <th class="min-w-100px">{{ __("Date") }}</th>
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

    <script src="{{ asset('js/dashboard/datatables/promo_codes.js') }}"></script>


@endpush
