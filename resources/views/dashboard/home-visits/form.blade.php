<!-- begin :: Inputs wrapper -->
<div class="inputs-wrapper p-5 ">
    <!-- begin :: Row -->
    <div class="row mb-8">
        <!-- begin :: Column -->
        <div class="col-md-6 fv-row">
            <label class="fs-5 fw-bold mb-2">{{ __("Name") }} <span class="text-danger">*</span></label>
            <div class="form-floating">
                <input type="text" class="form-control" id="name_inp" required name="name" value="{{old('name', $homeVisit->name)}}" />
                <label for="name_inp">{{ __("Enter the name") }}</label>
            </div>
            <p class="invalid-feedback" id="name" ></p>
        </div><!-- end   :: Column -->

        <!-- begin :: Column -->
        <div class="col-md-6 fv-row">
            <label class="fs-5 fw-bold mb-2">{{ __("Address") }}</label>
            <div class="form-floating">
                <input type="text" class="form-control" id="address_inp" required name="address" value="{{old('address', $homeVisit->address)}}"/>
                <label for="address_inp">{{ __("Enter the address") }}</label>
            </div>
            <p class="invalid-feedback" id="address" ></p>
        </div><!-- end   :: Column -->
    </div><!-- end   :: Row -->

    <!-- begin :: Row -->
    <div class="row mb-8">
        <!-- begin :: Column -->
        <div class="col-md-6 fv-row">
            <label class="fs-5 fw-bold mb-2">{{ __("Email") }} <span class="text-danger">*</span></label>
            <div class="form-floating">
                <input type="email" class="form-control" id="email_inp" required name="email" value="{{old('email', $homeVisit->email)}}" placeholder="example"/>
                <label for="email_inp">{{ __("Enter the email") }}</label>
            </div>
            <p class="invalid-feedback" id="email" ></p>
        </div><!-- end   :: Column -->

        <!-- begin :: Column -->
        <div class="col-md-6 fv-row">

            <label class="fs-5 fw-bold mb-2">{{ __("Phone") }} <span class="text-danger">*</span></label>
            <div class="form-floating">
                <input type="tel" class="form-control" id="phone_inp" required name="phone" value="{{old('phone', $homeVisit->phone)}}" placeholder="example"/>
                <label for="phone_inp">{{ __("Enter the phone") }}</label>
            </div>
            <p class="invalid-feedback" id="phone" ></p>
        </div><!-- end   :: Column -->
    </div><!-- end   :: Row -->

    <!-- begin :: Row -->
    <div class="row mb-8">
        <!-- begin :: Column -->
        <div class="col-md-6 fv-row">
            <label class="fs-5 fw-bold mb-2">{{ __("Gender") }} <span class="text-danger">*</span></label>
            <select class="form-select" data-control="select2" required name="gender" id="roles-sp" data-placeholder="{{ __("Choose the gender") }}" data-dir="{{ isArabic() ? 'rtl' : 'ltr' }}">
                @foreach(\App\Enums\GenderType::cases() as $case)
                    <option {{$homeVisit->gender == $case->value ? 'selected' : ''}} value="{{$case->value}}">{{__($case->value)}}</option>
                @endforeach
            </select>

            <p class="invalid-feedback" id="gender" ></p>

        </div><!-- end   :: Column -->

        <!-- begin :: Column -->
        <div class="col-md-6 fv-row">
            <label class="fs-5 fw-bold mb-2">{{ __("Date time") }} <span class="text-danger">*</span></label>
            <div class="form-floating">

                <input type="datetime-local" class="form-control" id="date_time_inp" name="date_time" value="{{old('date_time',$homeVisit->date_time)}}"/>
                <label for="date_time_inp">{{ __("Choose the date time") }}</label>
            </div>
            <p class="invalid-feedback" id="date_time" ></p>
        </div><!-- end   :: Column -->

    </div><!-- end   :: Row -->
</div><!-- end   :: Inputs wrapper -->
