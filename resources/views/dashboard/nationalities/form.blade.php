<!-- begin :: Inputs wrapper -->
<div class="inputs-wrapper">
    <!-- begin :: Row -->
    <div class="row mb-20">

        <!-- begin :: Column -->
        <div class="col-md-12 fv-row d-flex justify-content-evenly">

            <div class="d-flex flex-column">
                <!-- begin :: Upload image component -->
                <label class="text-center fw-bold mb-4">{{ __("Logo") }}</label>
                <x-dashboard.upload-image-inp name="logo" :image="old('logo',$nationality->logo)" directory="Nationalities" placeholder="default.jpg" type="editable" ></x-dashboard.upload-image-inp>
                <p class="invalid-feedback" id="logo" ></p><!-- end   :: Upload image component -->
            </div>
        </div><!-- end   :: Column -->
    </div><!-- end   :: Row -->

    <!-- begin :: Row -->
    <div class="row mb-8">
        <!-- begin :: Column -->
        <div class="col-md-6 fv-row">

            <label class="fs-5 fw-bold mb-2">{{ __("Name arabic") }} <span class="text-danger">*</span></label>
            <div class="form-floating">
                <input type="text" class="form-control gui-input" id="name_ar_inp" required name="name_ar" value="{{old('name_ar', $nationality->name_ar)}}"/>
                <label for="name_ar_inp">{{ __("Enter the name in arabic") }}</label>
            </div>
            <p class="invalid-feedback" id="name_ar"></p>
        </div><!-- end   :: Column -->

        <!-- begin :: Column -->
        <div class="col-md-6 fv-row">
            <label class="fs-5 fw-bold mb-2">{{ __("Name english") }} <span class="text-danger">*</span></label>
            <div class="form-floating">
                    <input type="text" class="form-control en-input" id="name_en_inp" required name="name_en" value="{{old('name_en', $nationality->name_en)}}"/>
                <label for="name_en_inp">{{ __("Enter the name in english") }}</label>
            </div>
            <p class="invalid-feedback" id="name_en"></p>
        </div><!-- end   :: Column -->
    </div><!-- end   :: Row -->
</div>   <!-- end   :: Inputs wrapper -->
