@csrf

<div class="form-body">
    <div class="row">
        @foreach ($languages as $language)
        <div class="col-12 translatable " data-lang="{{ $language->language_code }}">
            <div class="form-group row align-items-center">
                <div class="col-2">
                    <label for="field-name-{{$language->language_code}}">{{$language->language_name . ' '. __('Name') }}</label>
                </div>
                <div class="col-8">
                        <input type="text" id="field-name-{{$language->language_code}}" class="form-control {{ $errors->has('name.'.$language->language_code) ? 'border-danger' : '' }}" value="{{inputValidationTranslation('name',$model,$language->language_code)}}"   placeholder="{{ __('Trip Name') }}" name="name[{{$language->language_code}}]">
                    {!! $errors->first('name.'.$language->language_code, '<p class="text-danger">:message</p>') !!}
                </div>
            </div>
        </div>

        @endforeach
            <div class="col-6">
                <div class="form-group row align-items-center">
                    <div class="col-lg-2 col-3">
                        <label for="field-bus-number">{{ __('Bus Number') }}</label>
                    </div>
                    <div class="col-lg-10 col-9">
                        <input type="text" id="field-bus_number-{{$language->language_code}}" class="form-control {{ $errors->has('bus_number.'.$language->language_code) ? 'border-danger' : '' }}" value="{{ inputValidation('bus_number', $model) }}"   placeholder="{{ __('Bus Number') }}" name="bus_number">
                        {!! $errors->first('bus_number', '<p class="text-danger">:message</p>') !!}
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group row align-items-center">
                    <div class="col-lg-2 col-3">
                        <label for="field-city-id">{{ __('Bus Line ') }}</label>
                    </div>
                    <div class="col-lg-10 col-9">
                        <x-lines-lines-component :selectedLine="inputValidation('line_id', $model)" required="true"
                                               name="line_id" id="field-line_id"/>
                        {!! $errors->first('line_id', '<p class="text-danger">:message</p>') !!}
                    </div>
                </div>
            </div>

            <div class="col-6">
                <div class="form-group row align-items-center">
                    <div class="col-lg-2 col-3">
                        <label for="field-date-time">{{ __('Trip Date Time ') }}</label>
                    </div>
                    <div class="col-lg-10 col-9">
                        <input type="text"  class="form-control date{{ $errors->has('bus_number.'.$language->language_code) ? 'border-danger' : '' }}" value="{{ inputValidation('datetime', $model) }}"   placeholder="{{ __('Date Time') }}" name="datetime">
                        {!! $errors->first('datetime', '<p class="text-danger">:message</p>') !!}
                    </div>
                </div>
            </div>


        <div class="col-12 d-flex justify-content-end">
            <button type="submit" class="btn btn-primary mr-1">{{ __('Save') }}</button>
        </div>
    </div>
</div>
@push('scripts')
    <script src="{{ asset('xlstart-assets/app-assets/vendors/js/forms/inputmask/jquery.inputmask.bundle.min.js') }}">
    </script>
    <script>
        $(document).ready(function(e) {
            $(".date").inputmask('datetime', {
                mask: "y-2-1 h:s",
                alias: "yyyy-mm-dd",
                placeholder: "yyyy-mm-dd hh:mm",
                separator: '-'
            });
        });
    </script>
@endpush
