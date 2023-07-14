<!-- begin :: Row -->
<div class="row mb-8">
    <!-- begin :: Column -->
    <div class="col-md-12 fv-row">
        <label class="fs-5 fw-bold mb-2">{{ __("Name") }} <span class="text-danger">*</span></label>
        <div class="form-floating">
            <input type="text" class="form-control" id="name_inp" required name="name" value="{{old('name', $branch->name)}}"/>
            <label for="name_inp">{{ __("Enter the name") }}</label>
        </div>
        <p class="invalid-feedback" id="name" ></p>
    </div><!-- end   :: Column -->
</div><!-- end   :: Row -->

<!-- begin :: Row -->
<div class="row mb-8">
    <!-- begin :: Column -->
    <div class="col-md-12 fv-row">
        <label class="fs-5 fw-bold mb-2">{{ __("Address") }} <span class="text-danger">*</span></label>
        <div class="form-floating">
            <input type="text" class="form-control" id="address_inp" required name="address" value="{{old('address', $branch->address)}}"/>
            <label for="address_inp">{{ __("Enter the address") }}</label>
        </div>
        <p class="invalid-feedback" id="address" ></p>
    </div><!-- end   :: Column -->
</div><!-- end   :: Inputs wrapper -->
