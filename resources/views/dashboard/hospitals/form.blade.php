<!-- begin :: Row -->
<div class="row mb-8">
    <!-- begin :: Column -->
    <div class="col-md-6 fv-row">
        <label class="fs-5 fw-bold mb-2">{{ __("Name") }} <span class="text-danger">*</span></label>
        <div class="form-floating">
            <input type="text" required class="form-control" id="name_inp" name="name" value="{{old('name', $hospital->name)}}"/>
            <label for="name_inp">{{ __("Enter the name") }}</label>
        </div>
        <p class="invalid-feedback" id="name" ></p>
    </div><!-- end   :: Column -->

    <!-- begin :: Column -->
    <div class="col-md-6 fv-row">
        <label class="fs-5 fw-bold mb-2">{{ __("Phone") }}<span class="text-danger">*</span></label>
        <div class="form-floating">
            <input type="tel" required class="form-control" id="phone_inp" name="phone" value="{{old('phone', $hospital->phone)}}"/>
            <label for="phone_inp">{{ __("Enter the phone") }}</label>
        </div>
        <p class="invalid-feedback" id="phone" ></p>
    </div><!-- end   :: Column -->
</div><!-- end   :: Row -->

<!-- begin :: Row -->
<div class="row mb-8">
    <!-- begin :: Column -->
    <div class="col-md-6 fv-row">
        <label class="fs-5 fw-bold mb-2">{{ __("Email") }} <span class="text-danger">*</span></label>
        <div class="form-floating">
            <input type="email" required class="form-control" id="email_inp" name="email" value="{{old('email', $hospital->email)}}"/>
            <label for="email_inp">{{ __("Enter the email") }}</label>
        </div>
        <p class="invalid-feedback" id="email" ></p>
    </div><!-- end   :: Column -->
</div><!-- end   :: Row -->
