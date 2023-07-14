<div class="kt-portlet__head-label" style="margin: auto; text-align: center !important;padding:10px">
    <h3 class="kt-portlet__head-title">
        {{__('Analysis')}} : {{$waitingLab->mainAnalysis->general_name}}
    </h3>
</div>
<div class="table-responsive">
    <table class="table table-striped gy-7 gs-7">
        <thead>
            <tr class="fw-semibold fs-6 text-gray-800 border-bottom border-gray-200">
                <th>{{__('Test Name')}}</th>
                <th>{{__('Result')}}</th>
                <th>{{__('Unit')}}</th>
                <th>{{__('Normal Range')}}</th>
                <th>{{__('Delayed')}}</th>
            </tr>
        </thead>

        <tbody>
            @foreach($waitingLab->mainAnalysis->subAnalysis as $sub)
            @php
                $result = $waitingLab->results->where('sub_analysis_id', $sub->id)->first()->result ?? old('result_' . $sub->id);
                $delayed = $waitingLab->results->where('sub_analysis_id', $sub->id)->first()->delayed ?? old('delayed_' . $sub->id)
            @endphp



            <tr>
                <td style="direction: {{ isArabic() ? 'rtl' : 'ltr' }};width: 20%">{{$sub->name}}</td>
                <td style="direction: {{ isArabic() ? 'rtl' : 'ltr' }};width: 20%">
                    @if($sub->ReturnTypeNormal($waitingLab->patient->gender) == 'string')
                    <input type="text" dir="{{ isArabic() ? 'rtl' : 'ltr' }}" class="form-control text-center" value="{{$result}}" name="{{'result_' . $sub->id}}" placeholder="{{__('Enter result')}}">
                    @elseif($sub->ReturnTypeNormal($waitingLab->patient->gender) == 'color')
                    <input type="color" dir="{{ isArabic() ? 'rtl' : 'ltr' }}" class="form-control text-center" value="{{$result}}" name="{{'result_' . $sub->id}}" placeholder="{{__('Enter result')}}">
                    @elseif($sub->ReturnTypeNormal($waitingLab->patient->gender) == 'select')
                        <select class="form-select" data-control="select2" name="{{'result_' . $sub->id}}" id="{{'result_' . $sub->id}}" data-placeholder="{{ __("Choose the result") }}" data-dir="{{ isArabic() ? 'rtl' : 'ltr' }}">
                            <option></option>
                            <option {{($result == 'negative') ? 'selected' : ''}} value="negative">{{__('negative')}}</option>
                            <option {{($result == 'positive') ? 'selected' : ''}} value="positive">{{__('positive')}}</option>
                        </select>
                    @else
                        <input type="text" dir="{{ isArabic() ? 'rtl' : 'ltr' }}" class="form-control text-center" value="{{$result}}" name="{{'result_' . $sub->id}}" placeholder="{{__('Enter result')}}">
                    @endif
                </td>

                <td style="width: 20%;direction: {{ isArabic() ? 'rtl' : 'ltr' }}">{{ $sub->unit }}</td>

                <td style="direction: {{ isArabic() ? 'rtl' : 'ltr' }};width: 20%" class="normal-range">
                    <div>{!!$sub->normal($waitingLab->patient->gender) ? __($sub->normal($waitingLab->patient->gender)) : __('There is no normal range')  !!}</div>
                </td>
                <td>
                    <!--begin::Input group-->
                    <div class="d-flex flex-stack w-lg-50">
                        <!--begin::Switch-->
                        <label class="form-check form-switch form-check-custom form-check-solid">
                            <input class="form-check-input" dir="{{ isArabic() ? 'rtl' : 'ltr' }}" name="{{'delayed_' . $sub->id}}" value="1" type="checkbox" {{($delayed == 1) ? 'checked' : ''}} />
                            <span class="form-check-label fw-semibold text-muted"> {{__('Delayed')}} </span>
                        </label><!--end::Switch-->
                    </div><!--end::Input group-->
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>
</div>


@if($waitingLab->mainAnalysis->has_cultivation)
    @include('dashboard.results.cultivation')
@endif
<label>{{__('Analysis Notes')}}</label>
<div class="form-group row mt-5" style="margin:15px 0">
    <div class="col-lg-12">
        <textarea name="lab_notes" id="kt_docs_ckeditor_classic" placeholder="{{__('Type your notes')}}">{{$waitingLab->notes->lab_notes ?? ''}}</textarea>
    </div>
</div>

