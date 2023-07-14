<!-- begin :: Inputs wrapper -->
<div class="inputs-wrapper p-5">
    <!-- begin :: Row -->
    <div class="row mb-8">
        <!-- begin :: Column -->
        <div class="col-md-6 fv-row">
            <label class="fs-5 fw-bold mb-2">{{ __("Name arabic") }} <span class="text-danger">*</span></label>
            <div class="form-floating">
                <input type="text" class="form-control gui-input" required id="name_ar_inp" name="name_ar" value="{{old('name_ar', $patient->name_ar)}}"/>
                <label for="name_ar_inp">{{ __("Enter the name in arabic") }}</label>
            </div>
            <p class="invalid-feedback" id="name_ar"></p>
        </div><!-- end   :: Column -->

        <!-- begin :: Column -->
        <div class="col-md-6 fv-row">
            <label class="fs-5 fw-bold mb-2">{{ __("Name english") }}</label>
            <div class="form-floating">
                <input type="text" class="form-control en-input" id="name_en_inp" name="name_en" value="{{old('name_en', $patient->name_en)}}"/>
                <label for="name_en_inp">{{ __("Enter the name in english") }}</label>
            </div>
            <p class="invalid-feedback" id="name_en"></p>
        </div><!-- end   :: Column -->
    </div><!-- end   :: Row -->

    <!-- begin :: Row -->
    <div class="row mb-8">
        <!-- begin :: Column -->
        <div class="col-md-6 fv-row">

            <label class="fs-5 fw-bold mb-2">{{ __("Email") }} <span class="text-danger">*</span></label>
            <div class="form-floating">
                <input type="email" class="form-control" id="email_inp" required name="email" value="{{old('email', $patient->email)}}"/>
                <label for="email_inp">{{ __("Enter the email") }}</label>
            </div>
            <p class="invalid-feedback" id="email"></p>
        </div><!-- end   :: Column -->

        <!-- begin :: Column -->
        <div class="col-md-6 fv-row">

            <label class="fs-5 fw-bold mb-2">{{ __("Phone") }} <span class="text-danger">*</span></label>
            <div class="form-floating">
                    <input type="tel" class="form-control" required pattern="^(00201|\+201|01)[0-2,5]{1}[0-9]{8}$" id="phone_inp" name="phone" value="{{old('phone', $patient->phone)}}"/>
                <label for="phone_inp">{{ __("Enter the phone") }}</label>
            </div>
            <p class="invalid-feedback" id="phone" ></p>

        </div><!-- end   :: Column -->
    </div><!-- end   :: Row -->

    <!-- begin :: Row -->
    <div class="row mb-8">
        <!-- begin :: Column -->
        <div class="col-md-6 fv-row">
            <label class="fs-5 fw-bold mb-2">{{ __("Id number") }} <span class="text-danger">*</span></label>
            <div class="form-floating">
                <input type="text" class="form-control" id="id_number_inp" name="id_number" required value="{{old('id_number', $patient->id_number)}}"/>
                <label for="id_number_inp">{{ __("Enter the id number") }}</label>
            </div>
            <p class="invalid-feedback" id="id_number"></p>

        </div><!-- end   :: Column -->

        <!-- begin :: Column -->
        <div class="col-md-6 fv-row">
            <label class="fs-5 fw-bold mb-2" for="gender">{{ __("Gender") }} <span class="text-danger">*</span></label>
            <select class="form-select" data-control="select2" name="gender" required id="gender" data-placeholder="{{ __("Choose the gender") }}" data-dir="{{ isArabic() ? 'rtl' : 'ltr' }}">
                @foreach(\App\Enums\GenderType::cases() as $case)
                    <option {{$patient->gender == $case->value ? 'selected' : ''}} value="{{$case->value}}">{{__($case->value)}}</option>
                @endforeach
            </select>
            <p class="invalid-feedback" id="gender"></p>
        </div><!-- end   :: Column -->
    </div><!-- end   :: Row -->

    <!-- begin :: Row -->
    <div class="row mb-8">
        <!-- begin :: Column -->
        <div class="col-md-6 fv-row">
            <label class="fs-5 fw-bold mb-2">{{ __("Nationality") }} <span class="text-danger">*</span></label>
            <select class="form-control select-2-with-image" data-control="select2" required name="nationality_id" id="nationality_id-sp" data-placeholder="{{ __("Choose nationality") }}" data-dir="{{ isArabic() ? 'rtl' : 'ltr' }}">
                <option value="" selected>{{__('Choose nationality')}}</option>
                @foreach($nationalities as $nationality)
                    <option {{$patient->nationality_id == $nationality->id ? 'selected' : ''}} value="{{$nationality->id}}"  data-image="{{getImagePath( $nationality->logo , 'Nationalities' )}}" >{{$nationality->name}}</option>
                @endforeach
            </select>
            <p class="invalid-feedback" id="nationality_id"></p>
        </div><!-- end   :: Column -->

        <!-- begin :: Column -->

        <div class="col-md-6 fv-row">
            <label class="fs-5 fw-bold mb-2">{{ __("Age") }} <span class="text-danger">*</span></label>
            <div class="form-floating">
                <input type="text" class="form-control" id="hijri-date-input" required name="age" value="{{old('age', $patient->age)}}" autocomplete="off"/>

                <label for="hijri-date-input">{{ __("Enter the age") }}</label>
            </div>
            <p class="invalid-feedback" id="age"></p>
        </div><!-- end   :: Column -->
    </div><!-- end   :: Row -->

    <!-- begin :: Row -->
    <div class="row mb-8">
        <!-- begin :: Column -->
        <div class="col-md-6 fv-row">
            <label class="fs-5 fw-bold mb-2">{{ __("City") }}</label>
            <div class="form-floating">
                <input type="text" class="form-control" id="city_inp" name="city" value="{{old('city', $patient->city)}}"/>
                <label for="city_inp">{{ __("Enter the city") }}</label>
            </div>
            <p class="invalid-feedback" id="city"></p>

        </div><!-- end   :: Column -->

        <!-- begin :: Column -->
        <div class="col-md-6 fv-row">
            <label class="fs-5 fw-bold mb-2">{{ __("Address") }}</label>
            <div class="form-floating">
                <input type="text" class="form-control" id="address_inp" name="address" value="{{old('address', $patient->address)}}"/>
                <label for="address_inp">{{ __("Enter the address") }}</label>
            </div>
            <p class="invalid-feedback" id="address_inp"></p>

        </div><!-- end   :: Column -->
    </div><!-- end   :: Row -->

    <!-- begin :: Row -->
    <div class="row mb-8">
        <!-- begin :: Column -->
        <div class="col-md-6 fv-row">
            <label class="fs-5 fw-bold mb-2">{{ __("Diseases") }}</label>
            <div class="form-floating">
                <input type="text" class="form-control" id="diseases_inp" name="diseases" value="{{old('diseases', $patient->diseases)}}"/>
                <label for="diseases_inp">{{ __("Enter the diseases") }}</label>
            </div>
            <p class="invalid-feedback" id="diseases"></p>
        </div><!-- end   :: Column -->
    </div><!-- end   :: Row -->
</div><!-- end   :: Inputs wrapper -->
