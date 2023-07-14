@extends('partials.dashboard.master')
@push('styles')
<link href="{{ asset('dashboard-assets/css/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />

<style>
table tbody tr td {
    width: 10% !important;

}
</style>
@endpush
@section('title') {{ $invoice->patient->full_name ?? '' }} @endsection

@section('content')
@component('components.dashboard.breadcrumb')
    @slot('breadcrumb_title')
        <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">{{ __("Results") }}</h1><!-- end   :: Title -->
    @endslot
    <!-- begin :: Item -->
    <li class="breadcrumb-item text-muted">{{__('Show Results')}}</li><!-- end   :: Item -->
@endcomponent

<!--begin::Portlet-->
<div class="card mb-5 mb-xl-10 p-20" id="kt_subheader">

    <div class="kt-portlet">
        <!-- Example single danger button -->
        <div class="kt-portlet__body">
            <!--begin::Section-->
            <div class="kt-section">
                <div class="kt-section__content">
                    <!--begin::Order details-->
                    <div class="d-flex flex-column flex-sm-row gap-7 gap-md-10 fw-bold mb-10">
                        <div class="flex-root d-flex flex-column">
                            <span class="text-muted">{{__('Patient Name')}}</span>
                            <span class="fs-5">{{$invoice->patient->name_ar ?? ''}}</span>
                        </div>
                        <div class="flex-root d-flex flex-column">
                            <span class="text-muted">{{__('File Number')}}</span>
                            <span class="fs-5">{{$invoice->patient->id ?? ''}}</span>
                        </div>
                        <div class="flex-root d-flex flex-column">
                            <span class="text-muted">{{__('created date')}}</span>
                            <span class="fs-5">{{$invoice->updated_at->translatedFormat('d M, Y (H:i A)') ?? ''}}</span>
                        </div>
                    </div>
                    <!--end::Order details-->

                    @forelse($invoice->waitingLabs as $waitingLab)
                    <div class="kt-portlet__head border-bottom">
                        <div class="kt-portlet__head-label m-auto">
                            <h3 class="text-center text-gray-700">
                                {{__('Analyse') . ': ' . $waitingLab->mainanalysis->general_name ?? ''}} </h3>
                        </div>
                    </div>

                    @forelse($waitingLab->results->groupBy('classification') as $classification => $results)
                    <div class="table-responsive">
                        <table class="table text-center table-row-dashed fs-6 gy-5" id="kt_table_1">
                            @if($invoice->waitingLabs->first() == $waitingLab && $loop->first)
                            <thead>
                                <tr class="text-gray-400 ">
                                    <th class="text-center">{{__('Test Name')}}</th>
                                    <th class="text-center">{{__('Result')}}</th>
                                    <th class="text-center">{{__('Unit')}}</th>
                                    <th class="text-center">{{__('Classification')}}</th>
                                    <th class="text-center">{{__('Normal Range')}}</th>
                                    <th class="text-center">{{__('actions')}}</th>
                                </tr>
                            </thead>
                            @endif
                            <tbody>
                                @foreach($results as $result)
                                <tr>
                                    <td class="text-center" title="{{$result->subAnalysis->name ?? ''}}">
                                        {{\Str::limit($result->subAnalysis->name ?? '', 10,'...')}}</td>
                                    <td class="text-center">{{$result->result}}</td>
                                    <td class="text-center">{!! $result->subAnalysis->unit ?? '' !!}</td>
                                    <td class="text-center">{{$classification}}</td>

                                    @if($result->subAnalysis->ReturnTypeNormal($invoice->patient->gender ?? '') ==
                                    'string')
                                    <td class="text-center"
                                        title="{{$result->subAnalysis->normal($invoice->patient->gender ?? '')}}">
                                        {{\Str::limit($result->subAnalysis->normal($invoice->patient->gender ?? ''), 10,'...')}}
                                    </td>


                                    @elseif($result->subAnalysis->ReturnTypeNormal($invoice->patient->gender ?? '') ==
                                    'color')
                                    <td class="text-center">
                                        <div
                                            style="background-color: {{$result->subAnalysis->normal($invoice->patient->gender ?? '')}}">
                                            {{__('Color')}}</div>
                                    </td class="text-center">

                                    @elseif($result->subAnalysis->ReturnTypeNormal($invoice->patient->gender ?? '') ==
                                    'select')
                                    <td class="text-center">
                                        {{__($result->subAnalysis->normal($invoice->patient->gender ?? ''))}}</td>

                                    @else
                                    <td class="text-center">{{__('Not found Normal Ranges')}}</td>
                                    @endif

                                    <td class="text-center">
                                        <a href="#" class="btn btn-light btn-active-light-primary btn-sm"
                                            data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"
                                            data-kt-menu-flip="top-end">
                                            {{__('actions')}}
                                            <span class="svg-icon svg-icon-5 m-0">
                                                <i class="fa fa-angle-down mx-1"></i>
                                            </span>
                                        </a>
                                        <!--begin::Menu-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="px-3 d-flex justify-content-between" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">
                                                    {{__('print')}}
                                                    <span class="svg-icon svg-icon-5 m-0">
                                                        <i class="fa fa-angle-down mx-1"></i>
                                                    </span>
                                                </a>

                                                <!--begin::Menu-->
                                                <div class="menu menu-sub menu-sub-dropdown menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" style="margin:0% 6% 0px 0px;" data-kt-menu="true">
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item">
                                                        <a href="{{route('dashboard.result.print',[$result->id,'lang'=>'ar'])}}"
                                                            class="menu-link px-3 d-flex justify-content-between">
                                                            <span>{{__('print Arabic')}}</span>
                                                            <span><i class="fa fa-print text-warning"></i></span>
                                                        </a>

                                                        <a href="{{route('dashboard.result.print',[$result->id,'lang'=>'en'])}}"
                                                            class="menu-link px-3 d-flex justify-content-between">
                                                            <span>{{__('print English')}}</span>
                                                            <span><i class="fa fa-print text-warning"></i></span>
                                                        </a>
                                                    </div>
                                                </div>

                                                <form data-id="{{$waitingLab->id}}" data-analysis="{{$waitingLab->main_analysis->general_name ?? ''}}">

                                                    <button type="submit" class="btn menu-link px-3 d-flex justify-content-between">
                                                        <span>{{__('Disapprove')}}</span>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                        <!--end::Menu-->
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @empty
                    @endforelse

                    @if($waitingLab->mainAnalysis->has_cultivation)

                    <div class="d-flex flex-column align-items-start">
                        <h3>Cultivation</h3>
                        <p class="fs-4">On cultivation of the received specimen on the relevant media and after 24 hours
                            of aerobic incubation, and sub-culturing suspicious colonies on selective media, the
                            following was revealed.</p>
                    </div>

                    @if($waitingLab->growth_status == 'growth')
                    <div class="text-center p-18 border m-auto fw-bold">
                        {{$waitingLab->cultivation}}
                    </div>

                    <div style=" ; text-align: left; margin-top: 20px">
                        <h2>The growth is highly Sensitive to: </h2>
                        <table class="table-bordered text-left fs-2">
                            <tbody>
                                <tr>
                                    @forelse($waitingLab->high_sensitive_to as $highSensitiveTo)
                                    <td class="p-3">{{$loop->iteration}}</td>
                                    <td class="p-3">{{$highSensitiveTo['name']}}</td>
                                    @empty
                                    @endforelse
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div style="text-align: left; margin-top: 20px">
                        <h2>The growth is Moderate Sensitive to: </h2>
                        <table class="table-bordered text-left" style="font-size: 25px">
                            <tbody>
                                <tr>
                                    @foreach($waitingLab->moderate_sensitive_to as $moderateSensitiveTo)
                                    <td class="p-3">{{$loop->iteration}}</td>
                                    <td class="p-3">{{$moderateSensitiveTo['name']}}</td>
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div style=" ; text-align: left; margin-top: 20px">
                        <h2>The growth is Resistant to: </h2>
                        <table class="table-bordered text-left" style="font-size: 25px">
                            <tbody>
                                <tr>
                                    @foreach($waitingLab->resistant_to as $resistantTo)
                                    <td class="p-3">{{$loop->iteration}}</td>
                                    <td class="p-3">{{$resistantTo['name']}}</td>
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    @endif
                    @endif

                    @if(isset($waitingLab->notes->lab_notes))
                    <div class="kt-portlet__foot">
                        <div class="kt-form__actions">
                            <div class="row ">
                                <div class="col-lg-12 text-center">
                                    <h4 class="mt-3 mb-3 lab"> {{ 'Comments'}} </h4>
                                    <p>{!! $waitingLab->notes->lab_notes !!} </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    @if($waitingLab->results->count() > 0)
                    <div class="d-flex justify-content-around">
                        @can('disaprove_result')
                        <form data-id="{{$waitingLab->id}}" data-analysis="{{$waitingLab->mainAnalysis->general_name}}">
                            <button type="submit" class="btn btn-danger font-weight-bold">{{__('Disapprove')}}</button>
                        </form>
                        @endcan
                    </div>
                    @endif
                    @empty
                    @endforelse

                    <div class="kt-portlet__foot text-center">
                        <div class="kt-form__actions">
                            <div class="row mb-4 mt-2">
                                <div class="col-lg-12 ">
                                    <h4 class="text-gray-700 float-start">{{__('Doctor')}}:{{$invoice->doctor()->first()->name ?? ''}}</h4>
                                </div>
                            </div>

                            <div class="row p-1 d-flex justify-content-start">
                                <div class="col-4">
                                    <button @if($invoice->approved == 1) disabled @else id="approve" @endif type="button" class="btn btn-light-success btn-sm ">
                                        <i class="la la-check"></i>
                                        @if($invoice->approved == 1)
                                            {{__('The result has been approved')}}
                                        @else
                                            {{__('Approve Result')}}
                                        @endif
                                    </button>
                                </div>

                                <div class="col-4">
                                    <a href="#" class="btn btn-light-warning btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">
                                        {{__('Print all analysis')}}
                                        <span class="svg-icon svg-icon-5 m-0">
                                            <i class="fa fa-angle-down mx-1"></i>
                                        </span>
                                    </a>
                                    <!--begin::Menu-->
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                                        <!--begin::Menu item-->
                                        <div class="menu-item">
                                            <a href="{{route('dashboard.results.print',[$invoice->id,'lang'=>'ar'])}}" class="menu-link justify-content-between">
                                                <span>{{__('print for arabic')}}</span>
                                                <span><i class="la la-print text-warning"></i> </span>
                                            </a>
                                        </div>

                                        <!--begin::Menu item-->
                                        <div class="menu-item">
                                            <a href="{{route('dashboard.results.print',[$invoice->id,'lang'=>'en'])}}" class="menu-link justify-content-between">
                                                <span>{{__('print for english')}}</span>
                                                <span><i class="la la-print text-warning"></i> </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Menu-->
                                <div class="col-4">
                                    <button data-bs-toggle="modal" data-bs-target="#kt_modal_1" type="button" class="btn btn-light-primary btn-sm "><i class="la la-send"></i>{{__('Send result to Patient')}}</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div><!--end::Section-->
        </div>
    </div>
