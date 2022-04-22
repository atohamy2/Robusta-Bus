@extends('admin.layouts.main')

@section('content')
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-12 mb-2 mt-1">
                <div class="breadcrumbs-top">
                    <h5 class="content-header-title float-left pr-1 mb-0">{{ __('Countries Management') }}</h5>
                    <div class="float-right">
                        <a href="{{ url('admin/settings/countries') }}" class="btn  btn-primary"> <i class="bx bx-plus-circle"></i> {{ __('New') }}</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <section id="basic-datatable">
                <div class="row">
                    <div class="col-5">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">{{ __('Add New Country') }}</h4>
                            </div>
                            <div class="card-body">
                                <form class="form" >
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group row align-items-center">
                                                    <div class="col-4">
                                                        <label for="field-name">{{ __('Name') }}</label>
                                                    </div>
                                                    <div class="col-8">
                                                        <div class="input-group">
                                                            <input type="text" id="field-name" class="form-control" placeholder="{{ __('Country Name') }}" name="name">
                                                            <div class="input-group-append">
                                                                <select class="form-control">
                                                                    <option>en</option>
                                                                    <option>ar</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group row align-items-center">
                                                    <div class="col-4">
                                                        <label for="field-code">{{ __('Code') }}</label>
                                                    </div>
                                                    <div class="col-8">
                                                        <input type="text" id="field-code" class="form-control" placeholder="{{ __('Country Code') }}" name="code">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group row align-items-center">
                                                    <div class="col-4">
                                                        <label for="field-iso_code">{{ __('ISO Code') }}</label>
                                                    </div>
                                                    <div class="col-8">
                                                        <input type="text" id="field-iso_code" class="form-control" placeholder="{{ __('Country ISO Code') }}" name="iso_code">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group row align-items-center">
                                                    <div class="col-4">
                                                        <label for="field-currency_code">{{ __('Currency') }}</label>
                                                    </div>
                                                    <div class="col-8">
                                                        <select class="form-control" id="field-currency_code" name="currency_code">
                                                            <option>-- {{ __(' Select Currency') }} --</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group row align-items-center">
                                                    <div class="col-4">
                                                        <label for="field-language_id">{{ __('Default Language') }}</label>
                                                    </div>
                                                    <div class="col-8">
                                                        <select class="form-control" id="field-language_id" name="language_id">
                                                            <option>-- {{ __(' Select Language') }} --</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group row align-items-center">
                                                    <div class="col-4">
                                                        <label for="field-utc_offset">{{ __('UTC offset') }}</label>
                                                    </div>
                                                    <div class="col-8">
                                                        <select class="form-control" id="field-utc_offset" name="utc_offset">
                                                            <option>-- {{ __(' Select offset') }} --</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary mr-1">{{ __('Save') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-7">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">{{ __('Countries') }}</h4>
                            </div>
                            <div class="card-body card-dashboard">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                        <tr>
                                            <th>{{ __('ID') }}</th>
                                            <th>{{ __('Name') }}</th>
                                            <th>{{ __('Code') }}</th>
                                            <th>{{ __('ISO Code') }}</th>
                                            <th>{{ __('Currency') }}</th>
                                            <th>{{ __('Actions') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>$country->id</td>
                                                <td>$country->name</td>
                                                <td>$country->code</td>
                                                <td>$country->iso_code</td>
                                                <td>$country->currency_code</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <span class="bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="menu"></span>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="{{ url('admin/settings/countries') }}"><i class="bx bx-edit-alt mr-1"></i>
                                                                {{ __('Edit') }}</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash mr-1"></i> {{ __('Delete') }}</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>

                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>{{ __('ID') }}</th>
                                            <th>{{ __('Name') }}</th>
                                            <th>{{ __('Code') }}</th>
                                            <th>{{ __('ISO Code') }}</th>
                                            <th>{{ __('Currency') }}</th>
                                            <th>{{ __('Actions') }}</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('xlstart-assets/') }}/app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('xlstart-assets/') }}/app-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('xlstart-assets/') }}/app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css">
@endpush

@push('scripts')
    <script src="{{ asset('xlstart-assets/') }}/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js"></script>
    <script src="{{ asset('xlstart-assets/') }}/app-assets/vendors/js/tables/datatable/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('xlstart-assets/') }}/app-assets/vendors/js/tables/datatable/dataTables.buttons.min.js"></script>
    <script src="{{ asset('xlstart-assets/') }}/app-assets/js/scripts/datatables/datatable.min.js"></script>

@endpush
