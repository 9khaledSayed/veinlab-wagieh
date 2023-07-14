<form action="" method="get">
    <div class="mt-5 d-flex justify-content-end" data-kt-docs-table-toolbar="base">
        <div class="mb-10">
            <label for="" class="form-label">{{__('From date')}}</label>
            <input type="date" name="from_date" value="{{request()->get('from_date') ?? ''}}" class="form-control form-control-solid w-250px  border-gray-300 border-1">
        </div>

        <div class="mb-0" style="margin-right: 10px;">
            <label for="" class="form-label">{{__('To date')}}</label>
            <input type="date" name="to_date" value="{{request()->get('to_date') ?? ''}}" class="form-control form-control-solid w-250px  border-gray-300 border-1">
        </div>

        @if(request()->get('patient'))
        <div class="mb-0" style="margin-right: 10px;">
            <input type="hidden" name="patient" value="{{ request()->get('patient') ?? '' }} " class="form-control form-control-solid w-250px  border-gray-300 border-1">
        </div>
        @endif

        @if(request()->get('status'))
        <div class="mb-0" style="margin-right: 10px;">
            <input type="hidden" name="status" value="{{request()->get('status') ?? '' }} " class="form-control form-control-solid w-250px  border-gray-300 border-1">
        </div>
        @endif

        <div class="mt-9" style="margin-right: 10px;">
            <input type="submit" value="{{__('Search')}}" class="form-control w-100px btn btn-success">
        </div>
    </div>
</form>