</div><!--end::Portlet-->

<!--begin::Modal-->
<div class="modal fade" tabindex="-1" id="kt_modal_1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">{{__('Send result to Patient')}}</h3>
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                    aria-label="Close">
                    <span class="svg-icon svg-icon-1"></span>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12 mb-2">
                        <button id="send-via-whatsapp" type="button" class="btn btn-light-success btn-elevate btn-pill d-block mx-auto">
                            <i class="la la-whatsapp text-warning"></i>
                            <span>{{__('Send result via Whatsapp')}}</span>

                        </button>
                    </div>

                    <div class="col-lg-12 mb-2">

                        <button id="send-via-email" type="button" class="btn btn-light-danger btn-elevate btn-pill d-block mx-auto"><i class="la la-envelope-o"></i>
                            {{__('Send result via email')}}
                        </button>
                    </div>

                    <div class="col-lg-12">
                        <button id="send-via-notification"
                            class="btn btn-light-warning btn-elevate btn-pill d-block mx-auto"><i
                                class="la la-bell"></i>
                            {{__('Send result via browser notifications')}}
                        </button>
                    </div>

                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">{{__('Close')}}</button>
            </div>
        </div>
    </div>
</div>
<!--end::Modal-->
@endsection

@push('scripts')


<script src="{{ asset('js/dashboard/datatables/datatables.bundle.js') }}"></script>
<script type="text/javascript">
let currentUserId = {{ auth()->id()}};

