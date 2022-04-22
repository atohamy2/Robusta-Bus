@csrf

<div class="form-body">
    <div class="row">
        @foreach ($languages as $language)
        <div class="col-12 translatable" data-lang="{{ $language->language_code }}">
            <div class="form-group row align-items-center">
                <div class="col-4">
                    <label for="field-name-{{$language->language_code}}">{{$language->language_name . ' '. __('Name') }}</label>
                </div>
                <div class="col-8">
                        <input type="text" id="field-name-{{ $language->language_code }}" class="form-control {{ $errors->has('vehicle_brand_name.'.$language->language_code) ? 'border-danger' : '' }}" value="{{ inputValidationTranslation('vehicle_brand_name', $model,$language->language_code) }}" placeholder="{{ __('Vehicle Brand Name') }}" name="vehicle_brand_name[{{$language->language_code}}]">
                        {!! $errors->first('vehicle_brand_name.'.$language->language_code, '<p class="text-danger">:message</p>') !!}
                </div>
            </div>
        </div>
        @endforeach
        
        <div class="col-12 " >
            <div class="form-group row align-items-center">
                <div class="col-4">
                    <label for="field-type">{{ __('Type') }}</label>
                </div>
                <div class="col-8">
                       <x-vehicle-vehicle-brand-type-component selectedVehicleBrandType="{{inputValidation('vehicle_brand_type',$model)}}" name="vehicle_brand_type" id="field-type" />
                       {!! $errors->first('vehicle_brand_type', '<p class="text-danger">:message</p>') !!}
                </div>
            </div>
        </div>
       
     

        <div class="col-12 d-flex justify-content-end">
            <button type="submit" class="btn btn-primary mr-1">{{ __('Save') }}</button>
        </div>
    </div>
</div>
