@csrf
<div class="form-body">
    <div class="row">
        <div class="col-12">
            <div class="form-group row align-items-center">
                <div class="col-lg-2 col-3">
                    <label for="field-name">{{ __('Name') }}</label>
                </div>
                <div class="col-lg-10 col-9">
                    <input type="text" id="field-name"
                        class="form-control {{ $errors->has('language_name') ? 'border-danger' : '' }}"
                        placeholder="{{ __('Language Name') }}" name="language_name"
                        value="{{ inputValidation('language_name', $model) }}">
                    {!! $errors->first('language_name', '<p class="text-danger">:message</p>') !!}
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="form-group row align-items-center">
                <div class="col-lg-2 col-3">
                    <label for="field-code">{{ __('Code') }}</label>
                </div>
                <div class="col-lg-10 col-9">
                    <input type="text" id="field-code"
                        class="form-control {{ $errors->has('language_code') ? 'border-danger' : '' }}"
                        placeholder="{{ __('Language Code') }}" name="language_code"
                        value="{{ inputValidation('language_code', $model) }}">
                    {!! $errors->first('language_code', '<p class="text-danger">:message</p>') !!}
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="form-group row align-items-center">
                <div class="col-lg-2 col-3">
                    <label for="field-code">{{ __('Direction') }}</label>
                </div>
                <div class="col-lg-10 col-9">
                    <fieldset>
                        <div class="radio radio-secondary float-left m-2">
                            <input type="radio" name="direction" {!! checked($model->direction, 'ltr') !!} value="ltr" required id="checkbox-ltr">
                            <label for="checkbox-ltr">{{ __('LTR') }}</label>
                        </div>

                        <div class="radio radio-secondary float-left m-2">
                            <input type="radio" name="direction" {!! checked($model->direction, 'rtl') !!} value="rtl" required id="checkbox-rtl">
                            <label for="checkbox-rtl">{{ __('RTL') }}</label>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>

        <div class="col-12 d-flex justify-content-end">
            <button type="submit" class="btn btn-primary mr-1">{{ __('Save') }}</button>
        </div>
    </div>
</div>
