@extends('partials.dashboard.master')
@push('styles')
<link href="{{ asset('dashboard-assets/css/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
<link href="{{asset('dashboard-assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />

@endpush
@section('title') {{ $patient->full_name }} @endsection
@section('content')
<div class="card mb-5 mb-xl-10">
    <div class="card-body pt-9 pb-0">
        <!--begin::Details-->
        <div class="d-flex flex-wrap flex-sm-nowrap mb-3">
            <!--begin: Pic-->
            <div class="me-7 mb-4">
                <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                    <img src="{{ asset('dashboard-assets/media/avatars/300-1.jpg') }}" alt="image" />
                </div>
            </div>
            <!--end::Pic-->

            <!--begin::Info-->
            <div class="flex-grow-1">
                <!--begin::Title-->
                <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                    <!--begin::User-->
                    <div class="d-flex flex-column">
                        <!--begin::Name-->
                        <div class="d-flex align-items-center mb-2">
                            <a href="javascript:void(0);"
                                class="text-gray-900 text-hover-primary fs-2 fw-bold me-1">{{ $patient->fullname }}</a>
                        </div>
                        <!--end::Name-->

                        <!--begin::Info-->
                        <div class="d-flex flex-wrap fw-semibold fs-6 mb-4 pe-2">
                            <a href="javascript:void(0);"
                                class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen018.svg-->
                                <span class="svg-icon svg-icon-4 me-1">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.3"
                                            d="M18.0624 15.3453L13.1624 20.7453C12.5624 21.4453 11.5624 21.4453 10.9624 20.7453L6.06242 15.3453C4.56242 13.6453 3.76242 11.4453 4.06242 8.94534C4.56242 5.34534 7.46242 2.44534 11.0624 2.04534C15.8624 1.54534 19.9624 5.24534 19.9624 9.94534C20.0624 12.0453 19.2624 13.9453 18.0624 15.3453Z"
                                            fill="currentColor" />
                                        <path
                                            d="M12.0624 13.0453C13.7193 13.0453 15.0624 11.7022 15.0624 10.0453C15.0624 8.38849 13.7193 7.04535 12.0624 7.04535C10.4056 7.04535 9.06241 8.38849 9.06241 10.0453C9.06241 11.7022 10.4056 13.0453 12.0624 13.0453Z"
                                            fill="currentColor" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                                {{ $patient->nationality->name }}
                            </a>
                            <a href="mailto::{{ $patient->email }}"
                                class="d-flex align-items-center text-gray-400 text-hover-primary mb-2">
                                <!--begin::Svg Icon | path: icons/duotune/communication/com011.svg-->
                                <span class="svg-icon svg-icon-4 me-1">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.3"
                                            d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19Z"
                                            fill="currentColor" />
                                        <path
                                            d="M21 5H2.99999C2.69999 5 2.49999 5.10005 2.29999 5.30005L11.2 13.3C11.7 13.7 12.4 13.7 12.8 13.3L21.7 5.30005C21.5 5.10005 21.3 5 21 5Z"
                                            fill="currentColor" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                                {{ $patient->email }}
                            </a>
                        </div>
                        <!--end::Info-->
                    </div>
                    <!--end::User-->
                </div>
                <!--end::Title-->

                <!--begin::Stats-->
                <div class="d-flex flex-wrap flex-stack">
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-column flex-grow-1 pe-8">
                        <!--begin::Stats-->
                        <div class="d-flex flex-wrap">
                            <!--begin::Stat-->
                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                <!--begin::Number-->
                                <div class="d-flex align-items-center">
                                    <div class="fs-2 fw-bold">{{ $patient->total_points_count }}</div>
                                </div>
                                <!--end::Number-->

                                <!--begin::Label-->
                                <div class="fw-semibold fs-6 text-gray-400">{{ __('Points') }}</div>
                                <!--end::Label-->
                            </div>
                            <!--end::Stat-->

                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                <!--begin::Number-->
                                <div class="d-flex align-items-center">
                                    <div class="fs-2 fw-bold">{{ $patient->invoice->count() }}</div>
                                </div>
                                <!--end::Number-->

                                <!--begin::Label-->
                                <div class="fw-semibold fs-6 text-gray-400">{{ __('Visit number') }}</div>
                                <!--end::Label-->
                            </div>
                            <!--end::Stat-->
                        </div>
                        <!--end::Stats-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Stats-->
            </div>
            <!--end::Info-->
        </div>
        <!--end::Details-->
    </div>
