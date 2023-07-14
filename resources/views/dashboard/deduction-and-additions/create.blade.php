@extends('partials.dashboard.master')
@section('title') {{__('Add new deduction')}} @endsection
@section('content')
    @component('components.dashboard.breadcrumb')
        @slot('breadcrumb_title')
            <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1"><a href="{{ route('dashboard.deduction-and-additions.index') }}" class="text-muted text-hover-primary">{{ __("deduction / addition") }}</a></h1><!-- end   :: Title -->
        @endslot
        <!-- begin :: Item -->
        <li class="breadcrumb-item text-muted">{{ __("Add new deduction / addition") }}</li><!-- end   :: Item -->
    @endcomponent

    <div class="card mb-5 mb-xl-10">
        <!-- begin :: Card body -->
        <div class="card-body">
            <!-- begin :: Form -->
            <form action="{{ route('dashboard.deduction-and-additions.store') }}" class="form" method="post" id="submitted-form" data-redirection-url="{{ route('dashboard.deduction-and-additions.index') }}">
                @csrf
                <!-- begin :: Card header -->
                <div class="card-header d-flex align-items-center">
                    <h3 class="fw-bolder text-dark">{{ __("Add new deduction / addition") }}</h3>
                </div><!-- end   :: Card header -->

                <!-- begin :: Inputs wrapper -->
                <div class="inputs-wrapper">
                    <!-- begin :: Row -->
                    <div class="row mb-8">

                        <!-- begin :: Column -->
                        <div class="col-md-6 fv-row">

                            <label class="fs-5 fw-bold mb-2">{{ __("Name arabic") }} <span class="text-danger">*</span></label>
                            <div class="form-floating">
                                <input type="text" class="form-control gui-input" id="name_ar_inp" required name="name_ar"/>
                                <label for="name_ar_inp">{{ __("Enter the name in arabic") }}</label>
                            </div>
                            <p class="invalid-feedback" id="name_ar" ></p>
                        </div><!-- end   :: Column -->

                        <!-- begin :: Column -->
                        <div class="col-md-6 fv-row">
                            <label class="fs-5 fw-bold mb-2">{{ __("Name english") }} <span class="text-danger">*</span></label>
                            <div class="form-floating">
                                <input type="text" class="form-control en-input" id="name_en_inp" required name="name_en"/>
                                <label for="name_en_inp">{{ __("Enter the name in english") }}</label>
                            </div>
                            <p class="invalid-feedback" id="name_en" ></p>
                        </div><!-- end   :: Column -->
                    </div><!-- end   :: Row -->

                    <div class="row mb-8">
                        <!-- begin :: Column -->
                        <div class="col-md-6 fv-row">
                            <label class="fs-5 fw-bold mb-2">{{ __("Type") }} <span class="text-danger">*</span></label>
                            <select class="form-control select-2-with-image" data-control="select2" name="type" id="type-sp" data-placeholder="{{ __("Choose") }}" data-dir="{{ isArabic() ? 'rtl' : 'ltr' }}">
                                <option value="" selected>{{__('Choose')}}</option>
                                @foreach(App\Enums\DeductionAndAdditionTypes::cases() as $type)
                                    <option value="{{$type->value}}" >{{__(str_replace('_',' ',$type->value))}}</option>
                                @endforeach
                            </select>

                            <p class="invalid-feedback" id="type" ></p>
                        </div><!-- end   :: Column -->
                    </div>
                </div><!-- end   :: Inputs wrapper -->

                <!-- begin :: Form footer -->
                <div class="form-footer">

                    <!-- begin :: Submit btn -->
                    <button type="submit" class="btn btn-primary" id="submit-btn">
                        <span class="indicator-label">{{ __("Save") }}</span>
                        <!-- begin :: Indicator -->
                        <span class="indicator-progress">{{ __("Please wait ...") }}
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                        </span><!-- end   :: Indicator -->
                    </button><!-- end   :: Submit btn -->
                    <a class="btn btn-secondary" href="{{ route('dashboard.deduction-and-additions.index')}}"> {{__("Cancel")}} </a>
                </div><!-- end   :: Form footer -->
            </form><!-- end   :: Form -->
        </div><!-- end   :: Card body -->
    </div>
@endsection

