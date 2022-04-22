@csrf

<div class="form-body">
    <div class="row">
        @foreach ($languages as $language)
        <div class="col-12 translatable " data-lang="{{ $language->language_code }}">
            <div class="form-group row align-items-center">
                <div class="col-4">
                    <label for="field-name-{{$language->language_code}}">{{$language->language_name . ' '. __('Name') }}</label>
                </div>
                <div class="col-8">
                        <input type="text" id="field-name-{{$language->language_code}}" class="form-control {{ $errors->has('city_name.'.$language->language_code) ? 'border-danger' : '' }}" value="{{inputValidationTranslation('city_name',$model,$language->language_code)}}"   placeholder="{{ __('City Name') }}" name="city_name[{{$language->language_code}}]">
                    {!! $errors->first('city_name.'.$language->language_code, '<p class="text-danger">:message</p>') !!}
                </div>
            </div>
        </div>

        @endforeach


        <div class="col-12 d-flex justify-content-end">
            <button type="submit" class="btn btn-primary mr-1">{{ __('Save') }}</button>
        </div>
    </div>
</div>
