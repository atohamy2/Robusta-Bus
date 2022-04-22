@extends('admin.layouts.main')

@section('content')
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-12 mb-2 mt-1">
                <div class="breadcrumbs-top">
                    <h5 class="content-header-title float-left pr-1 mb-0">{{ __('Cities Management') }}</h5>
                    <div class="float-right">
                        <a href="{{ url('admin/settings/cities') }}" class="btn  btn-primary"> <i class="bx bx-plus-circle"></i> {{ __('New') }}</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <section id="basic-datatable">
                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">{{ __('Add New City') }}</h4>
                            </div>
                            <div class="card-body">
                                <form class="form" >
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group row align-items-center">
                                                    <div class="col-3">
                                                        <label for="field-name">{{ __('Name') }}</label>
                                                    </div>
                                                    <div class="col-9">
                                                        <div class="input-group">
                                                            <input type="text" id="field-name" class="form-control" placeholder="{{ __('City Name') }}" name="name">
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
                                                    <div class="col-3">
                                                        <label for="field-country_id">{{ __('Country') }}</label>
                                                    </div>
                                                    <div class="col-9">
                                                        <select class="form-control" id="field-country_id" name="country_id">
                                                            <option>-- {{ __(' Select Country') }} --</option>
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
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">{{ __('Cities') }}</h4>
                            </div>
                            <div class="card-body card-dashboard">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                        <tr>
                                            <th>{{ __('ID') }}</th>
                                            <th>{{ __('City Name') }}</th>
                                            <th>{{ __('Country Name') }}</th>
                                            <th>{{ __('Actions') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>$city->id</td>
                                                <td>$city->name</td>
                                                <td>$city->country->name</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <span class="bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="menu"></span>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="{{ url('admin/settings/cities') }}"><i class="bx bx-edit-alt mr-1"></i>
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
                                            <th>{{ __('Language Name') }}</th>
                                            <th>{{ __('Language Code') }}</th>
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
