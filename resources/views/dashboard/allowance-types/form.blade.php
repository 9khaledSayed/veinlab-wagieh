<!-- begin :: Inputs wrapper -->
<div class="inputs-wrapper">

    <!-- begin :: Row -->
    <div class="row mb-8">
        <!-- begin :: Column -->
        <div class="col-md-6 fv-row">
            <label class="fs-5 fw-bold mb-2">{{ __("Name") }} <span class="text-danger">*</span></label>
            <div class="form-floating">
                <input type="text" class="form-control" id="name_inp" required name="name" value="{{old('name', $allowanceType->name)}}" />
                <label for="name_inp">{{ __("Enter the name") }}</label>
            </div>
            <p class="invalid-feedback" id="name" ></p>
        </div><!-- end   :: Column -->

        <!-- begin :: Column -->
        <div class="col-md-6 fv-row">
            <label class="fs-5 fw-bold mb-2">{{ __("Allowance type") }} <span class="text-danger">*</span></label>
            <select class="form-control select-2-with-image" data-control="select2" name="type" id="type-sp" data-placeholder="{{ __("Choose") }}" data-dir="{{ isArabic() ? 'rtl' : 'ltr' }}">
                <option value="" >{{__('Choose')}}</option>
                @foreach(App\Enums\AllowanceTypes::cases() as $type)
                    <option {{old('type', $allowanceType->type) == $type->value ? 'selected' : ''}} value="{{$type->value}}" >{{__(str_replace('_',' ',$type->value))}}</option>
                @endforeach
            </select>
            <p class="invalid-feedback" id="type" ></p>
        </div><!-- end   :: Column -->
    </div><!-- end   :: Row -->

    <div class="row mb-8">
        <!-- begin :: Column -->
        <div class="col-md-6 fv-row">
            <label class="fs-5 fw-bold mb-2">{{ __("Amount") }} <span class="text-danger">*</span></label>
            <div class="form-floating">
                <input type="number" class="form-control" id="amount_inp" required name="amount" value="{{old('amount', $allowanceType->amount)}}"/>
                <label for="amount_inp">{{ __("Enter the amount") }}</label>
            </div>
            <p class="invalid-feedback" id="amount" ></p>
        </div><!-- end   :: Column -->

        <!-- begin :: Column -->
        <div class="col-md-6 fv-row">
            <label class="fs-5 fw-bold mb-2">{{ __("Percentage") }} <span class="text-danger">*</span></label>
            <div class="form-floating">
                <input type="number" class="form-control" id="percentage_inp" required name="percentage" value="{{old('percentage', $allowanceType->percentage)}}" />
                <label for="percentage_inp">{{ __("Enter the percentage") }}</label>
            </div>
            <p class="invalid-feedback" id="percentage" ></p>
        </div><!-- end   :: Column -->
    </div>
</div><!-- end   :: Inputs wrapper -->
