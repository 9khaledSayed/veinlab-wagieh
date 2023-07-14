<!-- begin :: Row -->
<div class="row mb-8">
    <!-- begin :: Column -->
    <div class="col-6 fv-row">

        <label class="fs-5 fw-bold mb-2">{{ __("General name") }} <span class="text-danger">*</span></label>
        <div class="form-floating">
            <input type="text" required class="form-control" id="general_name_inp" name="general_name" value="{{old('general_name',$mainAnalysis->general_name)}}"/>
            <label for="general_name_inp">{{ __("Enter the general name") }}</label>
        </div>
        <p class="invalid-feedback" id="general_name" ></p>
    </div><!-- end   :: Column -->

    <!-- begin :: Column -->
    <div class="col-6 fv-row">

        <label class="fs-5 fw-bold mb-2">{{ __("Abbreviated name") }}<span class="text-danger">*</span></label>
        <div class="form-floating">
            <input type="text" required class="form-control" id="abbreviated_name_inp" name="abbreviated_name" value="{{old('abbreviated_name',$mainAnalysis->abbreviated_name)}}"/>
            <label for="abbreviated_name_inp">{{ __("Enter the abbreviated name") }}</label>
        </div>
        <p class="invalid-feedback" id="abbreviated_name" ></p>
    </div><!-- end   :: Column -->
</div><!-- end   :: Row -->

<!-- begin :: Row -->
<div class="row mb-8">

    <!-- begin :: Column -->
    <div class="col-6 fv-row">

        <label class="fs-5 fw-bold mb-2">{{ __("Code") }} <span class="text-danger">*</span></label>
        <div class="form-floating">
            <input type="number" required class="form-control" id="code_inp" name="code" value="{{old('code',$mainAnalysis->code)}}"/>
            <label for="code_inp">{{ __("Enter the code") }}</label>
        </div>
        <p class="invalid-feedback" id="code" ></p>
    </div><!-- end   :: Column -->

    <!-- begin :: Column -->
    <div class="col-6 fv-row">

        <label class="fs-5 fw-bold mb-2">{{ __("Discount") }}</label>
        <div class="form-floating">
            <input type="number" class="form-control" id="discount_inp" name="discount" value="{{old('discount',$mainAnalysis->discount)}}"/>
            <label for="discount_inp">{{ __("Enter the discount") }}</label>
        </div>
        <p class="invalid-feedback" id="discount" ></p>
    </div><!-- end   :: Column -->
</div><!-- end   :: Row -->

<!-- begin :: Row -->
<div class="row mb-8">

    <!-- begin :: Column -->
    <div class="col-6 fv-row">

        <label class="fs-5 fw-bold mb-2">{{ __("Cost") }} <span class="text-danger">*</span></label>
        <div class="form-floating">
            <input type="number" required class="form-control" id="cost_inp" name="cost" value="{{old('cost',$mainAnalysis->cost)}}"/>
            <label for="cost_inp">{{ __("Enter the cost") }}</label>
        </div>
        <p class="invalid-feedback" id="cost" ></p>
    </div><!-- end   :: Column -->

    <!-- begin :: Column -->
    <div class="col-6 fv-row">

        <label class="fs-5 fw-bold mb-2">{{ __("price") }}<span class="text-danger">*</span></label>
        <div class="form-floating">
            <input type="number" required class="form-control" id="price_inp" name="price" value="{{old('price',$mainAnalysis->price)}}"/>
            <label for="price_inp">{{ __("Enter the price") }}</label>
        </div>
        <p class="invalid-feedback" id="price" ></p>
    </div><!-- end   :: Column -->
