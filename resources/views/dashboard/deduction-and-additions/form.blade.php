<!-- begin :: Inputs wrapper -->
<div class="inputs-wrapper">
    <!-- begin :: Row -->
    <div class="row mb-8">
        <!-- begin :: Column -->
        <div class="col-md-6 fv-row">
            <label class="fs-5 fw-bold mb-2">{{ __("Name arabic") }} <span class="text-danger">*</span></label>
            <div class="form-floating">
                <input type="text" class="form-control gui-input" id="name_ar_inp" required name="name_ar" value="{{old('name_ar', $deductionAndAddition->name_ar)}}" />
                <label for="name_ar_inp">{{ __("Enter the name in arabic") }}</label>
            </div>
            <p class="invalid-feedback" id="name_ar" ></p>
        </div><!-- end   :: Column -->

        <!-- begin :: Column -->
        <div class="col-md-6 fv-row">
            <label class="fs-5 fw-bold mb-2">{{ __("Name english") }} <span class="text-danger">*</span></label>
            <div class="form-floating">
                <input type="text" class="form-control en-input" id="name_en_inp" required name="name_en" value="{{old('name_en', $deductionAndAddition->name_en)}}" />
                <label for="name_en_inp">{{ __("Enter the name in english") }}</label>
            </div>
            <p class="invalid-feedback" id="name_en" ></p>
        </div><!-- end   :: Column -->
    </div><!-- end   :: Row -->

    <div class="row mb-8">
        <!-- begin :: Column -->
        <div class="col-md-6 fv-row">
            <label class="fs-5 fw-bold mb-2">{{ __("Type") }} <span class="text-danger">*</span></label>
            <select class="form-control select-2-with-image" data-control="select2" name="type" id="type-sp" data-placeholder="{{ __("Choose") }}" data-dir="{{ isArabic() ? 'rtl' : 'ltr' }}">
                <option value="" selected>{{__('Choose')}}</option>
                @foreach(App\Enums\DeductionAndAdditionTypes::cases() as $type)
                    <option {{old('value', $type->value) == $deductionAndAddition->type ? 'selected' : ''}} value="{{$type->value}}" >{{__(str_replace('_',' ',$type->value))}}</option>
                @endforeach
            </select>

            <p class="invalid-feedback" id="type" ></p>
        </div><!-- end   :: Column -->
    </div>
</div><!-- end   :: Inputs wrapper -->
