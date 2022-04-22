@extends('admin.layouts.main')

@section('content')
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-12 mb-2 mt-1">
                <div class="breadcrumbs-top">
                    <h5 class="content-header-title float-left pr-1 mb-0">{{ __('Roles Management') }}</h5>
                    <div class="float-right">
                        <a href="{{ url('admin/settings/roles/list') }}" class="btn btn-danger">
                            <i class="bx bx-arrow-back"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <section id="basic-datatable">
                <div class="row">
                    <div class="col-8 offset-2">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">{{ __('Add New Role') }}</h4>
                            </div>
                            <div class="card-body">
                                <form class="form" >
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group row align-items-center">
                                                    <div class="col-lg-2 col-3">
                                                        <label for="field-name">{{ __('Role Name') }}</label>
                                                    </div>
                                                    <div class="col-lg-10 col-9">
                                                        <div class="input-group">
                                                            <input type="text" id="field-name" class="form-control" placeholder="{{ __('Role Name') }}" name="name">
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
                                                <h5>{{ __('Permissions') }}</h5>
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>
                                                                    <fieldset>
                                                                        <div class="checkbox">
                                                                            <input type="checkbox" class="checkbox-input" id="checkbox-all" checked="">
                                                                            <label for="checkbox-all"></label>
                                                                        </div>
                                                                    </fieldset>
                                                                </th>
                                                                <th>{{ __('Module Name') }}</th>
                                                                <th>{{ __('Permissions') }}</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td>
                                                                <fieldset>
                                                                    <div class="checkbox">
                                                                        <input type="checkbox" class="checkbox-input-language" id="checkbox-language-all" checked="">
                                                                        <label for="checkbox-language-all"></label>
                                                                    </div>
                                                                </fieldset>
                                                            </td>
                                                            <td>{{ __('Language') }}</td>
                                                            <td>
                                                                <fieldset class="float-left m-2">
                                                                    <div class="checkbox">
                                                                        <input type="checkbox" class="checkbox-input-language" id="checkbox-language-list" checked="">
                                                                        <label for="checkbox-language-list">{{ __('List') }}</label>
                                                                    </div>
                                                                </fieldset>

                                                                <fieldset class="float-left m-2">
                                                                    <div class="checkbox">
                                                                        <input type="checkbox" class="checkbox-input-language" id="checkbox-language-view" checked="">
                                                                        <label for="checkbox-language-view">{{ __('View') }}</label>
                                                                    </div>
                                                                </fieldset>

                                                                <fieldset class="float-left m-2">
                                                                    <div class="checkbox">
                                                                        <input type="checkbox" class="checkbox-input-language" id="checkbox-language-edit" checked="">
                                                                        <label for="checkbox-language-edit">{{ __('Edit') }}</label>
                                                                    </div>
                                                                </fieldset>

                                                                <fieldset class="float-left m-2">
                                                                    <div class="checkbox">
                                                                        <input type="checkbox" class="checkbox-input-language" id="checkbox-language-delete" checked="">
                                                                        <label for="checkbox-language-delete">{{ __('Delete') }}</label>
                                                                    </div>
                                                                </fieldset>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
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
