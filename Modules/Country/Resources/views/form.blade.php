@csrf

<div class="form-body">
    <div class="row">
        @foreach ($languages as $language)
        <div class="col-12 translatable" data-lang="{{ $language->language_code }}">
            <div class="form-group row align-items-center">
                <div class="col-4">
                    <label for="field-name-{{ $language->language_code }}">{{$language->language_name . ' '. __('Name') }}</label>
                </div>
                <div class="col-8">
                        <input type="text" id="field-name-{{ $language->language_code }}" class="form-control {{ $errors->has('country_name.'.$language->language_code) ? 'border-danger' : '' }}" value="{{ inputValidationTranslation('country_name', $model,$language->language_code) }}" placeholder="{{ __('Country Name') }}" name="country_name[{{$language->language_code}}]">
                        {!! $errors->first('country_name.'.$language->language_code, '<p class="text-danger">:message</p>') !!}
                </div>
            </div>
        </div>
        @endforeach

        <div class="col-12">
            <div class="form-group row align-items-center">
                <div class="col-4">
                    <label for="field-code">{{ __('Code') }}</label>
                </div>
                <div class="col-8">
                    <input type="text" id="field-code" class="form-control {{$errors->has('country_code') ? 'border-danger' : ''}}" placeholder="{{ __('Country Code') }}" name="country_code" value=" {{inputValidation('country_code',$model)}} ">
                    {!! $errors->first('country_code','<p class="text-danger">:message</p>') !!}
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="form-group row align-items-center">
                <div class="col-4">
                    <label for="field-iso-code">{{ __('ISO Code') }}</label>
                </div>
                <div class="col-8">
                    <input type="text" id="field-iso-code" name="country_iso_code" class="form-control" placeholder="{{ __('Country ISO Code') }}" name="country_iso_code" value=" {{inputValidation('country_iso_code',$model)}}">
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="form-group row align-items-center">
                <div class="col-4">
                    <label for="field-currency-code">{{ __('Currency') }}</label>
                </div>
                <div class="col-8">
                   <x-country-currency-code-component selectedCurrency="{{inputValidation('currency_code',$model)}}" name="currency_code" id="field-currency-code" />
                    {!! $errors->first('currency_code','<p class="text-danger">:message</p>') !!}
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="form-group row align-items-center">
                <div class="col-4">
                    <label for="field-language-id">{{ __('Default Language') }}</label>
                </div>
                <div class="col-8">
                    <x-language-languages-component selectedLanguage="{{inputValidation('language_id',$model)}}" id="field-language-id"/>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="form-group row align-items-center">
                <div class="col-4">
                    <label for="field-utc-offset">{{ __('UTC offset') }}</label>
                </div>
                <div class="col-8">
                    <x-country-utcoffset-component selectedUTC="{{inputValidation('utc_offset',$model)}}" name="utc_offset" id="field-utc-offset" />
                    {!! $errors->first('utc_offset','<p class="text-danger">:message</p>') !!}
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="form-group row align-items-center">
                <div class="col-4">
                    <label for="field-flag">{{ __('Flag') }}</label>
                </div>
                <div class="col-8">
                    <x-uploader-image-uploader-component  input_name="flag" image_name="{{ inputValidation('flag', $model) }}" upload_dir="countries/flags" />

                    {!! $errors->first('flag','<p class="text-danger">:message</p>') !!}
                </div>
            </div>
        </div>
        <div class="col-12 d-flex justify-content-end">
            <button type="submit" class="btn btn-primary mr-1">{{ __('Save') }}</button>
        </div>
    </div>
</div>
