@csrf
<input type="hidden" name="driver_id" value="{{ $model->driver_id ?? request()->driver_id }}">
<div class="form-body">
    <div class="row">
        <div class="col-6">
            <div class="form-group row align-items-center">
                <div class="col-lg-2 col-3">
                    <label for="field-year">{{ __('Year') }}</label>
                </div>
                <div class="col-lg-10 col-9">
                    <input type="year" id="field-year"
                        class="form-control {{ $errors->has('year') ? 'border-danger' : '' }}"
                        placeholder="{{ __('Year') }}" name="year"
                        value="{{ inputValidation('year', $model) }}">
                    {!! $errors->first('year', '<p class="text-danger">:message</p>') !!}
                </div>
            </div>
        </div>

        <div class="col-6">
            <div class="form-group row align-items-center">
                <div class="col-lg-2 col-3">
                    <label for="field-licence_number">{{ __('Licence Number') }}</label>
                </div>
                <div class="col-lg-10 col-9">
                    <input type="text" id="field-licence_number"
                        class="form-control {{ $errors->has('licence_number') ? 'border-danger' : '' }}"
                        placeholder="{{ __('Licence Number') }}" name="licence_number"
                        value="{{ inputValidation('licence_number', $model) }}">
                    {!! $errors->first('licence_number', '<p class="text-danger">:message</p>') !!}
                </div>
            </div>
        </div>

        <div class="col-6">
            <div class="form-group row align-items-center">
                <div class="col-lg-2 col-3">
                    <label for="field-licence_expiration_date">{{ __('Licence Expiration Date') }}</label>
                </div>
                <div class="col-lg-10 col-9">
                    <input type="text" id="field-licence_expiration_date"
                        class="form-control {{ $errors->has('licence_expiration_date') ? 'border-danger' : '' }}"
                        placeholder="{{ __('Licence Expiration Date') }}" name="licence_expiration_date"
                        value="{{ inputValidation('licence_expiration_date', $model) }}">
                    {!! $errors->first('licence_expiration_date', '<p class="text-danger">:message</p>') !!}
                </div>
            </div>
        </div>

        <div class="col-6">
            <div class="form-group row align-items-center">
                <div class="col-lg-2 col-3">
                    <label for="field-plate_number">{{ __('Plate Number') }}</label>
                </div>
                <div class="col-lg-10 col-9">
                    <input type="text" id="field-plate_number"
                        class="form-control {{ $errors->has('plate_number') ? 'border-danger' : '' }}"
                        placeholder="{{ __('Plate Number') }}" name="plate_number"
                        value="{{ inputValidation('plate_number', $model) }}">
                    {!! $errors->first('plate_number', '<p class="text-danger">:message</p>') !!}
                </div>
            </div>
        </div>

        <div class="col-6">
            <div class="form-group row align-items-center">
                <div class="col-lg-2 col-3">
                    <label for="field-name">{{ __('Vehicle Brand') }}</label>
                </div>
                <div class="col-lg-10 col-9">
                    <x-vehicle-vehicle-brand-component selectedVehicleBrand="{{inputValidation('vehicle_brand_id', $model)}}" name="vehicle_brand_id" id="field-brand-name"/>
                    {!! $errors->first('vehicle_brand_id', '<p class="text-danger">:message</p>') !!}
                </div>
            </div>
        </div>

        <div class="col-6">
            <div class="form-group row align-items-center">
                <div class="col-lg-2 col-3">
                    <label for="field-name">{{ __('Vehicle Model') }}</label>
                </div>
                <div class="col-lg-10 col-9">
                    <x-vehicle-vehicle-model-component selectedVehicleModel="{{inputValidation('vehicle_model_id', $model)}}" name="vehicle_model_id" id="field-brand-name"/>
                    {!! $errors->first('vehicle_model_id', '<p class="text-danger">:message</p>') !!}
                </div>
            </div>
        </div>

        <div class="col-6">
            <div class="form-group row align-items-center">
                <div class="col-lg-2 col-3">
                    <label for="field-name">{{ __('Color') }}</label>
                </div>
                <div class="col-lg-10 col-9">
                    <x-colors-color-component :selectedColor="inputValidation('vehicle_color_id', $model)" name="vehicle_color_id" />
                    {!! $errors->first('vehicle_color_id', '<p class="text-danger">:message</p>') !!}
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
            $("#field-year").inputmask("y");
            $("#field-licence_expiration_date").inputmask("yyyy-mm-dd");
        });
    </script>
@endpush
