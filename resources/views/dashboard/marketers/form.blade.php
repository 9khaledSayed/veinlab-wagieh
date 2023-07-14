<!-- begin :: Row -->
<div class="row mb-8">
    <!-- begin :: Column -->
    <div class="col-md-6 fv-row">

        <label class="fs-5 fw-bold mb-2">{{ __("Name") }} <span class="text-danger">*</span></label>
        <div class="form-floating">
            <input type="text" required class="form-control" id="name_inp" name="name" value="{{old('name', $marketer->name)}}"/>
            <label for="name_inp">{{ __("Enter the name") }}</label>
        </div>
        <p class="invalid-feedback" id="name" ></p>
    </div><!-- end   :: Column -->

    <!-- begin :: Column -->
    <div class="col-md-6 fv-row">

        <label class="fs-5 fw-bold mb-2">{{ __("Phone") }}<span class="text-danger">*</span></label>
        <div class="form-floating">
            <input type="tel" required class="form-control" id="phone_inp" name="phone" value="{{old('phone', $marketer->phone)}}"/>
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
            <input type="email" required class="form-control" id="email_inp" name="email" value="{{old('email', $marketer->email)}}"/>
            <label for="email_inp">{{ __("Enter the email") }}</label>
        </div>
        <p class="invalid-feedback" id="email" ></p>
    </div><!-- end   :: Column -->
</div><!-- end   :: Row -->
<!-- begin :: Row -->
<div class="row mb-8">
    <!-- begin :: Column -->
    <div class="col-md-6 fv-row">
        <label class="fs-5 fw-bold mb-2">{{ __("Country") }} <span class="text-danger">*</span></label>
        <div class="form-floating">
            <input type="text" required class="form-control" id="country_inp" name="country" value="{{old('country',$marketer->country)}}"/>
            <label for="country_inp">{{ __("Enter the ") .  strtolower(__("Country")) }}</label>
        </div>
        <p class="invalid-feedback" id="country" ></p>
    </div><!-- end   :: Column -->

    <!-- begin :: Column -->
    <div class="col-md-6 fv-row">
        <label class="fs-5 fw-bold mb-2">{{ __("City") }} <span class="text-danger">*</span></label>
        <div class="form-floating">
            <input type="text" required class="form-control" id="city_inp" name="city" value="{{old('city',$marketer->city)}}"/>
            <label for="city_inp">{{ __("Enter the ") .  strtolower(__("City")) }}</label>
        </div>
        <p class="invalid-feedback" id="city" ></p>
    </div><!-- end   :: Column -->
</div><!-- end   :: Row -->

<!-- make table test-->
<!-- Editable table -->
<div class="card">
    <h4 class="card-header text-center font-weight-bold text-uppercase py-4">
        {{__('Bank Details')}}<span class="text-warning fs-sm-7">{{ __('Optional') }}</span>
    </h4>
    <div class="card-body">
        <!-- begin :: Row -->
        <div class="row mb-8">
            <!-- begin :: Column -->
            <div class="col-md-6 fv-row">

                <label class="fs-5 fw-bold mb-2">{{ __("Bank account title") }} </label>
                <div class="form-floating">
                    <input type="text" class="form-control" id="bank_account_title_inp" name="bank_account_title" value="{{old('bank_account_title',$marketer->bank_account_title)}}"/>
                    <label for="country_inp">{{ __("Enter the ") .  strtolower(__("Bank account title")) }}</label>
                </div>
                <p class="invalid-feedback" id="bank_account_title" ></p>
            </div><!-- end   :: Column -->

            <!-- begin :: Column -->
            <div class="col-md-6 fv-row">

                <label class="fs-5 fw-bold mb-2">{{ __("Bank name") }} </label>
                <div class="form-floating">
                    <input type="text"  class="form-control" id="bank_name_inp" name="bank_name" value="{{old('bank_name',$marketer->bank_name)}}"/>
                    <label for="bank_name_inp">{{ __("Enter the ") .  strtolower(__("Bank name")) }}</label>
                </div>
                <p class="invalid-feedback" id="bank_name" ></p>
            </div><!-- end   :: Column -->
        </div><!-- end   :: Row -->


        <!-- begin :: Row -->
        <div class="row mb-8">
            <!-- begin :: Column -->
            <div class="col-md-6 fv-row">
                <label class="fs-5 fw-bold mb-2">{{ __("SWIFT code") }} </label>
                <div class="form-floating">
                    <input type="number" class="form-control" id="swift_code_inp" name="swift_code" value="{{old('swift_code',$marketer->swift_code)}}"/>
                    <label for="swift_code_inp">{{ __("Enter the ") .  strtolower(__("SWIFT code")) }}</label>
                </div>
                <p class="invalid-feedback" id="swift_code" ></p>
            </div><!-- end   :: Column -->

            <!-- begin :: Column -->
            <div class="col-md-6 fv-row">

                <label class="fs-5 fw-bold mb-2">{{ __("Bank account NO") }} </label>
                <div class="form-floating">
                    <input type="number"  class="form-control" id="bank_account_no_inp" name="bank_account_no" value="{{old('bank_account_no',$marketer->bank_account_no)}}"/>
                    <label for="bank_account_no_inp">{{ __("Enter the ") .  strtolower(__("Bank account NO")) }}</label>
                </div>
                <p class="invalid-feedback" id="bank_account_no" ></p>
            </div><!-- end   :: Column -->
        </div><!-- end   :: Row -->

        <!-- begin :: Row -->
        <div class="row mb-8">
            <!-- begin :: Column -->
            <div class="col-md-6 fv-row">
                <label class="fs-5 fw-bold mb-2">{{ __("IBAN ") }} </label>
                <div class="form-floating">
                    <input type="text" class="form-control" id="iban_inp" name="iban" value="{{old('iban',$marketer->iban)}}"/>
                    <label for="iban_inp">{{ __("Enter the ") .  strtolower(__("IBAN ")) }}</label>
                </div>
                <p class="invalid-feedback" id="iban" ></p>
            </div><!-- end   :: Column -->

            <!-- begin :: Column -->
            <div class="col-md-6 fv-row">

                <label class="fs-5 fw-bold mb-2">{{ __("Bank branch code") }} </label>
                <div class="form-floating">
                    <input type="number"  class="form-control" id="bank_branch_code_inp" name="bank_branch_code" value="{{old('bank_branch_code',$marketer->bank_branch_code)}}"/>
                    <label for="bank_branch_code_inp">{{ __("Enter the ") .  strtolower(__("Bank branch code")) }}</label>
                </div>
                <p class="invalid-feedback" id="bank_branch_code" ></p>
            </div><!-- end   :: Column -->
        </div><!-- end   :: Row -->
    </div>
</div>
<!-- Editable table -->
