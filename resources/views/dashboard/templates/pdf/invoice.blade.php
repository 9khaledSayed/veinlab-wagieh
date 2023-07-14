<!DOCTYPE html>
<html lang="{{ getLocale() }}" direction="{{ isArabic() ? 'rtl' : 'ltr' }}" style="direction:{{ getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <title dir="{{ isArabic() ? '.rtl' : '' }}">@yield('title') {{ settings()->get('website_name_'.getLocale()) . ' - ' . __('Dashboard') }} </title>
    <meta charset="utf-8"  />
    <!--begin::Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    @if ( isArabic() )
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    @else
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;900&display=swap" rel="stylesheet">
    @endif

    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{asset('dashboard-assets/plugins/global/plugins.bundle' . ( isArabic() ? '.rtl' : '' ) . '.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('dashboard-assets/css/style.bundle' . ( isArabic() ? '.rtl' : '' ) . '.css')}}" rel="stylesheet" type="text/css" /><!--end::Global Stylesheets Bundle-->
</head>
<!--begin::Body-->
<body>

<!--begin::Main-->
<!--begin::Root-->
<div class="d-flex flex-column flex-root">
    <!--begin::Page-->
    <div class="page d-flex flex-row flex-column-fluid">
        <!--begin::Wrapper-->
        <div class="d-flex flex-column flex-row-fluid" >
            <!-- begin :: Content -->
            <div class="content d-flex flex-column flex-column-fluid" >
                <div class="d-flex flex-column-fluid">
                    <!-- begin :: Container -->
                    <div class="container-xxl">
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

                                </div><!-- end::Wrapper-->
                            </div><!-- end::Body-->
                        </div><!-- end::Invoice -->

                    </div>
                    <!-- end   :: Container -->

                </div>

            </div>
            <!-- end   :: Content -->



        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Page-->
</div>
<!--end::Root-->
<!--end::Main-->


<!-- begin :: Global Scroll top -->
<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
    <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
    <span class="svg-icon">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
            <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="black" />
            <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="black" />
        </svg>
    </span>
    <!--end::Svg Icon-->
</div>
<!-- end   :: Global Scroll top -->



<!-- begin :: Global Javascript -->
@include('partials.dashboard.foot')
<!-- end   :: Global Javascript -->
</body>
<!--end::Body-->
</html>
