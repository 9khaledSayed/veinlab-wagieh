<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
@extends('partials.dashboard.master')
@section('title') {{__('Add new Invoice')}} @endsection
@section('content')
    @component('components.dashboard.breadcrumb')
        @slot('breadcrumb_title')
            <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1"><a href="{{ route('dashboard.invoices.create') }}" class="text-muted text-hover-primary">{{ __("Invoices") }}</a></h1><!-- end   :: Title -->
        @endslot
        <!-- begin :: Item -->
        <li class="breadcrumb-item text-muted">{{__('Add new Invoice')}}</li><!-- end   :: Item -->
    @endcomponent

    <div class="card mb-5 mb-xl-10 " id="createInvoice">
        <!-- begin :: Card body -->
        <div class="card-body">
            <form @submit.prevent="" action="post" id="invoiceForm">
                <div v-if="patient !== null" class="card mb-5 mb-xxl-8">

                    <div class="card-body pt-9 pb-0">
                        <!--begin::Details-->
                        <div class="d-flex flex-wrap flex-sm-nowrap">
                            <!--begin: Pic-->
                            <div class="me-7 mb-4">
                                <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                                    <img src="{{asset('dashboard-assets/media/avatars/300-1.jpg')}}" alt="image" />
                                </div>
                            </div><!--end::Pic-->

                            <!--begin::Info-->
                            <div class="flex-grow-1">
                                <!--begin::Title-->
                                <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                                    <!--begin::User-->
                                    <div class="d-flex flex-column">
                                        <!--begin::Name-->
                                        <div class="d-flex align-items-center mb-2">
                                            <a href="javascript:void(0);" class="text-gray-900 text-hover-primary fs-2 fw-bold me-1" v-text="patient.name_ar"></a>
                                        </div><!--end::Name-->

                                        <!--begin::Info-->
                                        <div class="d-flex flex-wrap fw-semibold fs-6 mb-4 pe-2">
                                            <a href="javascript:void(0);" class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen018.svg-->
                                                <span class="svg-icon svg-icon-4 me-1">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path opacity="0.3" d="M18.0624 15.3453L13.1624 20.7453C12.5624 21.4453 11.5624 21.4453 10.9624 20.7453L6.06242 15.3453C4.56242 13.6453 3.76242 11.4453 4.06242 8.94534C4.56242 5.34534 7.46242 2.44534 11.0624 2.04534C15.8624 1.54534 19.9624 5.24534 19.9624 9.94534C20.0624 12.0453 19.2624 13.9453 18.0624 15.3453Z" fill="currentColor" />
                                                        <path d="M12.0624 13.0453C13.7193 13.0453 15.0624 11.7022 15.0624 10.0453C15.0624 8.38849 13.7193 7.04535 12.0624 7.04535C10.4056 7.04535 9.06241 8.38849 9.06241 10.0453C9.06241 11.7022 10.4056 13.0453 12.0624 13.0453Z" fill="currentColor" />
                                                    </svg>
                                                </span><!--end::Svg Icon-->
                                                <div v-text="patient.address"></div>
                                            </a>
                                            <a href="javascript:void(0);" class="d-flex align-items-center text-gray-400 text-hover-primary mb-2">
                                                <!--begin::Svg Icon | path: icons/duotune/communication/com011.svg-->
                                                <span class="svg-icon svg-icon-4 me-1">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path opacity="0.3" d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19Z" fill="currentColor" />
                                                        <path d="M21 5H2.99999C2.69999 5 2.49999 5.10005 2.29999 5.30005L11.2 13.3C11.7 13.7 12.4 13.7 12.8 13.3L21.7 5.30005C21.5 5.10005 21.3 5 21 5Z" fill="currentColor" />
                                                    </svg>
                                                </span><!--end::Svg Icon-->
                                                <div v-text="patient.email"></div>
                                            </a>
                                        </div><!--end::Info-->
                                    </div><!--end::User-->
                                </div><!--end::Title-->

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

                                                    <div class="fs-2 fw-bold" data-kt-countup="true" v-text="patient.total_points_count">0</div>
                                                </div><!--end::Number-->

                                                <!--begin::Label-->
                                                <div class="fw-semibold fs-6 text-gray-400">{{__('Points')}}</div><!--end::Label-->
                                            </div><!--end::Stat-->

                                        </div><!--end::Stats-->
                                    </div><!--end::Wrapper-->
                                </div><!--end::Stats-->
                            </div><!--end::Info-->
                        </div><!--end::Details-->
                    </div>
                </div>
                <div class="mb-4">
                    <div class="row mb-4">
                        <div class="col-2">
                            <label>{{__('Promo Codes')}}: </label>
                        </div>
                        <div class="col-8" data-kt-buttons="true" data-kt-buttons-target=".form-check-label, .form-check-input">

                            <div class="row">
                                <div class="col-3">
                                    <label class="form-check">
                                        <input class="form-check-input" type="radio" @change="() => hasPromoCode = false" name="promo_code" value="0" checked />
                                        <div class="form-check-label"> {{__('No codes')}} </div>

                                    </label>
                                </div>
                                <div class="col-3">
                                    <label class="form-check">
                                        <input class="form-check-input" type="radio" @change="() => hasPromoCode = true" name="promo_code" value="1"/>
                                        <div class="form-check-label"> {{__('Have a code')}} </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-lg-2 col-md-2 col-sm-12">
                            <label class="mb-4">{{__('Transfer Destination')}}: </label>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-12" >
{{--                            <div class="form-group justify-content-center align-content-center">--}}
                                <div class="row " data-kt-buttons="true" data-kt-buttons-target=".form-check-label, .form-check-input">
                                    @foreach(\App\Enums\InvoiceTransfer::cases() as $key => $transfer)
                                        @if($transfer != \App\Enums\InvoiceTransfer::HOSPITAL)
                                            <div class="col-3">
                                                <label class="form-check-image active">
                                                    <div class="form-check form-check-custom ">
                                                        <input @change="changeValue('{{$transfer->value}}')"
                                                               class="form-check-input" type="radio" name="transfer"
                                                               @if($key == 0) checked @endif
                                                               value="{{$transfer->value}}"
                                                               id="flexRadioDefault{{$transfer->value}}"/>
                                                        <div class="form-check-label">
                                                            {{$transfer->getName()}}
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
{{--                            </div>--}}
                        </div>
                    </div>
                </div>



                <div class="row mb-4">
                    <div class="col-6" v-show="hasPromoCode">
                        <label class="fs-5 fw-bold mb-2" for="promo_code_inp">{{ __("Promo Code") }} </label>

                        <div class="row">
                            <div class="col-10">
                                <input type="text" id="promo_code_inp" class="form-control" name="promo_code" placeholder="{{__('Enter Promo Code')}}">
                            </div>
                            {{--                        <a href="javascript:0" class="btn btn-outline btn-outline-dashed btn-outline-success btn-active-light-success">Success</a>--}}
                            <div class="d-flex col-2 justify-content-center align-items-center">
                                <button type="button" class="btn btn-outline btn-outline-dashed btn-outline-success btn-active-light-success" id="refresh-btn-promoCode" @click="refreshPromoCode()">

                                    <span class="indicator-label"><i class="fonticon-mobile-payment"></i></span>

                                    <!-- begin :: Indicator -->
                                    <span class="indicator-progress"><span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                            </div>
                            <p class="invalid-feedback" id="promo_code"></p>

                        </div>
                    </div>

                    <div class="col-6 animation-fade-in"
                         v-show="transfer == '{{ \App\Enums\InvoiceTransfer::SECTOR->value }}'">
                        <div>
                            <label class="fs-5 fw-bold mb-2" for="sectorSelector">{{ __("Sectors") }} </label>

                            <select class="form-select" id="sectorSelector" name="sector_id" data-control="select2" data-placeholder="{{__('Choose the sector')}}" data-dir="{{ isArabic() ? 'rtl' : 'ltr' }}">
                                <option></option>
                                @foreach($sectors as $sector)
                                    <option value="{{$sector->id}}" data-discount="{{$sector->percentage}}"> {{$sector->getLabel()}}</option>
                                @endforeach

                            </select>
                            <p class="invalid-feedback" id="sector_id"></p>

                        </div>
                    </div>

                    <div class="col-6" v-show="transfer == '{{ \App\Enums\InvoiceTransfer::DOCTOR->value }}'">
                        <div>
                            <label class="fs-5 fw-bold mb-2" for="doctorSelector">{{ __("Doctors") }} </label>

                            <select class="form-select" id="doctorSelector" name="doctor_id" data-control="select2" data-placeholder="{{__('Choose the doctor')}}" data-dir="{{ isArabic() ? 'rtl' : 'ltr' }}">
                                <option></option>
                                @foreach($doctors as $doctor)
                                    <option value="{{$doctor->id}}"> {{$doctor->getLabel()}}</option>
                                @endforeach

                            </select>
                            <p class="invalid-feedback" id="doctor_id"></p>

                        </div>
                    </div>


