@csrf
<div class="form-body">
    <div class="row">
        <div class="col-6">
            <div class="form-group row align-items-center">
                <div class="col-lg-2 col-3">
                    <label for="field-name">{{ __('Name') }}</label>
                </div>
                <div class="col-lg-10 col-9">
                    <input type="text" id="field-name"
                        class="form-control {{ $errors->has('name') ? 'border-danger' : '' }}"
                        placeholder="{{ __('Name') }}" name="name" value="{{ inputValidation('name', $model) }}">
                    {!! $errors->first('name', '<p class="text-danger">:message</p>') !!}
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
                        placeholder="{{ __('Email') }}" name="email" value="{{ inputValidation('email', $model) }}">
                    {!! $errors->first('email', '<p class="text-danger">:message</p>') !!}
                </div>
            </div>
        </div>

        <div class="col-6">
            <div class="form-group row align-items-center">
                <div class="col-lg-2 col-3">
                    <label for="field-name">{{ __('Role') }}</label>
                </div>
                <div class="col-lg-10 col-9">
                    <x-roles-roles-component :selectedRole="optional($model->role)->id" required="true" />
                    {!! $errors->first('role_id', '<p class="text-danger">:message</p>') !!}
                </div>
            </div>
        </div>

        <div class="col-6">
            <div class="form-group row align-items-center">
                <div class="col-lg-2 col-3">
                    <label for="field-name">{{ __('Country') }}</label>
                </div>
                <div class="col-lg-10 col-9">
                    <x-country-countries-component :selectedCountry="inputValidation('country_id', $model)" required="false" />
                    {!! $errors->first('country_id', '<p class="text-danger">:message</p>') !!}
                </div>
            </div>
        </div>

        <div class="col-6">
            <div class="form-group row align-items-center">
                <div class="col-lg-2 col-3">
                    <label for="field-name">{{ __('Password') }}</label>
                </div>
                <div class="col-lg-10 col-9">
                    <input type="password" id="field-name"
                        class="form-control {{ $errors->has('password') ? 'border-danger' : '' }}"
                        placeholder="{{ __('Password') }}" name="password">
                    {!! $errors->first('password', '<p class="text-danger">:message</p>') !!}
                </div>
            </div>
        </div>

        <div class="col-12 d-flex justify-content-end">
            <button type="submit" class="btn btn-primary mr-1">{{ __('Save') }}</button>
        </div>
    </div>
</div>
