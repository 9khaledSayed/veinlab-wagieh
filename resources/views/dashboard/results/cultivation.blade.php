@dd($waitingLab)
<label>{{__('Growth Status')}}</label>
<select id="growth_status" class="form-control @error('growth_status') is-invalid @enderror selectpicker"
    name="growth_status" vaue="{{old('growth_status')}}" title="Select">
    <option value="no_growth" {{(old('growth_status',$waitingLab->growth_status) == 'no_growth' ? 'selected' : '')}}>
        {{__('No Growth')}}</option>
    <option value="growth" {{(old('growth_status',$waitingLab->growth_status) == 'growth' ? 'selected' : '')}}>
        {{__('Growth')}}
    </option>
</select>

<div class="kt-separator kt-separator--border-dashed kt-separator--space-lg"></div>
<div style="display: none" id="cultivationDiv">
    <label style="padding:8px 1px">{{__('Cultivation')}}</label>
    <input dir="auto" class="form-control text-center @error('cultivation') is-invalid @enderror" name="cultivation"
        value="{{old('cultivation',$waitingLab->cultivation)}}" />

    <div class="row mt-3" style="margin-bottom: 30px">

        <div class="col-lg-4">
            <div class="kt_repeater shadow p-3">

                <!--begin::Repeater-->
                <div id="kt_docs_repeater_basic">



                    <!--begin::Form group-->
                    <div class="form-group">
                        <h3 style="text-align:center"> {{__('Highly Sensitive To')}} </h3>
                        <div data-repeater-list="high_sensitive_to">
                            @forelse($waitingLab->high_sensitive_to as $highSensitiveTo)
                            <div data-repeater-item class="form-group row align-items-center">
                                <div class="col-md-9">
                                    <div class="kt_docs_repeater_nested_inner">
                                        <div class="kt-form__control">
                                            <input type="text" dir="auto" name="name"
                                                value="{{$highSensitiveTo['name']}}"
                                                class="text-center form-control @error('name') is-invalid @enderror">

                                        </div>
                                    </div>
                                    <div class="d-md-none kt-margin-b-10"></div>
                                </div>
                                <div class="col-md-2">
                                    <a href="javascript:;" data-repeater-delete=""
                                        class="btn btn-sm btn-light-danger mt-3 mt-md-8">
                                        <i class="la la-trash-o"></i>
                                        {{__('Delete')}}
                                    </a>
                                </div>
                            </div>
                            @empty
                            <div data-repeater-item class="form-group row align-items-center">
                                <div class="col-md-9">
                                    <div class="kt-form__group--inline">
                                        <div class="kt-form__control">
                                            <input type="text" dir="auto" name="name" class="text-center form-control">
                                        </div>
                                    </div>
                                    <div class="d-md-none kt-margin-b-10"></div>
                                </div>
                                <div class="col-md-2">
                                    <a href="javascript:;" data-repeater-delete=""
                                        class="btn btn-sm btn-light-danger mt-3 mt-md-8">
                                        <i class="la la-trash-o"></i>
                                        {{__('Delete')}}
                                    </a>
                                </div>
                            </div>
                            @endforelse

                        </div>
                    </div>
                    <!--end::Form group-->

                    <!--begin::Form group-->
                    <div class="form-group mt-5">
                        <a href="javascript:;" data-repeater-create class="btn btn-light-primary">
                            <i class="la la-plus"></i>{{__('Add')}}
                        </a>
                    </div>

                    <!--end::Form group-->
                </div>
                <!--end::Repeater-->
            </div>
        </div>




        <div class="col-lg-4">
            <div class="kt_repeater shadow p-3">

                <!--begin::Repeater-->
                <div id="kt_docs_repeater_basic_2">

                    <!--begin::Form group-->
                    <div class="form-group">
                        <h3 style="text-align:center"> {{__('Moderate Sensitive To')}} </h3>
                        <div data-repeater-list="moderate_sensitive_to">
                            @forelse(old('moderate_sensitive_to') ?? $waitingLab->moderate_sensitive_to as
                            $moderateSensitiveTo)
                            <div data-repeater-item class="form-group row align-items-center">
                                <div class="col-md-9">
                                    <div class="kt_docs_repeater_nested_inner">
                                        <div class="kt-form__control">
                                            <input type="text" dir="auto" name="name"
                                                value="{{$moderateSensitiveTo['name']}}"
                                                class="text-center form-control @error('name') is-invalid @enderror">

                                        </div>
                                    </div>
                                    <div class="d-md-none kt-margin-b-10"></div>
                                </div>
                                <div class="col-md-2">
                                    <a href="javascript:;" data-repeater-delete=""
                                        class="btn btn-sm btn-light-danger mt-3 mt-md-8">
                                        <i class="la la-trash-o"></i>
                                        {{__('Delete')}}
                                    </a>
                                </div>
                            </div>
                            @empty
                            <div data-repeater-item class="form-group row align-items-center">
                                <div class="col-md-9">
                                    <div class="kt-form__group--inline">
                                        <div class="kt-form__control">
                                            <input type="text" dir="auto" name="name" class="text-center form-control">
                                        </div>
                                    </div>
                                    <div class="d-md-none kt-margin-b-10"></div>
                                </div>
                                <div class="col-md-2">
                                    <a href="javascript:;" data-repeater-delete=""
                                        class="btn btn-sm btn-light-danger mt-3 mt-md-8">
                                        <i class="la la-trash-o"></i>
                                        {{__('Delete')}}
                                    </a>
                                </div>
                            </div>
                            @endforelse

                        </div>
                    </div>
                    <!--end::Form group-->

                    <!--begin::Form group-->
                    <div class="form-group mt-5">
                        <a href="javascript:;" data-repeater-create class="btn btn-light-primary">
                            <i class="la la-plus"></i>{{__('Add')}}
                        </a>
                    </div>

                    <!--end::Form group-->
                </div>
                <!--end::Repeater-->
            </div>
        </div>



        <div class="col-lg-4">
            <div class="kt_repeater shadow p-3">

                <!--begin::Repeater-->
                <div id="kt_docs_repeater_basic_3">

                    <!--begin::Form group-->
                    <div class="form-group">
                        <h3 style="text-align:center"> {{__('Resistant To')}} </h3>
                        <div data-repeater-list="resistant_to">
                            @forelse(old('resistant_to') ?? $waitingLab->resistant_to as $resistantTo)
                            <div data-repeater-item class="form-group row align-items-center">
                                <div class="col-md-9">
                                    <div class="kt_docs_repeater_nested_inner">
                                        <div class="kt-form__control">
                                            <input type="text" dir="auto" name="name" value="{{$resistantTo['name']}}"
                                                class="text-center form-control @error('name') is-invalid @enderror">

                                        </div>
                                    </div>
                                    <div class="d-md-none kt-margin-b-10"></div>
                                </div>
                                <div class="col-md-2">
                                    <a href="javascript:;" data-repeater-delete=""
                                        class="btn btn-sm btn-light-danger mt-3 mt-md-8">
                                        <i class="la la-trash-o"></i>
                                        {{__('Delete')}}
                                    </a>
                                </div>
                            </div>
                            @empty
                            <div data-repeater-item class="form-group row align-items-center">
                                <div class="col-md-9">
                                    <div class="kt-form__group--inline">
                                        <div class="kt-form__control">
                                            <input type="text" dir="auto" name="name" class="text-center form-control">
                                        </div>
                                    </div>
                                    <div class="d-md-none kt-margin-b-10"></div>
                                </div>
                                <div class="col-md-2">
                                    <a href="javascript:;" data-repeater-delete=""
                                        class="btn btn-sm btn-light-danger mt-3 mt-md-8">
                                        <i class="la la-trash-o"></i>
                                        {{__('Delete')}}
                                    </a>
                                </div>
                            </div>
                            @endforelse

                        </div>
                    </div>
                    <!--end::Form group-->

                    <!--begin::Form group-->
                    <div class="form-group mt-5">
                        <a href="javascript:;" data-repeater-create class="btn btn-light-primary">
                            <i class="la la-plus"></i>{{__('Add')}}
                        </a>
                    </div>

                    <!--end::Form group-->
                </div>
                <!--end::Repeater-->
            </div>
        </div>


    </div>
</div>

