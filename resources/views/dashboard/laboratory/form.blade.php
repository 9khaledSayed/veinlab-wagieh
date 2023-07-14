
<!-- begin :: Row -->
<div class="row mb-8">

    <!-- begin :: Column -->
    <div class="col-md-6 fv-row">

        <label class="fs-5 fw-bold mb-2">{{ __("Name") }}</label>
        <div class="form-floating">
            <input type="text" class="form-control" id="name_inp" name="name" value="{{old('name', $laboratories->name)}}" required/>
            <label for="name_inp">{{ __("Enter the name") }}</label>
        </div>
        <p class="invalid-feedback" id="name" ></p>
    </div><!-- end   :: Column -->

    <!-- begin :: Column -->
    <div class="col-md-6 fv-row">

        <label class="fs-5 fw-bold mb-2">{{ __("Phone") }}</label>
        <div class="form-floating">
            <input type="tel" class="form-control" id="phone_inp" name="phone" value="{{old('phone', $laboratories->phone)}}" required/>
            <label for="phone_inp">{{ __("Enter the phone") }}</label>
        </div>
        <p class="invalid-feedback" id="phone" ></p>
    </div><!-- end   :: Column -->
</div><!-- end   :: Row -->

<!-- begin :: Row -->
<div class="row mb-8">

    <!-- begin :: Column -->
    <div class="col-md-6 fv-row">

        <label class="fs-5 fw-bold mb-2">{{ __("Email") }}</label>
        <div class="form-floating">
            <input type="email" class="form-control" id="email_inp" name="email"value="{{old('email', $laboratories->email)}}" required/>
            <label for="email_inp">{{ __("Enter the email") }}</label>
        </div>
        <p class="invalid-feedback" id="email" ></p>
    </div><!-- end   :: Column -->

    <!-- begin :: Column -->
    <div class="col-md-6 fv-row">

        <label class="fs-5 fw-bold mb-2">{{ __("Address") }}</label>
        <div class="form-floating">
            <input type="text" class="form-control" id="address_inp" name="address" value="{{old('address', $laboratories->address)}}" required/>
            <label for="address_inp">{{ __("Enter the address") }}</label>
        </div>
        <p class="invalid-feedback" id="address" ></p>
    </div><!-- end   :: Column -->
</div><!-- end   :: Row -->
