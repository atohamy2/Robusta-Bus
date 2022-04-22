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
                        <input type="text" id="field-name-{{ $language->language_code }}" class="form-control {{ $errors->has('vehicle_model_name.'.$language->language_code) ? 'border-danger' : '' }}" value="{{ inputValidationTranslation('vehicle_model_name', $model,$language->language_code) }}" placeholder="{{ __('Vehicle Model Name') }}" name="vehicle_model_name[{{$language->language_code}}]">
                        {!! $errors->first('vehicle_model_name.'.$language->language_code, '<p class="text-danger">:message</p>') !!}
                </div>
            </div>
        </div>
        @endforeach

        <div class="col-12 ">
            <div class="form-group row align-items-center">
                <div class="col-4">
                    <label for="field-type">{{ __('Type') }}</label>
                </div>
                <div class="col-8">
                   <x-vehicle-vehicle-model-type-component  selectedVehicleModelType="{{inputValidation('vehicle_model_type',$model)}}"  name="vehicle_model_type" id="field-type"/>
                    {!! $errors->first('vehicle_model_type','<p class="text-danger">:message</p>') !!}
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="form-group row align-items-center">
                <div class="col-4">
                    <label for="field-brand-name">{{ __('Vehicle Brand') }}</label>
                </div>
                <div class="col-8">
                    <x-vehicle-vehicle-brand-component selectedVehicleBrand="{{inputValidation('vehicle_brand_id',$model)}}" name="vehicle_brand_id" id="field-brand-name"/>
                   
                    {!! $errors->first('vehicle_brand_id','<p class="text-danger">:message</p>') !!}
                </div>
            </div>
        </div>


        <div class="col-12">
            <div class="form-group row align-items-center">
                <div class="col-4">
                    <label for="field-min_acceptance_year">{{ __('Min Acceptance Year') }}</label>
                </div>
                <div class="col-8">
                    <input type="text" id="field-min_acceptance_year" name="min_acceptance_year" class="form-control {{ $errors->has('min_acceptance_year') ? 'border-danger' : '' }}" placeholder="{{ __('Min Acceptance Year') }}" name="min_acceptance_year" value=" {{inputValidation('min_acceptance_year',$model)}}" >
                    {!! $errors->first('min_acceptance_year','<p class="text-danger">:message</p>') !!}
                </div>
            </div>
        </div>
     



        <div class="col-12 d-flex justify-content-end">
            <button type="submit" class="btn btn-primary mr-1">{{ __('Save') }}</button>
        </div>
    </div>
</div>
