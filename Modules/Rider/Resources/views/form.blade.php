@csrf
<div class="form-body">
    <div class="row">
        <div class="col-12">
            <x-uploader-avatar-uploader-component input_name="photo" :image_name="$model->photo" upload_dir="riders" />
        </div>

        <div class="col-6">
            <div class="form-group row align-items-center">
                <div class="col-lg-2 col-3">
                    <label for="field-name">{{ __('First Name') }}</label>
                </div>
                <div class="col-lg-10 col-9">
                    <input type="text" id="field-name"
                        class="form-control {{ $errors->has('first_name') ? 'border-danger' : '' }}"
                        placeholder="{{ __('First Name') }}" name="first_name"
                        value="{{ inputValidation('first_name', $model) }}">
                    {!! $errors->first('first_name', '<p class="text-danger">:message</p>') !!}
                </div>
            </div>
        </div>

        <div class="col-6">
            <div class="form-group row align-items-center">
                <div class="col-lg-2 col-3">
                    <label for="field-name">{{ __('Last Name') }}</label>
                </div>
                <div class="col-lg-10 col-9">
                    <input type="text" id="field-name"
                        class="form-control {{ $errors->has('last_name') ? 'border-danger' : '' }}"
                        placeholder="{{ __('Last Name') }}" name="last_name"
                        value="{{ inputValidation('last_name', $model) }}">
                    {!! $errors->first('last_name', '<p class="text-danger">:message</p>') !!}
                </div>
            </div>
        </div>

        <div class="col-6">
            <div class="form-group row align-items-center">
                <div class="col-lg-2 col-3">
                    <label for="field-name">{{ __('Phone Number') }}</label>
                </div>
                <div class="col-lg-10 col-9">
                    <input type="text" id="field-name"
                        class="form-control {{ $errors->has('phone_number') ? 'border-danger' : '' }}"
                        placeholder="{{ __('Phone Number') }}" name="phone_number"
                        value="{{ inputValidation('phone_number', $model) }}">
                    {!! $errors->first('phone_number', '<p class="text-danger">:message</p>') !!}
                </div>
            </div>
        </div>

        <div class="col-6">
            <div class="form-group row align-items-center">
                <div class="col-lg-2 col-3">
                    <label for="field-name">{{ __('Email') }}</label>
                </div>
                <div class="col-lg-10 col-9">
                    <input type="email" id="field-name"
                        class="form-control {{ $errors->has('email') ? 'border-danger' : '' }}"
                        placeholder="{{ __('Email') }}" name="email"
                        value="{{ inputValidation('email', $model) }}">
                    {!! $errors->first('email', '<p class="text-danger">:message</p>') !!}
                </div>
            </div>
        </div>

        <div class="col-6">
            <div class="form-group row align-items-center">
                <div class="col-lg-2 col-3">
                    <label for="field-name">{{ __('Gender') }}</label>
                </div>
                <div class="col-lg-10 col-9">
                    <x-gender-component :selectedGender="inputValidation('gender', $model)" required="true" />
                    {!! $errors->first('gender', '<p class="text-danger">:message</p>') !!}
                </div>
            </div>
        </div>

        <div class="col-6">
            <div class="form-group row align-items-center">
                <div class="col-lg-2 col-3">
                    <label for="field-name">{{ __('Country') }}</label>
                </div>
                <div class="col-lg-10 col-9">
                    <x-country-countries-component :selectedCountry="inputValidation('country_id', $model)"
                        required="true" />
                    {!! $errors->first('country_id', '<p class="text-danger">:message</p>') !!}
                </div>
            </div>
        </div>

        <div class="col-6">
            <div class="form-group row align-items-center">
                <div class="col-lg-2 col-3">
                    <label for="field-name">{{ __('City') }}</label>
                </div>
                <div class="col-lg-10 col-9">
                    <x-city-city-component :selectedCity="inputValidation('city_id', $model)" required="true" name="city_id" />
                    {!! $errors->first('city_id', '<p class="text-danger">:message</p>') !!}
                </div>
            </div>
        </div>

        <div class="col-6">
            <div class="form-group row align-items-center">
                <div class="col-lg-2 col-3">
                    <label for="field-name">{{ __('Birth Date') }}</label>
                </div>
                <div class="col-lg-10 col-9">
                    <input type="text" id="field-birth_date"
                        class="form-control {{ $errors->has('birth_date') ? 'border-danger' : '' }}"
                        placeholder="{{ __('Birth Date') }}" name="birth_date"
                        value="{{ inputValidation('birth_date', $model) }}">
                    {!! $errors->first('birth_date', '<p class="text-danger">:message</p>') !!}
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
            $("#field-birth_date").inputmask("yyyy-mm-dd");
        });
    </script>
@endpush
