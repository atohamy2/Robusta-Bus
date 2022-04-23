@csrf

<div class="form-body">
    <div class="row">
        @foreach ($languages as $language)
            <div class="col-12 translatable " data-lang="{{ $language->language_code }}">
                <div class="form-group row align-items-center">
                    <div class="col-4">
                        <label
                            for="field-name-{{$language->language_code}}">{{$language->language_name . ' '. __('Name') }}</label>
                    </div>
                    <div class="col-8">
                        <input type="text" id="field-name-{{$language->language_code}}"
                               class="form-control {{ $errors->has('name.'.$language->language_code) ? 'border-danger' : '' }}"
                               value="{{inputValidationTranslation('name',$model,$language->language_code)}}"
                               placeholder="{{ __('Line Name') }}" name="name[{{$language->language_code}}]">
                        {!! $errors->first('name.'.$language->language_code, '<p class="text-danger">:message</p>') !!}
                    </div>
                </div>
            </div>

        @endforeach

        <div class="col-6">
            <div class="form-group row align-items-center">
                <div class="col-lg-2 col-3">
                    <label for="field-city-id">{{ __('Start City') }}</label>
                </div>
                <div class="col-lg-10 col-9">
                    <x-city-city-component :selectedCity="inputValidation('start_city', $model)" required="true"
                                           name="start_city" id="field-start_city"/>
                    {!! $errors->first('start_city', '<p class="text-danger">:message</p>') !!}
                </div>
            </div>
        </div>

        <div class="col-6">
            <div class="form-group row align-items-center">
                <div class="col-lg-2 col-3">
                    <label for="field-city-id">{{ __('End City') }}</label>
                </div>
                <div class="col-lg-10 col-9">
                    <x-city-city-component :selectedCity="inputValidation('end_city', $model)" required="true"
                                           name="end_city" id="field-end_city"/>
                    {!! $errors->first('end_city', '<p class="text-danger">:message</p>') !!}
                </div>
            </div>
        </div>

        <div class="col-6">
            <div class="form-group row align-items-center">
                <div class="col-lg-2 col-3">
                    <label for="field-city-id">{{ __('Stop Points') }}</label>
                </div>
                <div class="col-lg-10 col-9">
                    <table>
                        <tr>
                            <td><b>City</b></td>
                            <td><b>Order</b></td>
                        </tr>
                        @foreach($cities as $city)
                            <tr>
                                <td><input id="city_{{$city->id}}" name="stop[]" class="form-check-inline"
                                           type="checkbox" value="{{$city->id}}"> <label
                                        for="city_{{$city->id}}">{{ $city->city_name }}</label></td>
                                <td><input type="number" name="order[]" class="form-control" ></td>
                            </tr>
                        @endforeach
                    </table>
                </div>

            </div>
        </div>


        <div class="col-12 d-flex justify-content-end">
            <button type="submit" class="btn btn-primary mr-1">{{ __('Save') }}</button>
        </div>
    </div>
</div>