</div>
<!--end::Navbar-->

<!--begin::details View-->
<div class="card mb-5 mb-xl-10">
    <!--begin::Card header-->
    <div class="card-header cursor-pointer">
        <!--begin::Card title-->
        <div class="card-title m-0">
            <h3 class="fw-bold m-0">{{ __('Patient Details') }}</h3>
        </div>
        <!--end::Card title-->

        <!--begin::Action-->
        <a href="{{ route('dashboard.patients.edit', $patient->id) }}"
            class="btn btn-sm btn-primary align-self-center">{{ __('Edit') }}</a>
        <!--end::Action-->
    </div>

    <!--begin::Card body-->
    <div class="card-body p-9">
        <!--begin::Row-->
        <div class="row mb-7">
            <!--begin::Label-->
            <label class="col-lg-4 fw-semibold text-muted">{{ __('Full Name') }}</label>
            <!--end::Label-->

            <!--begin::Col-->
            <div class="col-lg-8">
                <span class="fw-bold fs-6 text-gray-800">{{ $patient->fullname }}</span>
            </div>
            <!--end::Col-->
        </div>
        <!--end::Row-->

        <!--begin::Input group-->
        <div class="row mb-7">
            <!--begin::Label-->
            <label class="col-lg-4 fw-semibold text-muted">{{ __('Id number') }}</label>
            <!--end::Label-->

            <!--begin::Col-->
            <div class="col-lg-8 fv-row">
                <span class="fw-semibold text-gray-800 fs-6">{{ $patient->id_number }}</span>
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->

        <!--begin::Input group-->
        <div class="row mb-7">
            <!--begin::Label-->
            <label class="col-lg-4 fw-semibold text-muted">{{ __('Phone') }}</label>
            <!--end::Label-->

            <!--begin::Col-->
            <div class="col-lg-8 d-flex align-items-center">
                <span class="fw-bold fs-6 text-gray-800 me-2"><a
                        href="tel::{{ $patient->full_phone }}">{{ $patient->full_phone }}</a></span>
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->

        <!--begin::Input group-->
        <div class="row mb-7">
            <!--begin::Label-->
            <label class="col-lg-4 fw-semibold text-muted">{{ __('Gender') }}</label>
            <!--end::Label-->

            <!--begin::Col-->
            <div class="col-lg-8">
                <a href="javascript:void(0);" class="fw-semibold fs-6 text-gray-800 text-hover-primary">
                    @if ($patient->gender == App\Enums\GenderType::MALE->value)
                    <span class="badge badge-light-success"> {{ __($patient->gender) }}</span>
                    @elseif($patient->gender == App\Enums\GenderType::FEMALE->value)
                    <span class="badge badge-light-danger"> {{ __($patient->gender) }}</span>
                    @elseif($patient->gender == App\Enums\GenderType::CHILD->value)
                    <span class="badge badge-light-info"> {{ __($patient->gender) }}</span>
                    @endif
                </a>
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->

        <!--begin::Input group-->
        <div class="row mb-7">
            <!--begin::Label-->
            <label class="col-lg-4 fw-semibold text-muted">{{ __('Age') }}</label>
            <!--end::Label-->

            <!--begin::Col-->
            <div class="col-lg-8">
                <span class="fw-bold fs-6 text-gray-800">{{ $patient->age_calculation }}</span>
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->

        <!--begin::Input group-->
        <div class="row mb-7">
            <!--begin::Label-->
            <label class="col-lg-4 fw-semibold text-muted">{{ __('Diseases') }}</label>
            <!--end::Label-->

            <!--begin::Col-->
            <div class="col-lg-8">
                <span class="fw-bold fs-6 text-gray-800">{{ $patient->diseases }}</span>
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->

        <!--begin::Input group-->
        <div class="row mb-7">
            <!--begin::Label-->
            <label class="col-lg-4 fw-semibold text-muted">{{ __('address') }}</label>
            <!--end::Label-->

            <!--begin::Col-->
            <div class="col-lg-8">
                <span class="fw-bold fs-6 text-gray-800">{{ $patient->address }}</span>
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->

        <!--begin::Input group-->
        <div class="row mb-10">
            <!--begin::Label-->
            <label class="col-lg-4 fw-semibold text-muted">{{ __('City') }}</label>
            <!--end::Label-->

            <!--begin::Label-->
            <div class="col-lg-8">
                <span class="fw-semibold fs-6 text-gray-800">{{ $patient->city }}</span>
            </div>
            <!--begin::Label-->
        </div>
        <!--end::Input group-->
    </div>
    <!--end::Card body-->
