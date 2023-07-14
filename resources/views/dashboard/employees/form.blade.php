
    <!-- begin :: Row -->
    <div class="row mb-8 p-5">

        <!-- begin :: Column -->
        <div class="col-md-6 fv-row">

            <label class="fs-5 fw-bold mb-2">{{ __("Name") }}</label>
            <div class="form-floating">
                <input type="text" class="form-control" id="name_inp" name="name" value="{{old('name', $employee->name)}}" autocomplete="off" required/>
                <label for="name_inp">{{ __("Enter the name") }}</label>
            </div>
            <p class="invalid-feedback" id="name" ></p>
        </div><!-- end   :: Column -->

        <!-- begin :: Column -->
        <div class="col-md-6 fv-row">

            <label class="fs-5 fw-bold mb-2">{{ __("Phone") }}</label>
            <div class="form-floating">
                <input type="tel" class="form-control" id="phone_inp" name="phone" value="{{old('phone', $employee->phone)}}" required/>
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
                <input type="email" class="form-control" id="email_inp" name="email"value="{{old('email', $employee->email)}}"  autocomplete="off"  required/>
                <label for="email_inp">{{ __("Enter the email") }}</label>
            </div>
            <p class="invalid-feedback" id="email" ></p>
        </div><!-- end   :: Column -->

        <!-- begin :: Column -->
        <div class="col-md-6 fv-row">

            <label class="fs-5 fw-bold mb-2" for="roles-sp">{{ __("Roles") }}</label>
            <select class="form-select" data-control="select2" name="roles[]" multiple id="roles-sp" data-placeholder="{{ __("Choose the roles") }}" data-dir="{{ isArabic() ? 'rtl' : 'ltr' }}">
                @foreach( $roles as $role)
                    <option {{ old('roles') && in_array($role->id, old('roles')) ? 'selected' : (in_array($role->id, $employee->roles->pluck('id')->toArray()) ? 'selected' : '') }} value="{{ $role->id }}"> {{ $role->name }} </option>
                @endforeach
            </select>
            <p class="invalid-feedback" id="roles-sp" ></p>
        </div><!-- end   :: Column -->
    </div><!-- end   :: Row -->