$("#approve").on('click', function() {
    $.ajax({
        type: 'POST',
        url: '/dashboard/approve-result',
        data: {
            "_token": "{{ csrf_token() }}",
            patient_id: {{ $invoice->patient->id}},
            invoice_id: {{ $invoice->id}}
        },
        success: function() {
            swal.fire({
                text: '{{__('The result has been approved successfully')}}',
                icon: "success",
                type: 'success',
                showConfirmButton: false,
                timer: 2000
            })
        }
    });
});

$("#send-via-email").on('click', function () {
    Swal.fire({
        title: '{{__('please wait')}}',
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading()
        },
    })

    $.ajax({
        type:'POST',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: '/dashboard/result/' + {{$invoice->id}} + '/send_via_email' ,
        success: function () {
            swal.fire({
                text: '{{__('message send successfully')}}',
                icon: "success",
                type: 'success',
                showConfirmButton: false,
                timer: 2000
            });
            $("#kt_modal_5").modal('toggle');
        },
        error: function (err) {
            swal.fire({
                text: '{{__('something went wrong')}}',
                icon: "error",
                type: 'error',
                showConfirmButton: false,
            });
        }
    });
});

$("#send-via-notification").on('click', function () {
    Swal.fire({
        title: '{{__('please wait')}}',
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading()
        },
    })

    $.ajax({
        type:'POST',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: '/dashboard/result/' + {{$invoice->id}} + '/send_via_web_notification' ,
        success: function () {
            swal.fire({
                text: '{{__('message send successfully')}}',
                icon: "success",
                type: 'success',
                showConfirmButton: false,
                timer: 2000
            });
            $("#kt_modal_5").modal('toggle');
        },
        error: function (err) {
            swal.fire({
                text: '{{__('something went wrong')}}',
                icon: "error",
                type: 'error',
                showConfirmButton: false,
            });
        }
    });
});

