<!-- begin :: Row -->
<div class="row mb-20">
    <!-- begin :: Column -->
    <div class="col-md-12 fv-row d-flex justify-content-evenly">
        <div class="d-flex flex-column">
            <!-- begin :: Upload image component -->
            <label class="text-center fw-bold mb-4">{{ __("Icon") }}</label>
            <x-dashboard.upload-image-inp name="logo" :image="old('logo',$sector->logo)" directory="Sectors" placeholder="default.jpg" type="editable" ></x-dashboard.upload-image-inp>
            <p class="invalid-feedback" id="logo" ></p><!-- end   :: Upload image component -->
        </div>
    </div><!-- end   :: Column -->
</div><!-- end   :: Row -->

<!-- begin :: Row -->
<div class="row mb-8">
    <!-- begin :: Column -->
    <div class="col-md-6 fv-row">
        <label class="fs-5 fw-bold mb-2">{{ __("Name") }} <span class="text-danger">*</span></label>
        <div class="form-floating">
            <input type="text" class="form-control" id="name_inp" required name="name" value="{{old('name',$sector->name)}}" placeholder="example"/>
            <label for="name_inp">{{ __("Enter the name") }}</label>
        </div>
        <p class="invalid-feedback" id="name" ></p>
    </div><!-- end   :: Column -->

    <!-- begin :: Column -->
    <div class="col-md-6 fv-row">
        <label class="fs-5 fw-bold mb-2">{{ __("Percentage") }} <span class="text-danger">*</span></label>
        <input type="number" required class="form-control" id="percentage_inp" name="percentage" value="{{old('percentage',$sector->percentage)}}" max="100" placeholder="{{__('Enter the percentage')}}">
    </div><!-- end   :: Column -->
</div><!-- end   :: Row -->
