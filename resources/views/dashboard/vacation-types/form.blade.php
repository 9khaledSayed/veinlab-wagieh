<!-- begin :: Inputs wrapper -->
<div class="inputs-wrapper">
    <!-- begin :: Row -->
    <div class="row mb-8">
        <!-- begin :: Column -->
        <div class="col-md-6 fv-row">
            <label class="fs-5 fw-bold mb-2">{{ __("Name") }} <span class="text-danger">*</span></label>
            <div class="form-floating">
                <input type="text" class="form-control" id="name_inp" required name="name" value="{{old('name', $vacationType->name)}}"/>
                <label for="name_inp">{{ __("Enter the name") }}</label>
            </div>
            <p class="invalid-feedback" id="name" ></p>
        </div><!-- end   :: Column -->

        <!-- begin :: Column -->
        <div class="col-md-6 fv-row">
            <label class="fs-5 fw-bold mb-2">{{ __("Number of days") }} <span class="text-danger">*</span></label>
            <div class="form-floating">
                <input type="text" class="form-control" id="number_of_days_inp" required name="number_of_days" value="{{old('number_of_days', $vacationType->number_of_days)}}"/>
                <label for="number_of_days_inp">{{ __("Enter the number of days") }}</label>
            </div>
            <p class="invalid-feedback" id="number_of_days" ></p>
        </div><!-- end   :: Column -->
    </div><!-- end   :: Row -->
</div><!-- end   :: Inputs wrapper -->