</div>
<!-- make table test-->
<!-- Editable table -->
<div class="card">
    <h3 class="card-header text-center font-weight-bold text-uppercase py-4">
        {{__('Sub analysis')}}
    </h3>
    <div class="card-body">

     <!--begin::Repeater-->
     <div class="kt_docs_repeater_nested">
        <!--begin::Form group-->
        <div class="form-group">
            <div data-repeater-list="sub_analysis">
                <div data-repeater-item>
                    <div class="form-group row mb-5">
                        <div class="col-3">
                            <a href="javascript:void(0);" data-repeater-delete class="btn btn-sm btn-light-danger">
                                <i class="la la-trash-o fs-3"></i>{{__('Delete Sub Analysis')}}
                            </a>
                        </div>
                        <div class="row">
                            <input type="text" style="display: none" name="id">
                            <div class="col-4 fv-row">
                                <label class="fs-5 fw-bold mb-2" for="name_inp">{{ __("Name") }}
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" id="name_inp" name="name" placeholder="{{__('Enter the name')}}" required autocomplete="off">
                            </div>
                            <div class="col-4 fv-row">
                                <label class="fs-5 fw-bold mb-2" for="unit_inp">{{ __("Unit") }}
                                    <span class="text-warning"> ( {{__('Optional')}} )</span>
                                </label>
                                <input type="text" class="form-control" id="unit_inp" name="unit" placeholder="{{__('Enter the unit')}}" autocomplete="off">
                            </div>
                            <div class="col-4 fv-row">
                                <label class="fs-5 fw-bold mb-2" for="classification_inp">{{ __("Classification") }}
                                    <span class="text-warning"> ( {{__('Optional')}} )</span>
                                </label>
                                <input type="text" class="form-control" id="classification_inp" name="classification" placeholder="{{__('Enter the classification')}}" autocomplete="off">
                            </div>
                        </div>

                        <h5 class="pt-10 text-info">{{__('Natural rates for this analysis')}}</h5>


                        <div class="inner-repeater">

                            <div data-repeater-list="normal_range" class="mb-5">
                                <div data-repeater-item>
                                    <input type="text" name="id" style="display: none">
                                    <div class="row">
                                        <div class="col-3">
                                            <label class="form-label" for="from">{{__('From')}}:</label>
                                            <div class="input-group pb-3">
                                                <input type="number" id="from" name="from" class="form-control" required autocomplete="off"/>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <label class="form-label" for="to">{{__('To')}}:</label>
                                            <div class="input-group pb-3">
                                                <input type="number" id="to" name="to" class="form-control" required autocomplete="off"/>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <label class="form-label" for="gender">{{__('Gender')}}:</label>
                                            <select class="form-select" data-control="select2" name="gender" id="gender" required data-placeholder="{{ __("Choose the gender") }}" data-dir="{{ isArabic() ? 'rtl' : 'ltr' }}">
                                                @foreach(\App\Enums\GenderType::cases() as $case)
                                                    <option value="{{$case->value}}">{{__($case->value)}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-3">
                                            <label class="form-label" for="type">{{__('Type')}}:</label>
                                            <select class="form-select normal-type-select" data-control="select2" required name="type" id="type" data-placeholder="{{ __("Choose the type") }}" data-dir="{{ isArabic() ? 'rtl' : 'ltr' }}">
                                                @foreach(\App\Enums\NormalRangeType::cases() as $case)
                                                    <option value="{{$case->value}}">{{__($case->value)}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-10 value_textarea_container">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <label class="form-label" for="value_textarea">{{__('Normal Range')}}:</label>
                                                        <div class="input-group pb-3">
                                                            <textarea name="value" id="" class="value_textarea form-control"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-10 value_input_container" style="display: none">
                                                <div class="row">
                                                    <div class="col-12" >
                                                        <label class="form-label" for="value_input">{{__('Normal Range')}}:</label>
                                                        <div class="input-group pb-3">
                                                            <input type="color" name="value" id="" class="value_input form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-md-10 value_select_container" style="display: none">
                                                <label class="form-label" for="value_select">{{__('Normal Range')}}:</label>
                                                <select class="value_select form-select" data-control="select2" name="value" id="" data-placeholder="{{ __("Choose the normal range") }}" data-dir="{{ isArabic() ? 'rtl' : 'ltr' }}">
                                                    <option></option>
                                                    <option value="positive">{{__('Positive')}}</option>
                                                    <option value="negative">{{__('Negative')}}</option>
                                                </select>
                                            </div>


                                            <div class="col-md-2">
                                                <a href="javascript:void(0);" data-repeater-delete class="btn btn-sm btn-light-danger mt-3 mt-md-9">
                                                    <i class="la la-trash-o fs-3"></i>
                                                </a>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <button class="btn btn-sm btn-light-primary add-normal-range" data-repeater-create type="button">
                                        <i class="la la-plus"></i> {{__('Add Normal Range')}}
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div><!--end::Form group-->

        <!--begin::Form group-->
        <div class="form-group row p-5">
            <a href="javascript:void(0);" data-repeater-create class="btn btn-light-primary">
                <i class="la la-plus"></i>{{__('add sub analysis')}}
            </a>
        </div><!--end::Form group-->
    </div>
    <!--end::Repeater-->
    </div>
</div>