{{--                    <div class="col-6" v-show="transfer == '{{ \App\Enums\InvoiceTransfer::HOSPITAL->value }}'">--}}
{{--                        <label class="fs-5 fw-bold mb-2">{{ __("Hospitals") }} </label>--}}

{{--                        <div class="row">--}}
{{--                            <div class="col-10">--}}

{{--                                <select class="form-select" id="hospitalSelector" required name="hospital_id" data-control="select2" data-placeholder="{{__('Choose the hospitals')}}">--}}
{{--                                    <option></option>--}}
{{--                                    @foreach($hospitals as $hospital)--}}
{{--                                        <option value="{{$hospital->id}}"> {{$hospital->getLabel()}}</option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                            --}}
{{--                            <a href="javascript:0" class="btn btn-outline btn-outline-dashed btn-outline-success btn-active-light-success">Success</a>--}}
{{--                            <div class="d-flex col-2 justify-content-center align-items-center">--}}
{{--                                <button type="button" class="btn btn-outline btn-outline-dashed btn-outline-success btn-active-light-success" id="refresh-btn" @click="refreshMainAnalysis()">--}}

{{--                                    <span class="indicator-label"><i class="fa fa-plus"></i></span>--}}

{{--                                    <!-- begin :: Indicator -->--}}
{{--                                    <span class="indicator-progress"><span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>--}}
{{--                                </button>--}}
{{--                            </div>--}}
{{--                            <p class="invalid-feedback" id="hospital_id"></p>--}}

