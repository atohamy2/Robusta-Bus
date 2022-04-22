@csrf
<div class="form-body">
    <div class="row">
        <div class="col-12">
            <div class="form-group row align-items-center">
                <div class="col-lg-2 col-3">
                    <label for="field-profile-picture">{{ __(' Profile Picture') }}</label>
                </div>
                <div class="col-lg-10 col-9">
                    <x-uploader-avatar-uploader-component input_name="profile_picture" image_name="{{ inputValidation('profile_picture', $model) }}" upload_dir="driver/avatars"  />
                    {!! $errors->first('profile_picture', '<p class="text-danger">:message</p>') !!}
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group row align-items-center">
                <div class="col-lg-2 col-3">
                    <label for="field-first-name">{{ __('First Name') }}</label>
                </div>
                <div class="col-lg-10 col-9">
                    <input type="text" id="field-first-name"
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
                    <label for="field-last-name">{{ __('Last Name') }}</label>
                </div>
                <div class="col-lg-10 col-9">
                    <input type="text" id="field-last-name"
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
                    <label for="field-phone-number">{{ __('Phone Number') }}</label>
                </div>
                <div class="col-lg-10 col-9">
                    <input type="text" id="field-phone-number"
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
                    <label for="field-gender">{{ __('Gender') }}</label>
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
                    <label for="field-country-id">{{ __('Country') }}</label>
                </div>
                <div class="col-lg-10 col-9">
                    <x-country-countries-component :selectedCountry="inputValidation('country_id', $model)" required="true" name="country_id" id="field-country-id"/>
                    {!! $errors->first('country_id', '<p class="text-danger">:message</p>') !!}
                </div>
            </div>
        </div>

        <div class="col-6">
            <div class="form-group row align-items-center">
                <div class="col-lg-2 col-3">
                    <label for="field-city-id">{{ __('City') }}</label>
                </div>
                <div class="col-lg-10 col-9">
                    <x-city-city-component :selectedCity="inputValidation('city_id', $model)" parentId="field-country-id" required="true" name="city_id" id="field-city-id"  />
                    {!! $errors->first('city_id', '<p class="text-danger">:message</p>') !!}
                </div>
            </div>
        </div>

        <div class="col-6">
            <div class="form-group row align-items-center">
                <div class="col-lg-2 col-3">
                    <label for="field-birth_date">{{ __('Birth Date') }}</label>
                </div>
                <div class="col-lg-10 col-9">
                    <input type="text" id="field-birth_date"
                        class="form-control date {{ $errors->has('birth_date') ? 'border-danger' : '' }}"
                        placeholder="{{ __('Birth Date') }}" name="birth_date"
                        value="{{ inputValidation('birth_date', $model) }}">
                    {!! $errors->first('birth_date', '<p class="text-danger">:message</p>') !!}
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group row align-items-center">
                <div class="col-lg-2 col-3">
                    <label for="field-national-id-number">{{ __('National ID Number') }}</label>
                </div>
                <div class="col-lg-10 col-9">
                    <input type="text" id="field-national-id-number"
                        class="form-control {{ $errors->has('national_id_number') ? 'border-danger' : '' }}"
                        placeholder="{{ __('National ID Number') }}" name="national_id_number"
                        value="{{ inputValidation('national_id_number', $model) }}">
                    {!! $errors->first('national_id_number', '<p class="text-danger">:message</p>') !!}
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group row align-items-center">
                <div class="col-lg-2 col-3">
                    <label for="field-national-id-expiration-date">{{ __('National ID Expiration Date') }}</label>
                </div>
                <div class="col-lg-10 col-9">
                    <input type="text" id="field-national-id-expiration-date"
                        class="form-control date {{ $errors->has('national_id_expiration_date') ? 'border-danger' : '' }}"
                        placeholder="{{ __('National ID Expiration Date') }}" name="national_id_expiration_date"
                        value="{{ inputValidation('national_id_expiration_date', $model) }}">
                    {!! $errors->first('national_id_expiration_date', '<p class="text-danger">:message</p>') !!}
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group row align-items-center">
                <div class="col-lg-2 col-3">
                    <label for="field-personal-license-number">{{ __(' Personal License Number') }}</label>
                </div>
                <div class="col-lg-10 col-9">
                    <input type="text" id="field-personal-license-number"
                        class="form-control {{ $errors->has('personal_license_number') ? 'border-danger' : '' }}"
                        placeholder="{{ __('Personal License Number') }}" name="personal_license_number"
                        value="{{ inputValidation('personal_license_number', $model) }}">
                    {!! $errors->first('personal_license_number', '<p class="text-danger">:message</p>') !!}
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group row align-items-center">
                <div class="col-lg-2 col-3">
                    <label for="field-license-expiration-date">{{ __(' License Expiration Date') }}</label>
                </div>
                <div class="col-lg-10 col-9">
                    <input type="text" id="field-license-expiration-date"
                        class="form-control date {{ $errors->has('license_expiration_date') ? 'border-danger' : '' }}"
                        placeholder="{{ __('License Expiration Date') }}" name="license_expiration_date"
                        value="{{ inputValidation('license_expiration_date', $model) }}">
                    {!! $errors->first('license_expiration_date', '<p class="text-danger">:message</p>') !!}
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
            $(".date").inputmask("yyyy-mm-dd");
        });
    </script>
@endpush
