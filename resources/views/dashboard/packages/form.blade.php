<!-- begin :: Inputs wrapper -->
<div class="inputs-wrapper p-5">
    <!-- begin :: Row -->
    <div class="row mb-8">
        <!-- begin :: Column -->
        <div class="col-md-12 fv-row">

            <label class="fs-5 fw-bold mb-2">{{ __("Name") }} <span class="text-danger">*</span></label>
            <div class="form-floating">
                <input type="text" class="form-control" id="name_inp" required name="name" value="{{old('name', $package->name)}}"/>
                <label for="name_inp">{{ __("Enter the name") }}</label>
            </div>
            <p class="invalid-feedback" id="name" ></p>
        </div><!-- end   :: Column -->
    </div><!-- end   :: Row -->


    <!-- begin :: Row -->
    <div class="row mb-8">
        <!-- begin :: Column -->
        <div class="col-md-12 fv-row">
            <label class="fs-5 fw-bold mb-2">{{ __("Analysis") }} <span class="text-danger">*</span></label>
            <select class="form-select" data-control="select2" multiple required name="main_analysis_id[]" id="main_analysis_id-sp" data-placeholder="{{ __("Choose analysis") }}" data-dir="{{ isArabic() ? 'rtl' : 'ltr' }}">
                @foreach($mainAnalysis as $analysis)
                    <option {{ old('main_analysis_id') && in_array($analysis->id, old('main_analysis_id')) ? 'selected' : (in_array($analysis->id, $package->mainAnalysis->pluck('id')->toArray()) ? 'selected' : '') }} value="{{$analysis->id}}">{{$analysis->general_name.' - '.$analysis->price. ' (' .__('symbol pounds'). ') '}}</option>
                @endforeach
            </select>
            <p class="invalid-feedback" id="main_analysis_id" ></p>
        </div><!-- end   :: Column -->
    </div><!-- end   :: Row -->

    <!-- begin :: Row -->
    <div class="row mb-8">
        <!-- begin :: Column -->
        <div class="col-md-12 fv-row">
            <label class="fs-5 fw-bold mb-2">{{ __("Price") }}</label>
            <div class="form-floating">
                <input type="number" class="form-control" id="price_inp" required name="price" value="{{old('price' , $package->price)}}"/>
                <label for="price_inp">{{ __("Enter the price") }}</label>
            </div>
            <p class="invalid-feedback" id="price" ></p>
        </div><!-- end   :: Column -->
    </div>


    <!-- begin :: Row -->
    <div class="row mb-8">
        <!-- begin :: Column -->
        <div class="col-md-12 fv-row">
            <label class="fs-5 fw-bold mb-2" for="status">{{ __("Status") }} <span class="text-danger">*</span></label>
            <select class="form-select" data-control="select2" required name="status" id="status" data-placeholder="{{ __("Choose the status") }}" data-dir="{{ isArabic() ? 'rtl' : 'ltr' }}">
                <option value="active">{{__('active')}}</option>
                <option value="inactive">{{__('inactive')}}</option>
            </select>
            <p class="invalid-feedback" id="status" ></p>
        </div><!-- end   :: Column -->
    </div><!-- end   :: Row -->
</div><!-- end   :: Inputs wrapper -->

<!-- Editable table -->
<div class="card">
    <h3 class="card-header text-center font-weight-bold text-uppercase py-4">
        {{__('seasonal package')}}
    </h3>
    <div class="card-body">

        <!-- begin :: Row -->
        <div class="row mb-8">
            <!-- begin :: Column -->
            <div class="col-md-12 fv-row">
                <label class="fs-5 fw-bold mb-2">{{ __("From Date") }}</label>
                <div class="form-floating">
                    <input type="date" class="form-control" id="from_date_inp" name="from_date" value="{{old('from_date' , $package->from_date)}}"/>
                    <label for="from_date_inp">{{ __("Enter the From Date") }}</label>
                </div>
                <p class="invalid-feedback" id="from_date_inp" ></p>
            </div><!-- end   :: Column -->
        </div>

        <!-- begin :: Row -->
        <div class="row mb-8">
            <!-- begin :: Column -->
            <div class="col-md-12 fv-row">
                <label class="fs-5 fw-bold mb-2">{{ __("To Date") }}</label>
                <div class="form-floating">
                    <input type="date" class="form-control" id="to_date_inp" name="to_date" value="{{old('to_date' , $package->to_date)}}" />
                    <label for="to_date_inp">{{ __("Enter the To Date") }}</label>
                </div>
                <p class="invalid-feedback" id="to_date_inp" ></p>
            </div><!-- end   :: Column -->
        </div>
    </div>

</div>
<!-- Editable table -->
