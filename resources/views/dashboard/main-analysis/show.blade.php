@extends('partials.dashboard.master')
@section('title') {{__('View key analysis information')}} @endsection

@section('content')
    @component('components.dashboard.breadcrumb')
        @slot('breadcrumb_title')
            <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1"><a href="{{ route('dashboard.main-analysis.index') }}" class="text-muted text-hover-primary">{{ __("Main analysis") }}</a></h1><!-- end   :: Title -->
        @endslot
        <!-- begin :: Item -->
        <li class="breadcrumb-item text-muted">{{ __("View key analysis information") }}</li><!-- end   :: Item -->
    @endcomponent

    <!--begin::Navbar-->
    <div class="card mb-6 mb-xl-9">
        <div class="card-body pt-9 pb-0">
            <!--begin::Details-->
            <div class="d-flex flex-wrap flex-sm-nowrap mb-6">
                <!--begin::Wrapper-->
                <div class="flex-grow-1">
                    <!--begin::Head-->
                    <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                        <!--begin::Details-->
                        <div class="d-flex flex-column">
                            <!--begin::Status-->
                            <div class="d-flex align-items-center mb-1">
                                <a href="javascript:void(0)" class="text-gray-800 text-hover-primary fs-2 fw-bold me-3">{{$analysis->general_name}}</a>
                            </div><!--end::Status-->

                            <!--begin::Description-->
                            <div class="d-flex flex-wrap fw-semibold mb-4 fs-5 text-gray-400">{{$analysis->abbreviated_name}}</div><!--end::Description-->
                        </div><!--end::Details-->

                        <!--begin::Actions-->
                        <div class="d-flex mb-4">
                            <a href="{{route('dashboard.sub-analysis.create')}}" class="btn btn-sm btn-bg-light btn-active-color-primary me-3" >{{__('Add new sub analysis')}}</a>
                            <a href="{{route('dashboard.main-analysis.create')}}" class="btn btn-sm btn-primary me-3">{{__('Add new main analysis')}}</a>
                        </div><!--end::Actions-->
                    </div><!--end::Head-->

                    <!--begin::Info-->
                    <div class="d-flex flex-wrap justify-content-start">
                        <!--begin::Stats-->
                        <div class="d-flex flex-wrap">
                            <!--begin::Stat-->
                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                <!--begin::Number-->
                                <div class="d-flex align-items-center">
                                    <div class="fs-4 fw-bold" data-kt-countup="true" data-kt-countup-value="{{$analysis->subAnalysis->count()}}">{{$analysis->subAnalysis->count()}}</div>
                                </div><!--end::Number-->
                                <!--begin::Label-->
                                <div class="fw-semibold fs-6 text-gray-400">{{__('Sub analysis')}}</div><!--end::Label-->
                            </div><!--end::Stat-->

                            <!--begin::Stat-->
                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                <!--begin::Number-->
                                <div class="d-flex align-items-center">
                                    <div class="fs-4 fw-bold" data-kt-countup="true" data-kt-countup-value="{{$analysis->hospitals->count()}}">{{$analysis->hospitals->count()}}</div>
                                </div><!--end::Number-->
                                <!--begin::Label-->
                                <div class="fw-semibold fs-6 text-gray-400">{{__('hospitals')}}</div><!--end::Label-->
                            </div><!--end::Stat-->

                            <!--begin::Stat-->
                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                <!--begin::Number-->
                                <div class="d-flex align-items-center">
                                    <div class="fs-4 fw-bold" data-kt-countup="true" data-kt-countup-value="{{$analysis->packages->count()}}">{{$analysis->packages->count()}}</div>
                                </div><!--end::Number-->

                                <!--begin::Label-->
                                <div class="fw-semibold fs-6 text-gray-400">{{__('packages')}}</div><!--end::Label-->
                            </div><!--end::Stat-->

                            <!--begin::Stat-->
                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                <!--begin::Number-->
                                <div class="d-flex align-items-center">
                                    <div class="fs-4 fw-bold" data-kt-countup="true" data-kt-countup-value="{{$analysis->results->count()}}">{{$analysis->results->count()}}</div>
                                </div><!--end::Number-->

                                <!--begin::Label-->
                                <div class="fw-semibold fs-6 text-gray-400">{{__('Results')}}</div><!--end::Label-->
                            </div><!--end::Stat-->

                            <!--begin::Stat-->
                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                <!--begin::Number-->
                                <div class="d-flex align-items-center">
                                    <div class="fs-4 fw-bold" data-kt-countup="true" data-kt-countup-value="{{$analysis->waitinglabs->count()}}">{{$analysis->waitinglabs->count()}}</div>
                                </div><!--end::Number-->

                                <!--begin::Label-->
                                <div class="fw-semibold fs-6 text-gray-400">{{__('Waiting Labs')}}</div><!--end::Label-->
                            </div><!--end::Stat-->
                        </div><!--end::Stats-->
                    </div><!--end::Info-->
                </div><!--end::Wrapper-->
            </div><!--end::Details-->
        </div>
    </div><!--end::Navbar-->
    <!--begin::Row-->
    <div class="row g-6 g-xl-9">
        <!--begin::Col-->
        <div class="col-lg-6">
            <!--begin::Card-->
            <div class="card card-flush h-lg-100">
                <!--begin::Card header-->
                <div class="card-header mt-6">
                    <!--begin::Card title-->
                    <div class="card-title flex-column">
                        <h3 class="fw-bold mb-1">{{__('Details')}}</h3>
                    </div><!--end::Card title-->


                </div><!--end::Card header-->

                <!--begin::Card body-->
                <div class="card-body p-9 pt-3">
                    <!--begin::Files-->
                    <div class="d-flex flex-column mb-9">

                        <!--begin::File-->
                        <div class="d-flex align-items-center mb-5">
                            <!--begin::File-->
                            <div class="d-flex align-items-center mb-5">
                                <!--begin::Details-->
                                <div class="fw-semibold">
                                    <a class="fs-6 fw-bold text-dark text-hover-primary" href="{{route('dashboard.main-analysis.edit',$analysis->id)}}">{{$analysis->general_name}}</a>
                                    <div class="text-gray-400">{{__('General name')}}</div>
                                </div><!--end::Details-->
                            </div>
                        </div>

                        <!--begin::File-->
                        <div class="d-flex align-items-center mb-5">
                            <!--begin::File-->
                            <div class="d-flex align-items-center mb-5">
                                <!--begin::Details-->
                                <div class="fw-semibold">
                                    <a class="fs-6 fw-bold text-dark text-hover-primary" >{{$analysis->abbreviated_name}}</a>
                                    <div class="text-gray-400">{{__('Abbreviated name')}}</div>
                                </div><!--end::Details-->
                            </div>
                        </div>

                        <!--begin::File-->
                        <div class="d-flex align-items-center mb-5">
                            <!--begin::File-->
                            <div class="d-flex align-items-center mb-5">
                                <!--begin::Details-->
                                <div class="fw-semibold">
                                    <a class="fs-6 fw-bold text-dark text-hover-primary" >{{$analysis->code}}</a>
                                    <div class="text-gray-400">{{__('Code')}}</div>
                                </div><!--end::Details-->
                            </div>
                        </div>

                        <!--begin::File-->
                        <div class="d-flex align-items-center mb-5">
                            <!--begin::File-->
                            <div class="d-flex align-items-center mb-5">
                                <!--begin::Details-->
                                <div class="fw-semibold">
                                    <a class="fs-6 fw-bold text-dark text-hover-primary" >{{$analysis->price}}</a>
                                    <div class="text-gray-400">{{__('Price')}}</div>
                                </div><!--end::Details-->
                            </div>
                        </div>

                        <!--begin::File-->
                        <div class="d-flex align-items-center mb-5">
                            <!--begin::File-->
                            <div class="d-flex align-items-center mb-5">
                                <!--begin::Details-->
                                <div class="fw-semibold">
                                    <a class="fs-6 fw-bold text-dark text-hover-primary" >{{$analysis->cost}}</a>
                                    <div class="text-gray-400">{{__('Cost')}}</div>
                                </div><!--end::Details-->
                            </div>
                        </div>

                        <!--begin::File-->
                        <div class="d-flex align-items-center mb-5">
                            <!--begin::File-->
                            <div class="d-flex align-items-center mb-5">
                                <!--begin::Details-->
                                <div class="fw-semibold">
                                    <a class="fs-6 fw-bold text-dark text-hover-primary" >{{$analysis->demand_no}}</a>
                                    <div class="text-gray-400">{{__('Demand number')}}</div>
                                </div><!--end::Details-->
                            </div>
                        </div>

                        <!--begin::File-->
                        <div class="d-flex align-items-center mb-5">
                            <!--begin::File-->
                            <div class="d-flex align-items-center mb-5">
                                <!--begin::Details-->
                                <div class="fw-semibold">
                                    <a class="fs-6 fw-bold text-dark text-hover-primary" >{{$analysis->discount}}</a>
                                    <div class="text-gray-400">{{__('Discount')}}</div>
                                </div><!--end::Details-->
                            </div>
                        </div>
                    </div><!--end::Files-->
                </div>
                <!--end::Card body -->
            </div>
            <!--end::Card-->
        </div><!--end::Col-->

        <!--begin::Col-->
        <div class="col-lg-6">
            <!--begin::Card-->
            <div class="card card-flush h-lg-100">
                <!--begin::Card header-->
                <div class="card-header mt-6">
                    <!--begin::Card title-->
                    <div class="card-title flex-column">
                        <h3 class="fw-bold mb-1">{{__('Patients')}}</h3>
                    </div><!--end::Card title-->

                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        <a href="{{route('dashboard.patients.index')}}" class="btn btn-bg-light btn-active-color-primary btn-sm">{{__('View All')}}</a>
                    </div><!--end::Card toolbar-->
                </div><!--end::Card toolbar-->

                <!--begin::Card body-->
                <div class="card-body d-flex flex-column p-9 pt-3 mb-9">
                    @forelse($waiting_labs as $waiting_lab)
                    <!--begin::Item-->
                    <div class="d-flex align-items-center mb-5">

                        <!--begin::Details-->
                        <div class="fw-semibold">
                            <a href="javascript:void(0);" class="fs-5 fw-bold text-gray-900 text-hover-primary">{{$waiting_lab->patient->fullname}}</a>
                            <div class="text-gray-400">{{$waiting_lab->patient->email}}</div>
                            <div class="text-gray-400">{{$waiting_lab->patient->phone}}</div>
                        </div><!--end::Details-->

                        <!--begin::Badge-->
                        <div class="ms-auto">{{__($waiting_lab->patient->gender)}}</div><!--end::Badge-->
                    </div><!--end::Item-->
                    @empty
                        @include('partials.dashboard.alerts.danger.border')
                    @endforelse
                </div><!--end::Card body-->
            </div><!--end::Card-->
        </div><!--end::Col-->

        <!--begin::Col-->
        <div class="col-lg-6">
            <!--begin::Card-->
            <div class="card card-flush h-lg-100">
                <!--begin::Card header-->
                <div class="card-header mt-6">
                    <!--begin::Card title-->
                    <div class="card-title flex-column">
                        <h3 class="fw-bold mb-1">{{__('hospitals')}}</h3>
                        <div class="fs-6 text-gray-400">{{__('The latest hospitals affiliated to the analysis')}}</div>
                    </div><!--end::Card title-->

                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        <a href="{{route('dashboard.medical-centers.index')}}" class="btn btn-bg-light btn-active-color-primary btn-sm">{{__('View All')}}</a>
                    </div>
                    <!--end::Card toolbar-->
                </div><!--end::Card header-->

                <!--begin::Card body-->
                <div class="card-body p-9 pt-3">
                    <!--begin::Files-->
                    <div class="d-flex flex-column mb-9">
                    @forelse($hospitals as $hospital)
                        <!--begin::File-->
                        <div class="d-flex align-items-center mb-5">
                            <!--begin::Details-->
                            <div class="fw-semibold">
                                <a class="fs-6 fw-bold text-dark text-hover-primary" href="{{route('dashboard.medical-centers.show',$hospital->id)}}">{{$hospital->name}}</a>
                                <div class="text-gray-400">{{$hospital->created_at}}
                                    <a href="mailto::{{$hospital->email}}">{{$hospital->email}}</a>
                                </div>
                            </div><!--end::Details-->
                        </div>
                    @empty
                        @include('partials.dashboard.alerts.danger.border')
                    @endforelse
                    </div><!--end::Files-->
                </div>
                <!--end::Card body -->
            </div>
            <!--end::Card-->
        </div><!--end::Col-->

        <!--begin::Col-->
        <div class="col-lg-6">
            <!--begin::Card-->
            <div class="card card-flush h-lg-100">
                <!--begin::Card header-->
                <div class="card-header mt-6">
                    <!--begin::Card title-->
                    <div class="card-title flex-column">
                        <h3 class="fw-bold mb-1">{{__('packages')}}</h3>
                    </div><!--end::Card title-->

                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        <a href="{{route('dashboard.packages.index')}}" class="btn btn-bg-light btn-active-color-primary btn-sm">{{__('View All')}}</a>
                    </div><!--end::Card toolbar-->
                </div><!--end::Card toolbar-->

                <!--begin::Card body-->
                <div class="card-body d-flex flex-column p-9 pt-3 mb-9">
                    @forelse($packages as $package)
                    <!--begin::Item-->
                    <div class="d-flex align-items-center mb-5">

                        <!--begin::Details-->
                        <div class="fw-semibold">
                            <a href="javascript:void(0);" class="fs-5 fw-bold text-gray-900 text-hover-primary">{{$package->name}}</a>
                            <div class="text-gray-400">{{$package->from_date && $package->to_date ? __('From') . ' ' . $package->from_date  . ' ' . __('To')  . ' ' . $package->to_date . ' - ' . __('Seasonal offer'). ' - ' . __('Price') . ' ' . $package->price : __('Not a seasonal offer') . ' - ' . __('Price') . ' ' . $package->price}}</div>
                        </div><!--end::Details-->

                        <!--begin::Badge-->
                        <div class="badge badge-{{$package->status == 'active' ? 'success' : 'danger'}} ms-auto">{{$package->status == 'active' ? __('active'): __('inactive')}}</div><!--end::Badge-->
                    </div><!--end::Item-->
                    @empty
                        @include('partials.dashboard.alerts.danger.border')
                    @endforelse
                </div><!--end::Card body-->
            </div><!--end::Card-->
        </div><!--end::Col-->
    </div><!--end::Row-->

    <!--begin::Table-->
    <div class="card card-flush mt-6 mt-xl-9">
        <!--begin::Card header-->
        <div class="card-header mt-5">
            <!--begin::Card title-->
            <div class="card-title flex-column">
                <h3 class="fw-bold mb-1">Project Spendings</h3>
                <div class="fs-6 text-gray-400">{{__('Sub-analyses of this analysis') .  $analysis->subAnalysis->count()}}</div>
            </div>
            <!--begin::Card title-->
        </div><!--end::Card header-->

        <!--begin::Card body-->
        <div class="card-body pt-0">
            <!--begin::Table container-->
            <div class="table-responsive">
                <!--begin::Table-->
                <table id="kt_profile_overview_table" class="table table-row-bordered table-row-dashed gy-4 align-middle fw-bold">
                    <!--begin::Head-->
                    <thead class="fs-7 text-gray-400 text-uppercase">
                    <tr>
                        <th>#</th>
                        <th class="min-w-150px">{{__('Name')}}</th>
                        <th class="min-w-90px">{{__('Classification')}}</th>
                        <th class="min-w-90px">{{__('Unit')}}</th>
                        <th class="min-w-90px">{{__('created date')}}</th>
                        <th class="min-w-50px text-end">{{__('actions')}}</th>
                    </tr>
                    </thead><!--end::Head-->

                    <!--begin::Body-->
                    <tbody class="fs-6">

                    @forelse($analysis->subAnalysis as $analysis)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$analysis->name}}</td>
                        <td>{{$analysis->classification}}</td>
                        <td>{{$analysis->unit}}</td>
                        <td>{{$analysis->created_at}}</td>
                        <td class="text-end">
                            <a href="{{route('dashboard.sub-analysis.edit',$analysis->id)}}" class="btn btn-light btn-sm">{{__('Edit')}}</a>
                        </td>
                    </tr>

                    @empty
                        @include('partials.dashboard.alerts.danger.border')
                    @endforelse
                    </tbody><!--end::Body-->
                </table><!--end::Table-->
            </div><!--end::Table container-->
        </div><!--end::Card body-->
    </div><!--end::Card-->
@endsection
