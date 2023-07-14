<!-- begin :: Inputs wrapper -->
<div class="inputs-wrapper" style="margin-top: 42px">
    <!-- begin :: Row -->
    <div class="row mb-8">
        <!-- begin :: Column -->
        <div class="col-md-6 fv-row">
            <label class="fs-5 fw-bold mb-2">{{ __("name") }} <span class="text-danger">*</span></label>
            <div class="form-floating">
                <input type="text" class="form-control" id="name_inp" required name="name" value="{{old('name', $doctor->name)}}" />
                <label for="name_inp">{{ __("Enter the name") }}</label>
            </div>
            <p class="invalid-feedback" id="name"></p>
        </div><!-- end   :: Column -->

        <!-- begin :: Column -->
        <div class="col-md-6 fv-row">
            <label class="fs-5 fw-bold mb-2">{{ __("phone") }}<span class="text-danger">*</span></label>
            <div class="form-floating">
                <input type="tel" class="form-control" id="phone_inp" pattern="^(00201|\+201|01)[0-2,5]{1}[0-9]{8}$" required name="phone" value="{{old('phone', $doctor->phone)}}" />
                <label for="phone_inp">{{ __("Enter the phone") }}</label>
            </div>
            <p class="invalid-feedback" id="phone"></p>
        </div><!-- end   :: Column -->
    </div><!-- end   :: Row -->

    <!-- begin :: Row -->
    <div class="row mb-8">

        <!-- begin :: Column -->
        <div class="col-md-6 fv-row">
            <label class="fs-5 fw-bold mb-2">{{ __("email") }} <span class="text-danger">*</span></label>
            <div class="form-floating">
                <input type="email" class="form-control" id="email_inp" required name="email" value="{{old('email', $doctor->email)}}" />
                <label for="email_inp">{{ __("Enter the email") }}</label>
            </div>
            <p class="invalid-feedback" id="email"></p>
        </div><!-- end   :: Column -->

        <!-- begin :: Column -->
        <div class="col-md-6 fv-row">

            <label class="fs-5 fw-bold mb-2">{{ __("percentage") }} <span class="text-danger">*</span></label>
            <div class="form-floating">
                <input type="number" class="form-control" id="percentage_inp" required name="percentage" value="{{old('percentage', $doctor->percentage)}}" />
                <label for="percentage_inp">{{ __("Enter the percentage") }}</label>
            </div>
            <p class="invalid-feedback" id="percentage"></p>
        </div><!-- end   :: Column -->
    </div><!-- end   :: Row -->

    <!-- begin :: Row -->
    <div class="row mb-4">
        <!-- begin :: Column -->
        <div class="col-md-12 fv-row d-flex justify-content-evenly">
            <div class="d-flex flex-column">
                <!-- begin :: Upload image component -->
                <label class="text-center fw-bold mb-4">{{ __("Add Signature") }}</label>
                <x-dashboard.upload-image-inp name="signature" :image="old('signature',$doctor->signature)" directory="Doctors" placeholder="default.jpg" type="editable" ></x-dashboard.upload-image-inp>
                <p class="invalid-feedback" id="signature" ></p><!-- end   :: Upload image component -->
            </div>
        </div><!-- end   :: Column -->
    </div><!-- end   :: Row -->
</div><!-- end   :: Inputs wrapper -->