$("#send-via-whatsapp").on('click', function () {
    Swal.fire({
        title: '{{__('please wait')}}',
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading()
        },
    })
    $.ajax({
        type:'POST',
        url: '/dashboard/result/' + {{$invoice->id}} + '/send_via_whatsapp' ,
        data: {
            "_token": "{{ csrf_token() }}",
        },
        success: function () {
            swal.fire({
                text: '{{__('message send successfully')}}',
                icon: "success",
                type: 'success',
                showConfirmButton: false,
                timer: 2000
            });
            $("#kt_modal_5").modal('toggle');
        },
        error: function (err) {
            swal.fire({
                text: '{{__('something went wrong')}}',
                icon: "error",
                type: 'error',
                showConfirmButton: false,
            });
        }
    });
});

$(document).on('submit', 'form[data-id]', function(e) {
    Swal.fire({
        title: '{{__('please wait')}}',
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading()
        },
    })
    e.preventDefault();
    let waitingLab_id = $(this).attr('data-id');
    let analysis = $(this).attr('data-analysis');
    $.ajax({
        type: 'PUT',
        url: '/dashboard/disapprove-result/' + waitingLab_id,
        data: {
            "_token": "{{ csrf_token() }}",
        },
        success: function() {
            swal.fire({
                text: "{{__('The results of the analysis were rejected')}}  {{__('Results will be monitored again as soon as possible')}}",
                icon: "success",
                type: 'success',
                showConfirmButton: false,
                timer: 2000
            });
            $("#kt_modal_5").modal('toggle');
        },
        error: function() {

        }
    });
});

</script>
@endpush
