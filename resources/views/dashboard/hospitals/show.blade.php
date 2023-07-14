@extends('partials.dashboard.master')
@section('title') {{ __("Show") . ' - ' . $hospital->name  }} @endsection

@section('content')
    @component('components.dashboard.breadcrumb')
        @slot('breadcrumb_title')
            <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1"><a href="{{ route('dashboard.medical-centers.index') }}" class="text-muted text-hover-primary">{{ __("Hospitals") }}</a></h1><!-- end   :: Title -->
        @endslot
        <!-- begin :: Item -->
        <li class="breadcrumb-item text-muted">{{ __("Hospital") }}: {{$hospital->name}}</li><!-- end   :: Item -->
    @endcomponent

    <!--begin::details View-->
    <div class="card mb-5 mb-xl-10">
        <!--begin::Card header-->
        <div class="card-header cursor-pointer">
            <!--begin::Card title-->
            <div class="card-title m-0">
                <h3 class="fw-bold m-0">{{ __('hospital Details') }}</h3>
            </div><!--end::Card title-->

            <!--begin::Action-->
            <a href="{{ route('dashboard.laboratories.edit', $hospital->id) }}" class="btn btn-sm btn-primary align-self-center">{{ __('Edit') }}</a><!--end::Action-->
        </div>

        <!--begin::Card body-->
        <div class="card-body p-9">
            <!--begin::Row-->
            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-4 fw-semibold text-muted">{{ __('Name') }}</label><!--end::Label-->

                <!--begin::Col-->
                <div class="col-lg-8">
                    <span class="fw-bold fs-6 text-gray-800">{{ $hospital->name }}</span>
                </div><!--end::Col-->
            </div><!--end::Row-->

            <!--begin::Input group-->
            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-4 fw-semibold text-muted">{{ __('Phone') }}</label><!--end::Label-->

                <!--begin::Col-->
                <div class="col-lg-8 d-flex align-items-center">
                    <span class="fw-bold fs-6 text-gray-800 me-2"><a href="tel::{{ $hospital->phone }}">{{ $hospital->phone }}</a></span>
                </div><!--end::Col-->
            </div><!--end::Input group-->

            <!--begin::Input group-->
            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-4 fw-semibold text-muted">{{ __('Email') }}</label><!--end::Label-->

                <!--begin::Col-->
                <div class="col-lg-8 d-flex align-items-center">
                    <span class="fw-bold fs-6 text-gray-800 me-2"><a href="mailto::{{ $hospital->email }}">{{ $hospital->email }}</a></span>
                </div><!--end::Col-->
            </div><!--end::Input group-->

            <!--begin::Input group-->
            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-4 fw-semibold text-muted">{{ __('Dues') }}</label><!--end::Label-->

                <!--begin::Col-->
                <div class="col-lg-8">
                    <span class="fw-bold fs-6 text-gray-800">{{ $hospital->dues }}</span>
                </div><!--end::Col-->
            </div><!--end::Input group-->

            <!--begin::Input group-->
            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-4 fw-semibold text-muted">{{ __('percentage') }}</label><!--end::Label-->

                <!--begin::Col-->
                <div class="col-lg-8">
                    <span class="fw-bold fs-6 text-gray-800">{{ $hospital->percentage }}</span>
                </div><!--end::Col-->
            </div><!--end::Input group-->

            <!--begin::Input group-->
            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-4 fw-semibold text-muted">{{ __('Patient No') }}</label><!--end::Label-->

                <!--begin::Col-->
                <div class="col-lg-8">
                    <span class="fw-bold fs-6 text-gray-800">{{ $hospital->no_patients }}</span>
                </div><!--end::Col-->
            </div><!--end::Input group-->


        </div><!--end::Card body-->
    </div><!--end::details View-->


    <!--begin::Content-->
    <div class="gy-5 g-xl-10">
        <div class="row row-cols-1 row-cols-md-2 mb-6 mb-xl-9">
            <div class="col">
                <!--begin::Card-->
                <div class="card pt-4 h-md-100 mb-6 mb-md-0">
                    <!--begin::Card header-->
                    <div class="card-header border-0">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <h2 class="fw-bold">{{__('invoices')}}</h2>
                        </div><!--end::Card title-->
                    </div><!--end::Card header-->

                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <div class="fw-bold fs-2">
                            <div class="d-flex">
                                <div class="ms-2">{{$hospital->invoices->count()}}</div>
                            </div>
                            <div class="fs-7 fw-normal text-muted">{{__('Number of hospital invoice')}}</div>
                        </div>
                    </div><!--end::Card body-->
                </div><!--end::Card-->
            </div>

            <div class="col">
                <!--begin::Card-->
                <div class="card pt-4 h-md-100 mb-6 mb-md-0">
                    <!--begin::Card header-->
                    <div class="card-header border-0">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <h2 class="fw-bold">{{__('Main analysis')}}</h2>
                        </div><!--end::Card title-->
                    </div><!--end::Card header-->

                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <div class="fw-bold fs-2">
                            <div class="d-flex">
                                <div class="ms-2">{{$hospital->mainAnalysis->count()}}</div>
                            </div>
                            <div class="fs-7 fw-normal text-muted">{{__('Number of hospital analysis')}}</div>
                        </div>
                    </div><!--end::Card body-->
                </div><!--end::Card-->
            </div>

        </div>

        <!--begin::Card-->
        <div class="card pt-4 mb-6 mb-xl-9">
            <!--begin::Card header-->
            <div class="card-header border-0">
                <!--begin::Card title-->
                <div class="card-title">
                    <h2>{{__('analysis')}}</h2>
                </div><!--end::Card title-->
            </div><!--end::Card header-->

            <!--begin::Card body-->
            <div class="card-body pt-0 pb-5">
                <!--begin::Table-->
                <table class="table align-middle table-row-dashed gy-5" id="kt_table_customers_payment">
                    <!--begin::Table head-->
                    <thead class="border-bottom border-gray-200 fs-7 fw-bold">
                    <!--begin::Table row-->
                    <tr class="text-start text-muted text-uppercase gs-0">
                        <th>#</th>
                        <th>{{__('General name')}}</th>
                        <th>{{__('Price')}}</th>
                        <th class="min-w-100px">{{__('Created date')}}</th>
                    </tr><!--end::Table row-->
                    </thead><!--end::Table head-->

                    <!--begin::Table body-->
                    <tbody class="fs-6 fw-semibold text-gray-600">
                    @forelse($hospital->mainAnalysis as $analysis)
                        <!--begin::Table {{$analysis->general_name}}-->
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <!--begin::General name-->
                            <td>{{$analysis->general_name}}</td><!--end::General name-->

                            <!--begin::cost=-->
                            <td>{{$analysis->price}}</td><!--end::cost=-->

                            <!--begin::Date=-->
                            <td>{{$analysis->created_at->translatedFormat('d M Y, h:i a')}}</td><!--end::Date=-->

                        </tr><!--end::Table {{$analysis->general_name}}-->
                    @empty
                        @include('partials.dashboard.alerts.danger.border')
                    @endforelse
                    </tbody>
                    <!--end::Table body-->
                </table>
                <!--end::Table-->
            </div><!--end::Card body-->
        </div><!--end::Card-->

        <!--begin::Card-->
        <div class="card pt-4 mb-6 mb-xl-9">
            <!--begin::Card header-->
            <div class="card-header border-0">
                <!--begin::Card title-->
                <div class="card-title">
                    <h2>{{__('invoices')}}</h2>
                </div><!--end::Card title-->
            </div><!--end::Card header-->

            <!--begin::Card body-->
            <div class="card-body pt-0 pb-5">
                <!--begin::Table-->
                <table class="table align-middle table-row-dashed gy-5" id="kt_table_customers_payment">
                    <!--begin::Table head-->
                    <thead class="border-bottom border-gray-200 fs-7 fw-bold">
                    <!--begin::Table row-->
                    <tr class="text-start text-muted text-uppercase gs-0">
                        <th>{{__('General name')}}</th>
                        <th>{{__('Total Price')}}</th>
                        <th>{{__('Serial number')}}</th>
                        <th>{{__('Barcode')}}</th>
                        <th class="min-w-100px">{{__('Created date')}}</th>
                    </tr><!--end::Table row-->

                    </thead>

                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody class="fs-6 fw-semibold text-gray-600">
                    @forelse($hospital->invoices as $invoice)
                        <tr>
                            <!--begin::General name-->
                            <td>{{$invoice->patient->FullName ?? ''}}</td><!--end::General name-->

                            <!--begin::total_price=-->
                            <td>{{$invoice->total_price}}</td><!--end::total_price=-->

                            <!--begin::serial_no=-->
                            <td>{{$invoice->serial_no}}</td><!--end::serial_no=-->

                            <!--begin::selling=-->
                            <td>{{$invoice->barcode}}</td><!--end::selling=-->

                            <!--begin::Date=-->
                            <td title="{{$invoice->created_at->translatedFormat('d M Y, h:i a')}}">{{$invoice->create_since}}</td><!--end::Date=-->
                        </tr>
                    @empty
                        @include('partials.dashboard.alerts.danger.border')
                    @endforelse
                    </tbody>
                    <!--end::Table body-->
                </table>
                <!--end::Table-->
            </div><!--end::Card body-->
        </div><!--end::Card-->
    </div><!--end::Content-->


@endsection
@push('scripts')
    <script src="{{ asset('js/dashboard/datatables/datatables.bundle.js') }}"></script>
    <script>
        let currentUserId = {{ auth()->id() }};
    </script>
@endpush