{{--                        </div>--}}
{{--                    </div>--}}





                </div>


                <div class="row mb-4">
                    <div class="col-12">
                        <label class="fs-5 fw-bold mb-2" for="patientSelector">{{ __("Patients") }} </label>

                        <select class="form-select" id="patientSelector" data-control="select2" data-placeholder="{{__('Choose the patient')}}" data-dir="{{ isArabic() ? 'rtl' : 'ltr' }}">
                            <option></option>
                            @foreach($patients as $patient)
                                <option value="{{$patient->id}}" :data-patient="'{{$patient->toJson()}}'"> {{$patient->getLabel()}}</option>
                            @endforeach
                        </select>
                        <p class="invalid-feedback" id="patient_id"></p>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6">
                        <label class="fs-5 fw-bold mb-2" for="analyseSelector">{{ __("Analysis") }} </label>

                        <select class="form-select" id="analyseSelector" name="main_analyse_id" data-control="select2" data-placeholder="{{__('Choose the analysis')}}" data-dir="{{ isArabic() ? 'rtl' : 'ltr' }}">
                            <option></option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="fs-5 fw-bold mb-2" for="packageSelector">{{ __("Packages") }} </label>

                        <select class="form-select" id="packageSelector" name="package" data-control="select2" data-placeholder="{{__('Choose the packages')}}" data-dir="{{ isArabic() ? 'rtl' : 'ltr' }}">
                            <option></option>
                            <option v-for="package in packages"
                                    :disabled="tableData.length > 0 && tableData.find(item => package.id === item.pId)"
                                    :value="package.id"
                                    v-text="package.name + ' - ' + package.price + ((package.to_date) ? ' - عرض موسمي' : '')">
                            </option>
                        </select>
                    </div>
                </div>

                <!-- begin :: Datatable -->
                <div class="table-response mb-4">
                    <table data-ordering="false" id="data_table_inp"
                           class="table text-center table-row-dashed fs-6 gy-5 max-h-75 min-h-200px">

                        <thead>
                        <tr class="text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                            <th>{{ __("Type") }}</th>
                            <th>{{ __("name") }}</th>
                            <th>{{ __("Discount") }}</th>
                            <th>{{ __("Price") }}</th>
                            <th class="min-w-50px">{{ __("Laboratory") }}</th>
                            <th>#</th>
                        </tr>
                        </thead>

                        <tbody class="text-gray  text-center">
                        <tr class="text-gray-700  fs-7  gs-0" v-for="(row,key) in tableData">
                            <th v-text="row.type"></th>
                            <th v-text="row.name"></th>
                            <th v-text="row.discount"></th>
                            <th v-if="(row.laboratory_price != null  )" v-text="row.laboratory_price"></th>
                            <th v-else v-text="row.price"></th>
                            {{-- lapotory select --}}
                            <th>
                                <select v-show="('laboratories' in row) && row.laboratories.length > 0"
                                        v-on:change="onClickRawLaboratoryType(row)"
                                        class="form-select form-select-sm"
                                        :id="'laboratoryRowSelector'+ key"
                                        data-control="select2"
                                        data-placeholder="{{__('Choose the patient')}}"
                                        data-dir="{{ isArabic() ? 'rtl' : 'ltr' }}">
                                    <option></option>
                                    <option v-for="laboratory of row.laboratories" :value="laboratory.id" :data-price="laboratory.pivot.selling_price" v-text="laboratory.name"></option>
                                </select>
                                <p v-show="(!('laboratories' in row) || row.laboratories.length === 0)">{{__('There are no laboratories')}}</p>
                            </th>
                            <th>
                                <a href="javascript:0" class=""  v-on:click="deleteFromTable(row.type, row.type === 0? row.id : row.package_id)">
                                    <span>  <i class="fa fa-trash text-danger"></i> </span>
                                </a>
                            </th>
                        </tr>
                        </tbody>

                    </table>
                    <p class="invalid-feedback" id="data_table"></p>
                </div>
                <!-- end   :: Datatable -->


                <div class="container mb-5" style="padding: 0 !important;">
                    <div class=" row mb-5">
                        <div class="col-lg-4">
                            <label for="amount_paid">{{__('Amount Paid')}}<span class="required"></span></label>
                            <input type="number"
                                   id="amount_paid_inp"
                                   class="form-control"
                                   name="amount_paid"
                                   step="0.01"
                                   v-model="amountPaid"
                                   placeholder="0.00">
                            <p class="invalid-feedback" id="amount_paid"></p>
                        </div>

                        <div class="col-lg-4">
                            <label for="rest">{{__('The rest')}}</label>
                            <input type="text"
                                   id="rest_inp"
                                   class="form-control"
                                   name="rest"
                                   readonly
                                   v-model="rest"
                                   style=" font-weight:600"
                                   placeholder="0.00">
                            <p class="invalid-feedback" id="rest"></p>

                        </div>

                        <div class="col-lg-4">
                            <label for="discount">{{__('Discount')}}</label>
                            <input type="number"
                                   id="discount_inp"
                                   class="form-control @error('discount')is-invalid @enderror"
                                   name="discount"
                                   step="0.01"
                                   disabled
                                   min="0"
                                   v-model="invoiceDiscount"
                                   placeholder="0.00">
                            <p class="invalid-feedback" id="discount"></p>
                        </div>

                    </div>

                    <div class="row mb-5">

                        <div class="col-lg-4">
                            <label>{{__('Payment Method')}}</label>
                            <select name="pay_method"
                                    id="paymentSelector"
                                    class="form-control kt-selectpicker"
                                    title="{{__('Choose')}}" data-dir="{{ isArabic() ? 'rtl' : 'ltr' }}">
                                @foreach(\App\Enums\PaymentMethod::cases() as $payment)
                                    @if($payment != \App\Enums\PaymentMethod::OVERDUE)
                                        <option value="{{$payment->value}}" > {{__($payment->getName())}} </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="col-lg-4">
                            <label>{{__('Custom discount')}}</label>
                            <input
                                id="rest_inp"
                                class="form-control "
                                name="rest"
                                type="number"
                                step="0.01"
                                min="0"
                                :max="totalPrice"
                                v-model="customInvoiceDiscount"
                                placeholder="0.00">
                            <p class="invalid-feedback" id="rest"></p>

                        </div>

                        <div class="col-lg-4">
                            <label>{{__('Points discount')}}</label>

                            <input
                                id="user_points_used_inp"
                                class="form-control"
                                name="rest"
                                type="number"
                                step="0.01"
                                @change=""
                                :disabled="userPoints < parseInt('{{$startUseDWP}}')"
                                min="0"
                                :max="userPoints"
                                v-model="userPointsUsed"
                                placeholder="0.00">
                            <p class="fs-sm-8 text-success" v-if="userPoints != null"
                               v-text="'{{__('Total user points is')}}' + ' ' + userPoints"></p>
                            <p class="invalid-feedback" id="user_points_used"></p>

                        </div>

                    </div>
                </div>

               <div class="container" style="padding: 1% 0 !important;">
                   <div class="row mb-3">

                       <div class="col-lg-4" v-show="isCredit">
                           <label for="payment_type">{{__('payment type')}}</label>
                           <select name="payment_type"
                                   required
                                   id="payment_type"
                                   class="form-control kt-selectpicker"
                                   title="{{__('Choose')}}"
                                   data-dir="{{ isArabic() ? 'rtl' : 'ltr' }}">
                               @foreach(\App\Enums\PaymentType::cases() as $payment)
                                   <option value="{{$payment->value}}" > {{__($payment->getName())}} </option>
                               @endforeach
                           </select>
                       </div>


                   </div>

                   <div class="row">
                       <div class="col-lg-6 col-md-6 col-sm-12">
                           <!--begin::Input group-->
                           <div class="d-flex flex-stack w-lg-75 mx-auto my-6">
                               <!--begin::Label-->
                               <div class="me-6">
                                   <label class="fs-6 fw-semibold form-label">{{__('Add home visit fees')}}</label>
                                   <div class="fs-7 fw-semibold text-muted" v-text=" '{!!  __('The cost is') !!}'  + homeVisitFees"></div>
                               </div>
                               <!--end::Label-->

                               <!--begin::Switch-->
                               <label class="form-check form-switch form-check-custom form-check-solid">
                                   <input class="form-check-input" type="checkbox" v-model="isHomeFees" />
                                   <span class="form-check-label fw-semibold text-muted">
                                       {{__('Add')}}
                                   </span>
                               </label>
                               <!--end::Switch-->
                           </div>
                           <!--end::Input group-->
                           {{--                       </div>--}}
                       </div>

                       <div class="col-lg-6 col-md-6 col-sm-12">
                           <!--begin::Input group-->
                           <div class="d-flex flex-stack w-lg-75 mx-auto my-6">
                               <!--begin::Label-->
                               <div class="me-6">
                                   <label class="fs-6 fw-semibold form-label">{{__('invoice is free')}}</label>
                               </div><!--end::Label-->

                               <!--begin::Switch-->
                               <label class="form-check form-switch form-check-custom form-check-solid">
                                   <input class="form-check-input" type="checkbox" id="invoice_is_free"/>
                                   <span class="form-check-label fw-semibold text-muted">
                                       {{__('Add')}}
                                   </span>
                               </label><!--end::Switch-->
                           </div><!--end::Input group-->
                       </div>
                   </div>
               </div>


                <div class="form-footer">

                    <div class="row">
                        <!-- begin :: Submit btn -->
                        <div class="d-flex col-6 align-items-center justify-content-start ">
                            <button type="submit" class="btn btn-primary" id="submit-btn" @click="submitInvoice()">

                                <span class="indicator-label">{{ __("Save") }}</span>

                                <!-- begin :: Indicator -->
                                <span class="indicator-progress">{{ __("Please wait ...") }}
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                </span>
                                <!-- end   :: Indicator -->

                            </button>

                            <a class="btn btn-secondary" href="{{ route('dashboard.home-visits.index')}}"> {{__("Cancel")}} </a>
                        </div>
                        <!-- end   :: Submit btn -->
                        <div class="col-6 d-flex align-items-center justify-content-end">
                            <!--begin::Input wrapper-->
                            <div class="w-lg-50 ">
                                <!--begin::Label-->
                                <div class="d-flex align-items-center justify-content-center">
                                    <label class="fs-6 fw-semibold mb-2">
                                        {{__('Total Price')}}
                                    </label>
                                </div>
                                <!--end::Label-->

                                <!--begin::Slider-->
                                <div class="d-flex flex-column text-center">
                                    <div class="d-flex align-items-center justify-content-center mb-7">
                                        <span class="fw-bold fs-3x" v-text="totalPrice"></span>
                                        <span class="fw-bold fs-4 mt-1 me-2"> {{ __('pounds')}}</span>
                                        <span class="fw-bold fs-3x" id="kt_modal_create_campaign_budget_label"></span>
                                    </div>
                                    <div id="kt_modal_create_campaign_budget_slider" class="noUi-sm"></div>
                                </div>
                                <!--end::Slider-->
                            </div>
                            <!--end::Input wrapper-->
                        </div>
                    </div>


                </div>
                <!-- end   :: Form footer -->
            </form>
        </div>
        <!-- end   :: Card body -->

    </div>


