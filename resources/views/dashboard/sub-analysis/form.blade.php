<!-- begin :: Inputs wrapper -->
<div class="inputs-wrapper" style="margin-top: 42px">
    <!-- begin :: Row -->
    <div class="row mb-8">
        <div class="col-md-12">
            <label class="fs-5 fw-bold mb-2">{{ __("Analysis") }} <span class="text-danger">*</span></label>

            <select class="form-select selectpicker" required name="main_analysis_id" data-control="select2" data-placeholder="{{__('Choose the analysis')}}">
                <option></option>
                @foreach($mainAnalysis as $data)
                    <option {{old('main_analysis_id', $subAnalysis->main_analysis_id) == $data->id ? 'selected' :''}} value="{{$data->id}}" >{{$data->general_name . " - " . $data->price . " SAR - " . $data->code}}</option>
                @endforeach
            </select>
            <p class="invalid-feedback" id="main_analysis_id" ></p>
        </div>
    </div><!-- end   :: Row -->

    <!-- begin :: Row -->
    <div class="row mb-8">
        <div class="col-md-4  fv-row">
            <label class="fs-5 fw-bold mb-2">{{ __("Name") }} <span class="text-danger">*</span></label>
            <input type="text" required class="form-control" id="name_inp" name="name" value="{{old('name', $subAnalysis->name)}}" placeholder="{{__('Enter the name')}}">
            <p class="invalid-feedback" id="name" ></p>
        </div>
        <div class="col-md-4  fv-row">
            <label class="fs-5 fw-bold mb-2">{{ __("Unit") }}  <span class="text-warning"> ( {{__('Optional')}} )</span></label>
            <input type="text" class="form-control" id="unit_inp" name="unit" value="{{old('unit', $subAnalysis->unit)}}" placeholder="{{__('Enter the unit')}}">
            <p class="invalid-feedback" id="unit" ></p>
        </div>
        <div class="col-md-4  fv-row">
            <label class="fs-5 fw-bold mb-2">{{ __("Classification") }}  <span class="text-warning"> ( {{__('Optional')}} )</span></label>
            <input type="text" class="form-control" id="classification_inp" name="classification" value="{{old('classification', $subAnalysis->classification)}}" placeholder="{{__('Enter the classification')}}">
            <p class="invalid-feedback" id="classification" ></p>
        </div>
    </div><!-- end   :: Row -->
</div><!-- end   :: Inputs wrapper -->
