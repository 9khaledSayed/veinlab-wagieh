@extends('partials.dashboard.master')
@push('styles')
    <link href="{{ asset('dashboard-assets/css/datatables' . ( isDarkMode() ?  '.dark' : '' ) .'.bundle.css') }}" rel="stylesheet" type="text/css"/>
@endpush
@section('title') {{__('Show invoices')}} @endsection
@section('content')
    @component('components.dashboard.breadcrumb')
        @slot('breadcrumb_title')
            <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1"><a href="{{ route('dashboard.invoices.index') }}" class="text-muted text-hover-primary">{{ __("invoices") }}</a></h1><!-- end   :: Title -->
        @endslot
        <!-- begin :: Item -->
        <li class="breadcrumb-item text-muted">{{__('Show invoices')}}</li><!-- end   :: Item -->
    @endcomponent

    <!-- begin::Invoice-->
    <div class="card mb-2">
        <!-- begin::Body-->
        <div class="card-body fs-6 py-15 px-10 py-lg-15 px-lg-15 text-gray-700">
            <!-- begin::Wrapper-->
            <div class="mw-lg-950px mx-auto w-100">
                <!-- begin::Header-->
                <div class="d-flex justify-content-between flex-column flex-sm-row mb-19">
                    <h4 class="fw-bolder text-gray-800 fs-2qx pe-5 pb-7">{{__('invoice')}}</h4>
                    <!--end::Logo-->
                    <div class="text-sm-end">
                        <!--begin::Logo-->
                        <a href="#" class="d-block mw-150px ms-sm-auto">
                            <img alt="Logo" src="{{asset('dashboard-assets/media/svg/brand-logos/lloyds-of-london-logo.svg')}}" class="w-100" />
                        </a>
                        <!--end::Logo-->
                        <!--begin::Text-->
                        <div class="text-sm-end fw-semibold fs-4 text-muted mt-7">
                            <div>{{$invoice->patient->fullname ?? ''}}</div>
                            <div>Mississippi 96522</div>
                        </div><!--end::Text-->
                    </div>
                </div><!--end::Header-->

                <!--begin::Body-->
                <div class="pb-12">
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-column gap-7 gap-md-10">
                        <!--begin::Message-->
                        <div class="fw-bold fs-8">
                            <span class="fs-2">{{__('Vein Lab')}}</span>
                            <br />
                            {{__('tax number')}} :  {{settings()->get('tax_number')}}
                        </div>
                        <!--begin::Message-->

                        <!--begin::Separator-->
                        <div class="separator"></div><!--begin::Separator-->

                        <!--begin::Order details-->
                        <div class="d-flex flex-column flex-sm-row gap-7 gap-md-10 fw-bold">

                            <div class="flex-root d-flex flex-column">
                                <span class="text-muted">{{__('Invoice No')}}</span>
                                <span class="fs-5">{{$invoice->serial_no}}</span>
                            </div>
                            <div class="flex-root d-flex flex-column">
                                <span class="text-muted">{{__('created date')}}</span>
                                <span class="fs-5">{{$invoice->updated_at->translatedFormat('d M, Y') ?? ''}}</span>
                            </div>
                            <div class="flex-root d-flex flex-column">
                                <span class="text-muted">{{__('References signature')}}</span>
                                <div class="fs-5" >
                                    <img src="data:image/png;base64,{{DNS1D::getBarcodePNG($invoice->barcode, 'C39',2,44,[1,1,1], true)}}" alt="barcode"/>
                                </div>
                            </div>
                        </div><!--end::Order details-->


                        <!--begin::Billing & shipping-->
                        <div class="d-flex flex-column flex-sm-row gap-7 gap-md-10 fw-bold">
                            <div class="flex-root d-flex flex-column">
                                <span class="text-muted">{{__('patient info')}}</span>
                                <span class="fs-6">
                                    {{__('name')}}: {{$invoice->patient->fullname}}
                                    <br />{{__('Id number')}}: {{$invoice->patient->id_number}}
                                    <br />{{__('file number')}}: {{$invoice->patient->id ?? ''}}
                                    <br />{{__('Nationality')}}: {{$invoice->patient->nationality->name ?? ''}}

                                </span>
                            </div>
                            <div class="flex-root d-flex flex-column">
                                <span class="text-muted">{{__('other info')}}</span>
                                <span class="fs-6">
                                    {{__('Hospital')}}: {!! $invoice->hospital->name ?? __('There is no hospital') !!}
                                    <br /> {{__('Doctor')}}: {!! $invoice->doctor ?? __('There is no doctor') !!}
                                    <br />{{__('status number')}}: {{$invoice->id}}
                                </span>
                            </div>
                        </div><!--end::Billing & shipping-->

                        <!--begin:Order summary-->
                        <div class="d-flex justify-content-between flex-column">
                            <!--begin::Table-->
                            <div class="table-responsive border-bottom mb-9">
                                <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0">
                                    <thead>
                                    <tr class="border-bottom fs-6 fw-bold text-muted">
                                        <th class="min-w-175px pb-2">#</th>
                                        <th class="min-w-175px pb-2">{{__('Service')}}</th>
                                        <th class="min-w-70px text-end pb-2">{{__('Code')}}</th>
                                        <th class="min-w-80px text-end pb-2">{{__('Price')}}</th>
                                        <th class="min-w-100px text-end pb-2">{{__('Discount')}}</th>
                                        <th class="min-w-100px text-end pb-2">{{__('Net')}}</th>
                                        <th class="min-w-100px text-end pb-2">{{__('Total')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody class="fw-semibold text-gray-600">
                                    <!--begin::Products-->
                                    @forelse($purchases as $key => $value)
                                    <tr>
                                        <td >
                                            {{$loop->iteration}}
                                        </td>
                                        <!--begin::Product-->
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <!--begin::Title-->
                                                <div class="ms-5">
                                                    <div class="fw-bold">{{$key}}</div>
                                                </div><!--end::Title-->
                                            </div>
                                        </td><!--end::Product-->

                                        <!--begin::SKU-->
                                        <td class="text-end">{{$value['code'] ?? ''}}</td><!--end::SKU-->

                                        <!--begin::Quantity-->
                                        <td class="text-end">{{$value['price']}}</td><!--end::Quantity-->

                                        <!--begin::Total-->
                                        <td class="text-end">{{$value['discount']}}</td><!--end::Total-->

                                        <!--begin::Total-->
                                        <td class="text-end">{{$value['price'] - $value['discount']}}</td><!--end::Total-->

                                        <!--begin::Total-->
                                        <td class="text-end">{{$value['price'] - $value['discount']}}</td><!--end::Total-->
                                    </tr>
                                    @empty
                                    @endforelse
                                    <!--end::Products-->

                                    <!--begin::Subtotal-->
                                    <tr>
                                        <td>{{__('Total without tax after discount')}}: </td>
                                        <td>{{$invoice->total_price - $invoice->tax}}</td>
                                        <td colspan="4" class="text-end">{{__('Amount Paid')}}</td>
                                        <td class="text-end">{{$invoice->amount_paid}}</td>

                                    </tr><!--end::Subtotal-->

                                    <!--begin::VAT-->
                                    <tr>
                                        <td>{{__('The total includes tax after deduction')}}: </td>
                                        <td >{{$invoice->total_price}}</td>
                                        <td colspan="4" class="text-end">{{__('Discount')}}</td>
                                        <td class="text-end">{{$invoice->discount}}</td>
                                    </tr><!--end::VAT-->

                                    <!--begin::Shipping-->
                                    <tr>
                                        <td>{{__('Payment Method')}}: </td>
                                        <td>
                                            @if($invoice->pay_method == App\Enums\PaymentMethod::CASH->value)
                                                <span class="badge badge badge-light-warning">{{__('Cash')}}</span>
                                            @elseif($invoice->pay_method == App\Enums\PaymentMethod::CREDIT->value)
                                                <span class="badge badge-light-success">{{__('Credit')}}</span>
                                            @elseif($invoice->pay_method == App\Enums\PaymentMethod::OVERDUE->value)
                                                <span class="badge badge-light-danger">{{__('Overdue')}}</span>
                                            @endif
                                        </td>
                                        <td colspan="4" class="text-end">{{__('The rest')}}</td>
                                        <td class="text-end">{{$invoice->amount_paid - $invoice->total_price}}</td>
                                    </tr><!--end::Shipping-->

                                    <!--begin::Grand total-->
                                    <tr>
                                        <td>{{__('Recipient Amount')}}: </td>
                                        <td >{{$invoice->employee->name ?? ''}}</td>
                                        <td colspan="4" class="fs-3 text-dark fw-bold text-end">{{__('Total Price')}}</td>
                                        <td class="text-dark fs-3 fw-bolder text-end">{{$invoice->total_price}}</td>
                                    </tr><!--end::Grand total-->
                                    <!--begin::Grand total-->
                                    </tbody>
                                </table>
                            </div><!--end::Table-->
                        </div><!--end:Order summary-->
                    </div><!--end::Wrapper-->
                </div><!--end::Body-->

                <!-- begin::Footer-->
                <div class="d-flex flex-stack flex-wrap mt-lg-20 pt-13">
                    <!-- begin::Actions-->
                    <div class="my-1 me-5">
                        <!-- begin::Pint-->
                        <button type="button" class="btn btn-sm btn-success my-1" onclick="window.print();">{{__('Print Invoice')}}</button><!-- end::Pint-->
                        <button type="button" class="btn btn-sm btn-success my-1 me-12">{{__('Print Analysis')}}</button><!-- end::Pint-->
                        <button id="send-via-whatsapp" type="button" class="btn btn-sm btn-light-success my-1"> <span class="indicator-label"><i class="fonticon-send"></i></span> {{__('Send Invoice via whatsapp')}}</button><!-- end::Download-->
                    </div><!-- end::Actions-->

                    <!-- begin::Action-->
                    <a href="{{route('dashboard.invoices.create')}}" class="btn btn-sm btn-primary my-1">{{__('Add new Invoice')}}</a><!-- end::Action-->
                </div><!-- end::Footer-->
            </div><!-- end::Wrapper-->
        </div><!-- end::Body-->
    </div><!-- end::Invoice -->
@endsection

@push('scripts')
    <script>
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
                url: '/dashboard/invoices/' + {{$invoice->id}} + '/send_via_whatsapp' ,
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
    </script>
@endpush