</div>
<!--end::details View-->


<!--begin::Row-->
<div class="row gy-5 g-xl-10">

    <!--begin::Col-->
    <div class="col-xl-12">
        <!--begin::Table Widget 5-->
        <div class="card h-xl-100">

            <!--begin::Card header-->
            <div class="card-header pt-7">
                <!--begin::Title-->
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold text-dark">{{ __('The Analysis') }}</span>
                    <span
                        class="text-gray-400 mt-1 fw-semibold fs-6">{{ __('Total') . ' ' . $waitingLabs->count() }}</span>
                </h3>
                <!--end::Title-->

            </div>
            <!--end::Card header-->



            <!--begin::Card body-->
            <div class="card-body scroll h-600px px-5">
                <!--begin::Card header-->

                <!--begin::Title-->
                <h5 class="card-title "> {{ __('Analysis comparison') }}</h5>
                <!--end::Title-->

                <form action="" method="get" class="row">
                    <div class="col-4">
                        <label for="analysis" class="form-label">{{__('The Analysis')}}</label>
                        <select class="form-select" multiple data-control="select2" id="analysis" name="analysis[]"
                            data-placeholder="{{__('Choose the analysis')}}"
                            data-dir="{{ isArabic() ? 'rtl' : 'ltr' }}">
                            <option></option>
                            @foreach($mainAnalysis as $analysis)
                            <option
                                {{ ($requestAnalysis ? in_array($analysis->id, $requestAnalysis) ? 'selected' : '' : '') }}
                                value="{{$analysis->id}}">{{$analysis->general_name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-3">
                        <label for="from_1" class="form-label">{{__('From')}}</label>
                        <input class="form-control" name="from" type="date" placeholder="{{__('Choose the date')}}"
                            id="from_1" />
                    </div>
                    <div class="col-3">
                        <label for="to_2" class="form-label">{{__('To')}}</label>
                        <input class="form-control" name="to" type="date" placeholder="{{__('Choose the date')}}"
                            id="to_2" />
                    </div>

                    <div class="col-2 pt-8">
                        <button class="btn btn-light-success" type="submit">{{__('Compare now')}}</button>
                    </div>
                </form>

                <!--begin::Table-->
                <table id="kt_datatable_vertical_scroll" class="table table-striped table-row-bordered gy-5 gs-7 py-7">
                    <div class="accordion accordion-icon-toggle" id="kt_accordion_1">
                        <div class="mb-5">
                            @forelse($waitingLabs as $waitingLab)

                            @if($loop->first)
                            <!--begin::Table head-->
                            <thead>
                                <!--begin::Table row-->
                                <tr class="fw-semibold fs-6 text-gray-800">
                                    <th class="text-center">#</th>
                                    <th class="text-center  min-w-100px">{{ __('Analyse') }}</th>
                                    <th class="text-center  min-w-100px">{{ __('Classification') }}</th>
                                    <th class="text-center  min-w-100px">{{ __('Result') }}</th>
                                    @if($requestAnalysis)
                                    <th class="text-center  min-w-100px">{{__('Analysis comparison')}}</th>
                                    @endif
                                    <th class="text-center  min-w-100px">{{ __('Date') }}</th>
                                </tr>
                                <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                            @endif

                            <th colspan="1">
                                {{$loop->iteration}}
                            </th>
                            <th class="text-center accordion-header" id="kt_accordion_1_header_{{$waitingLab->id}}"
                                colspan="5">
                                <button class="accordion-button fs-4 fw-semibold" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#kt_accordion_1_body_{{$waitingLab->id}}"
                                    aria-expanded="true" aria-controls="kt_accordion_1_body_{{$waitingLab->id}}">
                                    <span class="accordion-icon"><span
                                            class="svg-icon svg-icon-4"><svg>...</svg></span></span>

                                    <h3 class="fs-4 fw-semibold mb-0 ms-4">{{ __('Analyse').' - ' }}
                                        {{ $waitingLab->mainAnalysis->general_name ?? '' . ' ' .  $waitingLab->mainAnalysis->code }}
                                    </h3>
                                </button>
                            </th>

                            <!--begin::Table body-->
                            <tbody id="kt_accordion_1_body_{{$waitingLab->id}}"
                                class="fw-bold text-gray-600 accordion-collapse collapse @if($loop->first) show @endif"
                                aria-labelledby="kt_accordion_1_header_{{$waitingLab->id}}"
                                data-bs-parent="#kt_accordion_1">
                                @foreach ($waitingLab->mainAnalysis->subAnalysis as $subAnalysis)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <!--end::Product ID-->

                                    <!--begin::Item-->
                                    <td class="text-center">
                                        <a href="javascript:void(0);"
                                            class="text-dark text-hover-primary">{{ $subAnalysis->name }}</a>
                                    </td>
                                    <!--end::Item-->

                                    <!--begin::Product ID-->
                                    <td class="text-center">{{ $subAnalysis->classification }}</td>
                                    <!--end::Product ID-->

                                    <!--begin::Price-->
                                    <td class="text-center">
                                        {{ $subAnalysis->result->first()->result ?? __('Not found result') }}
                                    </td>
                                    <!--end::Price-->

                                    @if($requestAnalysis)
                                    <!--begin::Price-->
                                    <td class="text-center">
                                        @if(count($subAnalysis->result) <= 1) disabled @endif <button type="button"
                                            class="btn-sm btn btn-light-success " data-bs-toggle="modal"
                                            data-bs-target="#kt_modal_{{$subAnalysis->id}}">
                                            {{__('Compare now')}}
                                            </button>
                                    </td>
                                    <!--end::Price-->
                                    <div class="modal fade" tabindex="-1" id="kt_modal_{{$subAnalysis->id}}">
                                        <div class="modal-dialog modal-dialog-centered modal-lg">

                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">{{__('Name')}}: {{ $subAnalysis->name}}</h4>
                                                    <h4 class="modal-title">{{__('Age')}}:
                                                        {{ $patient->age_calculation}}</h4>
                                                    <h4 class="modal-title">{{__('National Identification Number')}}:
                                                        {{ $patient->id_number}}</h4>
                                                </div>
                                                <div class="row p-8">
                                                    <div class="col-6">{{__('Comparison start date')}}: <span
                                                            class="badge {{$requestFrom ? 'badge-light-success' : 'badge-light-danger'}}">
                                                            {{$requestFrom ? $requestFrom : __('No start date entered for comparison')}}</span>
                                                    </div>
                                                    <div class="col-6">{{__('Comparison end date')}}: <span
                                                            class="badge {{$requestTo ? 'badge-light-success' : 'badge-light-danger'}}">{{$requestTo ? $requestTo : __('No end date entered for comparison')}}</span>
                                                    </div>
                                                </div>
                                                @forelse($subAnalysis->result as $result)
                                                <div class="modal-body border">
                                                    @if($loop->first)
                                                    <div class="row pb-4">
                                                        <div class="col-3 text-start">
                                                            <h3 class="modal-title">{{__('Result')}}</h3>
                                                        </div>
                                                        <div class="col-3">
                                                            <h3>{{__('analysis')}}</h3>
                                                        </div>

                                                        <div class="col-3">
                                                            <h3>{{__('Release Date')}}</h3>
                                                        </div>

                                                        <div class="col-3 text-end">
                                                            <h3>{{__('Normal Ranges')}}</h3>
                                                        </div>
                                                    </div>
                                                    @endif

                                                    <div class="row">
                                                        <div class="col-3 text-start">
                                                            <p class="modal-title">{{$result->result}}</p>
                                                        </div>
                                                        <div class="col-3">
                                                            <p>{{$subAnalysis->name}}</p>
                                                        </div>

                                                        <div class="col-3">
                                                            <p>{{$result->updated_at->format('d/m/Y')}}</p>
                                                        </div>

                                                        <div class="col-3 text-center">
                                                            <p>{{$subAnalysis->normalRanges->first()?->value}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                @empty
                                                <div class="modal-body">
                                                    @include('partials.dashboard.alerts.danger.border')
                                                </div>
                                                @endforelse
                                                <div class="modal-footer">
                                                    <button type="button"
                                                        class="btn btn-light-danger">{{__('print')}}</button>
                                                    <button type="button" class="btn btn-light"
                                                        data-bs-dismiss="modal">{{__('Close')}}</button>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    @endif

                                    <!--begin::Status-->
                                    <td class="text-center">
                                        <span>{{ $subAnalysis->result->first()->created_at ?? __('Not found date') }}</span>
                                    </td>
                                    <!--end::Status-->

                                </tr>
                                @endforeach
                            </tbody>

                            @empty
                            @include('partials.dashboard.alerts.danger.border')
                            @endforelse
                            <!--end::Table body-->
                        </div>
                    </div>
                </table>
                <!--end::Table-->
            </div>
            <!--end::Card body-->





        </div>
        <!--end::Table Widget 5-->
    </div>
    <!--end::Col-->




    <!--begin::Col-->
    <div class="col-xl-12">
        <!--begin::Table Widget 5-->
        <div class="card h-xl-100">
            <!--begin::Card body-->
            <div class="card-body scroll h-600px px-5">
                <!--begin::Card header-->

                <!--begin::Title-->
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold text-dark">{{ __('Invoices') }}</span>

                </h3>

                <!--end::Title-->

                <form action="" method="get" class="row">
                    <div class="col-3">
                        <label for="from_1" class="form-label">{{__('From')}}</label>
                        <input class="form-control" name="from" value="{{request()->get('from') ?? '' }}" type="date"
                            placeholder="{{__('Choose the date')}}" id="from_1" />
                    </div>
                    <div class="col-3">
                        <label for="to_2" class="form-label">{{__('To')}}</label>
                        <input class="form-control" name="to" value="{{request()->get('to') ?? '' }}" type="date"
                            placeholder="{{__('Choose the date')}}" id="to_2" />
                    </div>

                    <div class="col-2 pt-8">
                        <button class="btn btn-light-success" type="submit">{{__('Search')}}</button>
                    </div>


                    <div class="col-4 pt-8" style="text-align: end;">
                        <a class="btn btn-primary"
                            href="{{route('dashboard.print-invoice',$patient->id)}}">{{__('Print')}} </a>
                    </div>

                </form>

                <!--begin::Table-->
                <table id="kt_datatable_vertical_scroll" class="table table-striped table-row-bordered gy-5 gs-7 py-7">
                    <div class="accordion accordion-icon-toggle" id="kt_accordion_1">
                        <div class="mb-5">


                            <!--begin::Table head-->
                            <thead>
                                <!--begin::Table row-->
                                <tr class="fw-semibold fs-6 text-gray-800">
                                    <th class="text-center">#</th>
                                    <th class="text-center  min-w-100px">{{ __('Analyse') }}</th>
                                    <th class="text-center  min-w-100px">{{ __('Amount Paid') }}</th>
                                    <th class="text-center  min-w-100px">{{ __('Total Price') }}</th>
                                    <th class="text-center  min-w-100px">{{ __('Payment Method') }}</th>
                                    <th class="text-center  min-w-100px">{{ __('Approved') }}</th>
                                    <th class="text-center  min-w-100px">{{ __('Date') }}</th>
                                </tr>
                                <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->



                            <!--begin::Table body-->
                            <tbody>
                                @forelse( $patient->invoice as $invoice)

                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>

                                    <td class="text-center">
                                        @forelse($invoice->main_analysis as $mainAnalysis)
                                        {{-- <span class="text-center">{{$mainAnalysis ? $mainAnalysis["name"] : ''}}</span> <br>  --}}
                                        @empty
                                        @endforelse
                                    </td>

                                    <td class="text-center">{{ $invoice->amount_paid }}</td>
                                    <td class="text-center">{{ $invoice->total_price }}</td>

                                    <td class="text-center">
                                        <span> <strong> {{__('Payment Method')}} : </strong>
                                            {{ $invoice->pay_method == 1 ? __('Cash') : __('Credit') }}</span> <br>
                                        @if($invoice->pay_method == 2)
                                        <span> <strong> {{__('Payment Type')}} : </strong>
                                            @if($invoice->payment_type == 1 )
                                            TAMARA
                                            @elseif($invoice->payment_type == 2 )
                                            TAP
                                            @else
                                            MADA

                                            @endif
                                        </span>

                                        @endif
                                    </td>


                                    <td class="text-center">
                                        <span> @if ($invoice->approved_date !== null) <strong
                                                style="color:#50cd89">Approved</strong> @else <strong
                                                style="color:#ee044c">Not Approved</strong> @endif </span>
                                    </td>

                                    <td class="text-center">
                                        <span>{{  $invoice->created_at->format('d-m-Y')}}</span>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>


                            <!--end::Table body-->
                        </div>
                    </div>
                </table>
                <!--end::Table-->
            </div>
            <!--end::Card body-->





        </div>
        <!--end::Table Widget 5-->
    </div>
    <!--end::Col-->
</div>
<!--end::Row-->
@endsection


@push('scripts')
<script src="{{ asset('js/dashboard/datatables/datatables.bundle.js') }}"></script>

<script>
let currentUserId = {
    {
        auth() - > id()
    }
};
</script>
@endpush