@endsection


@push('scripts')

    <script>

        var app = new Vue({
            el: '#createInvoice',
            data: {
                isMainAnalyseChanged: false,
                // hospitalId: null,
                laboratoryId: null,
                doctorId: null,
                patientId: null,
                patient: null,
                transfer: 0,
                hasPromoCode:false,
                isCredit:false,
                promoCodeDiscount: null,
                isHomeFees: false,
                sectorDiscount: null,
                tax: null,
                homeVisitFees: null,
                userPoints: null,
                numberOfPoints:10,
                numberOfPointsEqual:2,
                amountPaid: null,
                customInvoiceDiscount: 0,
                userPointsUsed: null,
                mainAnalyses: null,
                packages: {!! $packages !!},
                tableData: [],
                promoCode: []
            },
            created() {
                this.mainAnalyses =  {!! $mainAnalyses !!};
                this.homeVisitFees = {!! $homeVisitFees ?? 0 !!};
                // this.patientSelectorInit()
            },
            computed: {
                rest(){
                    let amountPaid = parseFloat(this.amountPaid);
                    if(amountPaid > 0 && amountPaid >= this.totalPrice){
                      return (amountPaid - this.totalPrice).toFixed(2)
                  }
                  return 0.00
                },
                totalCost: {
                    get() {
                        let totalCost1 = 0.00;

                        for (let i = 0; i < this.tableData.length; i++) {
                            var item = this.tableData[i];
                            var price = 0;
                            if(item.laboratory_price != null && item.laboratory_price !== '' ){
                                price = item.laboratory_price
                            } else{
                                price = item.price
                            }


                            if (this.hasPromoCode && this.promoCode != null && this.promoCode['sub_type'] == '{{\App\Enums\SubPromoCodeTypes::ANALYSE->value}}' && this.promoCode['id'] == item.id) {
                                if(this.promoCode['discount_type'] === 'percentage') {
                                    item.discount = parseInt(item.discount) + parseInt(this.promoCode['percentage'])
                                    totalCost1 += (parseFloat(price) - (parseFloat(price) *  item.discount / 100))
                                } else if (this.promoCode['discount_type'] === 'fixed') {
                                    let promo = parseFloat(price) - parseFloat(this.promoCode['fixed_value'])
                                    totalCost1 += (promo - (parseFloat(price) * item.discount / 100))
                                }
                            }
                            else {
                                totalCost1 += (parseFloat(price) - (parseFloat(price) * item.discount / 100))
                            }

                        }
                        return totalCost1;
                    },
                    set(newValue){

                    }
                },
                invoiceDiscount:{
                    get() {
                        var totalCost1 = (this.totalCost);
                        let invoiceDiscount = 0;

                        if (this.hasPromoCode && this.promoCode != null && this.promoCode['sub_type'] == '{{\App\Enums\SubPromoCodeTypes::INVOICE->value}}') {
                            if (this.promoCode['discount_type'] === 'percentage' && this.promoCode['percentage'] != null) {
                                invoiceDiscount = ((totalCost1 * (parseInt(this.promoCode['percentage']) / 100))).toFixed(2)
                            } else if ((this.promoCode['discount_type'] === 'fixed') && this.promoCode['fixed_value'] != null) {
                                invoiceDiscount = parseFloat(this.promoCode['fixed_value'])
                            }
                        }
                        if(this.sectorDiscount && this.transfer == '{{\App\Enums\InvoiceTransfer::SECTOR->value}}'){
                            invoiceDiscount =  (parseFloat(invoiceDiscount+'') + (totalCost1 * (parseInt(this.sectorDiscount) / 100))).toFixed(2)
                        }
                        if(this.userPointsUsed != null && this.userPointsUsed !== '' && this.userPointsUsed > 0 && this.userPointsUsed <= this.userPoints){
                            invoiceDiscount = parseFloat(invoiceDiscount+'') + ((parseInt(this.userPointsUsed) / this.numberOfPoints) * this.numberOfPointsEqual)
                        }
                        if(this.customInvoiceDiscount !== '' && this.customInvoiceDiscount !== '-'){
                            invoiceDiscount = parseFloat(invoiceDiscount+'') + parseFloat(this.customInvoiceDiscount);
                        }

                        return invoiceDiscount;
                    },
                    set(newValue){
                        this.invoiceDiscount =  newValue
                    }
                },
                totalPrice() {
                    let totalPrice = 0.00;

                    if (this.patientId !== null) {
                        let totalCost1 = (this.totalCost);


                        totalCost1 -= this.invoiceDiscount;

                        totalPrice = parseFloat(totalCost1 + (totalCost1 * (this.tax / 100))).toFixed(2)

                        if(this.isHomeFees){
                            totalPrice = (parseFloat(totalPrice) + parseFloat(this.homeVisitFees)).toFixed(2)
                        }

                    }
                    return totalPrice
                },
            },

            watch:{
                mainAnalyses(value) {
                    var data = $.map(value, function (obj)  {
                        // replace pk with your identifier
                        obj.text = obj.general_name + ' - ' + obj.price + ' - ' + obj.code
                        return obj;
                    });
                    $("#analyseSelector").select2({
                        data: data
                    })
                },
            },
            methods: {
                deleteFromTable(type , id){
                    if(type === 0){
                        this.tableData = this.tableData.filter(value => value.id !== id)
                    }else{
                        this.tableData = this.tableData.filter(value => value.package_id !== id)

                    }
                },
                calculateDiscount() {
                    let totalCost1 = (this.totalCost);
                    let invoiceDiscount = 0;

                    if (this.hasPromoCode && this.promoCode != null && this.promoCode['sub_type'] == '{{\App\Enums\SubPromoCodeTypes::INVOICE->value}}') {
                        if (this.promoCode['discount_type'] === 'percentage') {
                            invoiceDiscount = ((totalCost1 * (parseInt(this.promoCode['percentage']) / 100))).toFixed(2)
                        } else if ((this.promoCode['discount_type'] === 'fixed')) {
                            invoiceDiscount = parseFloat(this.promoCode['fixed_value'])
                        }
                    }
                    if(this.sectorDiscount && this.transfer == '{{\App\Enums\InvoiceTransfer::SECTOR->value}}'){
                        invoiceDiscount =  (parseFloat(invoiceDiscount+'') + (totalCost1 * (parseInt(this.sectorDiscount) / 100))).toFixed(2)
                    }
                    return invoiceDiscount ;
                },
                changeValue:function (value) {
                  this.transfer = parseInt(value)
                },
                patientSelectorInit: function (){
                    $("#patientSelector").addClass('form-select')
                    $("#patientSelector").select2({
                        placeholder: "Select an option",
                        ajax: {
                            url: '{!! route('dashboard.patients.search') !!}'
                        }
                    }).trigger('change')
                },

                async selectPatient(value) {
                    this.patientId = value;
                    $.ajax({
                        type: 'GET',
                        url: '<?php echo e(route("dashboard.invoices.create")); ?>',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            'patient_id': app.patientId,
                        },
                        success: function (res) {
                            app.tax = res['tax']
                            app.userPoints = res['points']
                        },
                    })
                },
                changeInvoiceDiscount: function (discount) {
                    if(this.transfer == '{{\App\Enums\InvoiceTransfer::SECTOR->value}}'){
                        // $('#discount').val(discount)
                        this.invoiceDiscount = discount
                    }
                },
                onClickRawLaboratoryType: function (row){
                    let selectedOption = $(event.target).find('option:selected');
                    row.selectedLaboratoryId = event.target.value
                    row.laboratory_price = selectedOption.data('price')
                },
                addToTable: function (jsonData, key) {
                    if (key === 0){
                        this.tableData.push({
                            id: jsonData.id,
                            type: key,
                            name: jsonData.general_name,
                            discount: jsonData.discount,
                            price: jsonData.price,
                            laboratory_price: null,
                            code: jsonData.code,
                            laboratories: jsonData.laboratories,
                            selectedLaboratoryId: null,
                        })

                    }else if (key === 1){
                        this.tableData.push({
                            package_id: jsonData.id,
                            type: key,
                            name: jsonData.name,
                            discount: 0,
                            price: jsonData.price,
                            code: '-',
                        })

                    }
                    // this.totalCost += parseFloat(jsonData.price)
                },
                refreshMainAnalysis: function () {
                    let submitBtn = $("#refresh-btn");
                    submitBtn.attr('disabled',true).attr("data-kt-indicator", "on");
                    if (this.laboratoryId == null){
                        submitBtn.attr('disabled',false).removeAttr("data-kt-indicator")
                        toastr.warning('select the laboratory')
                        return
                    }
                    $.ajax({
                        type: 'GET',
                        url: '{{ route("dashboard.invoices.create") }}',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            'laboratory_id': this.laboratoryId,
                        },
                        success: function (res) {
                            app.mainAnalyses = res
                            app.updateTable()
                            app.isMainAnalyseChanged = true
                        },
                        complete:function () {
                            submitBtn.attr('disabled',false).removeAttr("data-kt-indicator")
                        }
                    })

                },
                refreshPromoCode: function () {
                    let promo_code = $("#promo_code_inp").val();
                    let submitBtn  = $("#refresh-btn-promoCode");

                    submitBtn.attr('disabled',true).attr("data-kt-indicator", "on");

                    $.ajax({
                        type: 'GET',
                        url: '{{ route("dashboard.invoices.create") }}',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            'promo_code': promo_code,
                        },
                        success: function (res) {
                            removeValidationMessages();
                            app.promoCode = res
                            $('#promo_code_inp').addClass('is-valid')

                        },
                        error:function (response) {

                            removeValidationMessages();

                            if (response.status === 422)
                                displayValidationMessages(response.responseJSON.errors , '', '');
                            else if (response.status === 403)
                                unauthorizedAlert();
                            else
                                errorAlert(response.responseJSON.message , 5000 )
                        },

                        complete:function () {
                            submitBtn.attr('disabled', false).removeAttr("data-kt-indicator")
                        }
                    })

                },
                updateTable: function () {
                    for (let i = 0; i < this.tableData.length; i++) {
                        let mainAnalyse = app.mainAnalyses.find(item => item.id == this.tableData[i].id);

                        if (mainAnalyse.hospital_price) {
                            this.tableData[i].hospital_price = mainAnalyse.hospital_price
                        }
                    }
                },
                submitInvoice: function () {
                    let submitBtn = $("#submit-btn");
                    if (this.transfer ==  '{{\App\Enums\InvoiceTransfer::HOSPITAL->value}}' && !this.isMainAnalyseChanged){
                        let $refreshBtn = $('#refresh-btn');
                        $refreshBtn.removeClass('btn-outline-success')
                        $refreshBtn.addClass('btn-outline-danger')
                        return
                    }

                    submitBtn.attr('disabled',true).attr("data-kt-indicator", "on");
                    $.ajax({
                        type: 'POST',
                        url: '{{ route("dashboard.invoices.store") }}',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },

                        data: {

                            'data_table': this.tableData,
                            // 'hospital_id': this.hospitalId,
                            'laboratory_id': this.laboratoryId,
                            'doctor_id': this.doctorId,
                            'sector_id': $('#sectorSelector').val(),
                            'has_promo_code' : this.hasPromoCode,
                            'promo_code_id': this.promoCode['id'],
                            'transfer': this.transfer,
                            'total_cost': this.totalCost,
                            'total_price': this.totalPrice,
                            'patient_id': this.patientId,
                            'discount': this.invoiceDiscount,
                            'tax': this.tax,
                            'pay_method': $('#paymentSelector').val(),
                            'payment_type': $('#payment_type').val(),
                            'amount_paid': this.amountPaid,
                            'is_home_fees' : this.isHomeFees,
                            'invoice_is_free' : $('#invoice_is_free').is(':checked') ? 1 : 0,
                            'user_points_used' : this.userPointsUsed,

                        },

                        success: function (res) {

                            removeValidationMessages();
                            successAlert( 'تم الإضافة بنجاح' ).then(()=> location.reload());

                        },
                        error:function (response) {

                            removeValidationMessages();

                            if (response.status === 422)
                                displayValidationMessages(response.responseJSON.errors , '', '');
                            else if (response.status === 403)
                                unauthorizedAlert();
                            else
                                errorAlert(response.responseJSON.message , 5000 )
                        },
                        complete:function () {
                            submitBtn.attr('disabled',false).removeAttr("data-kt-indicator")
                        }
                    });
                }
            },
        })

       let analyseSelector    = $('#analyseSelector');
       let packageSelector    = $('#packageSelector');
       let patientSelector    = $('#patientSelector');
       let sectorSelector     = $('#sectorSelector');
       let hospitalSelector   = $('#hospitalSelector');
       let doctorSelector     = $('#doctorSelector');
       let paymentSelector    = $('#paymentSelector');
       let laboratorySelector = $('#laboratorySelector');

       analyseSelector.on('change', function () {
           key = parseInt($(this).val());
           if (isNaN(key)){
               return
           }
           let mainAnalyse = app.mainAnalyses.find(item => item.id === key);
           app.addToTable( mainAnalyse, 0)
           // $('#mySelect2').val('').trigger('change');
       })

       packageSelector.on('change', function () {

           key = parseInt($(this).val());
           let $package = app.packages.find(item => item.id === key);

           app.addToTable( $package, 1)
            // $('#mySelect2').val('').trigger('change');
       })

       patientSelector.on('change', function () {
           key = parseInt($(this).val());
           app.patient = ($(this).find('option:selected').data('patient'))
           app.selectPatient(key)
       })

       sectorSelector.on('change', function () {
           key = parseInt($(this).val());
           app.sectorDiscount = $('#sectorSelector option[value*=' + key +']').attr('data-discount')

       })

       paymentSelector.on('change', function () {
           key = parseInt($(this).val());
           if (key == '{{\App\Enums\PaymentMethod::CREDIT->value}}') {
               app.isCredit = true
           } else {
               app.isCredit = false
           }
       })

       laboratorySelector.on('change', function () {
           app.laboratoryId = parseInt($(this).val());
           app.isMainAnalyseChanged = false
       })

       doctorSelector.on('change', function () {
           app.doctorId = parseInt($(this).val());
       })
    </script>
@endpush
